$(document).ready(function(){
    //change status
    $('.assignment_action_class').on('change', function(){
        var selected = $(this).find('option:selected').val();
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/staff-assignment-status-change',
            method: "POST",
            data: {'id':id,'selected':selected},
            success: function(data)
            {
                console.log(data);
                if(data.status == 'success')
                {
                    alert('Assignment Status Changed');
                    window.location.reload();
                }
            }
        });
    });
    //upload assignment
    $('#upload_assignment').click(function(){
        var file = $('#staff_assignment')[0].files;
        if(file[0] == undefined)
        {
            $('#staff_assignment_error').html('Please browse assignment');
            return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('file',file[0]);
        $.ajax({
            url: '/staff-upload-assignment',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success')
                {
                    alert('Assignment Uploaded Successfully');
                    window.location.reload();
                }
            },
            error: function(e)
            {
                alert('Assignment Uploaded Successfully');
                window.location.reload();
            }
        });
    });
    //update profile
    $('#update_staff_profile').click(function(){
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var user_name = $('#user_name').val();
        var mobile = $('#mobile').val();
        var state_id = $('#stateId').find(":selected").val();
        var city_id = $('#cityId').find(":selected").val();
        var biodata = $('#biodata').val();
        var fd = new FormData();
        if(first_name != '')
        fd.append('first_name',first_name);
        if(last_name != '')
        fd.append('last_name',last_name);
        if(user_name != '')
        fd.append('user_name',user_name);
        if(mobile != '')
        fd.append('mobile',mobile);
        if(state_id != '')
        fd.append('state_id',state_id);
        if(city_id != '')
        fd.append('city_id',city_id);
        if(biodata != '')
        fd.append('biodata',biodata);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/staff-edit-profile',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Profile Updated Successfully');
                    window.location.replace('/staff-profile');
                }
            },
            error: function(e){
                alert('Profile Updated Successfully');
                window.location.replace('/staff-profile');
            }
        });
    });
});
