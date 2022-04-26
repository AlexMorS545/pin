<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>Login</title>
</head>
<body>
<div id="login-page">
    <form action="{{ route('login') }}" method="POST">
        @method('POST')
        @csrf
        @include('layouts.form_fields.input', ['id' => 'email', 'label' => 'Введите email','name' => 'email', 'value' => ''])
        @include('layouts.form_fields.password', ['id' => 'password', 'label' => 'Введите пароль','name' => 'password', 'value' => ''])
        @include('layouts.form_fields.submit', ['label' => 'Войти'])
    </form>
</div>
</body>
</html>
