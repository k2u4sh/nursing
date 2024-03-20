@include('header')
<section class="main-wrap sub-page-detail-wrap">
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
    <section class="sub-page-banner cover no-repeat" style="background-image: url('/img/departments-1.png');">
        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bt">{{$courseDetailData['course_name']}}
                        </h1>
                        <div class="breadcrumb-wrap">
                            <span class="gt"><span>Home</span> <span class="mx-3">></span> </span> <span
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
                    <div class="mb--3">

                        <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                    @foreach($courseData as $course)
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link {{$course->id == '1'? 'active':''}}" id="tab-{{$course->id}}"
                                            data-bs-toggle="pill" data-bs-target="#tab_{{$course->id}}" role="tab"
                                            aria-controls="tab_{{$course->id}}" aria-selected="true">{{$course->course_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>

                     <!-- <div class="mb--3">
                        @foreach($courseData as $course)
                        <a href="#" class="{{$course->id == '1'? 'active':''}}">{{$course->course_name}}</a>
                        @endforeach
                    </div> -->
                    
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
                        <div class="fw-bold bt mb--2">Semester Fee</div>
                        <div class="d-flex align-items-center justify-content-between mb--2">
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
                        </div>
                    </div>
                    <a href="{{route('admission_form')}}" class="btn-v w-100">Apply for Admission</a>
                </div>
                <div class="col-md-9 detail-cnt-block pl-5--lg">
                    <div>
                        <img src="/upload/course/{{$courseDetailData->course_image}}" alt="" class="gap-bottom-sm">
                        <h3 class="bt">{{$courseDetailData['course_name']}}</h3>
                        {!!$courseDetailData['course_desc']!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@include('footer')
