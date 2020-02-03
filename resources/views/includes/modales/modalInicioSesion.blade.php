<!-- Modal Inicio de sesion -->
<div id="inicioSesionModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-white" style="background-color: #21330f ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('navMenu.formulariologin')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">@lang('navMenu.correo')</label>

                        <div class="col-md-6">
                            <input id="emailLogIn" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">@lang('navMenu.contraseña')</label>

                        <div class="col-md-6">
                            <input id="passwordLogIn" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group col">
                            @if (Route::has('password.request'))
                            <a class="" href="{{ route('password.request') }}">
                                @lang('navMenu.olvidada')
                            </a>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="input-group col">
                                <button class="btn btn-success p-2 mt-1" type="submit">@lang('navMenu.iniciar')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>