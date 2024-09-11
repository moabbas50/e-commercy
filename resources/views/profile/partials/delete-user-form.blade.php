<section class="space-y-6">



        <form method="post" action="{{ route('profile.destroy') }}" >
            @csrf
            @method('delete')

            <h3 class="text-lg font-small text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h3>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-danger-button class="bordered-btn mt-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>

</section>
