@include('header')
<section class="main-wrap sub-page-detail-wrap">
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
    <section class="sub-page-banner cover no-repeat" style="background-image: url('/img/departments-1.png');">
        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bt">{{$courseDetailData['course_name']}}
                        </h1>
                        <div class="breadcrumb-wrap">
                            <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> > <span><a href="{{ url('courses-list') }}">Course</a></span> <span class="">></span> </span> <span
                                class="rt">{{$courseDetailData['course_name']}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gap-top-lg gap-bottom-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 detail-sidebar-block">
                    <!-- <div class="mb--3">
                        @foreach($courseData as $course)
                        <a href="#" class="{{$course->id == '1'? 'active':''}}">{{$course->course_name}}</a>
                        @endforeach
                        <a href="#">B.sc Nursing</a>
                        <a href="#">B.sc Nursing</a>
                        <a href="#" class="active">B.sc Nursing</a>
                        <a href="#">B.sc Nursing</a>
                        <a href="#">B.sc Nursing</a>
                    </div> -->
                    <div class="mb--3">
                        <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                            @foreach($courseData as $course)
                            <li class="nav-item" role="presentation">
                                <a href="javascript:void(0);" class="nav-link {{$course->id == last(request()->segments())? 'active':''}}" id="tab-{{$course->id}}"
                                    data-bs-toggle="pill" data-bs-target="#tab_{{$course->id}}" role="tab"
                                    aria-controls="tab_{{$course->id}}" aria-selected="true">{{$course->course_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb--3 dsb-no-border">
                        <div class="fw-bold bt mb--2">Duration:</div>
                        <div class="gt">{{$courseDetailData['duration']}} years</div>
                    </div>
                    <div class="mb--3 dsb-no-border">
                        <div class="fw-bold bt mb--2">Admission Criteria:</div>
                        <div class="gt">{{$courseDetailData['adminssion_criteria']}}</div>
                    </div>
                    <div class="mb--3 dsb-no-border">
                        <div class="fw-bold bt mb--2">Eligibility:</div>
                        <div class="gt">{{$courseDetailData['eligibility']}}</div>
                    </div>

                    <div class="mb--3 dsb-no-border">
                        <!-- <div class="fw-bold bt mb--2">Semester Fee</div> -->
                        <div class="fw-bold bt mb--2">Course Fee: {{ $courseDetailData->course_fee ?? '' }}</div>
                        @if($courseDetailData->course_type == 'annually')
                            @php
                                $per_year_fees = $courseDetailData->course_fee / $courseDetailData->duration;
                            @endphp

                            @for($i=1; $i <= $courseDetailData->duration; $i++)
                                <div class="d-flex align-items-center justify-content-between mb--2">
                                    <div class="gt">{{ $i }} Year : ₹ {{ $per_year_fees ?? '' }} </div>
                                </div>
                            @endfor
                        @endif

                        @if($courseDetailData->course_type == 'semester')

                            @php
                                $per_semester_fees = $courseDetailData->course_fee / ($courseDetailData->duration * 2);
                            @endphp

                            @for($i=1; $i <= $courseDetailData->duration * 2; $i++)
                                <div class="d-flex align-items-center justify-content-between mb--2">
                                    <div class="gt">{{ $i }} Semester : ₹ {{ $per_semester_fees }}</div>
                                </div>
                            @endfor

                        @endif

                        <?php /*

                        <!-- <div class="d-flex align-items-center justify-content-between mb--2">
                            <div class="gt">Semester 1 </div>
                            <div class="gt">₹{{$courseDetailData['course_fee']}} </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb--2">
                            <div class="gt">Semester 2 </div>
                            <div class="gt">₹{{$courseDetailData['course_fee']}}</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb--2">
                            <div class="gt">Semester 3 </div>
                            <div class="gt">₹{{$courseDetailData['course_fee']}} </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb--2">
                            <div class="gt">Semester 4 </div>
                            <div class="gt">₹{{$courseDetailData['course_fee']}}</div>
                        </div> -->

                        */ ?>

                    </div>

                    <?php /*
                        <a href="{{route('admission_form')}}" class="btn-v w-100">Apply for Admission</a>
                    */ ?>
                </div>

                <div class="col-md-9 detail-cnt-block pl-5--lg tab-content" id="pills-tabContent">
                    @foreach($courseData as $cou)
                        <div class="tab-pane fade {{($cou->id == last(request()->segments()))?'active show':''}}" id="tab_{{$cou->id}}" role="tabpanel" aria-labelledby="tab-{{$cou->id}}">
                            <div>
                                <img src="/upload/course/{{$cou->course_image}}" alt="" class="gap-bottom-sm" height="350px" style="width:100%">
                            </div>
                            <h3 class="bt">{{$cou->course_name}}</h3>
                            {!! $cou->course_desc !!}
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <section class="gap-bottom-lg mos-wrap">
        <div class="container">
            <div class="row">
                <div class="text-center col-md-8 mx-auto">
                    <h2 class="bt">Faculties</h2>
                    <div class="section-sub-title">
                        We are a team that is committed to the higest standards of patients care by providing
                        quality healhcar services, advanced technology and facilities, ensuring the best care
                        for today’s patients and future generation.
                    </div>
                </div>
            </div>
            <div class="facultiesBox row carsl-wrapp gap-top-md cs">
                <div class="col-md-12 ms-auto">
                    <div class="mos-carousel owl-carousel dark">
                        @foreach($allFaculties as $faculty)
                        <div class="carsl-item">
                            @if($faculty->faculty_image)
                            <div class="carsl-img-block">
                                <img src="/upload/faculty/{{$faculty->faculty_image}}" alt="">
                            </div>
                            @else
                            <div class="card-img-block">
                                <img src="/img/no-image.jpg" alt="">
                            </div>
                            @endif
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
                @foreach($allTestimonial as $testimonial)
                    @if($testimonial->rating == '5')
                    <div class="grid-item opt-blocks lg-block">
                        <div>
                            <div>
                                <div class="opt-big-title-block d-flex align-items-center">
                                    <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                    </div>
                                    <div class="opt-bt-image-block">
                                        <img src="../img/opt-lg.png" alt="">
                                    </div>
                                </div>
                                <div class="opt-cnt-block position-relative">
                                    <h4 class="bt">{{ Str::upper($testimonial->title) }}</h4>
                                    <div class="star-block">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>{!! $testimonial->description !!}</p>
                                    <div class="opt-intro-block d-flex ">
                                        <div class="opt-intro-image-block">
                                        <img src="../img/thumbnail.jpg" alt="">
                                        </div>
                                        @if($testimonial->name != NULL)
                                        <div class="opt-intro-cnt-block">
                                            <div class="fw-bold">{{ $testimonial->name }}</div>
                                            <div>{{$testimonial->occupation}}</div>
                                        </div>
                                        @else
                                        <div class="opt-intro-cnt-block">
                                            <div class="fw-bold">{{ $testimonial->user->first_name }} {{ $testimonial->user->last_name }}</div>
                                            <div>Student</div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="top-comma-block">
                                        <img src="../img/top-comma.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="grid-item opt-blocks sm-block">
                        <div>
                            <div>
                                <div class="opt-big-title-block d-flex align-items-center">
                                    <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !
                                    </div>
                                    <div class="opt-bt-image-block">
                                        <img src="../img/opt-lg.png" alt="">
                                    </div>
                                </div>
                                <div class="opt-cnt-block position-relative">
                                    <h4 class="bt">{{ Str::upper($testimonial->title) }}</h4>
                                    <div class="star-block">
                                        @for($i = 1; $i < $testimonial->rating ; $i++)
                                        <i class="fa-solid fa-star"></i>
                                        @endfor
                                    </div>
                                    <p>
                                    {!! $testimonial->description !!}
                                    </p>
                                    <div class="opt-intro-block d-flex ">
                                        <div class="opt-intro-image-block">
                                        <img src="../img/thumbnail.jpg" alt="">
                                        </div>
                                        @if($testimonial->name != NULL)
                                        <div class="opt-intro-cnt-block">
                                            <div class="fw-bold">{{ $testimonial->name }}</div>
                                            <div>{{$testimonial->occupation}}</div>
                                        </div>
                                        @else
                                        <div class="opt-intro-cnt-block">
                                            <div class="fw-bold">{{ $testimonial->user->first_name }} {{ $testimonial->user->last_name }}</div>
                                            <div>Student</div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="top-comma-block">
                                        <img src="../img/top-comma.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
    </section>
</section>
@include('footer')
