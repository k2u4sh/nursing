@include('header')
<section class="main-wrap sub-page-wrap">
    <section class="sub-page-banner cover no-repeat" style="background-image: url('/upload/aboutus/{{$data[0]->banner_image}}');">
        <div class="container d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bt">{{$data[0]->title}}</span>
                        </h1>
                        <div class="breadcrumb-wrap">
                            <span class="gt"><span>Home</span> <span class="mx-3">></span> </span> <span
                                class="rt">{{$data[0]->title}}</span>
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
                                <div class="page-title">{{$data[0]->title}}</div>
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
                <div class="col-md-12 mx-auto">
                    <div class="row home-about-counter-wrap justify-content-center">
                        <div class="col-md-2 text-center">
                            <div class="counter-cnt-wrap">
                                <div class="counter-title bt"><span class="count">345</span></div>
                                <div class="counter-sub-title gt">Expert Staff</div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="counter-cnt-wrap">
                                <div class="counter-title bt">No.<span class="count">1</span></div>
                                <div class="counter-sub-title gt">Nursing College</div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="counter-cnt-wrap">
                                <div class="counter-title bt"><span class="count">4697</span></div>
                                <div class="counter-sub-title gt">Modern Facilities</div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gap-top-lg gap-bottom-lg award-wrap">
        <div class="container">
            <div class="row">
                <div class="text-center col-md-10 mx-auto">
                    <h2 class="bt">Award and Recognition</h2>
                    <div class="section-sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Quisque laoreet dui in nulla suscipit, at tempor velit convallis.Lorem ipsum dolor sit
                        amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor
                        velit convallis.</div>
                </div>
            </div>
            <div class="row award-block-wrap gap-top-lg">
                <div class="col-md-3 text-center">
                    <div>
                        <img src="img/award-1.png" alt="">
                        <h4>Lorem Ipsum</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div>
                        <img src="img/award-3.png" alt="">
                        <h4>Lorem Ipsum</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div>
                        <img src="img/award-4.png" alt="">
                        <h4>Lorem Ipsum</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div>
                        <img src="img/award-1.png" alt="">
                        <h4>Lorem Ipsum</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
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
    <section class="gap-top-lg gap-bottom-lg">
        <div class="container">
            <h2 class="bt mb-4">Philosophy</h2>
            <div class="mb-5">The faculty O P Jindal College of Nursing:</div>
            <?php echo trim($data[0]->philosophy); ?>
        </div>
    </section>
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
@include('footer')
