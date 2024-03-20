<div class="sidebar" id="sidebar">
            <div class="sidebar-inner">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="{{route('dashboard_staff')}}">
                                <img src="admin/assets/img/jsw-img/dashboard.svg" alt="" class="sdbr-mnu-icon">
                                 <span> Dashboard</span> </a>
                        </li>
                        <li>
                            <a href="attendance.html"><img src="admin/assets/img/jsw-img/attendance.svg" alt="" class="sdbr-mnu-icon"> <span> Attendance</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="#"><img src="admin/assets/img/jsw-img/assignment.svg" alt="" class="sdbr-mnu-icon"> <span> Assigment</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('staff_upload_assignment')}}">Upload Assignment</a></li>
                                <li><a href="{{route('staff_assignment_list')}}">Assignment List</a></li>
                                <!-- <li><a href="assignment.html">Ongoing</a></li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="#"><img src="admin/assets/img/jsw-img/exam-details.svg" alt="" class="sdbr-mnu-icon"> <span> Exam Details</span> </a>
                        </li>
                        <li>
                            <a href="reports-result.html"><img src="admin/assets/img/jsw-img/reports.svg" alt="" class="sdbr-mnu-icon"> <span> Reports/Result</span> </a>
                        </li>
                        <li>
                            <a href="classes-information.html"><img src="admin/assets/img/jsw-img/class-information.svg" alt="" class="sdbr-mnu-icon"> <span class="position-relative"> Classes Information <span class="count-label-block">1</span></span> </a>
                        </li>
                        <li>
                            <a href="fees-details.html"><img src="admin/assets/img/jsw-img/fees.svg" alt="" class="sdbr-mnu-icon"> <span> Fees Details</span> </a>
                        </li>
                        <li>
                            <a href="{{route('staff_logout')}}"><img src="admin/assets/img/jsw-img/logout.svg" alt="" class="sdbr-mnu-icon"> <span> Logout</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
