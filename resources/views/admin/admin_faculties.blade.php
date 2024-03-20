@include('admin.inner-adminheader')

@include('admin.admin_sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Faculties</h3>
                        <a href="#" type="button" class="btn btn-primary" id="openFacultyModal" data-toggle="modal" data-target="#facultyModal">Add Faculty</a>
                        <a class="btn btn-danger" onclick="deleteAllData()" id="delFacultyBtn">Delete</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="faculty_table">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAll" /></th>
                                            <th>Faculty Name</th>
                                            <th>Designation</th>
                                            <th>Experience</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($facultyData as $faculty)
                                            <tr>
                                                <td><input type="checkbox" name="selectAll" class="selectAll" value="{{$faculty->id}}"></td>
                                                <?php /*
                                                <td>{{$faculty->faculty_name}} <img src="/upload/faculty/{{$faculty->faculty_image}}" width="30" height="30"></td>
                                                */ ?>
                                                <td>
                                                    @if($faculty->faculty_image)
                                                        <img src="/upload/faculty/{{$faculty->faculty_image}}" style="width:30px;height:30px;border-radius:50%"> {{ $faculty->faculty_name ?? '' }}
                                                    @else
                                                        <img src="/img/no-image.jpg" style="width:30px;height:30px;border-radius:50%"> {{ $faculty->faculty_name ?? '' }}
                                                    @endif
                                                </td>

                                                <td>{{$faculty->designation}}</td>
                                                <td>{{$faculty->experience}}</td>
                                                <td>{{$faculty->faculty_phone}}</td>
                                                <td>{{$faculty->faculty_email}}</td>
                                                <td>
                                                <div class="actions">
                                                    <a href="javascript:void(0);" onclick="edit_faculty('{{$faculty->id}}')" class="btn btn-sm blue  me-2">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="delete_faculty('{{$faculty->id}}')" class="btn btn-sm red">
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
        <!-- Modal -->
        <div class="modal fade" id="facultyModal" tabindex="-1" role="dialog" aria-labelledby="facultyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="facultyModalLabel">Add Faculty</h5>
                <button type="button" id="facultyModalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Faculty Name <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="faculty_name" id="faculty_name" placeholder="Enter Faculty Name">
                            <input type="hidden" name="faculty_id" id="faculty_id">
                            <span id="faculty_name_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Faculty Designation <span style="color:red">*</span></label>
                            <input type="text" name="faculty_designation" id="faculty_designation" class="form-control" placeholder="Please Enter faculty Designation">
                            <span id="designation_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Faculty Experience (in year) <span style="color:red">*</span></label>
                            <input type="text" name="faculty_expe" id="faculty_expe" class="form-control" placeholder="Please Enter Faculty Experience">
                            <span id="faculty_expe_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Faculty mobile <span style="color:red">*</span></label>
                            <input type="text" name="faculty_phone" id="faculty_phone" class="form-control" placeholder="Please Enter Faculty Mobile Number">
                            <span id="faculty_phone_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Faculty Email</label>
                            <input type="text" name="faculty_email" id="faculty_email" class="form-control" placeholder="Please Enter Faculty Email Address">
                            <span id="faculty_email_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Faculty Address</label>
                            <input type="text" name="faculty_address" id="faculty_address" class="form-control" placeholder="Please Enter Faculty Address">
                            <span id="faculty_address_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Subject Expertise</label>
                            <input type="text" name="sub_expert" id="sub_expert" class="form-control" placeholder="Please Enter Subject Expertise">
                            <span id="faculty_email_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Research Interests</label>
                            <input type="text" name="research_interest" id="research_interest" class="form-control" placeholder="Please Enter Research Interests">
                            <span id="faculty_address_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Rewards / Achievments</label>
                            <input type="text" class="form-control" name="rewards" id="rewards" placeholder="Please Enter Rewards/Achievements">
                            <span id="faculty_image_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Faculty Image <i style="font-size: 12px;">(width: 398 & height: 477)</i></label>
                            <input type="file" class="form-control" name="faculty_image" id="faculty_image" accept="image/png, image/gif, image/jpeg, image/jpg">
                            <span id="faculty_image_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row" id="addEditor">
                        <div class="form-group col-md-6">
                            <label>Faculty Biography</label>
                            <textarea name="faculty_desc" id="faculty_desc" class="form-control" rows="3"></textarea>
                            <span id="faculty_desc_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Recent Publications</label>
                            <textarea name="recent_publication" id="recent_publication" class="form-control" rows="3"></textarea>
                            <span id="faculty_desc_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row" id="addEditor1">
                        <div class="form-group">
                            <label>Conferences, Seminars & Workshops</label>
                            <textarea name="conference" id="conference" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary" id="insert_faculty">Add</button>
                <button type="submit" class="btn btn-primary" id="update_faculty"></button>
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


