@include('header')
@php
$faculty = json_decode(Session::get('faculty_search_data'));
@endphp
<section class="main-wrap sub-page-wrap hn-courses">
    <section class="sub-page-banner cover no-repeat" style="background-image: url('img/services-banner.png');">
        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bt">Faculties
                        </h1>
                        <div class="breadcrumb-wrap">
                            <span class="gt"><span>Home</span> <span class="mx-3">></span> </span> <span
                                class="rt">Faculties</span>
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
                    <h2 class="bt">Faculty Members</h2>
                    <div class="section-sub-title">We are a team that is committed to the higest standards of
                        patients care by providing quality healhcar services, advanced technology and
                        facilities, ensuring the best care for today’s patients and future generation.</div>
                </div>
            </div>
            <div class="row card-block-wrap gap-top-lg gx-5" id="facultySearchData">
            @if(!empty($faculty))
            @foreach($faculty as $fac)
                <div class="col-lg-3 col-md-4 col-sm-6 card-block facilities-card-block">
                    <div>
                        @if($fac->faculty_image)
                        <div class="card-img-block">
                            <a href="{{url('faculty-detail')}}/{{$fac->id}}"><img src="/upload/faculty/{{$fac->faculty_image}}" alt=""></a>
                        </div>
                        @else
                        <div class="card-img-block">
                            <a href="{{url('faculty-detail')}}/{{$fac->id}}"><img src="/img/no-image.jpg" alt=""></a>
                        </div>
                        @endif
                        <div class="card-cnt-block text-center">
                            <h4 class="bt mb--1"><a href="{{url('faculty-detail')}}/{{$fac->id}}" class="bt">{{$fac->faculty_name}}</a></h4>
                            <p class="team-designation">{{$fac->designation}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            </div>
        </div>
    </section>
</section>
@include('footer')
