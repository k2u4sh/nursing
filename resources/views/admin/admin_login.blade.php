@include('admin.adminheader')
<body>
    <div class="login-wrapp cover no-repeat login-form-wrap" style="background-image: url('img/login-bg.jpg');">
        <div>
            <div class="fw-bold mb-4">To continue, log in to</div>
            <div class="login-logo-block mb-5">
                <img src="img/logo.png" alt="">
            </div>
            @if(session()->has('fail'))
            <div class="alert alert-danger">
            {{session()->get('fail')}}
            </div>
            @endif
            <form method="post">
                @csrf
                <div class="contact-form-block">
                    <div class="position-relative">
                        <input type="text" placeholder="Enter Email Id" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        <span id="email_error" class="red-text error-block"></span>
                    </div>
                </div>
                <div class="contact-form-block mb-0">
                    <div class="position-relative">
                        <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        <span class="red-text error-block" id="password_error"></span>
                    </div>
                </div>
                <div class="form-checkbox my--5 chck-sqr-wrap">
                    <input type="checkbox" id="html" name="html">
                    <label for="html">
                        <span class="check-cnt-wrap">
                            <span class="chk-squr-block">
                                <span></span>
                            </span>
                            <span>
                                I agree to Welleazy’s <a href="{{route('terms_condition')}}" target="_blank" class="bt">Terms of Service</a> and <a href="{{route('privacy_policy')}}" target="_blank" class="bt">Privacy Policy</a>
                            </span>
                        </span>
                    </label>
                    <span id="html_error" class="red-text error-block"></span>
                  </div>
            <div class="login-buttons-block">
                <button type="submit" class="btn-v rounded red w-100 sm" id="admin_login">Login</button>
            </div>
            </form>
        </div>
    </div>
@include('admin.adminfooter')


