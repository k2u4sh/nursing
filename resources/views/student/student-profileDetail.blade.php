@include('student.student-header')
<?php date_default_timezone_set("Asia/Calcutta"); ?>

@include('student.student-sidebar')
<div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">My profile</h3>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title d-flex justify-content-between mb-5">
                                    <span>My profile</span>
                                    <!-- <a class="edit-link" href="#"><i class="far fa-edit"></i></a> -->
                                </h4>
                                <form method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>First Name</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" value="{{$data->first_name?$data->first_name:''}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{$data->last_name?$data->last_name:''}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>User Name</label>
                                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" value="{{$data->registration_num?$data->registration_num:''}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Phone Number" value="{{$data->mobile?$data->mobile:''}}">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Select State</label>
                                            <select class="form-control select" id="stateId" name="stateId">
                                                <option value="">Select State </option>
                                                @foreach($state as $st)
                                                <option value="{{$st->id}}" data-id="{{$st->id}}" @if($data->state_id == $st->id) selected @endif>{{$st->state_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Select City</label>
                                            <input type="hidden" id="st_id" value="{{$data->state_id}}">
                                            <input type="hidden" id="ct_id" value="{{$data->city_id}}">
                                            <select class="form-control select" id="cityId" name="cityId">

                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label>Bio</label>
                                            <textarea class="form-control" name="biodata" id="biodata">{{$data->biodata?$data->biodata:''}}</textarea>
                                        </div>
                                        <div class="col-md-12 text-end mt-4">
                                            <button type="submit" class="btn btn-primary lg" id="update_student_profile">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('student.student-footer')
