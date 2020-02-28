@extends('layouts.admin')
@section('messages')
{{$nMessages}}
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$name}} devices</h1>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Device List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Serial Number</th>
              <th>Name</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Public/Private</th>
              <th>Owner</th>
              <th>Last data</th>
              <th>Show</th>
            </tr>
          </thead>
          <tbody>
            @foreach($devices as $device)
            <tr>
              <td>{{$device->id}}</td>
              <td>{{$device->name}}</td>
              <td>{{$device->latitude}}</td>
              <td>{{$device->longitude}}</td>
              <td>{{($device->public) ? 'public' : 'private'}}</td>
              <td>{{$device->User->name}} {{$device->User->lastname}}</td>
              @if (isset($lastData))
              <td class="text-center">{{$lastData}}</td>
              @else
              <td>{{$device->updated_at}}</td>
              @endif
              <td>
                <a href="{{route('devices.show',$device->id)}}" class="btn btn-info btn-circle btn-sm">
                  <i class="fas fa-eye"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection