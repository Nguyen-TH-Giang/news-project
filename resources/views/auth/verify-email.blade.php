<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                    <x-application-logo />
                </a>
            </div><!-- End Logo -->
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="card-body">
            <form class="row g-3 needs-validation" method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">{{ __('Resend Verification Email') }}</button>
                </div>
            </form>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">{{ __('Log Out') }}</button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
