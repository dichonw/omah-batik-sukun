<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Omah Batik Sukun</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/') }}assets/img/logo.jpg">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
            <div class="card" style="background-color: #f0f2f0; border-radius: 10px; padding: 5px 20px 35px 20px;">
                <h2 class="text-center"><b>Admin</b><br>Omah Batik Sukun</h3>
                <hr>
                @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
                @endif
                <form method="POST" action="{{ route('action_login') }}">
                @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>