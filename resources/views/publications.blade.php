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
            <section class="sub-page-banner cover no-repeat" style="background-image: url('img/departments-1.png');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="bt">Publications
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span><a href="{{ url('/') }}">Home</a></span> <span class="">></span> </span> <span class="rt">Publications</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-top-lg gap-bottom-lg">
                <div class="container">
                    <!-- <div class="serach-wrap d-flex justify-content-end">
                        <div class="search-block position-relative">
                            <input type="text" placeholder="Enter Publication to search..">
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div> -->
                    <div class="row gx-5 gap-top-lg">
                        @foreach($publics as $pub)
                        <div class="col-md-4 publication-block mb-5">
                            <div>
                                <a href="/upload/publication/{{$pub->p_fileName}}" target="_blank"><img src="/upload/publication/cover-page/{{$pub->p_cover_page}}" alt="{{$pub->p_name}}"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </section>
@include('footer')
