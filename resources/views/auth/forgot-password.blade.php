<x-guest-layout>

    <!-- Session Status -->

    <div class="hero-text-tablecell">
        <x-auth-session-status style="font-weight: bold" class="subtitle text-success mb-4" :status="session('status')" />
        <p style="letter-spacing: 0px" class="subtitle">Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will allow you to choose a new one.</p>
        <div class="form">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" style="font-weight: bold" class="subtitle text-danger mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button class="bordered-btn">Email Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
