@include('staff.staff-header')
<?php date_default_timezone_set("Asia/Calcutta"); ?>



@include('staff.staff-sidebar')
<div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">My profile</h3>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title d-flex justify-content-between mb-5">
                                    <span>My profile</span>
                                    <a class="edit-link" href="{{route('staff_edit_profile')}}"><i class="far fa-edit"></i></a>
                                </h4>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="fw-bold">First Name</div>
                                        <div>{{$data->first_name}}</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="fw-bold">Last Name</div>
                                        <div>{{$data->last_name}}</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="fw-bold">Registration Date</div>
                                        <div>{{date("F d, Y h:i A", strtotime($data->created_at))}}</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="fw-bold">Username</div>
                                        <div>{{$data->registration_num}}</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="fw-bold">Phone Number</div>
                                        <div>{{$data->mobile}}</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="fw-bold">Email</div>
                                        <div>{{$data->email}}</div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="fw-bold">Bio</div>
                                        <div>{{$data->biodata}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@include('staff.staff-footer')
