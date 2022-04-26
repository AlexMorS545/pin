<!DOCTYPE html>
<html lang="ru">
<head>
    @include('layouts.head')
</head>
<body>
@include('layouts.loader')
<div class="wrapper">
    @include('layouts.left_bar')
    <div class="page-content">
        @include('layouts.header')
        @yield('content')
    </div>
</div>
@include('layouts.modal_show')
@include('layouts.modal_form')
@include('layouts.scripts')
</body>
</html>
