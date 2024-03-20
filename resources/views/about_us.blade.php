@include('header')

<style>
    .awards-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }
</style>

<section class="main-wrap sub-page-wrap">
    <section class="sub-page-banner cover no-repeat" style="background-image: url('/upload/aboutus/{{$data[0]->banner_image}}');">
        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bt" style="text-transform: uppercase;">About us</span>
                        </h1>
                        <div class="breadcrumb-wrap">
                            <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> <span class="">></span> </span> <span
                                class="rt">About us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us gap-top-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row gx-5 align-items-center">
                        <div class="col-md-6 abt-intro-cnt-wrap">
                            <div>
                                <div class="page-title">ABOUT US</div>
                                <h2 style="">{{ ucwords($data[0]->title ?? '') }}</h2>
                                <img src="/upload/aboutus/{{$data[0]->side_image}}" alt="" class="mobile-only my-5">
                                <?php echo trim($data[0]->contents, '"') ?>
                            </div>
                        </div>
                        <div class="col-md-5 abt-intro-img-block ms-auto desktop-only">
                            <img src="/upload/aboutus/{{$data[0]->side_image}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gap-top-lg">
                <div class="col-md-10 mx-auto">
                    <div class="row home-about-counter-wrap justify-content-between">

                        @foreach($strips as $strip)
                            @if($loop->index < 5)
                                <div class="col-md-2 text-center">
                                    <div class="counter-cnt-wrap">
                                        <div class="counter-title bt"><span class="count">{{ $strip->count ?? '' }}</span></div>
                                        <div class="counter-sub-title gt">{{ ucwords($strip->name ?? '') }}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        
                        <!-- <div class="col-md-2 text-center">
                            <div class="counter-cnt-wrap">
                                <div class="counter-title bt"><span class="count"></span></div>
                                <div class="counter-sub-title gt">Departments</div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="counter-cnt-wrap">
                                <div class="counter-title bt"><span class="count"></span></div>
                                <div class="counter-sub-title gt">Facility</div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gap-top-lg gap-bottom-lg award-wrap">
        <div class="container">
            <div class="row">
                <div class="text-center col-md-10 mx-auto">
                    <h2 class="bt">{{ ucwords($award_header->title ?? '') }}</h2>
                    <div class="section-sub-title">{!! ucfirst($award_header->description ?? '') !!}</div>
                </div>
            </div>

            <div class="row award-block-wrap gap-top-lg justify-content-center">

                @foreach($award_recognitions as $award_recognition)
                    @if($loop->index < 4)
                        <div class="col-md-3 text-center">
                            <div>
                                <img src="{{ asset('awards/' .$award_recognition->image) }}" alt="image" class="awards-image">
                                <h4>{{ ucwords($award_recognition->img_title ?? '') }}</h4>
                                <p>{!! ucfirst($award_recognition->img_description ?? '') !!}</p>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>

        </div>
    </section>
    <section class="vm-wrap gap-bottom-lg">
        <div class="row gx-0">
            <div class="col-md-6 vm-title-block no-repeat cover" style="background-image: url(/upload/aboutus/{{$data[0]->objective_image}});">
                <div>
                    <div>
                        <div class="vmtb-image-block">
                            <img src="img/vision.png" alt="">
                        </div>
                        <h2 class="text-white">OUR VISION</h2>
                        <div class="text-white">Empower communities with sustainable livelihood</div>
                    </div>
                    <div>
                        <div class="vmtb-image-block">
                            <img src="img/mission.png" alt="">
                        </div>
                        <h2 class="text-white">OUR MISSION</h2>
                        <div class="text-white">Empower citizens with better health, education and employment
                            opportunities, and encourage sustainable development in key areas</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 vm-cnt-block">
                <div>
                    <?php echo trim($data[0]->objectives); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="gap-top-lg gap-bottom-lg">
        <div class="container">
            <h2 class="bt mb-4">Philosophy</h2>
            <div class="mb-5">The faculty O P Jindal College of Nursing:</div>
            <?php echo trim($data[0]->philosophy); ?>
        </div>
    </section> -->

 

    <section class="gap-bottom-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 mf-principle-block">
                            <div>
                                <img src="/upload/aboutus/{{$data[0]->principal_image}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-7 ms-auto mf-principle-cnt-block">
                            <div>
                                <?php echo trim($data[0]->princi_msg); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                                            <img src="img/opt-lg.png" alt="">
                                        </div>
                                    </div>
                                    <div class="opt-cnt-block position-relative">
                                        <h4 class="bt">{{ Str::upper($testimonial->title ?? '') }}</h4>
                                        <div class="star-block">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $testimonial->rating)
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                @else
                                                    <i class="fa-solid fa-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </div>

                                        <p>{!! $testimonial->description ?? '' !!}</p>
                                        <div class="opt-intro-block d-flex ">
                                            <div class="opt-intro-image-block">
                                            <img src="img/thumbnail.jpg" alt="">
                                            </div>
                                            @if($testimonial->name != NULL)
                                            <div class="opt-intro-cnt-block">
                                                <div class="fw-bold">{{ ucwords($testimonial->name ?? '') }}</div>
                                                <div>{{ ucfirst($testimonial->occupation ?? '') }}</div>
                                            </div>
                                            @else
                                            <div class="opt-intro-cnt-block">
                                                <div class="fw-bold">{{ ucfirst($testimonial->user->first_name ?? '') }} {{ ucfirst($testimonial->user->last_name ?? '') }}</div>
                                                <div>Student</div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="top-comma-block">
                                            <img src="img/top-comma.png" alt="">
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
                                            <img src="img/opt-lg.png" alt="">
                                        </div>
                                    </div>
                                    <div class="opt-cnt-block position-relative">
                                        <h4 class="bt">{{ Str::upper($testimonial->title) }}</h4>
                                        <div class="star-block">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $testimonial->rating)
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                @else
                                                    <i class="fa-solid fa-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <p>
                                        {!! $testimonial->description !!}
                                        </p>
                                        <div class="opt-intro-block d-flex ">
                                            <div class="opt-intro-image-block">
                                            <img src="img/thumbnail.jpg" alt="">
                                            </div>
                                            @if($testimonial->name != NULL)
                                            <div class="opt-intro-cnt-block">
                                                <div class="fw-bold">{{ ucwords($testimonial->name ?? '') }}</div>
                                                <div>{{ ucfirst($testimonial->occupation ?? '')}}</div>
                                            </div>
                                            @else
                                            <div class="opt-intro-cnt-block">
                                                <div class="fw-bold">{{ ucfirst($testimonial->user->first_name ?? '') }} {{ ucfirst($testimonial->user->last_name ?? '') }}</div>
                                                <div>Student</div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="top-comma-block">
                                            <img src="img/top-comma.png" alt="">
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


@include('footer')
