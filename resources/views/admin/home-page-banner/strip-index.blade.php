@include('admin.inner-adminheader')

@include('admin.admin_sidebar')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="mb-4">Event List</h3>
                <a href="#" type="button" class="btn btn-primary" id="openEventModal" data-toggle="modal" data-target="#eventModal">Add Event</a>
                <a class="btn btn-danger" onclick="deleteAllEvent()" id="delEventBtn">Delete</a>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="event_table">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll" /></th>
                                    <th>Strip Name</th>
                                    <th>Strip Count</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($eventsData as $event)
                                    <tr>
                                        <td><input type="checkbox" class="selectAll" name="selectAll" value="{{$event->id}}"></td>
                                        <td>{{Str::of(strip_tags($event->event_name))->limit(30)}}</td>
                                        <td>{{$event->event_for}}</td>
                                        <div class="actions">
                                            <a href="javascript:void(0);" onclick="edit_event('{{$event->id}}')" class="btn btn-sm blue  me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="delete_event('{{$event->id}}')" class="btn btn-sm red">
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
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="eventModalLabel">Add Event</h5>
            <button type="button" id="eventModalClose" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" enctype="multipart/form-data" id="event_form">
                @csrf
                <input type="hidden" name="event_id" id="event_id">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Event Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Enter Event Name">
                        <span id="event_name_error" style="color:red"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Event For <span style="color:red">*</span></label>
                        <select class="form-control" name="event_for" id="event_for">
                            <option value="">Select Event For</option>
                            <option value="Student">Student</option>
                            <option value="Staff">Staff</option>
                        </select>
                        <span id="event_for_error" style="color:red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>From Date</label>
                        <input type="date" name="from_date" id="from_date" class="form-control" placeholder="Please choose date from">
                        <span id="from_date_error" style="color:red"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>To Date</label>
                        <input type="date" name="to_date" id="to_date" class="form-control" placeholder="Please choose date to">
                        <span id="to_date_error" style="color:red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Time</label>
                        <input type="time" name="time" id="time" class="form-control" placeholder="Please choose time">
                        <span id="time_error" style="color:red"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Location</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Please Enter Location">
                        <span id="location_error" style="color:red"></span>
                    </div>
                </div>
                <div class="row" id="desc_editor">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="descition" id="descition" class="form-control" rows="3"></textarea>
                        <span id="descition_error" style="color:red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                    <input type="file" name="event_image" id="event_image" class="form-control">
                    <span id="event_image_error" style="color: red;"></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary" id="insert_event">Add</button>
            <button type="submit" class="btn btn-primary" id="update_event"></button>
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





       


