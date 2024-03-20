@include('header')
@php
$allDepartment = json_decode(Session::get('dept_search_data'));
@endphp
<section class="main-wrap sub-page-wrap hn-departments">
            <section class="sub-page-banner cover no-repeat" style="background-image: url('img/hn-department-banner.jpg');">
                <div class="container d-flex align-items-center">
                    <div>
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="bt">Departments
                                </h1>
                                <div class="breadcrumb-wrap">
                                    <span class="gt"><span>Home</span> <span class="mx-3">></span> </span> <span
                                        class="rt">Departments</span>
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
                            <h2 class="bt">Department of Nursing</h2>
                            <div class="section-sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque laoreet dui in nulla suscipit, at tempor velit convallis.</div>
                        </div>
                    </div>
                    <!-- <div class="serach-wrap d-flex justify-content-end gap-top-lg">
                        <div class="search-block position-relative">
                            <input type="text" placeholder="Enter Departments to search..">
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div> -->
                    <div class="row card-block-wrap gap-top-sm gx-5" id="deoartmentSearch">
                        @if(!empty($allDepartment))
                        @foreach($allDepartment as $department)
                        <div class="col-lg-4 col-md-4 col-sm-6 card-block">
                            <div>
                                @if($department->dept_image)
                                <div class="card-img-block">
                                    <a href="{{route('department')}}/{{$department->id}}"><img src="/upload/department/{{$department->dept_image}}" alt=""></a>
                                </div>
                                @else
                                <div class="card-img-block">
                                    <a href="{{route('department')}}/{{$department->id}}"><img src="/img/no-image.jpg" alt=""></a>
                                </div>
                                @endif
                                <div class="card-cnt-block text-center">
                                    <h3 class="bt"><a href="{{route('department')}}/{{$department->id}}" class="bt">{{$department->dept_name}}</a></h3>
                                    <div class="gt text-20">
                                        {!!strip_tags($department->dept_contents)!!}
                                    </div>
                                    <div class="text-center mt-5">
                                        <a href="{{route('department')}}/{{$department->id}}" class="btn-v transparent sm">Learn More</a>
                                    </div>
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
