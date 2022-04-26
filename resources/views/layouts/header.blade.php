<header>
    <x-menu />
    @if(\Auth::user())
        <div class="mr-11 flex flex-row">
            <p>name: {{ \Auth::user()->name }}</p>
            <a class="ml-4 hover:text-alert uppercase" href="{{ route('logout') }}">Logout</a>
        </div>
    @else
        <a href="{{ route('login.form') }}">Login</a>
    @endif
</header>
