@include('header')
<section class="main-wrap sub-page-detail-wrap">
    <section class="sub-page-banner cover no-repeat" style="background-image: url('/img/gallery-banner.jpg');">
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
            <section class="gap-top-lg gap-bottom-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 detail-sidebar-block">
                            <div class="mb--3">
                                <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                    @foreach($departmentData as $dept)
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link {{($dept->id=='1')?'active':''}}" id="tab-{{$dept->id}}"
                                            data-bs-toggle="pill" data-bs-target="#tab_{{$dept->id}}" role="tab"
                                            aria-controls="tab_{{$dept->id}}" aria-selected="true">{{$dept->dept_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 detail-cnt-block pl-5--lg tab-content" id="pills-tabContent">
                            @foreach($allDepartment as $dep)
                            <div class="tab-pane fade {{($dep->id == '1')?'active show':''}}" id="tab_{{$dep->id}}" role="tabpanel" aria-labelledby="tab-{{$dep->id}}">
                                <img src="/upload/department/{{$dep->dept_image}}" alt="" class="gap-bottom-sm">
                                <h3 class="bt">Description:</h3>
                                <p>{!!$dep->dept_contents!!}</p>
                                <h3 class="bt mt--3">Objectives/Competencies</h3>
                                <div class="mb--3">On completion of Medical Surgical Nursing I course, students will be able to</div>
                                {!!$dep->obj_comp!!}



                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </section>
        </section>
@include('footer')
