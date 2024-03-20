@include('admin.inner-adminheader')

        @include('admin.admin_sidebar')
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mb-4">Hostel</h3>
                        <a href="#" type="button" class="btn btn-primary" id="openHostelModal" data-toggle="modal" data-target="#hostelModal">Add Hostel</a>
                        <a class="btn btn-danger" onclick="delAllHostel()" id="delHostelBtn">Delete</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="hostel_table">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="delAllHostel"></th>
                                            <th>Occupancy Type</th>
                                            <th>Room</th>
                                            <th>Seat Available</th>
                                            <th>Hostel Fee</th>
                                            <th>Hostel info</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($hostel as $hos)
                                            <tr>
                                                <td><input type="checkbox" name="delAllHostel" class="delAllHostel" value="{{$hos->id}}"></td>
                                                <td>{{$hos->occupacy_type}}</td>
                                                <td>{{$hos->no_of_room}}</td>
                                                <td>{{$hos->seat_available}}</td>
                                                <td>₹ {{(int)$hos->hostel_fee + (int)$hos->security_deposite}}</td>
                                                <td>{{Str::of(strip_tags($hos->room_desc))->limit(30)}}</td>
                                                <td>
                                                <div class="actions">
                                                    <a href="javascript:void(0);" onclick="edit_hostel('{{$hos->id}}')" class="btn btn-sm blue  me-2">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="delete_hostel('{{$hos->id}}')" class="btn btn-sm red">
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
        <div class="modal fade" id="hostelModal" tabindex="-1" role="dialog" aria-labelledby="hostelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hostelModalLabel">Add Hostel</h5>
                <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('admin_hostel_insert')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Occupancy Type</label>
                            <select name="occu_type" id="occu_type" class="form-control select2">
                                <option value="">Select Occupancy</option>
                                <option value="2">Double Occupancy</option>
                                <option value="3">Triple Occupancy</option>
                                <option value="4">Quadruple Occupancy</option>
                            </select>
                            <span id="occu_type_error" style="color:red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hostel Image <i style="font-size: 12px;">(width: 1151 & height: 474)</i></label>
                            <input type="file" class="form-control" name="room_image" id="room_image" accept="image/png, image/gif, image/jpeg, image/jpg">
                            <input type="hidden" id="hostel_id" name="hostel_id">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>No. of Room</label>
                            <input type="text" class="form-control" id="no_room" name="no_room" placeholder="No. of Room">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Seat Available</label>
                            <input type="text" name="avail_seat" class="form-control" id="avail_seat" placeholder="Seat Available">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Security Deposit</label>
                            <input type="text" class="form-control" id="security_deposite" name="security_deposite" placeholder="Please enter security deposit amount">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hostel Fee</label>
                            <input type="text" name="hostel_fee" class="form-control" id="hostel_fee" placeholder="Please enter hostel fee">
                        </div>
                    </div>
                    <div class="row" id="emptyDescription">
                        <div class="form-group col-md-6">
                            <label>Room Description</label>
                            <textarea name="room_desc" id="room_desc" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Recent Publications</label>
                            <textarea name="recent_publication" id="recent_publication" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row" id="emptyInformation">
                        <div class="form-group">
                            <label>Hostel Information</label>
                            <textarea class="form-control" id="hostel_info" name="hostel_info"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="insert_hostel">Add</button>
                <button type="submit" class="btn btn-primary" id="update_hostel"></button>
            </div>
            </div>
        </div>
        </div>


        @include('admin.inner-adminfooter')
        <script src="admin/assets/js/hostel.js"></script>
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

