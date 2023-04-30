<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="{{ url('js/bootstrap.bundle.min.js') }}" defer></script>
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <title>LOGIN</title>
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Email Info</h1>

            <form class="needs-validation" action="{{ url('login') }}" method="post">
                @csrf
                <div class="form-group was-validated">
                    <label class="form-label" for="email">Email address</label>
                    <input class="form-control" type="email" name="email" id="email" required>
                    <div class="invalid-feedback">
                        Please enter your email address
                    </div>
                </div>

                <div class="form-group was-validated">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                    <div class="invalid-feedback">
                        Please enter your password
                    </div>
                </div>

                <input class="btn btn-success w-100" type="submit" value="SIGN IN">
            </form>
        </div>
    </body>
</html>