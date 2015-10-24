<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<h1>Login</h1>
{!!Form::open(['url'=>'auth/login'])!!}
{!!Form::text('email',old('email'))!!}
{!!Form::password('password')!!}
<button type="submit">Sign in</button>
{!!Form::close()!!}
</body>
</html>