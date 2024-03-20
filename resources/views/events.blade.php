@include('header')
@php use Carbon\Carbon; @endphp
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
    <section class="sub-page-banner cover no-repeat" style="background-image: url('img/departments-1.png');">
        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bt">Events
                        </h1>
                        <div class="breadcrumb-wrap">
                            <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> <span class="">></span> </span> <span class="rt">Events</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery-wrap py-md">
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
                                            <img src="/upload/event/{{$event->event_image}}" alt="">
                                        </div>
                                        <div class="card-cnt-block text-center">
                                            @php $date = Carbon::parse($event->from_date); @endphp
                                            <div class="fw-bold mb--2 gt">{{$date->format('d F Y')}}</div>
                                            <h4 class="bt"><a href="{{route('event_detail')}}/{{$event->id}}" class="bt">{{$event->event_name}}</a></h4>
                                            <div class="gt text-20">
                                                {!!strip_tags($event->descition)!!}
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
                                            <h4 class="bt"><a href="{{route('event_detail')}}/{{$upcoming->id}}" class="bt">{{$upcoming->event_name}}</a></h4>
                                            <div class="gt text-20">
                                                {!!strip_tags($upcoming->descition)!!}
                                            </div>
                                            <div class="text-center mt-5">
                                                <a href="{{route('event_detail')}}/{{$upcoming->id}}" class="btn-v transparent sm">Learn More</a>
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
        </div>
    </section>
</section>
@include('footer')