@extends('layouts.admin')
@section('messages')
{{$nMessages}}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">"Create a new admin user"</div>
                <div class="card-body">

                    <form action="{{route('adminStore')}}" method="post">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="name" name="name"
                            value="{{ old('name') }}"><br>

                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" placeholder="LastName" name="lastname"
                            value="{{ old('lastname') }}"><br>

                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}"><br>

                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password"><br>

                        <label for="Confirmpassword">Confirm password</label>
                        <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation"><br>
                        <!-- hyper button -->
                        <br>
                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection