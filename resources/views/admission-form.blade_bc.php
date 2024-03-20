<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSW</title>
    <script src="https://kit.fontawesome.com/ea16b2b73c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../fonts/lato/stylesheet.css">
    <link href="../css/plugin.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        /* --- overlay spinner --- */

/* Absolute Center Spinner */
.overlay-spinner {
    position: fixed;
    z-index: 999;
    height: 2em;
    width: 2em;
    overflow: show;
    margin: auto;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
}

/* Transparent Overlay */
.overlay-spinner:before {
    content: '';
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.overlay-spinner:not(:required) {
    /* hide "loading..." text */
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;
}

.overlay-spinner:not(:required):after {
    content: '';
    display: block;
    font-size: 10px;
    width: 1em;
    height: 1em;
    margin-top: -0.5em;
    -webkit-animation: spinner 1500ms infinite linear;
    -moz-animation: spinner 1500ms infinite linear;
    -ms-animation: spinner 1500ms infinite linear;
    -o-animation: spinner 1500ms infinite linear;
    animation: spinner 1500ms infinite linear;
    border-radius: 0.5em;
    -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
    box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@-moz-keyframes spinner {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@-o-keyframes spinner {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@keyframes spinner {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
    </style>

</head>

<body>
    <div class="two-block-form-wrapp d-flex flex-wrap">
        <div class="cover no-repeat text-white tbf-cnt-block" style="background-image: url('../img/form-cnt-bg.jpg');">
            <div class="tbf-logo-block w-100">
                <img src="../img/logo.png" alt="">
            </div>
            <div class="w-100">
                <div class="tbf-title fw-bold mb-2">
                    How to Apply
                </div>
                <div class="tbf-sub-title">
                    In Four Steps
                </div>
            </div>
            <div class="tbf-steps">
                <ul>
                    <li>
                        <div>Fill the</div>
                        <div class="fw-bold">Application Form</div>
                    </li>
                    <li>
                        <div>Confirm Programme/Specialisation, generate your</div>
                        <div class="fw-bold">System ID and proceed to payment</div>
                    </li>
                    <li>
                        <div>Get your Application Number on your registered Email ID <br> and Mobile Number</div>
                    </li>
                    <li>
                        <div>Get your Application Number on your registered Email ID <br> and Mobile Number</div>
                    </li>
                </ul>
            </div>
            <div class="tbf-footer-block w-100">
                <div class="tbf-footer-title">Get more information contact us at</div>
                <div class="d-flex">
                    <a href="tel:18003090309" class="text-white me-5">
                        <img src="../img/tbf-1.png" alt="" class="me-3">
                        <span>18003090309</span>
                    </a>
                    <a href="mailto:contact@nursingcollege.com" class="text-white">
                        <img src="../img/tbf-2.png" alt="" class="me-3">
                        <span>contact@nursingcollege.com</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="tbf-form-wrap d-flex align-items-center justify-content-center">
            <div>

                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="login-buttons-block d-flex mb--7">
                            <a href="javascript:void(0);" class="btn-v rounded blue w-100 register-btn-block">Register
                            </a>
                            <a href="javascript:void(0);" class="btn-v rounded red w-100 login-btn-block">Login
                            </a>
                        </div>
                    </div>
                </div>
                <div class="overlay-spinner d-none"></div>
                <div class="register-form-block">
                    <form method="post">
                        @csrf
                        <div class="row">
                            <div class="contact-form-block col-md-6">
                                <div class="position-relative">
                                    <input type="text" placeholder="Enter First Name" name="first_name" id="first_name">
                                    <span id="first_name_error" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="contact-form-block col-md-6">
                                <div class="position-relative">
                                    <input type="text" placeholder="Enter Last Name" name="last_name" id="last_name">
                                    <span id="last_name_error" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="contact-form-block col-md-6">
                                <div class="position-relative">
                                    <input type="text" placeholder="Enter Email Id" name="email" id="email">
                                    <span id="email_error" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="contact-form-block col-md-6">
                                <div class="position-relative mobile-number-block">
                                    <input type="text" placeholder="Mobile No." name="mobile" id="mobile" onkeyup="validateMobile()">
                                    <span class="input-icon-block">+91</span>
                                    <span id="mobile_error" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="contact-form-block col-md-6">
                                <div class="position-relative">
                                    <select class="select" name="qualification" id="qualification">
                                        <option value="">Select Qualification</option>
                                        <option value="12th">12th</option>
                                        <option value="10th">10th</option>
                                        <option value="Diploma or Cirtificate">Diploma or Cirtificate</option>
                                        <option value="ITI">ITI</option>
                                        <option value="Graduation">Graduation</option>
                                        <option value="Post Graduation">Post Graduation</option>
                                    </select>
                                    <span id="qualification_error" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="contact-form-block col-md-6">
                                <div class="position-relative">
                                    <select class="select" name="course" id="course">
                                        <option value="">Select Course</option>
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                                        @endforeach
                                    </select>
                                    <span id="course_error" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="contact-form-block col-md-6">
                                <div class="position-relative">
                                    <select class="select" name="stateId" id="stateId">
                                        <option value="">Select State</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}" data-id="{{$state->id}}">{{$state->state_title}}</option>
                                        @endforeach
                                    </select>
                                    <span id="stateId_error" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="contact-form-block col-md-6">
                                <div class="position-relative">
                                    <select class="select" name="cityId" id="cityId">
                                        <option>Select City</option>
                                    </select>
                                    <span id="cityId_error" style="color: red;"></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-checkbox mt-4 mb-5">
                            <input type="checkbox" id="admission_register_checkbox" id="admission_register_checkbox">

                            <label for="admission_register_checkbox">I agree to JSW <a href="#" class="bt">Terms of
                                    Service</a> and <a href="#" class="bt">Privacy Policy</a></label>
                        </div>
                        <span id="admission_register_checkbox_error" style="color: red;"></span>
                        <div class="login-buttons-block text-end">
                            <!-- <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#register_message" class="btn-v red sm rounded">Rigster</a> -->
                            <a href="javascript:void(0)" class="btn-v red sm rounded" id="register">Register</a>
                        </div>
                    </form>
                </div>
                <span id="incorrect_error" style="color: red"></span>
                <div class="login-form-block d-none">
                    <form method="post">
                        @csrf

                        <div class="row">
                            <div class="contact-form-block col-md-12">
                                <div class="position-relative">
                                    <input type="text" placeholder="Enter Email Address" name="admission_email" id="admission_email">
                                    <span id="email_login_error" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="contact-form-block col-md-12">
                                <div class="position-relative">
                                    <input type="password" placeholder="Enter Password" name="password" id="password">
                                    <span id="password_error" style="color: red;"></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-checkbox mt-4 mb-5">
                            <input type="checkbox" id="admission_login_checkbox">
                            <label for="admission_login_checkbox">I agree to JSW <a href="#" class="bt">Terms of
                                    Service</a> and <a href="#" class="bt">Privacy Policy</a></label>
                        </div>
                        <span id="admission_login_checkbox_error" style="color: red;"></span>
                        <div class="login-buttons-block text-end">
                            <a href="javascript:void(0)" class="btn-v red sm rounded" id="admission_login">Login </a>
                            <!-- <button class="btn-v red sm rounded" id="admission_login">Login</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="register_message" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="fw-semibold">Thank you for submitting the application your login credentials will be sent to your mail id</p>
                    <div class="modal-btn-block mt-5">
                        <a href="javascript:void(0);" class="btn-v red xsm rounded login-btn-block" data-bs-dismiss="modal">Ok
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/plugin.js"></script>
    <script src="../js/main.js"></script>
    <script src="admin/assets/js/common.js"></script>
    <script src="admin/assets/js/admission-form.js"></script>
</body>

</html>
