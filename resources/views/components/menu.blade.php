<ul class="menu">
    @foreach($items as $menu)
        <li class="menu__list @if(Route::currentRouteName()===$menu['name']) active @endif">
            <a class="menu__link" href="{{ $menu['href'] }}">
                {{ __($menu['title']) }}
            </a>
        </li>
    @endforeach
</ul>
