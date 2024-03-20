@include('admin.inner-adminheader')
@include('admin.admin_sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">

                @include('flash-msg')

                <form class="form-horizontal" action="{{ url('mess-header/store') }}" method="post">
                    @csrf
                    <input type="hidden" name="mess_header_id" value="{{ $mess_services_header->id ?? '' }}">

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $mess_services_header->title ?? '') }}">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2" style="margin-top: 20px; padding-bottom:0px;">
                            <div class="form-group mt-2">        
                                <div class="col-sm-offset-2 col-sm-10 " >
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>

                <hr>

                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-4">Mess Services List</h3>
                    </div>
                    <div>
                        <a href="#" type="button" class="btn btn-primary" id="openMessServiceModal" data-toggle="modal" data-target="#messServiceModal" data-action="add">Add Mess Services</a>
                        <a class="btn btn-danger" onclick="deleteAllMessService()" id="delMessServiceBtn" class="" style="display:none;">Delete</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="strip_table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll" /></th>
                                        <th>Title</th>
                                        <th>From</th>
                                        <th>To </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mess_services as $mess_service)
                                        <tr>
                                            <td><input type="checkbox" class="selectAll selectAllCheckbox" name="selectAll" value="{{$mess_service->id}}"></td>
                                            <td>{{ ucwords($mess_service->title ?? '') }}</td>
                                            <td>{{ isset($mess_service->from) ? Carbon\Carbon::createFromFormat('H:i:s', $mess_service->from)->format('h:i A') : '' }}</td>
                                            <td>{{ isset($mess_service->to) ? Carbon\Carbon::createFromFormat('H:i:s', $mess_service->to)->format('h:i A') : '' }}</td>
                                            <td>
                                                <div class="actions">
                                                    <a href="javascript:void(0);" data-id="{{ $mess_service->id }}" class="btn btn-sm blue me-2 edit-btn">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-id="{{ $mess_service->id }}" class="btn btn-sm red deleteBtn">
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
<div class="modal fade" id="messServiceModal" tabindex="-1" role="dialog" aria-labelledby="messServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="messServiceModalLabel">Add Mess Service</h5>
            <button type="button" id="messServiceModalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="messServiceForm" name="">
                @csrf
                <input type="hidden" name="mess_service_id" id="mess_service_id">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Title <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="" placeholder="Enter Title Name" required>
                        <span id="title_error" class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>From <span style="color:red">*</span></label>
                        <input type="time" class="form-control" name="from" id="from" value="" placeholder="" required>
                        <span id="from_error" style="color:red"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>to <span style="color:red">*</span></label>
                        <input type="time" class="form-control" name="to" id="to" value="" placeholder="" required>
                        <span id="to_error" style="color:red"></span>
                    </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="saveBtn">Add</button>
            <button type="submit" class="btn btn-primary" id="update_messService">Update</button>
        </div>
        </div>
    </div>
</div>

@include('admin.inner-adminfooter')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
            data: $('#messServiceForm').serialize(),
            url: "{{ route('mess-services.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                alert(data.success)
                window.location.reload();
            },
            error: function (jqXHR) { 

                if (typeof jqXHR === 'object') {
                    try {
                        var jsonData = JSON.parse(jqXHR.responseText);
                        var errors = jsonData.errors;

                        if (errors.title) {
                            $('#title_error').text(errors.title[0]);
                        } else {
                            $('#title_error').text('');
                        }

                        if (errors.from) {
                            $('#from_error').text(errors.from[0]);
                        } else {
                            $('#from_error').text('');
                        }

                        if (errors.to) {
                            $('#to_error').text(errors.to[0]);
                        } else {
                            $('#to_error').text('');
                        }

                    } catch (error) {
                        console.error("Error parsing JSON:", error);
                    }
                } else {
                    console.log("Unexpected data type");
                }
            }
        });
    });

    $(document).on('click', '.edit-btn', function () {
        var mess_service_id = $(this).data('id');

        $.ajax({
            type: 'GET',
            url: '/mess-services/' + mess_service_id + '/edit',
            dataType: 'json',
            success: function (data) {
                $('#mess_service_id').val(data.id);
                $('#title').val(data.title);
                $('#from').val(data.from);
                $('#to').val(data.to);
                $('#messServiceModalLabel').text('Edit Mess Service');
                $('#saveBtn').hide();
                $('#update_messService').show();
                $('#messServiceModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $(document).on('click', '#messServiceModalClose', function(){
        $('#messServiceModal').modal('hide');
    });

    $('#update_messService').click(function (e) {
        e.preventDefault();

        $.ajax({
            data: $('#messServiceForm').serialize(),
            url: "{{ route('mess-services.update') }}",
            type: "PUT",
            dataType: 'json',
            success: function (data) {
                alert(data.success);
                window.location.reload();
            },

            error: function (jqXHR) { 

                if (typeof jqXHR === 'object') {
                    try {
                        var jsonData = JSON.parse(jqXHR.responseText);

                        var errors = jsonData.errors;

                        if (errors.title) {
                            $('#title_error').text(errors.title[0]);
                        } else {
                            $('#title_error').text('');
                        }

                        if (errors.from) {
                            $('#from_error').text(errors.from[0]);
                        } else {
                            $('#from_error').text('');
                        }
                       
                        if (errors.to) {
                            $('#to_error').text(errors.to[0]);
                        } else {
                            $('#to_error').text('');
                        }

                    } catch (error) {
                        console.error("Error parsing JSON:", error);
                    }
                } else {
                    console.log("Unexpected data type");
                }
            }
        });
    });

    $(document).on('click', '.deleteBtn', function () {
        var mess_service_id = $(this).data('id');
        
        if (confirm("Are you sure you want to delete this mess service?")) {
            deleteMessService(mess_service_id);
        }
    });

    function deleteMessService(mess_service_id) {
        $.ajax({
            type: 'DELETE',
            url: '/mess-services-delete/' + mess_service_id,
            dataType: 'json',
            success: function (data) {
                alert(data.success);
                window.location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

    function openAddModal() {
        $('#messServiceForm')[0].reset();
        $('#name_error').text('');
        $('#count_error').text('');
        $('#strip_id').val('');
        $('#messServiceModalLabel').text('Add Mess Service');
        $('#saveBtn').show();
        $('#update_messService').hide();
        $('#messServiceModal').modal('show');
    }

    $(document).on('click', '#openMessServiceModal', function () {
        var action = $(this).data('action');
        
        if (action === 'add') {
            openAddModal();
        }
    });

    $(document).on('click', '#addStripButton', function () {
        openAddModal();
    });

    function deleteAllMessService() {
        var selectedIds = [];

        $('.selectAll:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            if (confirm("Are you sure you want to delete selected rows ?")) {
                $.ajax({
                    type: 'POST',
                    url: 'mess-services-selected/delete',
                    data: { ids: selectedIds },
                    success: function (data) {
                        alert(data.success);
                        window.location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        } else {
            alert("Please select at least one row to delete.");
        }
    }

    $(document).ready(function(){

        function toggleDeleteButton() {
            var checkedCheckboxes = $(".selectAllCheckbox:checked");
            var deleteButton = $("#delMessServiceBtn");

            if (checkedCheckboxes.length > 0) {
                deleteButton.show();
            } else {
                deleteButton.hide();
            }
        }

        $("#selectAll").click(function(){
            $(".selectAllCheckbox").prop('checked', $(this).prop('checked'));
            toggleDeleteButton();
        });

        $(".selectAllCheckbox").click(function(){
            toggleDeleteButton();
        });

        toggleDeleteButton();
    });

</script>
