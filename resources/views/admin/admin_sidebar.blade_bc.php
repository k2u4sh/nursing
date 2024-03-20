<div class="sidebar" id="sidebar">
            <div class="sidebar-inner">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{ route('dashboard_admin') }}">
                                <img src="admin/assets/img/jsw-img/dashboard.svg" alt="" class="sdbr-mnu-icon">
                                 <span> Dashboard</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('admin_aboutus') }}"><img src="admin/assets/img/jsw-img/attendance.svg" alt="" class="sdbr-mnu-icon"> <span> About Us</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="admin/assets/img/jsw-img/assignment.svg" alt="" class="sdbr-mnu-icon"> <span> Assigment</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="assignment.html">Completed</a></li>
                                <li><a href="assignment.html">Ongoing</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin_dept') }}"><img src="admin/assets/img/jsw-img/exam-details.svg" alt="" class="sdbr-mnu-icon"> <span> Departments</span> </a>
                        </li>
                        <li>
                            <a href="{{route('admin_course')}}"><img src="admin/assets/img/jsw-img/reports.svg" alt="" class="sdbr-mnu-icon"> <span> Courses</span> </a>
                        </li>
                        <li>
                            <a href="{{route('admin_faculty')}}"><img src="admin/assets/img/jsw-img/class-information.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Faculties <span class="count-label-block">1</span></span> </a>
                        </li>
                        <li>
                            <a href="{{route('admin_gallery')}}"><img src="admin/assets/img/jsw-img/fees.svg" alt="" class="sdbr-mnu-icon"> <span> Galleries</span> </a>
                        </li>
                        <li>
                            <a href="{{route('admin_testimonial')}}"><img src="admin/assets/img/jsw-img/exam-details.svg" alt="" class="sdbr-mnu-icon"> <span> Testimonial </span></a>
                        </li>
                        <li>
                            <a href="{{route('admin_hostel')}}"><img src="admin/assets/img/jsw-img/class-information.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Hostel </span> </a>
                        </li>
                        <li>
                            <a href="{{route('admin_contactus')}}"><img src="admin/assets/img/jsw-img/class-information.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Contact Us </span> </a>
                        </li>
                        <li>
                            <a href="{{route('admin_enquire')}}"><img src="admin/assets/img/jsw-img/class-information.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Enquire Now </span> </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><img src="admin/assets/img/jsw-img/logout.svg" alt="" class="sdbr-mnu-icon"> <span> Logout</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
