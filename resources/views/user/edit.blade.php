@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        Name: <input type="text" placeholder="{{$user->name}}" name="name"><br>
                        Email: <input type="text" placeholder="{{$user->email}}" name="email"><br>
                        <button>Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
