@include('admin.inner-adminheader')
@include('admin.admin_sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="mb-4">Courses</h3>
                <a href="#" type="button" class="btn btn-primary" id="openCourseModal" data-toggle="modal" data-target="#courseModal">Add Course</a>
                <a class="btn btn-danger" onclick="deleteAllCourseData()" id="delCourseBtn">Delete</a>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="course_table">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAllCourse" /></th>
                                    <th>Course Name</th>
                                    <th>Course Fee</th>
                                    <th>Duration</th>
                                    <th>Eligibility</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($course_data as $course)
                                <tr>
                                    <td><input type="checkbox" class="selectAllCourse" name="selectAllCourse" value="{{$course->id}}"></td>
                                    <td>{{$course->course_name}}</td>
                                    <td>{{$course->course_fee}}</td>
                                    <td>{{$course->duration}}</td>
                                    <td>{{Str::of($course->eligibility)->limit(50)}}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="javascript:void(0);" onclick="edit_course('{{$course->id}}')" class="btn btn-sm blue  me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="delete_course('{{$course->id}}')" class="btn btn-sm red">
                                                <i class="feather-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal-->
<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="courseModalLabel">Add Course</h5>
            <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Course Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Course Name">
                        <input type="hidden" name="course_id" id="course_id">
                        <span id="course_name_error" style="color:red"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Course Fee <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="course_fee" id="course_fee" placeholder="Please Enter Course Fee">
                        <span id="course_fee_error" style="color:red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Course Duration (in year) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="course_duration" id="course_duration" placeholder="Enter Course Duration">
                        <span id="course_duration_error" style="color:red"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Admission Criteria</label>
                        <input type="text" class="form-control" name="adminssion_criteria" id="adminssion_criteria" placeholder="Please Enter Admission Criteria">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Eligibility</label>
                        <input type="text" class="form-control" name="eligibility" id="eligibility" placeholder="Enter Course Eligibility">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Course Image <i style="font-size: 12px;">(width: 1151 & height: 474)</i></label>
                        <input type="file" class="form-control" name="course_image" id="course_image" accept="image/png, image/gif, image/jpeg, image/jpg">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>Course Intake </label>
                        <input type="text" class="form-control" name="course_intake" id="course_intake" placeholder="Please enter course intake">
                        <!-- <span id="course_intake_error" style="color:red"></span> -->
                    </div>
                </div>
                <div class="row" id="editCourse">
                    <div class="form-group">
                        <label>Course Description</label>
                        <textarea name="course_desc" id="course_desc" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Course Type <span class="text-danger">*</span></label>
                        <input type="radio" name="course_type" id="semester" value="semester">Semester
                        <input type="radio" name="course_type" id="annually" value="annually">Annually
                        <span id="course_type_error" style="color:red"></span>
                    </div>
                </div>

                <?php /*
                <!-- <div class="row" id="appendInput"></div>
                <div class="row" id="appendAnnualy"></div>
                <div class="row" id="appendMoreInput"></div>
                <div class="row" id="appendMoreYear"></div> -->
                */ ?>

            </form>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary" id="insert_course">Save changes</button>
            <button type="submit" class="btn btn-primary" id="update_course"></button>
        </div>
        </div>
    </div>
</div>

@include('admin.inner-adminfooter')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function(){
            make_ckediter();
        });

        function make_ckediter()
        {
            $("textarea").each(function(_, ckeditor) {
                var $ckfield = CKEDITOR.replace(ckeditor);

                $ckfield.on('change', function() {
                    $ckfield.updateElement();
                });
            });

        }
</script>
