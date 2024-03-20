@include('header')
<style>
    .page-header {
  text-align: center;
  font-size: 1.5em;
  font-weight: normal;
  border-bottom: 1px solid #ddd;
  margin: 30px 0
}
#pagination {
  margin: 0;
  padding: 0;
  text-align: center
}
#pagination li {
  display: inline
}
#pagination li a {
  display: inline-block;
  text-decoration: none;
  padding: 5px 10px;
  color: #000
}

/* Active and Hoverable Pagination */
#pagination li a {
  border-radius: 5px;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s

}
#pagination li a.active {
  background-color: #4caf50;
  color: #fff
}
#pagination li a:hover:not(.active) {
  background-color: #ddd;
}

/* border-pagination */
.b-pagination-outer {
  width: 100%;
  margin: 0 auto;
  text-align: center;
  overflow: hidden;
  display: flex
}
#border-pagination {
  margin: 0 auto;
  padding: 0;
  text-align: center
}
#border-pagination li {
  display: inline;

}
#border-pagination li a {
  display: block;
  text-decoration: none;
  color: #000;
  padding: 5px 10px;
  border: 1px solid #ddd;
  float: left;

}
#border-pagination li a {
  -webkit-transition: background-color 0.4s;
  transition: background-color 0.4s
}
#border-pagination li a.active {
  background-color: #4caf50;
  color: #fff;
}
#border-pagination li a:hover:not(.active) {
  background: #ddd;
}
</style>
<section class="main-wrap sub-page-wrap">
            <!-- <div class="hedaer-serch-wrap mobile-lg-only">
                <div class="hs-icon-block">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="hs-input-block align-items-center">
                    <input type="text" placeholder="Search For Doctors, Treatment or Faculty">
                    <a href="#" class="btn-v">Search
                        <img src="../img/right-white-arrow.png" alt="">
                    </a>
                </div>
            </div> -->
            <section class="sub-page-banner cover no-repeat" style="background-image: url('../img/testimonials-banner.png');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="bt">Testimonials
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span>Home</span> <span class="mx-3">></span> </span> <span class="rt">Testimonials</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-bottom-lg testimonial-wrap gap-top-lg">
                <div class="container">
                    <div class="row">
                        <div class="text-center col-md-12 mx-auto">
                            <h2 class="bt">Our Student Testimonials</h2>
                        </div>
                        <!-- <div class="col-md-4" style="text-align: right;">
                            <a href="#" type="button" class="btn-v no-hover sm" data-toggle="modal" data-target="#testimonialModal">Add Testimonial</a>
                        </div> -->
                    </div>
                    <div class="row opt-block-wrap gap-top-md">
                        <div class="col-md-12 mx-auto">
                            <div class="grid" id="paginate_tesimonial">
                                @foreach($testimonials as $testimonial)
                                @if($testimonial->rating == '5')
                                <div class="grid-item opt-blocks lg-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !</div>
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
                                @else
                                <div class="grid-item opt-blocks sm-block">
                                    <div>
                                        <div>
                                            <div class="opt-big-title-block d-flex align-items-center">
                                                <div class="opt-big-title">WHAT OUR <span>PATIENTS</span> ARE SAYING !</div>
                                                <div class="opt-bt-image-block">
                                                    <img src="../img/opt-lg.png" alt="">
                                                </div>
                                            </div>
                                            <div class="opt-cnt-block position-relative">
                                                <h4 class="bt">{{ Str::upper($testimonial->title) }}</h4>
                                                <div class="star-block">
                                                    @for($i = 1; $i <= $testimonial->rating ; $i++)
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
                                                    <div class="opt-intro-cnt-block">
                                                        <div class="fw-bold">{{ $testimonial->name }}</div>
                                                        <div>{{$testimonial->occupation}}</div>
                                                    </div>
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
                    <div class="row">
                        <div class="b-pagination-outer">
                            @php
                            $total_page = count($allTotal);
                            $q = intdiv($total_page, 10);
                            $r = $total_page % 10;
                            if ($r != 0) {
                                $q = $q + 1;
                            }
                        @endphp

                        <ul id="border-pagination">
                            <li><a href="{{ route('testimonials_page') }}/?id=1">«</a></li>
                            @for ($i = 1; $i <= $q; $i++)
                                <li>
                                    <a href="{{ route('testimonials_page') }}/?id={{ $i }}" class="{{ $i == $active_id ? 'active' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor
                            <li><a href="{{ route('testimonials_page') }}/?id={{ $q }}">»</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </section>
        </section>

@include('footer')
