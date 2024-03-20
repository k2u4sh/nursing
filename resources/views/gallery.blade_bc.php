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
                    <!-- Generate category tabs -->
                    @foreach($allCatGallery as $gallery)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="g-{{ $gallery->id }}-tab" data-bs-toggle="pill" data-bs-target="#g-{{ $gallery->id }}" type="button" role="tab" aria-controls="g-{{ $gallery->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $gallery->cat_name }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="line"></div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                @foreach($allCatGallery as $key => $gallery)
                <div class="tab-pane fade {{($gallery->id == '1') ? 'show active' : ''}}" id="g-{{$gallery->id}}" role="tabpanel" aria-labelledby="g-{{$gallery->id}}-tab">
                    @if($gallery->id == 1)
                            <div class="row gap-top-md">
                                <div class="col-md-12">
                                    <div class="row zoom-gallery gallery-inner-block-btm-gap">
                                        <div class="col-md-6 gallery-lg">
                                            <a href="/upload/gallery/{{$allGallery[0]->image_name}}">
                                                <img src="/upload/gallery/{{$allGallery[0]->image_name}}" alt="{{$allGallery[0]->img_alt}}">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[1]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[1]->image_name}}" alt="{{$allGallery[1]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[2]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[2]->image_name}}" alt="{{$allGallery[2]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[3]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[3]->image_name}}" alt="{{$allGallery[3]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[4]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[4]->image_name}}" alt="{{$allGallery[4]->img_alt}}">
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
                                                                <img src="/upload/gallery/{{$allGallery[5]->image_name}}" alt="{{$allGallery[5]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[6]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[6]->image_name}}" alt="{{$allGallery[6]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[7]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[7]->image_name}}" alt="{{$allGallery[7]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[8]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[8]->image_name}}" alt="{{$allGallery[8]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 gallery-lg">
                                            <a href="/upload/gallery/{{$allGallery[9]->image_name}}">
                                                <img src="/upload/gallery/{{$allGallery[9]->image_name}}" alt="{{$allGallery[9]->img_alt}}">
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
                                                                <img src="/upload/gallery/{{$allGallery[10]->image_name}}" alt="{{$allGallery[10]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[11]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[11]->image_name}}" alt="{{$allGallery[11]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[12]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[12]->image_name}}" alt="{{$allGallery[12]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[13]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[13]->image_name}}" alt="{{$allGallery[13]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[14]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[14]->image_name}}" alt="{{$allGallery[14]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[15]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[15]->image_name}}" alt="{{$allGallery[15]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row h-100">
                                                        <div class="col-md-12 gallery-lg">
                                                            <a href="/upload/gallery/{{$allGallery[16]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[16]->image_name}}" alt="{{$allGallery[16]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[17]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[17]->image_name}}" alt="{{$allGallery[17]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[18]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[18]->image_name}}" alt="{{$allGallery[18]->img_alt}}">
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
                                                            <a href="/upload/gallery/{{$allGallery[19]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[19]->image_name}}" alt="{{$allGallery[19]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[20]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[20]->image_name}}" alt="{{$allGallery[20]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[21]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[21]->image_name}}" alt="{{$allGallery[21]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[22]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[22]->image_name}}" alt="{{$allGallery[22]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[23]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[23]->image_name}}" alt="{{$allGallery[23]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[24]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[24]->image_name}}" alt="{{$allGallery[24]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row h-100">
                                                        <div class="col-md-12 gallery-lg">
                                                            <a href="/upload/gallery/{{$allGallery[25]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[25]->image_name}}" alt="{{$allGallery[25]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-inner-block-btm-gap">
                                                            <a href="/upload/gallery/{{$allGallery[26]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[26]->image_name}}" alt="{{$allGallery[26]->img_alt}}">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <a href="/upload/gallery/{{$allGallery[27]->image_name}}">
                                                                <img src="/upload/gallery/{{$allGallery[27]->image_name}}" alt="{{$allGallery[27]->img_alt}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @else
                            <div class="row gap-top-md">
                            <div class="col-md-12">
                                <div class="row zoom-gallery gallery-inner-block-btm-gap">
                                    <!-- Loop through the images of the current category -->
                                    @foreach($allGallery as $image)
                                        @if($image->cat_id == $gallery->id)
                                            <div class="col-md-6 gallery-lg">
                                                <a href="/upload/gallery/{{ $image->image_name }}">
                                                    <img src="/upload/gallery/{{ $image->image_name }}" alt="">
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                            @endif
                        </div>
                        @endforeach
            </div>
        </div>
    </section>
</section>
@include('footer')
