<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url('add-req')}}" method="post">
    @csrf
    <label for=""> Name:</label><br>
    <input type="text" name="u_name"> <br>
    <label for=""> Email:</label><br>
    <input type="text" name="u_email"> <br>
    <label for=""> Phone:</label><br>
    <input type="text" name="u_phone"> <br>
    <label for=""> Organization:</label><br>
    <input type="text" name="u_organization"> <br>
    <label for=""> Address:</label><br>
    <input type="text" name="u_address"> <br>
    <label for=""> Thana:</label><br>
    <input type="text" name="u_thana"> <br>
    <label for=""> District:</label><br>
    <input type="text" name="u_zila"> <br>
    <label for=""> Zip:</label><br>
    <input type="text" name="u_zip"> <br>
    <label for=""> Plan:</label><br>
    <input type="text" name="u_plan" value="{{$plan}}" readonly> <br>
    <input type="submit" value="Submit"> <br>
</form>

</body>
</html>
