<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                    <x-application-logo />
                </a>
            </div><!-- End Logo -->
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="card mb-3">
            <div class="card-body">

                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Reset password</h5>
                </div>

                <form class="row g-3 needs-validation" method="POST" action="{{ route('password.update') }}" novalidate>
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="col-12">
                        <x-label for="email" :value="__('Email')" />

                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>

                            <input type="text" name="email" class="form-control" id="email" value="{{ old('email', $request->email) }}" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-12">
                        <x-label for="password" :value="__('Password')" />

                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-12">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">{{ __('Reset Password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
