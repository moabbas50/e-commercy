

<x-guest-layout>

    <div class="hero-text-tablecell">
        <p class="subtitle">Fresh & Organic</p>
        <h1>Delicious Seasonal Fruits</h1>
        @if (Session::has('status'))
                <div class="alert alert-danger">
                    {{ Session::get('status') }}
                </div>
            @endif
        <div class="hero-btns">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}"
                            class="boxed-btn">OSIRIS</a>
                    @else
                    <a href="{{ url('/home') }}"
                            class="boxed-btn">OSIRIS</a>
                        <a href="{{ route('login') }}"
                        class="bordered-btn"  >Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                            class="bordered-btn">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </div>
</x-guest-layout>
