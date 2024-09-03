

<x-guest-layout>

    <div class="hero-text-tablecell">
        <p class="subtitle">Fresh & Organic</p>
        <h1>Delicious Seasonal Fruits</h1>
        <div class="hero-btns">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="boxed-btn">Dashboard</a>
                    @else
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
