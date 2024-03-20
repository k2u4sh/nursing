@include('admin.inner-adminheader')

        @include('admin.admin_sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Departments</h3>
                        <a href="#" type="button" class="btn btn-primary" id="openNewModal" data-toggle="modal" data-target="#exampleModal">Add Departments</a>
                        <a class="btn btn-danger" onclick="delAllDept()" id="delDepartBtn">Delete</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="department_table">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="delAllDept"></th>
                                            <th>Department Name</th>
                                            <th>Mobile No.</th>
                                            <th>Email</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dept_data as $dept)
                                        <tr>
                                            <td><input type="checkbox" class="delAllDept" name="delAllDept" value="{{$dept->id}}"></td>
                                            <td>@if($dept->dept_image)<img src="/upload/department/{{$dept->dept_image}}" style="width:30px;height:30px;border-radius:50%">@endif  {{$dept->dept_name}}</td>
                                            <td>{{$dept->dept_mobile}}</td>
                                            <td>{{$dept->dept_email}}</td>
                                            <td>{{Str::of(strip_tags($dept->dept_contents))->limit(30)}}</td>
                                            <td>
                                                <div class="actions">
                                                    <a href="javascript:void(0);" onclick="edit_department('{{$dept->id}}')" class="btn btn-sm blue  me-2">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="delete_department('{{$dept->id}}')" class="btn btn-sm red">
                                                        <i class="feather-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <!-- <div class="text-end mt-4 pagination-wrap">
                                    <ul class="pagination justify-content-end">
                                        <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                                        <li class="paginate_button page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="paginate_button page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="paginate_button page-item"><a href="#" class="page-link">4</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Department Name</label>
                            <input type="text" class="form-control" name="dept_name" id="dept_name" placeholder="Enter Department Name">
                            <input type="hidden" name="url" id="url" value="{{route('add_departments')}}">
                            <input type="hidden" name="dept_id" id="dept_id">
                            <span id="dept_name_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Department Image <i style="font-size: 12px;">(width: 1152 & height: 462)</i></label>
                            <input type="file" class="form-control" name="dept_image" id="dept_image" accept="image/png, image/gif, image/jpeg, image/jpg">
                            <span id="dept_image_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Mobile Number</label>
                            <input type="text" name="dept_mobile" id="dept_mobile" class="form-control" placeholder="Enter mobile number">
                            <span id="dept_mobile_error" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="text" name="dept_email" id="dept_email" class="form-control" placeholder="Enter email address">
                            <span id="dept_email_error" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="row" id="editDepartment">
                        <div class="form-group col-md-6">
                            <label>Department Contents</label>
                            <textarea name="dept_desc" id="dept_desc" rows="3" class="form-control"></textarea>
                            <span id="dept_desc_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Objectives/Competencies</label>
                            <textarea name="obj_comp" id="obj_comp" rows="3" class="form-control"></textarea>
                            <!-- <span id="dept_desc_error" style="color:red"></span> -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary" id="insert_dept">Save changes</button>
                <button type="submit" class="btn btn-primary" id="update_dept"></button>
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

