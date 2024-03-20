<div class="sidebar" id="sidebar">
            <div class="sidebar-inner">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                    <li class="{{request()->route()->getName() === 'dashboard_admin' ? 'active': ''}}">
                            <a href="{{ route('dashboard_admin') }}">
                                <img src="admin/assets/img/jsw-img/dashboard-second.svg" alt="" class="sdbr-mnu-icon">
                                 <span> Dashboard</span> </a>
                        </li>
                        
                        <li class="{{ request()->route()->getName() === 'home-page-banners.index' ? 'active': ''}}">
                            <a class="" href="{{ route('home-page-banners.index') }}">
                                <img src="admin/assets/img/jsw-img/homepage.svg" alt="" class="sdbr-mnu-icon">
                                <span>Homepage</span>
                            </a>
                           
                        </li>


                        <li class="{{request()->route()->getName() === 'admin_aboutus' ? 'active': ''}}">
                            <a href="{{ route('admin_aboutus') }}"><img src="admin/assets/img/jsw-img/about.svg" alt="" class="sdbr-mnu-icon"> <span> About Us</span> </a>
                        </li>
                        <!-- <li class="submenu">
                            <a href="#"><img src="admin/assets/img/jsw-img/assignment.svg" alt="" class="sdbr-mnu-icon"> <span> Assignment</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="assignment.html">Completed</a></li>
                                <li><a href="assignment.html">Ongoing</a></li>
                            </ul>
                        </li> -->
                        <li class="{{request()->route()->getName() === 'admin_dept' ? 'active': ''}}">
                            <a href="{{ route('admin_dept') }}"><img src="admin/assets/img/jsw-img/departments.svg" alt="" class="sdbr-mnu-icon"> <span> Departments</span> </a>
                        </li>
                        <li class="{{request()->route()->getName() === 'admin_course' ? 'active': ''}}">
                            <a href="{{route('admin_course')}}"><img src="admin/assets/img/jsw-img/courses.svg" alt="" class="sdbr-mnu-icon"> <span> Courses</span> </a>
                        </li>
                        
                        <li class="{{request()->route()->getName() === 'admin_events' ? 'active': ''}}">
                            <a href="{{route('admin_events')}}"><img src="admin/assets/img/jsw-img/event.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Events </span> </a>
                        </li>
                        <li class="{{request()->route()->getName() === 'admin_publication' ? 'active': ''}}">
                            <a href="{{route('admin_publication')}}"><img src="admin/assets/img/jsw-img/publication.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Publication </span> </a>
                        </li>
                        <li class="{{request()->route()->getName() === 'admin_faculty' ? 'active': ''}}">
                            <a href="{{route('admin_faculty')}}"><img src="admin/assets/img/jsw-img/faculty.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Faculties <!--<span class="count-label-block">1</span>--></span> </a>
                        </li>
                        <li class="{{request()->route()->getName() === 'admin_gallery' ? 'active': ''}}">
                            <a href="{{route('admin_gallery')}}"><img src="admin/assets/img/jsw-img/gallery.svg" alt="" class="sdbr-mnu-icon"> <span> Gallery</span> </a>
                        </li>

                        <li class="{{ request()->route()->getName() === 'awards-recognitions.index' ? 'active' : '' }}">
                            <a href="{{ route('awards-recognitions.index') }}">
                                <img src="admin/assets/img/jsw-img/award-recognitions.svg" alt="" class="sdbr-mnu-icon"> <span>Award & Recognition </span>
                            </a>
                        </li>

                        <li class="{{request()->route()->getName() === 'strip.index' ? 'active': ''}}">
                            <a href="{{route('strip.index')}}"><img src="admin/assets/img/jsw-img/strip.svg" alt="" class="sdbr-mnu-icon"> <span> Strip </span></a>
                        </li>
                        
                        <li class="{{request()->route()->getName() === 'admin_testimonial' ? 'active': ''}}">
                            <a href="{{route('admin_testimonial')}}"><img src="admin/assets/img/jsw-img/testimonial.svg" alt="" class="sdbr-mnu-icon"> <span> Testimonial </span></a>
                        </li>
                        
                        <li class="{{request()->route()->getName() === 'admin_hostel' ? 'active': ''}}">
                            <a href="{{route('admin_hostel')}}"><img src="admin/assets/img/jsw-img/hostel.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Hostel </span> </a>
                        </li>

                        <li class="{{request()->route()->getName() === 'mess-services.index' ? 'active': ''}}">
                            <a href="{{route('mess-services.index')}}"><img src="admin/assets/img/jsw-img/mess-service.svg" alt="" class="sdbr-mnu-icon"> <span> Mess Services </span></a>
                        </li>

                        <li class="{{request()->route()->getName() === 'facilities_index' ? 'active': ''}}">
                            <a href="{{route('facilities_index')}}"><img src="admin/assets/img/jsw-img/facility.svg" alt="" class="sdbr-mnu-icon"> <span> Facility </span></a>
                        </li>

                        <li class="{{request()->route()->getName() === 'admin_contactus' ? 'active': ''}}">
                            <a href="{{route('admin_contactus')}}"><img src="admin/assets/img/jsw-img/contact-us.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Contact Us </span> </a>
                        </li>

                        <li class="{{request()->route()->getName() === 'admin-contact.index' ? 'active': ''}}">
                            <a href="{{route('admin-contact.index')}}"><img src="admin/assets/img/jsw-img/class-information.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Contact Us Footer </span> </a>
                        </li>

                        <li class="{{request()->route()->getName() === 'admin_enquire' ? 'active': ''}}">
                            <a href="{{route('admin_enquire')}}"><img src="admin/assets/img/jsw-img/enquiry.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Enquire Now </span> </a>
                        </li>
                        <li class="{{request()->route()->getName() === 'logout' ? 'active': ''}}">
                            <a href="{{ route('logout') }}"><img src="admin/assets/img/jsw-img/logout.svg" alt="" class="sdbr-mnu-icon"> <span> Logout</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function () {
        // Add click event listener to the anchor tag with class "toggle-homediv"
        $(".toggle-homediv").click(function (e) {
            e.preventDefault(); // Prevent the default behavior of the anchor tag
            $(".homediv").toggle(); // Toggle the visibility of homediv
        });

        // Add click event listener to the anchor tags inside homediv
        $(".homediv a.prevent-default").click(function (e) {
            e.preventDefault(); // Prevent the default behavior only for these anchor tags
            var href = $(this).attr("href");
            window.location.href = href; // Navigate to the specified URL
        });
    });
</script>