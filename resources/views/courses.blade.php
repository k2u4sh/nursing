@include('header')
<section class="main-wrap sub-page-wrap hn-courses">
    <section class="sub-page-banner cover no-repeat" style="background-image: url('img/departments-1.png');">
        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bt">Courses
                        </h1>
                        <div class="breadcrumb-wrap">
                            <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> <span class="mx-3">></span> </span> <span
                                class="rt">Courses</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gap-bottom-lg gap-top-lg">
        <div class="container">
            <div class="row">
                <div class="text-center col-md-10 mx-auto">
                    <h2 class="bt">Nursing Courses</h2>
                    <div class="section-sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.</div>
                </div>
            </div>
            <div class="row card-block-wrap gap-top-lg gx-5">
                @foreach($course as $cou)
                <div class="col-lg-3 col-md-3 col-sm-4 card-block rounded">
                    <div>
                        @if($cou->course_image)
                        <div class="card-img-block">
                            <a href="{{route('course_detail')}}/{{$cou->id}}"><img src="/upload/course/{{$cou->course_image}}" alt=""></a>
                        </div>
                        @else
                        <div class="card-img-block">
                            <a href="{{route('course_detail')}}/{{$cou->id}}"><img src="/img/no-image.jpg" alt=""></a>
                        </div>
                        @endif
                        <div class="card-cnt-block">
                            <h4 class="bt"><a href="{{route('course_detail')}}/{{$cou->id}}" class="bt">{{$cou->course_name}}</a></h4>
                            <div class="gt text-20 line-3">
                                {!! Str::of(strip_tags($cou->course_desc))->limit(90) !!}
                            </div>
                            <div class="card-cd-block d-flex justify-content-between mt-5">
                                <div class="text-center">
                                    <div class="card-cd-title fw-bold">{{$cou->duration}}</div>
                                    <div class="card-cd-sub-title">Years</div>
                                </div>
                                <div class="text-center">
                                    <div class="card-cd-title fw-bold">{{$cou->course_intake}}</div>
                                    <div class="card-cd-sub-title">Seats</div>
                                </div>
                                <div class="text-center">
                                    <div class="card-cd-title fw-bold">Fee</div>
                                    <div class="card-cd-sub-title">Rs. {{$cou->course_fee}}</div>
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
</section>
@include('footer')
