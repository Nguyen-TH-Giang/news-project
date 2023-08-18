<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                    <x-application-logo />
                </a>
            </div><!-- End Logo -->
        </x-slot>

        <div>
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="card mb-3 pt-3 mt-3">
            <div class="card-body">
                <form class="row g-3" method="POST" action="{{ route('password.email') }}" id="forgotForm" novalidate>
                    @csrf
                    <div class="col-12">
                        <x-label :value="__('Email')" />

                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                            <div class="invalid-feedback" id="email"></div>
                            <x-admin.form.error field="email" />
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100"
                            type="submit">{{ __('Email Password Reset Link') }}</button>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </x-auth-card>
</x-guest-layout>
