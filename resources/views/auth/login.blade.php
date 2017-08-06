<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/login_form.css')}}">

</head>
<body>
<div class="login">
    <div class="login-screen">
        <div class="app-title">
            <h1>Вход</h1>
        </div>
        <form role="form" method="POST" action="{{ url('login/auth') }}">
            {{ csrf_field() }}
            <div class="login-form">
                <div class="control-group">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                    <input type="text" class="login-field" name="name" placeholder="Имя" id="login-name" required>
                </div>

                <div class="control-group">
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                    <input type="password" class="login-field" name="password" placeholder="Пароль" id="login-pass"
                           required>
                </div>

                <input type="submit" class="btn btn-primary btn-large btn-block" value="Войти">
                <p>{{ $errors->first() }}</p>
            </div>
        </form>

    </div>
</div>
</body>
</html>


