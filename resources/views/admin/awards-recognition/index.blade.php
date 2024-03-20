@include('admin.inner-adminheader')
@include('admin.admin_sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('flash-msg')

                <form class="form-horizontal" action="{{ url('awards-header/store') }}" method="post">
                    @csrf
                    <input type="hidden" name="award_header_id" value="{{ $award_header->id ?? '' }}">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title', $award_header->title ?? '') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Description</label>
                        <div class="col-sm-10">          
                            <textarea name="description" id="description" rows="3" class="form-control">{!! old('description', $award_header->description ?? '') !!}  </textarea>

                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group " style="text-align: end;">        
                        <div class="col-sm-offset-2 col-sm-10 " >
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-4">Awards & Recognition List</h3>
                    </div>
                    <div>
                        <a href="#" type="button" class="btn btn-primary" id="openAwardsModal" data-toggle="modal" data-target="#awardsModal" data-action="add">Add Awards & Recognition</a>
                        <a class="btn btn-danger" onclick="deleteAllAward()" id="delAwardBtn" style="display:none;">Delete</a>
                    </div>
                </div>
               
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="awards_table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll" /></th>
                                        <th>Image</th>
                                        <th>Image Title</th>
                                        <th>Image Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($award_recognitions as $award_recognition)
                                        <tr>
                                            <td><input type="checkbox" class="selectAll selectAllCheckbox" name="selectAll" value="{{ $award_recognition->id ?? '' }}"></td>
                                            <td>
                                                <img src="{{ asset('awards/' .$award_recognition->image) }}" width="50px" height="50px" alt="image">
                                            </td>
                                            <td class="text-wrap" style="max-width: 100% ;">{{ ucwords($award_recognition->img_title ?? '') }}</td>
                                            <td class="text-wrap" style="max-width: 100% ;">{!! $award_recognition->img_description ?? '' !!}</td>
                                            <td>
                                                <div class="actions">
                                                    <a href="javascript:void(0);" data-id="{{ $award_recognition->id ?? '' }}" class="btn btn-sm blue me-2 editAwards">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-id="{{ $award_recognition->id ?? '' }}" class="btn btn-sm red deleteAwardBtn">
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
<div class="modal fade" id="awardsModal" tabindex="-1" role="dialog" aria-labelledby="awardsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="awardsModalLabel">Add Awards & Recognition</h5>
            <button type="button" id="awardsModalClose" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="awardsRecognitionForm" name="" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" name="awardRecognition_id" id="awardRecognition_id" value="">

                <div class="row">

                    <div class="form-group col-md-6">
                        <label>Image <span style="color:red"></span> <span>(Choose an image with formats: jpeg, png, jpg, gif, svg; Maximum size: 2048 KB)</span></label>
                        <input type="file" class="form-control" name="image" id="image" value="" >
                        <span id="selectedImage" class="text-danger"></span> <span id="image_error" class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6" id="awardImageDiv" style="display:none;">
                        <img id="editAwardImage" src="" width="100px" height="100px" alt="image">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Image Title <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="img_title" id="img_title" value="" placeholder="Enter image title" required>
                        <span id="img_title_error" class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Image Description <span style="color:red">*</span></label>
                        <textarea name="img_description" id="img_description" rows="3" class="form-control">  </textarea>
                        <span id="img_description_error" class="text-danger"></span>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="saveBtn">Add</button>
            <button type="submit" class="btn btn-primary" id="update_award" style="display:none;">Update</button>
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
        // $(this).html('Sending..');
        // console.log("award");return false;

        var formData = new FormData($('#awardsRecognitionForm')[0]);
      
        $.ajax({
            // data: $('#awardsRecognitionForm').serialize(),
            data: formData,
            url: "{{ route('awards-recognitions.store') }}",
            type: "POST",
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                alert(data.success)
                window.location.reload();
                // $('#stripForm').trigger("reset");
                // $('#awardsModal').modal('hide');
            },
            error: function (jqXHR) { 
                
                if (typeof jqXHR === 'object') {
                    try {
                        var jsonData = JSON.parse(jqXHR.responseText);
                        var errors = jsonData.errors;

                        // if (errors.title) {
                        //     $('#title_error').text(errors.title[0]);
                        // } else {
                        //     $('#title_error').text('');
                        // }

                        // if (errors.description) {
                        //     $('#description_error').text(errors.description[0]);
                        // } else {
                        //     $('#description_error').text('');
                        // }

                        if (errors.image) {
                            $('#image_error').text(errors.image[0]);
                        } else {
                            $('#image_error').text('');
                        }

                        if (errors.img_title) {
                            $('#img_title_error').text(errors.img_title[0]);
                        } else {
                            $('#img_title_error').text('');
                        } 
                        
                        if (errors.img_description) {
                            $('#img_description_error').text(errors.img_description[0]);
                        } else {
                            $('#img_description_error').text('');
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
    
   
    $(document).on('click', '.editAwards', function () {
        var assetURL = `{{asset('awards/')}}`;
        var award_id = $(this).data('id');

        $.ajax({
            type: 'GET',
            url: '/awards-recognitions/' + award_id + '/edit',
            dataType: 'json',
            success: function (data) {
                $('#awardRecognition_id').val(data.id);
                // $('#title').val(data.title);
                // $('#description').val(data.description);
                $('#selectedImage').text(data.image);
                // $('#image').val(data.image);
                $('#img_title').val(data.img_title);
                CKEDITOR.instances['img_description'].setData(data.img_description);
                $('#awardsModalLabel').text('Edit Awards & Recognition');

                //show the image when edit module start
                $('#editAwardImage').attr('src', assetURL + '/' + data.image);
                $('#awardImageDiv').show();
                //show the image when edit module end
                
                $('#saveBtn').hide();
                $('#update_award').show();
                $('#awardsModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $(document).on('click', '#awardsModalClose', function(){
        $('#awardsModal').modal('hide');
    });

    $('#update_award').click(function (e) {
        e.preventDefault();

        var AwardformData = new FormData($('#awardsRecognitionForm')[0]);

        $.ajax({
            data: AwardformData,
            url: "{{ route('awardsRecognitions.update') }}",
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

                        // if (errors.title) {
                        //     $('#title_error').text(errors.title[0]);
                        // } else {
                        //     $('#title_error').text('');
                        // }

                        // if (errors.description) {
                        //     $('#description_error').text(errors.description[0]);
                        // } else {
                        //     $('#description_error').text('');
                        // }

                        if (errors.image) {
                            $('#image_error').text(errors.image[0]);
                        } else {
                            $('#image_error').text('');
                        }

                        if (errors.img_title) {
                            $('#img_title_error').text(errors.img_title[0]);
                        } else {
                            $('#img_title_error').text('');
                        } 
                        
                        if (errors.img_description) {
                            $('#img_description_error').text(errors.img_description[0]);
                        } else {
                            $('#img_description_error').text('');
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

    $(document).on('click', '.deleteAwardBtn', function () {
        var awardId = $(this).data('id');
        
        if (confirm("Are you sure you want to delete this Awards & Recognition ?")) {
            deleteAward(awardId);
        }
    });

    function deleteAward(awardId) {
        $.ajax({
            type: 'DELETE',
            url: '/awards-recognitions/delete/' + awardId,
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

    // Function to open the modal for adding awards
    function openAddModal() {
        $('#awardRecognition_id').val('');
        $('#selectedImage').text('');
        $('#img_title').val('');
        CKEDITOR.instances['img_description'].setData('');
        $('#awardsModalLabel').text('Add Awards & Recognition');
        $('#editAwardImage').attr('src', '');
        $('#awardImageDiv').hide();
        $('#saveBtn').show();
        $('#update_award').hide();
        $('#awardsModal').modal('show');
    }

    $(document).on('click', '#openAwardsModal', function () {
        var action = $(this).data('action');
        
        if (action === 'add') {
            openAddModal();
        }
    });

    $(document).on('click', '#addAwardsButton', function () {
        openAddModal();
    });

    function deleteAllAward() {
        var selectedIds = [];

        // Iterate through each checkbox to find the selected ones
        $('.selectAll:checked').each(function() {
            selectedIds.push($(this).val());
        });

        // Check if any checkboxes are selected
        if (selectedIds.length > 0) {
            if (confirm("Are you sure you want to delete selected rows?")) {
                // Send an AJAX request to delete the selected rows
                $.ajax({
                    type: 'POST',
                    url: 'awards-selected/delete',
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
            var deleteButton = $("#delAwardBtn");

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
