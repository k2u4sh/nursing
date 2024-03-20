@include('admin.inner-adminheader')
@include('admin.admin_sidebar')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="mb-4">Strip List</h3>
                <a href="#" type="button" class="btn btn-primary" id="openStripModal" data-toggle="modal" data-target="#stripModal" data-action="add">Add Strip</a>
                <a class="btn btn-danger" onclick="deleteAllStrip()" id="delStripBtn" class="" style="display:none;">Delete</a>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="strip_table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll" /></th>
                                        <th>Strip Name</th>
                                        <th>Strip Count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($strips as $strip)
                                        <tr>
                                            <td><input type="checkbox" class="selectAll selectAllCheckbox" name="selectAll" value="{{$strip->id}}"></td>
                                            <td>{{ ucwords($strip->name ?? '') }}</td>
                                            <td>{{ $strip->count ?? '' }}</td>
                                            <td>
                                                <div class="actions">
                                                    <a href="javascript:void(0);" data-id="{{ $strip->id }}" class="btn btn-sm blue me-2 edit-btn">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" data-id="{{ $strip->id }}" class="btn btn-sm red deleteBtn">
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
<div class="modal fade" id="stripModal" tabindex="-1" role="dialog" aria-labelledby="stripModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="stripModalLabel">Add Strip</h5>
            <button type="button" id="stripModalClose" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="stripForm" name="">
                @csrf
                <input type="hidden" name="strip_id" id="strip_id">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="Enter Strip Name" required>
                        <span id="name_error" class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Count <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="count" id="count" value="" placeholder="Enter count" required>
                        <span id="count_error" style="color:red"></span>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="saveBtn">Add</button>
            <button type="submit" class="btn btn-primary" id="update_strip">Update</button>
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
            data: $('#stripForm').serialize(),
            url: "{{ route('strip.store') }}",
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

                        if (errors.name) {
                            $('#name_error').text(errors.name[0]);
                        } else {
                            $('#name_error').text('');
                        }

                        if (errors.count) {
                            $('#count_error').text(errors.count[0]);
                        } else {
                            $('#count_error').text('');
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
        $('#stripModal').modal('show');
        var strip_id = $(this).data('id');

        $.ajax({
            type: 'GET',
            url: '/strip/' + strip_id + '/edit',
            dataType: 'json',
            success: function (data) {
                $('#strip_id').val(data.id);
                $('#name').val(data.name);
                $('#count').val(data.count);
                $('#stripModalLabel').text('Edit Strip');
                $('#saveBtn').hide();
                $('#update_strip').show();
                $('#stripModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $(document).on('click', '#stripModalClose', function(){
        $('#stripModal').modal('hide');
    });

    $('#update_strip').click(function (e) {
        e.preventDefault();

        $.ajax({
            data: $('#stripForm').serialize(),
            url: "{{ route('strip.update') }}",
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

                        if (errors.name) {
                            $('#name_error').text(errors.name[0]);
                        } else {
                            $('#name_error').text('');
                        }

                        if (errors.count) {
                            $('#count_error').text(errors.count[0]);
                        } else {
                            $('#count_error').text('');
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
        var strip_id = $(this).data('id');
        
        if (confirm("Are you sure you want to delete this strip?")) {
            deleteStrip(strip_id);
        }
    });

    function deleteStrip(strip_id) {
        $.ajax({
            type: 'DELETE',
            url: '/strip-delete/' + strip_id,
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
        $('#stripForm')[0].reset();
        $('#name_error').text('');
        $('#count_error').text('');
        $('#strip_id').val('');
        $('#stripModalLabel').text('Add Strip');
        $('#saveBtn').show();
        $('#update_strip').hide();
        $('#stripModal').modal('show');
    }

    $(document).on('click', '#openStripModal', function () {
        var action = $(this).data('action');
        
        if (action === 'add') {
            openAddModal();
        }
    });

    $(document).on('click', '#addStripButton', function () {
        openAddModal();
    });

    function deleteAllStrip() {
        var selectedIds = [];

        $('.selectAll:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            if (confirm("Are you sure you want to delete selected rows?")) {
                $.ajax({
                    type: 'POST',
                    url: 'strips-selected/delete',
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
            var deleteButton = $("#delStripBtn");

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
