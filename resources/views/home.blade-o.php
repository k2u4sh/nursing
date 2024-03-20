@include('header')
        <section class="main-wrap home-page-wrap">
            <section class="home-banner cover no-repeat position-relative"
                style="background-image: url('img/home-banner-1.jpg');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-top-title" style="font-weight: 500;">ONE OF THE</div>
                                <h1 class="bt"><span class="d-block">Best Institutes </span> of Nursing
                                </h1>
                                <div class="banner-sub-title">Providing best nursing education to students to fulfill
                                    variety of needs in the dynamic education scenario.</div>
                                <a href="{{route('courses')}}" class="btn-v">See All Courses
                                    <img src="img/right-white-arrow.png" alt="" class="arrow-to-hide-on-hover">
                                    <img src="img/red-right-arrow.png" alt="" class="arrow-to-show-on-hover">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-notification-block">
                    <div>
                        <div class="bn-title fw-bold mb-3 w-100">Notifications:</div>
                        <ul>
                            <li>Sampe text: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.. </li>
                               <li> Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ..</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="gap-top-md home-cuntr-block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="row home-about-counter-wrap justify-content-between">
                                <div class="col-md-2 text-center">
                                    <div class="counter-cnt-wrap">
                                        <div class="counter-title bt"><span class="count">345</span></div>
                                        <div class="counter-sub-title gt">Expert Staff</div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <div class="counter-cnt-wrap">
                                        <div class="counter-title bt">
                                            <No class="span count">1</No>
                                        </div>
                                        <div class="counter-sub-title gt">Nursing College</div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <div class="counter-cnt-wrap">
                                        <div class="counter-title bt"><span class="count">4697</span></div>
                                        <div class="counter-sub-title gt">Modern Facilities</div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <div class="counter-cnt-wrap">
                                        <div class="counter-title bt"><span class="count">345</span></div>
                                        <div class="counter-sub-title gt">Expert Staff</div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <div class="counter-cnt-wrap">
                                        <div class="counter-title bt"><span class="count">345</span></div>
                                        <div class="counter-sub-title gt">Expert Staff</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="home-about-wrap gap-bottom-lg gap-top-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row gx-5">
                                <div class="col-md-5 abt-intro-cnt-wrap">
                                    <div>
                                        <div class="page-title">{{Str::upper($aboutData[0]->title)}}</div>
                                        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            temporua</h2>
                                        <img src="/upload/aboutus/{{$aboutData[0]->side_image}}" alt="" class="mobile-only my-5">
                                        {!!Str::of($aboutData[0]->contents)->limit(400)!!}
                                        <div><a href="{{route('about_us')}}" class="btn-v transparent sm">Learn More</a></div>
                                    </div>
                                </div>
                                <div class="col-md-5 abt-intro-img-block ms-auto desktop-only">
                                    <img src="/upload/aboutus/{{$aboutData[0]->side_image}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-bottom-lg pt-5">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between gap-bottom-sm">
                        <div class="page-title mb-0">POPULAR COURSES</div>
                        <a href="{{route('courses')}}" class="btn-v btnCms">View All Courses
                            <img src="img/right-white-arrow.png" alt="" class="arrow-to-hide-on-hover">
                            <img src="img/red-right-arrow.png" alt="" class="arrow-to-show-on-hover">
                        </a>
                    </div>
                    <div class="row card-block-wrap gx-5">
                        @foreach($courseData as $course)
                        <div class="col-lg-3 col-md-3 col-sm-4 card-block rounded">
                            <div>
                                <div class="card-img-block imgHeight_160">
                                    <img src="/upload/course/{{$course->course_image}}" alt="">
                                </div>
                                <div class="card-cnt-block">
                                    <h4 class="bt"><a href="{{route('course_detail')}}/{{$course->id}}" class="bt">{{$course->course_name}}</a></h4>
                                    <div class="gt text-20 line-3">
                                        {!!strip_tags($course->course_desc)!!}
                                    </div>
                                    <div class="card-cd-block d-flex justify-content-between mt-5">
                                        <div class="text-center">
                                            <div class="card-cd-title fw-bold">{{$course->duration}}</div>
                                            <div class="card-cd-sub-title">Years</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="card-cd-title fw-bold">{{$course->course_intake}}</div>
                                            <div class="card-cd-sub-title">Seats</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="card-cd-title fw-bold">Fee</div>
                                            <div class="card-cd-sub-title">Rs. {{$course->course_fee}}</div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-5">
                                        <a href="{{route('enquire_now')}}" class="btn-v transparent sm w-100">Enquire Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="gap-bottom-lg don-wrap">
                <div class="container">
                    <h2 class="bt text-center">Department of Nursing</h2>
                    <div class="row gap-top-lg">
                        <div class="col-md-9 mx-auto">

                            <div class="row justify-content-center gx-5">
                            @foreach($allDepartment as $department)
                                <div class="col-md-4 small-card-block text-center mb-5">
                                    <div>
                                        <h3>{{$department->dept_name}}</span></h3>
                                        <a href="{{route('department')}}/{{$department->id}}" class="simple-btn">Learn More <img src="img/red-right-arrow.png"
                                                alt=""></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="text-center gap-top-md">
                                <a href="{{route('department_list')}}" class="btn-v">View All Departments
                                    <img src="img/right-white-arrow.png" alt="" class="arrow-to-hide-on-hover">
                                    <img src="img/red-right-arrow.png" alt="" class="arrow-to-show-on-hover">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-bottom-lg">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-8 mx-auto">
                            <h2 class="bt">Faculties</h2>
                            <div class="section-sub-title">
                                We are a team that is committed to the higest standards of patients care by providing quality healhcar services, advanced technology and facilities, ensuring the best care for today’s patients and future generation.
                            </div>
                        </div>
                    </div>
                    <div class="row carsl-wrapp gap-top-md cs">
                        <div class="col-md-12 ms-auto">
                            <div class="home-course-carousel owl-carousel dark">
                                @foreach($allFaculties as $faculty)
                                <div class="carsl-item">
                                    <div class="carsl-img-block">
                                        <img src="/upload/faculty/{{$faculty->faculty_image}}" alt="">
                                    </div>
                                    <div class="carsl-item-cnt-block">
                                        <h4 class="bt"> <a href="{{route('faculty_detail')}}/{{$faculty->id}}" class="bt"> {{$faculty->faculty_name}} </a> </h4>
                                        <div class="team-designation">{{$faculty->designation}}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-bottom-lg testimonial-wrap">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-8 mx-auto">
                            <h2 class="bt">Our Student Testimonials</h2>
                        </div>
                    </div>
                    <div class="row opt-block-wrap gap-top-md">
                        <div class="col-md-12 mx-auto">
                            <div class="grid">
                                <div class="grid-item opt-blocks lg-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                                </div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">NOW I CAN WALK, EAT & SPEAK</h4>
                                                <div class="star-block">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum.
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/opt-thumb-img-1.png" alt="">
                                                    </div>
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">Purnima Chaurvedi</div>
                                                        <div>Patient</div>
                                                    </div>
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item opt-blocks sm-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                                </div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">EXCELLENT CHOICE</h4>
                                                <div class="star-block">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/opt-thumb-img-1.png" alt="">
                                                    </div>
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">Purnima Chaurvedi</div>
                                                        <div>Patient</div>
                                                    </div>
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item opt-blocks sm-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                                </div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">EXCELLENT CHOICE</h4>
                                                <div class="star-block">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/opt-thumb-img-1.png" alt="">
                                                    </div>
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">Purnima Chaurvedi</div>
                                                        <div>Patient</div>
                                                    </div>
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid-item opt-blocks sm-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                                </div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">EXCELLENT CHOICE</h4>
                                                <div class="star-block">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/opt-thumb-img-1.png" alt="">
                                                    </div>
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">Purnima Chaurvedi</div>
                                                        <div>Patient</div>
                                                    </div>
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item opt-blocks lg-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                                </div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">NOW I CAN WALK, EAT & SPEAK</h4>
                                                <div class="star-block">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                                    culpa qui officia deserunt mollit anim id est laborum.
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/opt-thumb-img-1.png" alt="">
                                                    </div>
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">Purnima Chaurvedi</div>
                                                        <div>Patient</div>
                                                    </div>
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item opt-blocks sm-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                                </div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">EXCELLENT CHOICE</h4>
                                                <div class="star-block">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/opt-thumb-img-1.png" alt="">
                                                    </div>
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">Purnima Chaurvedi</div>
                                                        <div>Patient</div>
                                                    </div>
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item opt-blocks sm-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                                </div>
                                                <div class="opt-bt-image-block">
                                                    <img src="img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">EXCELLENT CHOICE</h4>
                                                <div class="star-block">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur
                                                </p>
                                                <div class="opt-intro-block d-flex ">
                                                    <div class="opt-intro-image-block">
                                                        <img src="img/opt-thumb-img-1.png" alt="">
                                                    </div>
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">Purnima Chaurvedi</div>
                                                        <div>Patient</div>
                                                    </div>
                                                </div>
                                                <div class="top-comma-block">
                                                    <img src="img/top-comma.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-bottom-lg">
                <div class="container">
                    <h2 class="bt text-center mb-0">News &amp; Events</h2>
                    <div class="tab-scrollable-view-2 position-relative w-80">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="g-1-tab" data-bs-toggle="pill" data-bs-target="#g-1" type="button" role="tab" aria-controls="g-1" aria-selected="true">All Events</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="g-2-tab" data-bs-toggle="pill" data-bs-target="#g-2" type="button" role="tab" aria-controls="g-2" aria-selected="false">Upcoming Events Calendar View</button>
                            </li>
                          </ul>
                          <div class="line" style="left: 0px; width: 426px;"></div>
                    </div>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="g-1" role="tabpanel" aria-labelledby="g-1-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row card-block-wrap gx-5">
                                        <div class="col-lg-4 col-md-4 col-sm-6 card-block rounded no-shadow">
                                            <div>
                                                <div class="card-img-block">
                                                    <img src="img/al-s-15.jpg" alt="">
                                                </div>
                                                <div class="card-cnt-block text-center">
                                                    <div class="fw-bold mb--2 gt">23 March 2023</div>
                                                    <h4 class="bt"><a class="bt">Webinar Series on Health and Happiness by School of Yoga</a></h4>
                                                    <div class="gt text-20">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut..
                                                    </div>
                                                    <div class="text-center mt-5">
                                                        <a href="{{route('event_detail')}}" class="btn-v transparent sm">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 card-block rounded no-shadow">
                                            <div>
                                                <div class="card-img-block">
                                                    <img src="img/al-s-15.jpg" alt="">
                                                </div>
                                                <div class="card-cnt-block text-center">
                                                    <div class="fw-bold mb--2 gt">23 March 2023</div>
                                                    <h4 class="bt"><a class="bt">Webinar Series on Health and Happiness by School of Yoga</a></h4>
                                                    <div class="gt text-20">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut..
                                                    </div>
                                                    <div class="text-center mt-5">
                                                        <a href="{{route('event_detail')}}" class="btn-v transparent sm">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 card-block rounded no-shadow">
                                            <div>
                                                <div class="card-img-block">
                                                    <img src="img/al-s-15.jpg" alt="">
                                                </div>
                                                <div class="card-cnt-block text-center">
                                                    <div class="fw-bold mb--2 gt">23 March 2023</div>
                                                    <h4 class="bt"><a class="bt">Webinar Series on Health and Happiness by School of Yoga</a></h4>
                                                    <div class="gt text-20">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut..
                                                    </div>
                                                    <div class="text-center mt-5">
                                                        <a href="{{route('event_detail')}}" class="btn-v transparent sm">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="g-2" role="tabpanel" aria-labelledby="g-2-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row card-block-wrap gx-5">
                                        <div class="col-lg-4 col-md-4 col-sm-6 card-block rounded no-shadow">
                                            <div>
                                                <div class="card-img-block">
                                                    <img src="img/al-s-15.jpg" alt="">
                                                </div>
                                                <div class="card-cnt-block text-center">
                                                    <div class="fw-bold mb--2 gt">23 March 2023</div>
                                                    <h4 class="bt"><a href="#" class="bt">Webinar Series on Health and Happiness by School of Yoga</a></h4>
                                                    <div class="gt text-20">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut..
                                                    </div>
                                                    <div class="text-center mt-5">
                                                        <a href="{{route('event_detail')}}" class="btn-v transparent sm">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 card-block rounded no-shadow">
                                            <div>
                                                <div class="card-img-block">
                                                    <img src="img/al-s-15.jpg" alt="">
                                                </div>
                                                <div class="card-cnt-block text-center">
                                                    <div class="fw-bold mb--2 gt">23 March 2023</div>
                                                    <h4 class="bt"><a href="#" class="bt">Webinar Series on Health and Happiness by School of Yoga</a></h4>
                                                    <div class="gt text-20">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut..
                                                    </div>
                                                    <div class="text-center mt-5">
                                                        <a href="{{route('event_detail')}}" class="btn-v transparent sm">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 card-block rounded no-shadow">
                                            <div>
                                                <div class="card-img-block">
                                                    <img src="img/al-s-15.jpg" alt="">
                                                </div>
                                                <div class="card-cnt-block text-center">
                                                    <div class="fw-bold mb--2 gt">23 March 2023</div>
                                                    <h4 class="bt"><a href="#" class="bt">Webinar Series on Health and Happiness by School of Yoga</a></h4>
                                                    <div class="gt text-20">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut..
                                                    </div>
                                                    <div class="text-center mt-5">
                                                        <a href="{{route('event_detail')}}" class="btn-v transparent sm">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="text-center gap-top-md">
                        <a href="{{route('events')}}" class="btn-v">View All Events
                            <img src="img/right-white-arrow.png" alt="" class="arrow-to-hide-on-hover">
                            <img src="img/red-right-arrow.png" alt="" class="arrow-to-show-on-hover">
                        </a>
                    </div>
                </div>
            </section>
            <section class="gallery-wrap gap-bottom-lg">
                <div class="container">
                    <h2 class="bt text-center mb-0">Gallery</h2>
                    <div class="tab-scrollable-view-2 position-relative w-100 text-sm">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="g-1-tab" data-bs-toggle="pill" data-bs-target="#g-1" type="button" role="tab" aria-controls="g-1" aria-selected="true">All</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="g-2-tab" data-bs-toggle="pill" data-bs-target="#g-2" type="button" role="tab" aria-controls="g-2" aria-selected="false">Hostel</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="g-3-tab" data-bs-toggle="pill" data-bs-target="#g-3" type="button" role="tab" aria-controls="g-3" aria-selected="false">Activities</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="g-4-tab" data-bs-toggle="pill" data-bs-target="#g-4" type="button" role="tab" aria-controls="g-4" aria-selected="false">College Building</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="g-5-tab" data-bs-toggle="pill" data-bs-target="#g-5" type="button" role="tab" aria-controls="g-5" aria-selected="false">Placement Shell</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="g-6-tab" data-bs-toggle="pill" data-bs-target="#g-6" type="button" role="tab" aria-controls="g-6" aria-selected="false">Extra Activities</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="g-7-tab" data-bs-toggle="pill" data-bs-target="#g-7" type="button" role="tab" aria-controls="g-7" aria-selected="false">Classroom</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="g-8-tab" data-bs-toggle="pill" data-bs-target="#g-8" type="button" role="tab" aria-controls="g-8" aria-selected="false">Other facilities</button>
                              </li>
                          </ul>
                          <div class="line" style="left: 2px; width: 82px;"></div>
                    </div>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="g-1" role="tabpanel" aria-labelledby="g-1-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="img/g-1.png">
                                                <img src="img/g-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-3.png">
                                                                <img src="img/g-3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-4.png">
                                                                <img src="img/g-4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="g-2" role="tabpanel" aria-labelledby="g-2-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="img/g-1.png">
                                                <img src="img/g-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-3.png">
                                                                <img src="img/g-3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-4.png">
                                                                <img src="img/g-4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="g-3" role="tabpanel" aria-labelledby="g-3-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="img/g-1.png">
                                                <img src="img/g-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-3.png">
                                                                <img src="img/g-3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-4.png">
                                                                <img src="img/g-4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="g-4" role="tabpanel" aria-labelledby="g-4-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="img/g-1.png">
                                                <img src="img/g-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-3.png">
                                                                <img src="img/g-3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-4.png">
                                                                <img src="img/g-4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="g-5" role="tabpanel" aria-labelledby="g-5-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="img/g-1.png">
                                                <img src="img/g-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-3.png">
                                                                <img src="img/g-3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-4.png">
                                                                <img src="img/g-4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="g-6" role="tabpanel" aria-labelledby="g-6-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="img/g-1.png">
                                                <img src="img/g-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-3.png">
                                                                <img src="img/g-3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-4.png">
                                                                <img src="img/g-4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="g-7" role="tabpanel" aria-labelledby="g-7-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="img/g-1.png">
                                                <img src="img/g-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-3.png">
                                                                <img src="img/g-3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-4.png">
                                                                <img src="img/g-4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="g-8" role="tabpanel" aria-labelledby="g-8-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="img/g-1.png">
                                                <img src="img/g-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-3.png">
                                                                <img src="img/g-3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/g-4.png">
                                                                <img src="img/g-4.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/g-5.png">
                                                                <img src="img/g-5.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                    <div class="text-center gap-top-md">
                        <a href="{{route('gallery')}}" class="btn-v transparent sm">See All Photos</a>
                    </div>
                </div>
            </section>
        </section>
@include('footer')
