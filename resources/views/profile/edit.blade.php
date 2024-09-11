<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>

    </x-slot>

    <div class="container-fluid text-center mt-5">
        <h6>
            @if (Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif
        </h6>
        <div class="row d-flex justify-content-around">

            <div class="col-lg-4">
                <div class="">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="col-lg-4">
                <div class="">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="col-lg-4">
                <div class="">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
