@include('header')
@php use Carbon\Carbon; @endphp
<section class="main-wrap home-page-wrap">

    <section class="home-banner cover no-repeat position-relative" @if($homepage_banner && $homepage_banner->image) style="background-image: url('{{ asset('images/' . $homepage_banner->image ) }}');" @else style="background-image: url('img/home-banner-1.jpg');" @endif >

        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner-top-title" style="">{{ strtoupper($homepage_banner->title_1 ?? '') }}</div>
                        <h1 class="bt"><span class="d-block" style="font-weight: 400;">{{ ucwords($homepage_banner->title_2 ?? '') }} </h1>
                        <div class="banner-sub-title">
                            <p> {!! $homepage_banner->description ?? '' !!} </p>
                        </div>
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
                        @foreach($strips as $strip)
                        @if($loop->index < 5) <div class="col-md-2 text-center">
                            <div class="counter-cnt-wrap">
                                <div class="counter-title bt"><span class="count">{{ $strip->count ?? '' }}</span></div>
                                <div class="counter-sub-title gt">{{ ucwords($strip->name ?? '') }}</div>
                            </div>
                    </div>
                    @endif
                    @endforeach

                    <!-- <div class="col-md-2 text-center">
                                <div class="counter-cnt-wrap">
                                    <div class="counter-title bt">
                                        <No class="span count"></No>
                                    </div>> 
                                    <div class="counter-sub-title gt">Departments</div>
                                </div>
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="counter-cnt-wrap">
                                    <div class="counter-title bt"><span class="count"></span></div>
                                    <div class="counter-sub-title gt">Modern Facilities</div>
                                </div>
                            </div> -->
                    <!-- <div class="col-md-2 text-center">
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
                            </div> -->
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
                                <h2 class="page-title">About Us</h2>
                                <!-- <div class="page-title">{{ Str::upper($aboutData->title ?? '') }}</div> -->
                                <h2>{{ Str::upper($aboutData->title ?? '') }}</h2>

                                <img src="/upload/aboutus/{{$aboutData->side_image}}" alt="" class="mobile-only my-5">
                                {!!Str::of($aboutData->contents)->limit(400)!!}
                                <a href="{{route('about_us')}}" class="btn-v transparent sm">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-5 abt-intro-img-block ms-auto desktop-only">
                            <img src="/upload/aboutus/{{ $aboutData->side_image }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="facultiesBox gap-bottom-lg pt-5">
        <div class="container">
            <div class="viewAllCourse d-flex align-items-center justify-content-between gap-bottom-sm">
                <div class="page-title mb-0">POPULAR COURSES</div>
                <a href="{{route('courses')}}" class="btn-v btnCms">View All Courses
                    <img src="img/right-white-arrow.png" alt="" class="arrow-to-hide-on-hover">
                    <img src="img/red-right-arrow.png" alt="" class="arrow-to-show-on-hover">
                </a>
            </div>
            <div class="row card-block-wrap gx-5">
                @foreach($courseHomeData as $course)
                <div class="col-lg-3 col-md-3 col-sm-4 card-block rounded  card-with-btm-fixed-btn">
                    <div>
                        @if($course->course_image)
                        <div class="card-img-block">
                            <img src="/upload/course/{{$course->course_image}}" alt="course image">
                        </div>
                        @else
                        <div class="card-img-block">
                            <img src="/img/no-image.jpg" alt="course imag">
                        </div>
                        @endif
                        <div class="card-cnt-block ">
                            <h4 class="bt"><a href="{{route('course_detail')}}/{{$course->id}}" title="{{$course->course_name ?? ''  }}" class="bt courseName">{{$course->course_name ?? ''  }}</a></h4>
                            <div class="gt text-20 line-3">
                                {!!strip_tags($course->course_desc)!!}
                            </div>
                            <div class="card-cd-block d-flex justify-content-between mt-5">
                                <div class="text-center">
                                    <div class="card-cd-title fw-bold">{{ $course->duration ?? '' }}</div>
                                    <div class="card-cd-sub-title">Years</div>
                                </div>
                                <div class="text-center">
                                    <div class="card-cd-title fw-bold">{{ $course->course_intake ?? '' }}</div>
                                    <div class="card-cd-sub-title">Seats</div>
                                </div>
                                <div class="text-center">
                                    <div class="card-cd-title fw-bold">Fee</div>
                                    <div class="card-cd-sub-title">Rs. {{ $course->course_fee ?? '' }}</div>
                                </div>
                            </div>
                            <div class="popCourse text-center mt-5 clearfix enq-btn-block">
                                <a href="{{route('enquire_now')}}" class="btn-v transparent colposition sm w-100">Enquire Now</a>
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
                                <h4>{{ ucwords($department->dept_name ?? '') }}</span></h4>
                                <a href="{{route('department')}}/{{$department->id}}" class="simple-btn">Learn More <img src="img/red-right-arrow.png" alt=""></a>
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

    <section class="facultiesBox gap-bottom-lg">
        <div class="container">
            <div class="row">
                <div class="text-center col-md-8 mx-auto">
                    <h2 class="bt">Faculties</h2>
                    <div class="section-sub-title">
                        We are a team that is committed to the highest standards of patients care by providing quality healthcare services, advanced technology and facilities, ensuring the best care for today’s patients and future generation.
                    </div>
                </div>
            </div>
            <div class="row carsl-wrapp gap-top-md cs">
                <div class="col-md-12 ms-auto">
                    <div class="home-course-carousel owl-carousel dark">
                        @foreach($allFaculties as $faculty)
                        <div class="carsl-item">
                            @if($faculty->faculty_image)
                            <div class="carsl-img-block">
                                <img src="/upload/faculty/{{$faculty->faculty_image}}" alt="faculty image">
                            </div>
                            @else
                            <div class="card-img-block">
                                <img src="/img/no-image.jpg" alt="faculty image">
                            </div>
                            @endif
                            <div class="carsl-item-cnt-block">
                                <h4 class="bt"> <a href="{{route('faculty_detail')}}/{{$faculty->id}}" class="bt"> {{ ucwords($faculty->faculty_name ?? '') }} </a> </h4>
                                <div class="team-designation">{{ ucfirst($faculty->designation ?? '') }}</div>
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
                                            <img src="img/opt-lg.png" alt="">
                                        </div>
                                    </div>
                                    <div class="opt-cnt-block position-relative">
                                        <h4 class="bt">{{ Str::upper($testimonial->title ?? '') }}</h4>
                                        <div class="star-block">
                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$testimonial->rating)
                                                <i class="fa-solid fa-star text-warning"></i>
                                                @else
                                                <i class="fa-solid fa-star text-muted"></i>
                                                @endif
                                                @endfor
                                        </div>

                                        <?php
                                        $description = $testimonial->description;
                                        $words = str_word_count($description);
                                        $maxWords = 50;
                                        $testimonial_more = false;

                                        if ($words > $maxWords) {
                                            $testimonial_more = true;
                                            $description = implode(' ', array_slice(explode(' ', $description), 0, $maxWords)) . '...';
                                        }
                                        ?>

                                        <p>{{ $description ?? '' }}
                                            @if($testimonial_more)
                                            <a href="{{ url('testimonials') }}">view more</a>
                                            @endif
                                        </p>
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
                                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$testimonial->rating)
                                                <i class="fa-solid fa-star text-warning"></i>
                                                @else
                                                <i class="fa-solid fa-star text-muted"></i>
                                                @endif
                                                @endfor
                                        </div>

                                        <?php
                                        $description = $testimonial->description;
                                        $words = str_word_count($description);
                                        $maxWords = 50;
                                        $testimonial_more = false;

                                        if ($words > $maxWords) {
                                            $testimonial_more = true;
                                            $description = implode(' ', array_slice(explode(' ', $description), 0, $maxWords)) . '...';
                                        }
                                        ?>

                                        <p>{{ $description ?? '' }}
                                            @if($testimonial_more)
                                            <a href="{{ url('testimonials') }}">view more</a>
                                            @endif
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

    <section class="gap-bottom-lg">
        <div class="container">
            <h2 class="bt text-center mb-0">Events</h2>
            <div class="tab-scrollable-view-2 position-relative w-80">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="g-1-tab" data-bs-toggle="pill" data-bs-target="#g-1" type="button" role="tab" aria-controls="g-1" aria-selected="true">All Events</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="g-2-tab" data-bs-toggle="pill" data-bs-target="#g-2" type="button" role="tab" aria-controls="g-2" aria-selected="false">Upcoming Events</button>
                    </li>
                </ul>
                <div class="line"></div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="g-1" role="tabpanel" aria-labelledby="g-1-tab">
                    <div class="row gap-top-md">
                        <div class="col-md-12">
                            <div class="row card-block-wrap gx-5">
                                @if(count($events) > 0)
                                @foreach($events as $event)
                                <div class="col-lg-4 col-md-4 col-sm-6 card-block rounded no-shadow">
                                    <div>
                                        <div class="card-img-block">
                                            <img src="/upload/event/{{$event->event_image}}" alt="event image">
                                        </div>
                                        <div class="card-cnt-block text-center">
                                            @php $date = Carbon::parse($event->from_date); @endphp
                                            <div class="fw-bold mb--2 gt">{{$date->format('d F Y')}}</div>
                                            <h4 class="bt"><a href="{{route('event_detail')}}/{{$event->id}}" class="bt">{{ ucwords($event->event_name ?? '') }}</a></h4>
                                            <div class="gt text-20">
                                                {!! strip_tags(ucfirst($event->descition ?? '')) !!}
                                            </div>
                                            <div class="text-center mt-5">
                                                <a href="{{route('event_detail')}}/{{$event->id}}" class="btn-v transparent sm">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div>                                        
                                        <h4 class="text-center">No Events</h4>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="g-2" role="tabpanel" aria-labelledby="g-2-tab">
                    <div class="row gap-top-md">
                        <div class="col-md-12">
                            <div class="row card-block-wrap gx-5">
                                @if(count($upcomingEvents) > 0)
                                @foreach($upcomingEvents as $upcoming)
                                <div class="col-lg-4 col-md-4 col-sm-6 card-block rounded no-shadow">
                                    <div>
                                        <div class="card-img-block">
                                            <img src="/upload/event/{{$upcoming->event_image}}" alt="">
                                        </div>
                                        <div class="card-cnt-block text-center">
                                            @php $date1 = Carbon::parse($upcoming->from_date); @endphp
                                            <div class="fw-bold mb--2 gt">{{$date1->format('d F Y')}}</div>
                                            <h4 class="bt"><a href="{{route('event_detail')}}/{{$upcoming->id}}" class="bt">{{ ucwords($upcoming->event_name ?? '') }}</a></h4>
                                            <div class="gt text-20">
                                                {!!strip_tags($upcoming->descition ?? '')!!}
                                            </div>
                                            <div class="text-center mt-5">
                                                <a href="{{ route('event_detail')}}/{{$upcoming->id }}" class="btn-v transparent sm">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div>
                                        <h4 class="text-center">No Upcoming Events</h4>
                                    </div>
                                @endif
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

    <!-- start gallary -->
    <section class="gallery-section my-5">
        <div class="container">
            <ul class="nav nav-tabs galleryNavTab">
                @foreach($gallery_categories as $gallery_category)
                <li class="nav-item">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#gallaryCat{{ $gallery_category->id }}">{{ $gallery_category->cat_name }}</a>
                </li>
                @endforeach
            </ul>

            <div class="tab-content my-5">
                <div class="row p-3 galleryContent">
                @if(count($gallery_all) > 0)
                    @foreach($gallery_all as $gallery)
                    <div class="col-md-4 p-3"><img src="{{ asset('upload/gallery/' .$gallery->image_name) }}" height="300px" width="100%" alt="Gallery Image"></div>
                    @endforeach
                @else
                    <h4 class="text-center">No images found</h4>
                @endif

                </div>
                <div class="gallaryErrorContainerDiv" style="display:none;">
                    <h4 class="gallaryErrorContainer text-center"></h4>
                </div>
            </div>

            <div class="text-center gap-top-md">
                <a href="{{ url('gallery') }}" class="btn-v">View All Gallery
                    <img src="img/right-white-arrow.png" alt="" class="arrow-to-hide-on-hover">
                    <img src="img/red-right-arrow.png" alt="" class="arrow-to-show-on-hover">
                </a>
            </div>
        </div>
    </section>
    <!-- end gallary -->

