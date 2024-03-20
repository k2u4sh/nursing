@include('admin.inner-adminheader')
@include('admin.admin_sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('flash-msg')

                <form class="form-horizontal" action="{{ url('facility-header/store') }}" method="post">
                    @csrf
                    <input type="hidden" name="facility_header_id" value="{{ $facility_header->id ?? '' }}">

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $facility_header->title ?? '') }}">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-12" style="margin-top: 28px;">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                <hr>

                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-4">Facility List</h3>
                    </div>
                    <div>
                        <a href="#" type="button" class="btn btn-primary" id="openFacilityModal" data-toggle="modal" data-target="#facilityModal" data-action="add">Add Facility</a>
                        <a class="btn btn-danger" onclick="deleteAllFacility()" id="delFacilityBtn" style="display:none;">Delete</a>
                    </div>
                </div>
               
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="facility_table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll" /></th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($facilities as $facility)
                                        <tr>
                                            <td><input type="checkbox" class="selectAll selectAllCheckbox" name="selectAll" value="{{ $facility->id ?? '' }}"></td>
                                            <td class="text-wrap" style="max-width: 100% ;">{{ ucwords($facility->title ?? '') }}</td>
                                            <td class="text-wrap" style="max-width: 100% ;">{!! $facility->description ?? '' !!}</td>
                                            <td>
                                                <img src="{{ asset('facility/' .$facility->image) }}" width="50px" height="50px" alt="image">
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a href="javascript:void(0);" data-id="{{ $facility->id ?? '' }}" class="btn btn-sm blue me-2 editFacility">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-id="{{ $facility->id ?? '' }}" class="btn btn-sm red deleteFacilityBtn">
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
<div class="modal fade" id="facilityModal" tabindex="-1" role="dialog" aria-labelledby="facilityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="facilityModalLabel">Add Facility</h5>
            <button type="button" id="facilityModalClose" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="facilityForm" name="" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" name="facility_id" id="facility_id" value="">

                <div class="row">

                    <div class="form-group col-md-12">
                        <label>Title <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="" placeholder="Enter title" required>
                        <span id="title_error" class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Description <span style="color:red">*</span></label>
                        <textarea name="description" id="description" rows="3" class="form-control">  </textarea>
                        <span id="description_error" class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-8">
                        <label>Image <span style="color:red"></span> <span>(Choose an image with formats: jpeg, png, jpg, gif, svg; Maximum size: 2048 KB)</span></label>
                        <input type="file" class="form-control" name="image" id="image" value="" >
                        <span id="selectedImage" class="text-danger"></span> <span id="image_error" class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-4" id="facilityImageDiv" style="display:none;">
                        <img id="editFacilityImage" src="" width="100px" height="100px" alt="image">
                    </div>
                    
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="saveBtn">Add</button>
            <button type="submit" class="btn btn-primary" id="update_facility" style="display:none;">Update</button>
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

        var formData = new FormData($('#facilityForm')[0]);
      
        $.ajax({
            data: formData,
            url: "{{ route('facility.store') }}",
            type: "POST",
            contentType: false,
            processData: false,
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
                        
                        if (errors.description) {
                            $('#description_error').text(errors.description[0]);
                        } else {
                            $('#description_error').text('');
                        } 

                        if (errors.image) {
                            $('#image_error').text(errors.image[0]);
                        } else {
                            $('#image_error').text('');
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
    
   
    $(document).on('click', '.editFacility', function () {
        var assetURL = `{{asset('facility/')}}`;
        var facility_id = $(this).data('id');

        $.ajax({
            type: 'GET',
            url: '/facility/' + facility_id + '/edit',
            dataType: 'json',
            success: function (data) {
                $('#facility_id').val(data.id);
                $('#selectedImage').text(data.image);
                $('#title').val(data.title);
                CKEDITOR.instances['description'].setData(data.description);
                $('#facilityModalLabel').text('Edit Facility');
                $('#editFacilityImage').attr('src', assetURL + '/' + data.image);
                $('#facilityImageDiv').show();
                $('#saveBtn').hide();
                $('#update_facility').show();
                $('#facilityModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $(document).on('click', '#facilityModalClose', function(){
        $('#facilityModal').modal('hide');
    });

    $('#update_facility').click(function (e) {
        e.preventDefault();
        var facilityformData = new FormData($('#facilityForm')[0]);

        $.ajax({
            data: facilityformData,
            url: "{{ route('facility.update') }}",
            type: "POST",
            contentType: false,
            processData: false,
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

                        if (errors.image) {
                            $('#image_error').text(errors.image[0]);
                        } else {
                            $('#image_error').text('');
                        }

                        if (errors.title) {
                            $('#title_error').text(errors.title[0]);
                        } else {
                            $('#title_error').text('');
                        } 
                        
                        if (errors.description) {
                            $('#description_error').text(errors.description[0]);
                        } else {
                            $('#description_error').text('');
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

    $(document).on('click', '.deleteFacilityBtn', function () {
        var facilityId = $(this).data('id');
        
        if (confirm("Are you sure you want to delete this Facility ?")) {
            deleteFacility(facilityId);
        }
    });

    function deleteFacility(facilityId) {
        $.ajax({
            type: 'DELETE',
            url: '/facility/delete/' + facilityId,
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
        $('#facility_id').val('');
        $('#selectedImage').text('');
        $('#title').val('');
        CKEDITOR.instances['description'].setData('');
        $('#facilityModalLabel').text('Add Facility');
        $('#editFacilityImage').attr('src', '');
        $('#facilityImageDiv').hide();
        $('#saveBtn').show();
        $('#update_facility').hide();
        $('#facilityModal').modal('show');
    }

    $(document).on('click', '#openFacilityModal', function () {
        var action = $(this).data('action');
        
        if (action === 'add') {
            openAddModal();
        }
    });

    $(document).on('click', '#addFacilityButton', function () {
        openAddModal();
    });

    function deleteAllFacility() {
        var selectedIds = [];

        $('.selectAll:checked').each(function() {
            selectedIds.push($(this).val());
        });
        
        if (selectedIds.length > 0) {
            if (confirm("Are you sure you want to delete selected rows?")) {
                $.ajax({
                    type: 'POST',
                    url: 'facility-selected/delete',
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
            var deleteButton = $("#delFacilityBtn");

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
