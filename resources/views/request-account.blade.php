<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/singup.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>PHARMEEX SIGN UP FORM</title>
    <style>
        form i {
            right: 18px;
            top: 34px;
            font-size: 20px;
        }
    </style>
</head>
<body>
<section id="sign-up">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 form-area mx-auto">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 mx-auto">
                    <div class="form-images">
                        <img src="{{asset('frontend/images/PHARMEEX(1).png')}}">

                    </div>
                </div>
                <form class="row g-3" action="{{route('requestUser')}}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label lebel">Name *</label>
                        <input type="text" class="form-control imput" name="name" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label lebel">Organization name *</label>
                        <input type="text" class="form-control imput" name="organization" id="inputPassword4">
                    </div>

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label lebel">Email *</label>
                        <input type="text" class="form-control imput" name="email" id="email">

                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label lebel">Phone Number *</label>
                        <input type="text" class="form-control imput" id="number" name="phone">
                        <label id="btext" style="color: red;visibility: hidden">Invalid Email</label><br><br>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="inputEmail4" class="form-label lebel">Password *</label>
                        <input type="password" class="form-control imput" name="password" id="exampleInputPassword1">
                        <i class="bi bi-eye-slash position-absolute" id="togglePassword"></i>
                    </div>

                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label lebel">Address</label>
                        <input type="text" class="form-control imput" id="inputAddress" name="address">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label lebel">Upazila *</label>
                        <input type="text" class="form-control imput" id="inputAddress2" name="upzila">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label lebel">District *</label>
                        <input type="text" class="form-control imput" id="inputCity" name="district">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label lebel">Postal Code *</label>
                        <input type="text" class="form-control imput" id="inputZip" name="zipcode">
                        <label id="Ztext" style="color: red;visibility: hidden">Invalid Email</label><br><br>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Plan</label>
                        <select class="form-select" id="" name="plans">
                            <!--<option selected disabled value="">Choose...</option>-->
                            <option selected value="7">7 days Free trial</option>
                        <!--@foreach($data as $data)-->
                        <!--    <option value="{{$data->id}}">{{$data->plan_name}}</option>-->
                            <!--@endforeach-->
                        </select>
                    </div>
                  <div class="col-md-6">
                      <label for="inputZip" class="form-label lebel">Reference code</label>
                      <input type="text" name="refarence_code" class="form-control imput" id="inputZip" placeholder="32154545644">
                    </div>
                    <button class="btn" type="submit" style="background-color: #3600D9;color: #ffffff">Sign Up</button>
                </form>
                <div class="col-md-6 form-btn mx-auto">
                    <p class="text-right">Already have an account? <a class="sign-link" href="{{route('login')}}">Sign In here!</a> </p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/aos.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
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
