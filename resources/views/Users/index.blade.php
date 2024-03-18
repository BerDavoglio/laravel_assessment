<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <div>
        @if(count($errors) > 0)
            <ul>
                @foreach ($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{route('user.login')}}">
        @csrf
        @method('post')
        <div>
            <label>E-mail</label>
            <input type="text" name="email" placeholder="E-mail">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
    <a href="{{route('user.registerview')}}">Register</a>
</body>
</html>