</section>


<script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('ul.nav-tabs li').click(function() {
            $('ul.nav-tabs li').removeClass('active');
            $(this).addClass('active');

            var categoryId = $(this).find('a').attr('href').replace('#gallaryCat', '');
            loadImages(categoryId);
        });

        function loadImages(categoryId) {
            $.ajax({
                url: 'get-gallery/' + categoryId,
                method: 'GET',
                success: function(response) {
                    if (response && response.images && response.images.length > 0) {

                        $('.gallaryErrorContainerDiv').hide();
                        displayImages(response.images);

                    } else {
                        $('.gallaryErrorContainer').html("No images found for the specified category.");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var tabContent = $('.galleryContent');
                    tabContent.empty();

                    $('.gallaryErrorContainer').html("No images found");
                    $('.gallaryErrorContainerDiv').show();
                }
            });
        }

        function displayImages(images) {

            var tabContent = $('.galleryContent');
            tabContent.empty();

            for (var i = 0; i < images.length; i++) {
                // console.log("Processing image " + i);
                var assetURL = `{{asset('upload/gallery/')}}`;
                var image = '<div class="col-md-4 p-3"><img src="' + assetURL + "/" + images[i].image_name + '" height="300px" width="100%" alt="Gallery Image"></div>';
                tabContent.append(image);
            }
        }
    });
</script>
@include('footer')