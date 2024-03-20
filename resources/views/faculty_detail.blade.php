@include('header')
<section class="main-wrap sub-page-wrap">
            <!-- <div class="hedaer-serch-wrap mobile-lg-only">
                <div class="hs-icon-block">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="hs-input-block align-items-center">
                    <input type="text" placeholder="Search For Doctors, Treatment or Faculty">
                    <a href="#" class="btn-v">Search
                        <img src="img/right-white-arrow.png" alt="">
                    </a>
                </div>
            </div> -->
            <section class="sub-page-banner cover no-repeat" style="background-image: url('/img/services-banner.png');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="bt">Faculties
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> <span class="">></span> </span> <span
                                        class="rt">Faculties</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-bottom-lg gap-top-lg">
                <div class="container">
                    <div class="row gx-5">
                        <div class="col-md-3 os-detail-side-block">
                            @if($faculty->faculty_image)
                                <img src="{{ asset('upload/faculty/' .$faculty->faculty_image) }}" alt="image" class="mb--3">
                            @else
                                <img src="{{ asset('img/no-image.jpg') }}" alt="image" class="mb--3">
                            @endif
                            <div class="mb--3">
                                <div class="fw-bold bt mb--2">Subjects Expertise</div>
                                <div class="gt">{{$faculty['sub_expert']}}</div>
                            </div>
                            <div class="mb--3">
                                <div class="fw-bold bt mb--2">Research Interests</div>
                                <div class="gt">{{$faculty['research_interest']}}</div>
                            </div>
                            <div class="mb--3">
                                <div class="fw-bold bt mb--2">Rewards / Achievement</div>
                                <div class="gt">{{$faculty['rewards']}}</div>
                            </div>
                        </div>
                        <div class="col-md-9 pl-5--lg os-detail-info-block">
                            <div>
                                <h3 class="bt">{{ ucwords($faculty['faculty_name']) }}</h3>
                                <div class="doctor-info-wrap mb--3">
                                    <div class="d-flex align-items-center mb--2">
                                        <div class="text-24 fw-semibold bt">Designation:</div>
                                        <div class="gt text-24">{{ ucwords($faculty['designation']) }}</div>
                                    </div>
                                    <div class="d-flex align-items-center mb--2">
                                        <div class="text-24 fw-semibold bt">Academic Experience:</div>
                                        <div class="gt text-24">{{$faculty['experience'] ?? '--' }} Years</div>
                                    </div>
                                    <div class="d-flex align-items-center mb--2">
                                        <div class="text-24 fw-semibold bt">Phone:</div>
                                        <div class="gt text-24">{{$faculty['faculty_phone']}}</div>
                                    </div>
                                    <div class="d-flex align-items-center mb--2">
                                        <div class="text-24 fw-semibold bt">Email:</div>
                                        <div class="gt text-24">{{$faculty['faculty_email']}}</div>
                                    </div>
                                    <div class="d-flex align-items-center mb--2">
                                        <div class="text-24 fw-semibold bt">Address:</div>
                                        <div class="gt text-24">{{$faculty['faculty_address']}}</div>
                                    </div>
                                </div>
                                <h3 class="bt">Biography</h3>
                                <?php echo trim($faculty['faculty_contents']); ?>

                                <h3 class="bt mt--3">Recent Publications</h3>
                                <?php echo trim($faculty['recent_publication']); ?>
                                <h3 class="bt">Research interests</h3>
                                <p>{{$faculty['research_interest']}}</p>
                                <h3 class="bt mt--3">Conferences, Seminars & Workshops</h3>
                                <?php echo trim($faculty['conference']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
@include('footer')
