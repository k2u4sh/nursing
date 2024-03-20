$(document).ready(function(){

    $('#student_button').click(function(){
        var student_name = $('#student_name').val();
        var student_pass = $('#student_pass').val();
        $('#student_name_error').html('');
        $('#student_pass_error').html('');
        if(student_name == '')
        {
            $('#student_name_error').html('Please enter email address');
            return false;
        }
        if(student_pass == '')
        {
            $('#student_pass_error').html('Please enter password');
            return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/student-login',
            data: {'student_name':student_name,'student_pass':student_pass},
            method: 'post',
            success:function(data){
                console.log(data);
            }
        });
    });
    //update profile
    $('#update_student_profile').click(function(){
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
            url: '/student-edit-profile',
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
                    window.location.replace('/student-profile');
                }
            },
            error: function(e){
                console.log(e);
                return false;
            }
        });
    });
});
