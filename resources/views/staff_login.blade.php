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
    <div class="login-wrapp cover no-repeat login-form-wrap" style="background-image: url('img/login-bg.jpg');">
        <div>
            <div class="fw-bold mb-4">To continue, log in to</div>
            <div class="login-logo-block mb-5">
                <img src="img/logo.png" alt="">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">

                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach

                </div>
            @endif
            @if(session()->has('fail'))
            <div class="alert alert-danger">
            {{session()->get('fail')}}
            </div>
            @endif
            <form method="post" action="{{route('staff_login')}}">
                @csrf
                <div class="contact-form-block">
                    <div class="position-relative">

                  

                        <input type="text" autocomplete="off" placeholder="Enter Staff Id" class="@error('staff_id') is-invalid @enderror" value="{{old('staff_id')}}" name="staff_id" id="staff_id">
                    </div>
                </div>
                <div class="contact-form-block mb-0">
                    <div class="position-relative">
                        <input type="password" autocomplete="off" placeholder="Enter Password" name="staff_pass" id="staff_pass">
                    </div>
                </div>
                <div class="form-checkbox my--5">
                    <input type="checkbox" id="html">
                    <label for="html">I agree to Welleazy’s <a href="#" class="bt">Terms of Service</a> and <a href="#" class="bt">Privacy Policy</a></label>
                  </div>
                  <div class="login-buttons-block">
                <button class="btn-v rounded red w-100 sm" id="staff_button">Login</button>
            </div>
            </form>

        </div>
    </div>


    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="admin/assets/js/staff.js"></script>
</body>

</html>
