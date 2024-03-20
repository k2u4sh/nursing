@include('header')
<section class="main-wrap sub-page-wrap">
            <div class="hedaer-serch-wrap mobile-lg-only">
                <div class="hs-icon-block">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="hs-input-block align-items-center">
                    <input type="text" placeholder="Search For Doctors, Treatment or Faculty">
                    <a href="#" class="btn-v">Search
                        <img src="img/right-white-arrow.png" alt="">
                    </a>
                </div>
            </div>
            <section class="sub-page-banner cover no-repeat" style="background-image: url('img/conatct-us-banner.png');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="bt">Contact Us
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span>Home</span> <span class="mx-3">></span> </span> <span
                                        class="rt">Contact Us</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-top-lg gap-bottom-lg">
                <h2 class="text-center bt">Contact Information</h2>
                <div class="container gap-top-md">
                    <div class="row gap-bottom-sm">
                        <div class="md-title col-md-6">Or Fill The Simple Form Below And we will get in touch with you as
                            soon as possible.</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 cp-form">
                            <div>
                                <form method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="First Name" name="first_name" id="first_name">
                                                <img src="img/user.png" alt="">
                                                <span id="first_name_error" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Last Name" name="last_name" id="last_name">
                                                <img src="img/user.png" alt="">
                                                <span id="last_name_error" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative email-field">
                                                <input type="email" placeholder="Email" name="email" id="email">
                                                <img src="img/mail.png" alt="">
                                                <span id="email_error" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 contact-form-block">
                                            <div class="position-relative">
                                                <input type="text" placeholder="Mobile" name="mobile" id="mobile">
                                                <img src="img/mobile.png" alt="">
                                                <span id="mobile_error" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 contact-form-block">
                                            <div class="position-relative textarea-field">
                                                <textarea placeholder="Message" name="message" id="message"></textarea>
                                                <img src="img/comment.png" alt="">
                                                <span id="message_error" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button" class="submit-btn w-100" id="send_message">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 pl-5--lg cp-img-block">
                            <img src="img/contact-page.png" alt="" class="w-100">
                        </div>
                    </div>
                </div>
            </section>
        </section>
@include('footer')
