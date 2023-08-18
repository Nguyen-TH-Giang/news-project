<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                    <x-application-logo />
                </a>
            </div><!-- End Logo -->
        </x-slot>

        <div class="card mb-3">
            <div class="card-body">

                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Reset password</h5>
                </div>

                <form class="row g-3" method="POST" action="{{ route('password.update') }}" id="resetForm" novalidate>
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="col-12 field">
                        <x-label :value="__('Email')" />
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="email" class="form-control" value="{{ old('email', $request->email) }}">
                            <div class="invalid-feedback" id="email"></div>
                            <x-admin.form.error field="email" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-12 field">
                        <x-label :value="__('Password')" />
                        <div class="input-group">
                            <input type="password" id="input_password" name="password" class="form-control" value="{{ old('password') }}">
                            <div class="invalid-feedback" id="password"></div>
                            <x-admin.form.error field="password" />
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-12 field">
                        <x-label :value="__('Confirm Password')" />
                        <div class="input-group">
                            <input type="password" name="password_confirmation" class="form-control">
                            <div class="invalid-feedback" id="password_confirmation"></div>
                            <x-admin.form.error field="password_confirmation" />
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">{{ __('Reset Password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
