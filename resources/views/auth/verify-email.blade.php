<x-guest-layout>
    <div class="hero-text-tablecell">
        <p style="letter-spacing: 0px" class="subtitle">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </p>
        <p class="subtitle">
            @if (session('status') == 'verification-link-sent')
                <div class="">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
        </p>
        <div class="hero-btns">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button class="bordered-btn">
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="bordered-btn mt-4">
                    {{ __('Log Out') }}
                </button>
            </form>

        </div>
    </div>



</x-guest-layout>
