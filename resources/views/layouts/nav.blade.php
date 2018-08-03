<header>
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/login') }}">Home</a>
        @else
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
        @endauth
         </div>
    @endif
</header>
