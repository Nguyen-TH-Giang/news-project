<x-guest-layout>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <x-auth-card>
                            <x-slot name="logo">
                                <div class="d-flex justify-content-center py-4">
                                    <a href="/" class="logo d-flex align-items-center w-auto">
                                        <x-application-logo />
                                    </a>
                                </div><!-- End Logo -->
                            </x-slot>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <div class="card mb-3">
                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                                        @csrf

                                        <div class="col-12">
                                            <x-label for="email" :value="__('email')" />

                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="email" class="form-control"
                                                    id="email" value="{{ old('email') }}" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <x-label for="password" :value="__('Password')" />
                                            <input type="password" name="password" class="form-control"
                                                id="password" value="{{ old('password') }}" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="remember_me">
                                                <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">{{ __('Log in') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </x-auth-card>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>
