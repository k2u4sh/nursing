$(document).ready(function(){
    $('#delPublicationBtn').hide();
    $('.selectAll').on('change',function() {
        var checkedCheckboxes = [];
        $(".selectAll").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        // var isChecked = $(this).is(':checked');
        if (checkedCheckboxes.length > 0)
        $('#delPublicationBtn').show();
        else
        $('#delPublicationBtn').hide();
    });
    $('#selectAll').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#publication_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
        var checkedCheckboxes = [];
        $(".selectAll").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        // var isChecked = $(this).is(':checked');
        if (checkedCheckboxes.length > 0)
        $('#delPublicationBtn').show();
        else
        $('#delPublicationBtn').hide();
    });
    $('#openPublicationModal').click(function(){
        $('#update_publication').hide();
        $('#publicationModalLabel').html('Add Publication').show();
        $('#insert_publication').html('Add').show();
        $('#p_name').val('');
    });
    $('#publicationModalClose').click(function(){
        $('#publicationModal').modal('hide');
    });
    $('#insert_publication').click(function(){
        var p_name = $('#p_name').val();
        var cover_page = $('#cover_page')[0].files;
        var p_fileName = $('#p_fileName')[0].files;
        isvalid = true;
        $('#p_name_error').html('');
        $('#cover_page_error').html('');
        $('#p_fileName_error').html('');
        if(p_name == '')
        {
            $('#p_name_error').html('Please enter publication name');
            isvalid = false;
        }
        if(cover_page[0] == undefined)
        {
            $('#cover_page_error').html('Please browse cover page');
            isvalid = false;
        }
        if(p_fileName[0] == undefined)
        {
            $('#p_fileName_error').html('Please browse publication file');
            isvalid = false;
        }
        if(isvalid)
        {
            var fd = new FormData();
            fd.append('p_name',p_name);
            fd.append('cover_page',cover_page[0]);
            fd.append('p_fileName',p_fileName[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin-publication',
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    if(response.status == 'success')
                    {
                        alert('Publication created successfully!');
                        // $('#eventModal').modal('hide');
                        window.location.reload();
                    }
                }
            });
        }
    });
    $('#update_publication').click(function(){
        var id = $('#p_id').val();
        var p_name = $('#p_name').val();
        var cover_page = $('#cover_page')[0].files;
        var p_fileName = $('#p_fileName')[0].files;
        isvalid = true;
        $('#p_name_error').html('');
        if(p_name == '')
        {
            $('#p_name_error').html('Please enter publication name');
            isvalid = false;
        }
        if(isvalid)
        {
            var fd = new FormData();
            fd.append('id',id);
            fd.append('p_name',p_name);
            if(cover_page[0] != undefined)
            fd.append('cover_page',cover_page[0]);
            if(p_fileName != undefined)
            fd.append('p_fileName',p_fileName[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin-publication-update',
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    if(response.status == 'success')
                    {
                        alert('Publication updated successfully!');
                        // $('#eventModal').modal('hide');
                        window.location.reload();
                    }
                }
            });
        }
    });
});
function edit_publication(id)
{
    $('#publicationModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-publication-edit',
        data:{'id':id},
        method: 'GET',
        success:function(data){
            if(data.status == 'success')
            {
                $('#p_id').val(data.data['id']);
                $('#publicationModalLabel').html('Update Publication');
                $('#insert_publication').hide();
                $('#update_publication').html('Update').show();
                $('#p_name').val(data.data['p_name']);
            }
        }
    });
}
function delete_publication(id)
{
    if(confirm('Are you sure, you want to delete publication?'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/publication-delete',
            data: {'id':id},
            method:"POST",
            success:function(data){
                if(data.status == 'success')
                {
                    alert('Publication deleted successfully');
                    window.location.reload();
                }
            }
        });
    }
}
function deleteAllPublication()
{
    var deleteAll = [];
    $("input:checkbox[name=selectAll]:checked").each(function(){
    deleteAll.push($(this).val());
    });
    // alert(deleteAll);return false;
    if(deleteAll.length > 0)
    {
        if(confirm("Are you sure to delete all publications?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/publication-delete',
                data: {'id':deleteAll},
                method:"POST",
                success:function(data){
                    if(data.status == 'success')
                    {
                        alert('Publications deleted successfully');
                        window.location.reload();
                    }
                }
            });
        }
    }
}
