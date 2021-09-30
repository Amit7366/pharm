<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.maateen.me/charukola-ultra-light/font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Pharmeex- Login</title>
    <style>
        form i {
            right: 5px;
            top: 32px;
            font-size: 20px;
        }
    </style>
</head>
<body class="position-relative h-100">
<div class="container position-relative h-100">
    <div class="row position-relative h-100 d-flex" style="place-items: center">
        <div class="col-md-4 mx-auto login-widget-content">
            <div class="login-logo">
                <img src="{{asset('assets/img/logo.png')}}">
            </div>
            <div class="login-widget">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password"  class="form-control" id="exampleInputPassword1">
                        <i class="bi bi-eye-slash position-absolute" id="togglePassword"></i>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{route('requestAccount')}}">Request an Account</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#exampleInputPassword1');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye slash icon
        this.classList.toggle('bi-eye');
    });
</script>

</body>
</html>
