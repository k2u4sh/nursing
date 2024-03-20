<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>JSW</title>
    <script src="https://kit.fontawesome.com/ea16b2b73c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/fonts/lato/stylesheet.css">
    <link href="/css/plugin.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/custom-tejveer.css">

</head>

<body>
    <div class="nursing-wrap">
        <header>
            <div class="container-fluid">
                <div class="logo-bar-block d-flex align-items-center justify-content-between">
                    <div class="logo-cnt-block d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="logo-block">
                                <a class="navbar-brand" href="/">
                                    <img src="/img/logo.png" alt="">
                                </a>
                            </div>
                            <div class="lc-block">
                                OP Jindal College of Nursing <br>
                                (District), Karnataka - 583123
                            </div>
                        </div>
                        <button class="navbar-toggler mobile-lg-only" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <img src="/img/menu-icon.svg" alt="">
                            </span>
                        </button>
                    </div>
                    <div class="logo-signup-block d-flex">
                        <a href="tel:18003090309" class="btn-v transparent sm dark flex-btn"><img src="/img/call.png" alt=""
                                class="black-icon ms-0"> 18003090309</a>

                        <!-- <div class="hedaer-serch-wrap cms position-relative">
                            <div class="hs-icon-block_">                                
                                <div class="search-container">
                                    <form id="search_form">
                                    	@csrf
                                        <input class="search expandright" id="searchright" type="text" name="search_item" id="search_item" placeholder="  Search For Departments, Courses or Faculties">
                                        <label class="button searchbutton" for="searchright"><span class="mglass">&#9906;</span></label>
                                    </form>
                                    <form id="search_form">
                                    @csrf
                                    <div class="hs-input-block align-items-center">
                                        <input type="text" name="search_item" id="search_item" placeholder="Search For Doctors, Treatment or Faculty">
                                        <a href="javascript:void(0);" id="search_bar" class="btn-v">Search
                                            <img src="/img/right-white-arrow.png" alt="">
                                        </a>
                                    </div>
                                    </form>
                                </div>                           
                            </div>                            
                        </div>   -->                              
                        <div class="hedaer-serch-wrap position-relative">
                            <div class="hs-icon-block">
                                <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                            </div>
                            <form id="search_form">
                                @csrf
                            <div class="hs-input-block align-items-center">
                                <input type="text" name="search_item" id="search_item" placeholder="Search For Doctors, Treatment or Faculty">
                                <a href="javascript:void(0);" id="search_bar" class="btn-v">Search
                                    <img src="/img/right-white-arrow.png" alt="">
                                </a>
                            </div>
                            </form>
                        </div>
                        @if(Session::has('studentId'))
                        <a href="{{route('dashboard_student')}}" class="btn-v no-hover sm flex-btn">
                            <img src="/img/stamp.png" alt="" class="ms-0"> Dashboard
                        </a>
                        @endif

                        <?php  /*
                        @else 
                        <a href="{{route('login')}}" class="btn-v no-hover sm flex-btn">
                            <img src="/img/stamp.png" alt="" class="ms-0"> Login/Signup
                        </a>
                        @endif
                        */  ?>

                    </div>
                </div>
            </div>
            <div class="nursing-menu-block">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg">

                        <div class="collapse navbar-collapse main-menu-block" id="navbarNavDropdown">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link {{last(request()->segments()) == '' ? 'active': ''}}" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->route()->getName() === 'about_us' ? 'active': ''}}" href="/about-us">About Us</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{request()->route()->getName() === 'department' ? 'active': ''}}" href="{{ url('department-list') }}"
                                        id="" role="" 
                                        aria-expanded="false">
                                        Departments

                                        <img src="/img/arrowBottom.png" alt="" class="dropdoen-arrow">
                                    </a>
                                    <ul class="dropdown-menu md left" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach($departmentData as $depart)
                                        <li><a href="{{route('department')}}/{{$depart->id}}" class="dropdown-item {{((Request::segment(1) == 'departments')&&($depart->id == last(request()->segments()))) ? 'active': ''}}">{{$depart->dept_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->route()->getName() === 'admissions' ? 'active': ''}}" href="{{route('admissions')}}">Admissions</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{request()->route()->getName() === 'course_detail' ? 'active': ''}}" href="{{ url('courses-list') }}" id=""
                                         aria-expanded="false">
                                        Courses
                                        <img src="/img/arrowBottom.png" alt="" class="dropdoen-arrow">
                                    </a>
                                    <ul class="dropdown-menu md" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach($courseData as $course)
                                        <li><a class="dropdown-item {{(Request::segment(1) == 'courses') && ($course->id == last(request()->segments())) ? 'active': ''}}" href="{{route('course_detail')}}/{{$course->id}}">{{$course->course_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{request()->route()->getName() === 'faculty' ? 'active': ''}}" href="{{route('faculty')}}">Faculties</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->route()->getName() === 'gallery' ? 'active': ''}}" href="{{route('gallery')}}">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->route()->getName() === 'events' ? 'active': ''}}" href="{{route('events')}}">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->route()->getName() === 'publications' ? 'active': ''}}" href="{{route('publications')}}">Publications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->route()->getName() === 'testimonials' ? 'active': ''}}" href="{{route('testimonials')}}">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{request()->route()->getName() === 'hostel' ? 'active': ''}}" href="{{route('hostel')}}">Hostel</a>
                                </li>
                                <li class="nav-item" style="border-bottom: 0px solid #bbb;">
                                    <a class="nav-link {{request()->route()->getName() === 'contact_us' ? 'active': ''}}" href="{{route('contact_us')}}">Contact Us</a>
                                </li>
                            </ul>
                            <a href="javascript:void(0);" class="menu-close sm"><img src="/img/menu-close.png"
                                    alt=""></a>
                        </div>
                    </nav>
                </div>


            </div>
        </header>
