<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSW</title>
    <script src="https://kit.fontawesome.com/ea16b2b73c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fonts/lato/stylesheet.css">
    <link href="css/plugin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <div class="login-wrapp cover no-repeat" style="background-image: url('img/login-bg.jpg');">
        <div>
            <div class="login-logo-block">
                <img src="img/logo.png" alt="">
            </div>
            <div class="login-buttons-block">
                <a href="{{route('student_login')}}" class="btn-v rounded blue">Student Login
                    <img src="img/blue-arrow-lg.png" alt="" class="btn-img-block">
                </a>
                <a href="{{route('staff_login')}}" class="btn-v rounded">Staff Login
                    <img src="img/red-arrow-lg.png" alt="" class="btn-img-block">
                </a>
            </div>
        </div>
    </div>


    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
