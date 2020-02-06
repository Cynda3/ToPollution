<!-- Modal Registro -->
<div id="registroModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content  text-white" style="background-color: #21330f ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('navMenu.formularioregistro')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Nombre -->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">@lang('navMenu.name')</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span id="nameError" class="text-danger">Tienes que escribir un nombre</span>
                            <span id="nameError2" class="text-danger">El nombre no puede tener mas de 20 caracteres ni caracteres especiales</span>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Apellido -->
                    <div class="form-group row">
                        <label for="lastname" class="col-md-4 col-form-label text-md-right">@lang('navMenu.apellido')</label>

                        <div class="col-md-6">
<<<<<<< HEAD
                            <input id="label" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
=======
                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
>>>>>>> 3b82c9da238963a902bb7f95da5c0902689d8b57
                            <span id="lastnameError" class="text-danger">Tienes que escribir un apellido</span>
                            <span id="lastnameError2" class="text-danger">El apellido no puede tener mas de 20 caracteres ni caracteres especiales</span>
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">@lang('navMenu.correo')</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <span id="emailError" class="text-danger">Tienes que escribir un email</span>
                            <span id="emailError2" class="text-danger">Introduce un email valido</span>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
<<<<<<< HEAD

=======
                    <!-- Password -->                
>>>>>>> 3b82c9da238963a902bb7f95da5c0902689d8b57
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">@lang('navMenu.contraseña')</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <span id="passError" class="text-danger">Tienes que escribir una contraseña</span>
                            <span id="passError2" class="text-danger">La contraseña tiene que tener mínimo ocho caracteres, al menos una letra, un número y un carácter especial</span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- ConfirmPassword-->
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('navMenu.cContraseña')</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <span id="cPassError" class="text-danger">Las contraseñas tienen que ser iguales</span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group row mb-0">
                            <div class="input-group col">
                                <button type="submit" class="btn btn-success p-2 mt-1" id="Registrarse" disabled>
                                @lang('navMenu.registrarse')
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>