<footer class="cover no-repeat" style="background-image: url('/img/footer-bg.png');">
            <div class="container">
                <h2 class="text-center text-white">Contact Us</h2>
                <div class="row gx-0">
                    <div class="col-md-4 footer-contact">
                        <div>
                            <div>
                                <div class="footer-c-image-block">
                                    <img src="/img/footer-mail.png" alt="">
                                </div>
                                <a href="mailto:contact@JSWsanjeevani.com"
                                    class="footer-c-title">contact@JSWsanjeevani.com</a>
                            </div>
                            <div>
                                <div class="footer-c-image-block">
                                    <img src="/img/footer-call.png" alt="">
                                </div>
                                <a href="tel:080 6750 6870" class="footer-c-title">080 6750 6870</a>
                            </div>
                            <div>
                                <div class="footer-c-image-block">
                                    <img src="/img/footer-map.png" alt="">
                                </div>
                                <div class="footer-c-title"><span>Vijay Vittal Nagar,</span> <span>Toranagallu Sandur
                                        Bellary (District),</span> <span>Karnataka - 583123</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 footer-map">
                        <div class="position-relative">
                            <img src="/img/g-map.png" alt="">
                            <a href="https://goo.gl/maps/Yp1CsWjwCuCttFfN8" target="_jsw"
                                class="btn-v on-hover-white">Get Directions</a>
                        </div>
                    </div>
                </div>
                <div class="row nursing-links-wrapp gap-top-md">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="nf-logo-links-wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="footer-logo-block">
                                                <a href="index.html"><img src="/img/logo.png" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-white fw-regular mb-5">Quick Links</h4>
                                            <ul class="nursing-footer-menu">
                                            <li><a href="/">Home</a></li>
                                                <li><a href="{{route('publications')}}">Publications</a></li>
                                                <li><a href="{{route('about_us')}}">About Us</a></li>
                                                <li><a href="{{route('testimonials')}}">Testimonials</a></li>
                                                <li><a href="{{route('admissions')}}">Admissions</a></li>
                                                <li><a href="{{route('hostel')}}">Hostel</a></li>
                                                <li><a href="{{route('faculty')}}">Faculties</a></li>
                                                <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                                                <li><a href="{{route('gallery')}}">Gallery</a></li>
                                                <li><a href="{{route('events')}}">Events</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="nf-department-links-block">
                                    <h4 class="text-white fw-regular mb-5">Departments</h4>
                                    <ul class="nursing-footer-menu full-width">
                                        <li><a href="{{route('department')}}/1">Medical Surgical Nursing</a></li>
                                        <li><a href="{{route('department')}}/2">Obstetrics and Gynaecologic Nursing</a></li>
                                        <li><a href="{{route('department')}}/3">Child Health Nursing</a></li>
                                        <li><a href="{{route('department')}}/4">Community Health Nursing</a></li>
                                        <li><a href="{{route('department')}}/5">Mental Health Nursing</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="nf-couses-links-block">
                                    <h4 class="text-white fw-regular mb-5">Courses</h4>
                                    <ul class="nursing-footer-menu">
                                        <li><a href="course-detail.html">MSc. Nursing</a></li>
                                        <li><a href="course-detail.html">BSc. Nursing</a></li>
                                        <li><a href="course-detail.html">BSc. Nursing</a></li>
                                        <li><a href="course-detail.html">BSc. Nursing</a></li>
                                        <li><a href="course-detail.html">BSc. Nursing</a></li>
                                        <li><a href="course-detail.html">BSc. Nursing</a></li>
                                        <li><a href="course-detail.html">BSc. Nursing</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-text-block text-white">Copyright © JSW 2023 All rights reserved
                </div>
            </div>
        </footer>
        <div class="top-to-bottom">
            <i class="fa-solid fa-chevron-up"></i>
        </div>
        <a href="{{route('enquire_now')}}" class="enquiry-now-block btn-v red on-hover-white">
            <span>ENQUIRY NOW</span> <img src="/img/red-right-arrow.png" alt="" class="btn-img-block">
        </a>
    </div>


    <script src="/js/plugin.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/outergallery.js"></script>
    <script>
        $(document).ready(function () {
            // Number Counter
            function visible(partial) {
                var $t = partial,
                    $w = jQuery(window),
                    viewTop = $w.scrollTop(),
                    viewBottom = viewTop + $w.height(),
                    _top = $t.offset().top,
                    _bottom = _top + $t.height(),
                    compareTop = partial === true ? _bottom : _top,
                    compareBottom = partial === true ? _top : _bottom;

                return ((compareBottom <= viewBottom) && (compareTop >= viewTop) && $t.is(':visible'));

            }

            $(window).scroll(function () {

                if (visible($('.count'))) {
                    if ($('.count').hasClass('counter-loaded')) return;
                    $('.count').addClass('counter-loaded');

                    $('.count').each(function () {
                        $(this).prop('Counter', 0).animate({
                            Counter: $(this).text()
                        }, {
                            duration: 4000,
                            easing: 'swing',
                            step: function (now) {
                                // $(this).text(Math.ceil(now));
                                $(this).text(Math.ceil(now).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                            }
                        });
                    });
                }
            });
        });
    </script>
</body>

</html>
