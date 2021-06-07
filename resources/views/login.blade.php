<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Angkuts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-box">
		<class="avatar"></class>
		<h1>Login</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

		<form action="{{route('postlogin')}}" method="POST">
            {{ csrf_field() }}
			<input style="color:black"type="text" name="name" placeholder="Enter Username" value="{{ old('nama') }}">
			<input style="color:black" type="password" name="password" placeholder="Enter Password" value="{{ old('nama') }}">
			<input type="submit" name="submit" value="Masuk">
		</form>

	</div>
</body>
</html>
