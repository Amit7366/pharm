<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Thank You - Pharmeex</title>
    <style>
        #main {
            width: 100%;
            height: 100vh;
            display: grid;
            place-items: center;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFFFFE;
        }
        .btn_suc {
            display: inline-block;
            color: #ffffff;
            padding: 8px 33px;
            background: #37B34A;
            box-shadow: 0px 46px 52px rgba(55, 179, 74, 0.7);
            border-radius: 57px;
        }
        .btn_suc i{
            font-size: 45px;
        }
        h2 {
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 119.5%;
            letter-spacing: -0.015em;
            color: #292525;
        }
        img{
            height: 280px;
        }
        .b2h,.b2h:hover {
            display: inline-block;
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3em;
            color: #FFFFFF;
            background: #4318FF;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.25);
            border-radius: 25px;
            text-decoration: none;
            padding: 15px 29px;
            margin-top: 5px;
        }
    .mdoc{
        left: 0;
        top: 0;
    }
        .fdoc{
            right: 0;
            top: 0;
        }
        @media(max-width: 991px) {
            h2,.btn_suc{
                z-index: 99;
            }

        }
        @media(max-width: 536px) {
           img{
               display: none;
           }

        }


    </style>
</head>
<body>
<audio src=""></audio>
<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto text-center">
                <div class="row" style="height: 280px;">


                    <div class="col-12 text-center h-100 position-relative" style="display: grid;place-items: center">
                        <img src="{{asset('frontend/images/fdoc.png')}}" alt="" class="fdoc position-absolute">
                        <img src="{{asset('frontend/images/mdoc.png')}}" alt="" class="mdoc position-absolute">
                        <a href="" class="btn_suc text-center align-middle"> <i class="fas fa-check"></i>    </a>
                        <h2>Thanks for registering!</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p>Your request is successfully received. Your account will be activate soon.</p>
                        <p> If you need an early access please message to our <a href="https://www.facebook.com/pharmeex">facebook page</a>.</p>
                        <a href="https://app.pharmeex.com/" class="b2h">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        var $audioElement = $("<audio>");
        $audioElement.attr({
            'src': '{{asset('assets/clap.wav')}}',
            'autoplay':'autoplay',
        });
    });
</script>
</body>
</html>
