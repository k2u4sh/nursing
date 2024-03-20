@include('staff.staff-header')
<?php date_default_timezone_set("Asia/Calcutta"); ?>

@include('staff.staff-sidebar')
<div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Upload Assignment</h3>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title d-flex justify-content-between mb-5">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Upload Assignment</label>
                                                <input type="file" name="staff_assignment" id="staff_assignment">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                            <span id="staff_assignment_error" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit" id="upload_assignment">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('staff.staff-footer')
