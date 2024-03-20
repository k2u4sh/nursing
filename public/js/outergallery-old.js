$(document).ready(function(){
    //gallery tab
    $('#g-2-tab').click(function(){
        $.ajax({
            url: '/cat-gallery',
            method: 'GET',
            data: {'id':2},
            success: function(data){
                console.log(data);
            }
        });
    });
    //contact us
    $('#send_message').click(function(){
        var fName = $('#first_name').val();
        var lName = $('#last_name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var message = $('#message').val();
        var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        var phoneno = /^(?:\+\d{1,3}\s?)?\d{10}$/;
        $('#first_name_error').html('');
        $('#last_name_error').html('');
        $('#email_error').html('');
        $('#mobile_error').html('');
        $('#message_error').html('');
        if(fName == '')
        {
            $('#first_name_error').html('Please enter first name');
            return false;
        }
        if(lName == '')
        {
            $('#last_name_error').html('Please enter last name');
            return false;
        }
        if(email == '')
        {
            $('#email_error').html('Please enter email address');
            return false;
        }
        if(mobile == '')
        {
            $('#mobile_error').html('Please enter mobile number');
            return false;
        }
        if(!mobile.match(phoneno))
        {
            $('#mobile_error').html('Please enter valid mobile number');
            return false;
        }
        if(!pattern.test(email))
        {
            $('#email_error').html('Please enter valid email address');
            return false;
        }
        if(message == '')
        {
            $('#message_error').html('Please write text');
            return false;
        }
        var fd = new FormData();
        fd.append('first_name',fName);
        fd.append('last_name',lName);
        fd.append('email',email);
        fd.append('mobile',mobile);
        fd.append('message',message);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/contact-us',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                // console.log(data);
                if(data.status == 'success'){
                    alert('Form Submitted Successfully');
                    window.location.replace('/contact-us');
                }
            }
        });
    });
    //enquire now
    $('#enquired_now').click(function(){
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var state = $('#state').find(":selected").val();
        var city  = $('#city').find(":selected").val();
        var course = $('#course').find(":selected").val();
        var specialization = $('#specialization').find(":selected").val();
        $('#first_name_error').html('');
        $('#last_name_error').html('');
        $('#email_error').html('');
        $('#mobile_error').html('');
        var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        var phoneno = /^(?:\+\d{1,3}\s?)?\d{10}$/;
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
        if(!mobile.match(phoneno))
        {
            $('#mobile_error').html('Please enter valid mobile number');
            return false;
        }
        var fd = new FormData();
        fd.append('first_name',fName);
        fd.append('last_name',lName);
        fd.append('email',email);
        fd.append('mobile',mobile);
        fd.append('state',state);
        fd.append('city',city);
        fd.append('course',course);
        fd.append('specialization',specialization);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/enquire-now',
            dataType: "json",
            processData: false,
            cache: false,
            contentType: false,
            data: fd,
            method: "POST",
            success: function (data) {
                console.log(data);
                if (data.status === 'success') {
                    alert('Enquiry Form Submitted Successfully');
                    window.location.replace('/');
                } else {
                    alert('Error submitting the form. Please try again.');
                }
            },
            error: function (e) {
                alert('Error submitting the form. Please try again.');
            }
        });
    });
    $('#state').on('change',function(){
        $('#city').empty();
        var selected = $(this).find('option:selected');
        var id = selected.data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/cities-list',
            data: {'id':id},
            method:"GET",
            success:function(data){
                if(data.status == 'success')
                {
                    console.log(data);
                    $('#city').append('<option value="">Select City</option>');
                    $.each(data.data, function (i) {
                        var htm = '<option value="'+data.data[i]['id']+'">'+data.data[i]['name']+'</option>';
                        $('#city').append(htm);
                    });
                }
            }
        });
    });
});
