<div id="ModalRegisterForm" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-body">
                <h1>@lang('navMenu.create2')</h1>
                <form role="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">{{ __('Name') }}</label>
                        <div>
                            <input id="name" type="text"
                                class="form-control input-lg @error('name') is-invalid @enderror" name="name" value="">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ __('Password') }}</label>
                        <div>
                            <input type="password"
                                class="form-control input-lg  @error('password') is-invalid @enderror" id="password"
                                minlength="8" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ __('Confirm Password') }}</label>
                        <div>
                            <input id="CPassword" type="password" class="form-control input-lg"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary p-2 mt-3" onclick="validateRegisterForm()">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->