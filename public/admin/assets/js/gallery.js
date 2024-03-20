$(document).ready(function(){
    $('#update_gallery').hide();
    $('#delGalleryBtn').hide();
    $(':checkbox').click(function() {
        $('#delGalleryBtn').show();
    });
    //hide gallery modal
    $('#modalClose').click(function(){
        $('#galleryModal').modal('hide');
    });
    //select all gallery
    // $('#delAllGallery').on('change', function() {
    //     var isChecked = $(this).is(':checked');
    //     $('#gallery_table tbody tr').each(function() {
    //       $(this).find('input[type="checkbox"]').prop('checked', isChecked);
    //     });
    // });
    $('.delAllGallery').on('change',function() {
        var checkedCheckboxes = [];
        $(".delAllGallery").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delGalleryBtn').show();
        else
        $('#delGalleryBtn').hide();
    });
    $('#delAllGallery').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#gallery_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
        var checkedCheckboxes = [];
        $(".delAllGallery").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delGalleryBtn').show();
        else
        $('#delGalleryBtn').hide();
    });

    //open gallery modal
    $('#openNewGalleryModal').click(function(){
        $('#galleryModalLabel').html('Add Gallery');
        $('#update_gallery').hide();
        $('#insert_gallery').html('Add').show();
        $('#img_alt').val('');
        $('#gall_img').empty();
        var htm = '<div class="form-group"><label>Gallery Image</label><input type="file" name="gal_image" accept="image/png, image/gif, image/jpeg, image/jpg" id="gal_image" class="form-control"><span id="gal_image_error" style="color:red"></span></div>';
        $('#gall_img').html(htm);
        $.ajax({
            url: '/admin-get-gallertcat',
            method: "GET",
            data: {'id':'id'},
            success: function(data){
                var ht = '<option value="">Select Category</option>';
                $.each(data.allGalleryCategory, function(i){
                    ht += '<option value="'+data.allGalleryCategory[i]['id']+'">'+data.allGalleryCategory[i]['cat_name']+'</option>';
                });
                $('#gal_cat').html(ht);
            }
        });
    });
    //update gallery
    $('#update_gallery').click(function(){
        var cat_id = $('#gal_cat').val();
        var img_name = $('#gal_image')[0].files;
        var img_alt = $('#img_alt').val();
        var gallry_id = $('#gallry_id').val();
        $('#gal_image_error').html('');
        $('#gal_cat_error').html('');
        if(cat_id == '')
        {
            $('#gal_cat_error').html('Please choose category');
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('cat_id',cat_id);
        fd.append('gallry_id',gallry_id);
        if(img_name[0] != undefined)
        fd.append('img_name',img_name[0]);
        if(img_alt != '')
        fd.append('img_alt',img_alt);
        $.ajax({
            url: '/admin-update-gallery',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Gallery Updated Successfully');
                    window.location.reload();
                }
            }
        });
    });
    $('#insert_gallery').click(function(){
        var cat_id = $('#gal_cat').val();
        var img_name = $('#gal_image')[0].files;
        var img_alt = $('#img_alt').val();
        $('#gal_image_error').html('');
        $('#gal_cat_error').html('');
        if(cat_id == '')
        {
            $('#gal_cat_error').html('Please choose category');
            return false;
        }
        if(img_name[0] == undefined)
        {
            $('#gal_image_error').html('Please browse gallery image');
            return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('cat_id',cat_id);
        fd.append('img_name',img_name[0]);
        if(img_alt != '')
        fd.append('img_alt',img_alt);
        $.ajax({
            url: '/admin-gallery',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Gallery Added Successfully');
                    window.location.reload();
                }
            }
        });
    });
});
function edit_gallery(id)
{
    $('#galleryModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-edit-gallery',
        method: 'GET',
        data: {'id':id},
        success: function(data){
            console.log(data);
            if(data.status == 'success')
            {
                $('#galleryModalLabel').html('Update Gallery');
                $('#insert_gallery').hide();
                $('#gall_img').empty();
                var ht = '<div class="form-group col-md-8"><label>Gallery Image</label><input type="file" name="gal_image" accept="image/png, image/gif, image/jpeg, image/jpg" id="gal_image" class="form-control"></div>';
                    ht += '<div class="form-group col-md-4"><label></label><img src="/upload/gallery/'+data.galleryData['image_name']+'" width="50"></div>';
                $('#gall_img').html(ht);
                $('#update_gallery').html('Update').show();
                $('#img_alt').val(data.galleryData['img_alt']);
                $('#gallry_id').val(id);

                var selected = '';
                var htm = '';
                $.each(data.allGalleryCategory, function (i) {
                    if(data.galleryData['cat_id'] == data.allGalleryCategory[i]['id']){
                    selected = 'selected';
                    }else{
                        selected = '';
                    }
                    htm += '<option value="'+data.allGalleryCategory[i]['id']+'" '+selected+'>'+data.allGalleryCategory[i]['cat_name']+'</option>';

                });
                $('#gal_cat').html(htm);
            }
        }
    });
}
function delete_gallery(id)
{
    if(confirm('Are you sure, you want to delete gallery?'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin-delete-gallery',
            data: {'id':id},
            method:"POST",
            success:function(data){
                if(data.status == 'success')
                {
                    alert('Gallery deleted successfully');
                    window.location.reload();
                }
            }
        });
    }
}
function delAllGallery()
{
    var deleteAll = [];
    $("input:checkbox[name=delAllGallery]:checked").each(function(){
    deleteAll.push($(this).val());
    });
    if(deleteAll.length > 0)
    {
        if(confirm("Are you sure to delete galleries?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin-delete-gallery',
                data: {'id':deleteAll},
                method:"POST",
                success:function(data){
                    if(data.status == 'success')
                    {
                        alert('Galleries deleted successfully');
                        window.location.reload();
                    }
                }
            });
        }
    }
}
