$(document).ready(function(){
    $('#register').click(function(){
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val() ;
        var mobile = $('#mobile').val();
        var qualification = $('#qualification').find(':selected').val();
        var courseId  = $('#course').find(':selected').val();
        var stateId = $('#stateId').find(':selected').val();
        var cityId = $('#cityId').find(':selected').val();
        var checkboxTick = $('input[type="checkbox"]:checked').val();
        var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        $('#first_name_error').html('');
        $('#last_name_error').html('');
        $('#email_error').html('');
        $('#qualification_error').html('');
        $('#course_error').html('');
        $('#stateId_error').html('');
        $('#cityId_error').html('');
        $('#admission_register_checkbox_error').html('');
        if(first_name == '')
        {
            $('#first_name_error').html('Please enter first name');
            return false;
        }
        if(last_name == '')
        {
            $('#last_name_error').html('Please enter last name');
            return false;
        }
        if(email == '')
        {
            $('#email_error').html('Please enter email address');
            return false;
        }
        if(!pattern.test(email))
        {
            $('#email_error').html('Please enter valid email address');
            return false;
        }
        if(mobile == '')
        {
            $('#mobile_error').html('Please enter mobile number');
            return false;
        }
        if(qualification == '')
        {
            $('#qualification_error').html('Please select qualification');
            return false;
        }
        if(courseId == '')
        {
            $('#course_error').html('Please select course');
            return false;
        }
        if(stateId == '')
        {
            $('#stateId_error').html('Please select state');
            return false;
        }
        if(cityId == '')
        {
            $('#cityId_error').html('Please select city');
            return false;
        }
        if(checkboxTick == undefined)
        {
            $('#admission_register_checkbox_error').html('Please agree to the Terms & Conditions and Privacy Policy.');
            return false;
        }
        var fd = new FormData();
        fd.append('first_name',first_name);
        fd.append('last_name',last_name);
        fd.append('email',email);
        fd.append('mobile',mobile);
        fd.append('qualification',qualification);
        fd.append('courseId',courseId);
        fd.append('stateId',stateId);
        fd.append('cityId',cityId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admission-form',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            beforeSend: function(){
                $('.overlay-spinner').removeClass('d-none');
              },
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    $('.overlay-spinner').addClass('d-none');
                    $('#register_message').modal('show');
                    // $('#facultyModal').modal('hide');
                    // window.location.reload();
                    // $('.register-form-block').addClass('d-none');

                    // $('.login-form-block').removeClass('d-none');
                }
                if(data.status == 'error')
                {
                    alert(data.message);
                    window.location.reload();
                }
            }
        });
    });
    $('#admission_login').click(function(){
        var email = $('#admission_email').val();
        var password = $('#password').val();
        var checkboxTick = $('input[type="checkbox"]:checked').val();
        var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        $('#email_login_error').html('');
        $('#password_error').html('');
        $('#admission_login_checkbox_error').html('');
        if(email == '')
        {
            $('#email_login_error').html('Please enter email addredd');
            return false;
        }
        if(!pattern.test(email))
        {
            $('#email_login_error').html('Please enter valid email address');
            return false;
        }
        if(password == '')
        {
            $('#password_error').html('Please enter password');
            return false;
        }
        if(checkboxTick == undefined)
        {
            $('#admission_login_checkbox_error').html('Please agree to "Terms & conditions" and "Privacy Policy" ');
            return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('email',email);
        fd.append('password',password);
        $.ajax({
            url: '/admission-form-login',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success: function(data)
            {
                console.log(data);
                if(data.status == 'success'){
                    window.location.replace('/admission-detail-form');
                }else{
                    $('#incorrect_error').html('You have entered incorrect credentials');
                }
            }
        });
        // return false;
    });
});
