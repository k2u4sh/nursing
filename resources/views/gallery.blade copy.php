@include('header')
<section class="main-wrap sub-page-wrap">
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
    <section class="sub-page-banner cover no-repeat" style="background-image: url('img/gallery-banner.jpg');">
        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bt">Gallery
                        </h1>
                        <div class="breadcrumb-wrap">
                            <span class="gt"><span>Home</span> <span class="mx-3">></span> </span> <span class="rt">Gallery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery-wrap gap-top-md gap-bottom-lg">
        <div class="container">
            <h2 class="bt text-center mb-0">Gallery</h2>
            <div class="tab-scrollable-view-2 position-relative w-100 text-sm">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="g-1-tab" data-bs-toggle="pill" data-bs-target="#g-1" type="button" role="tab" aria-controls="g-1" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="g-2-tab" data-bs-toggle="pill" data-bs-target="#g-2" type="button" role="tab" aria-controls="g-2" aria-selected="false">Hostel</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="g-3-tab" data-bs-toggle="pill" data-bs-target="#g-3" type="button" role="tab" aria-controls="g-3" aria-selected="false">Activities</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="g-4-tab" data-bs-toggle="pill" data-bs-target="#g-4" type="button" role="tab" aria-controls="g-4" aria-selected="false">College Building</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="g-5-tab" data-bs-toggle="pill" data-bs-target="#g-5" type="button" role="tab" aria-controls="g-5" aria-selected="false">Placement Shell</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="g-6-tab" data-bs-toggle="pill" data-bs-target="#g-6" type="button" role="tab" aria-controls="g-6" aria-selected="false">Extra Activities</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="g-7-tab" data-bs-toggle="pill" data-bs-target="#g-7" type="button" role="tab" aria-controls="g-7" aria-selected="false">Classroom</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="g-8-tab" data-bs-toggle="pill" data-bs-target="#g-8" type="button" role="tab" aria-controls="g-8" aria-selected="false">Other facilities</button>
                        </li>
                </ul>
                <div class="line"></div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                @foreach($allCatGallery as $key => $gallery)
                <div class="tab-pane fade {{($gallery->id == '1') ? 'show active' : ''}}" id="g-{{$gallery->id}}" role="tabpanel" aria-labelledby="g-{{$gallery->id}}-tab">
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery gallery-inner-block-btm-gap">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="/upload/gallery/{{$allGallery[0]->image_name}}">
                                                <img src="/upload/gallery/{{$allGallery[0]->image_name}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[1]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[1]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[2]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[2]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[3]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[3]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[4]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[4]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row zoom-gallery gallery-inner-block-btm-gap">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[5]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[5]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[6]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[6]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[7]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[7]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[8]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[8]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 gallery-lg">
                                            <a href="/upload/gallery/{{$allGallery[9]->image_name}}">
                                                <img src="/upload/gallery/{{$allGallery[9]->image_name}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row zoom-gallery gallery-inner-block-btm-gap">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[10]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[10]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[10]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[10]->image_name}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-11.jpg">
                                                                <img src="img/gel-11.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-12.jpg">
                                                                <img src="img/gel-12.jpg" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-13.jpg">
                                                                <img src="img/gel-13.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/gel-14.jpg">
                                                                <img src="img/gel-14.jpg" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row h-100">
                                                        <div class="col-md-12 gallery-lg">
                                                            <a href="img/gel-15.jpg">
                                                                <img src="img/gel-15.jpg" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-16.jpg">
                                                                <img src="img/gel-16.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/gel-17.png">
                                                                <img src="img/gel-17.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row zoom-gallery">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-18.png">
                                                                <img src="img/gel-18.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-19.png">
                                                                <img src="img/gel-19.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-20.png">
                                                                <img src="img/gel-20.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-21.jpg">
                                                                <img src="img/gel-21.jpg" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-22.png">
                                                                <img src="img/gel-22.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/gel-23.png">
                                                                <img src="img/gel-23.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row h-100">
                                                        <div class="col-md-12 gallery-lg">
                                                            <a href="img/gel-24.png">
                                                                <img src="img/gel-24.png" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="img/gel-25.jpg">
                                                                <img src="img/gel-25.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="img/gel-26.jpg">
                                                                <img src="img/gel-26.jpg" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
