<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>JSW</title>
    <script src="https://kit.fontawesome.com/ea16b2b73c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fonts/lato/stylesheet.css">
    <link href="css/plugin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <div class="two-block-form-wrapp d-flex flex-wrap">
        <div class="cover no-repeat text-white tbf-cnt-block" style="background-image: url('img/form-cnt-bg.jpg');">
            <div class="tbf-logo-block w-100">
                <img src="img/logo.png" alt="">
            </div>
            <div class="w-100">
                <div class="tbf-title fw-bold mb-2">
                    Enquiry Now
                </div>
                <div class="tbf-sub-title">
                    In Three Steps
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
                        <div>Get your Application Number on your registered Email ID</div>
                        <div class="fw-bold">and Mobile Number</div>
                    </li>
                </ul>
            </div>
            <div class="tbf-footer-block w-100">
                <div class="tbf-footer-title">Get more information contact us at</div>
                <div class="d-flex">
                    <a href="tel:18003090309" class="text-white me-5">
                        <img src="img/tbf-1.png" alt="" class="me-3">
                        <span>18003090309</span>
                    </a>
                    <a href="mailto:contact@nursingcollege.com" class="text-white">
                        <img src="img/tbf-2.png" alt="" class="me-3">
                        <span>contact@nursingcollege.com</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="tbf-form-wrap d-flex align-items-center justify-content-center">
            <div>
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 contact-form-block">
                            <div class="position-relative">
                                <input type="text" placeholder="First Name" name="first_name" id="first_name">
                                <img src="img/user.png" alt="">
                                <span id="first_name_error" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-md-6 contact-form-block">
                            <div class="position-relative">
                                <input type="text" placeholder="Last Name" name="last_name" id="last_name">
                                <img src="img/user.png" alt="">
                                <span id="last_name_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6 contact-form-block">
                            <div class="position-relative email-field">
                                <input type="text" placeholder="Email" name="email" id="email">
                                <img src="img/mail.png" alt="">
                                <span id="email_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6 contact-form-block">
                            <div class="position-relative">
                                <input type="text" placeholder="Mobile" name="mobile" id="mobile">
                                <img src="img/mobile.png" alt="">
                                <span id="mobile_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6 contact-form-block">
                            <div class="position-relative">
                                <select class="select" name="state" id="state">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}" data-id="{{$state->id}}">{{$state->state_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 contact-form-block">
                            <div class="position-relative">
                                <select class="select" name="city" id="city">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 contact-form-block mb-0">
                            <div class="position-relative">
                                <select class="select" name="course" id="course">
                                    <option value="" data-select2-id="3">Select Course</option>
                                    <option value="1">M.Sc Nursing</option>
                                    <option value="2">B.Sc.Nursing</option>
                                    <option value="3">P.hd</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 contact-form-block mb-0">
                            <div class="position-relative">
                                <select class="select" name="specialization" id="specialization">
                                    <option value="">Select Specialization</option>
                                    <option value="1">Mathematics</option>
                                    <option value="2">Computer Science</option>
                                    <option value="3">Chemistry</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-checkbox my--5">
                        <input type="checkbox" id="html">
                        <label for="html">I agree to Welleazy’s <a href="#" class="bt">Terms of Service</a> and <a href="#" class="bt">Privacy Policy</a></label>
                      </div>
                      <div class="login-buttons-block">
                        <button type="submit" id="enquired_now" class="btn-v rounded red w-100 sm">ENQUIRE NOW</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="/js/outergallery.js"></script>
</body>

</html>
