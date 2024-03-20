$(document).ready(function(){
    //Department
    $('#delDepartBtn').hide();
    $('.delAllDept').on('change',function() {
        var checkedCheckboxes = [];
        $(".delAllDept").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delDepartBtn').show();
        else
        $('#delDepartBtn').hide();
    });
    $('#delAllDept').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#department_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
        var checkedCheckboxes = [];
        $(".delAllDept").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delDepartBtn').show();
        else
        $('#delDepartBtn').hide();
    });
    //Course
    $('#delCourseBtn').hide();
    $('.selectAllCourse').on('change',function() {
        var checkedCheckboxes = [];
        $(".selectAllCourse").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delCourseBtn').show();
        else
        $('#delCourseBtn').hide();
    });
    $('#selectAllCourse').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#course_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
        var checkedCheckboxes = [];
        $(".selectAllCourse").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delCourseBtn').show();
        else
        $('#delCourseBtn').hide();
    });
    //Faculty
    $('#delFacultyBtn').hide();
    $('.selectAll').on('change',function() {
        var checkedCheckboxes = [];
        $(".selectAll").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delFacultyBtn').show();
        else
        $('#delFacultyBtn').hide();
    });
    $('#selectAll').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#faculty_table tbody tr').each(function() {
          $(this).find('input[type="checkbox"]').prop('checked', isChecked);
        });
        var checkedCheckboxes = [];
        $(".selectAll").each(function() {
            if ($(this).is(":checked")) {
              checkedCheckboxes.push($(this).val());
            }
        });
        if (checkedCheckboxes.length > 0)
        $('#delFacultyBtn').show();
        else
        $('#delFacultyBtn').hide();
    });
    //semester type
    $('#semester').click(function(){
        $('#appendInput').html('');
        $('#appendAnnualy').html('');
        $('#appendMoreInput').html('');
        $('#appendMoreYear').html('');
        var htm = '<div class="form-group col-md-6"><label>No of Semester  </label><input type="number" name="no_sem" id="no_sem"><a href="javascript:void(0);" onclick="go()" id="go">Go</a></div>';
        $('#appendInput').html(htm);
    });
    //annual type
    $('#annually').click(function(){
        $('#appendInput').html('');
        $('#appendMoreInput').html('');
        var htm = '<div class="form-group col-md-6"><label>No of Year  </label><input type="number" name="no_year" id="no_year"><a href="javascript:void(0);" onclick="goAnnually()" id="go">Go</a></div>';
        $('#appendAnnualy').html(htm);
    });

    //append selected cities
    var st_id = $('#st_id').val();
    var ct_id = $('#ct_id').val();
    if(ct_id != '' && st_id != '')
    {
        $.ajax({
            url: '/city-list',
            method: 'GET',
            data: {'st_id':st_id,'ct_id':ct_id},
            success: function(data)
            {
                console.log(data.cityList['id']);
                var selected = '';
                $.each(data.allCity, function (i) {
                    if(data.cityList['id'] == data.allCity[i]['id']){
                    selected = 'selected';
                    }else{
                        selected = '';
                    }
                    var htm = '<option value="'+data.allCity[i]['id']+'" '+selected+'>'+data.allCity[i]['name']+'</option>';
                    $('#cityId').append(htm);
                });
            }
        });
    }
    //find selected cities
    $('#stateId').on('change',function(){
        $('#cityId').empty();
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
                    $('#cityId').append('<option value="">Select City</option>');
                    $.each(data.data, function (i) {
                        var htm = '<option value="'+data.data[i]['id']+'">'+data.data[i]['name']+'</option>';
                        $('#cityId').append(htm);
                    });
                }
            }
        });
    });
    //update profile
    $('#update_profile').click(function(){
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
            url: '/admin-edit-profile',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                // console.log(data);
                if(data.status == 'success'){
                    alert('Profile Updated Successfully');
                    window.location.replace('/admin-profile');
                }
            }
        });
    });
    //select all faculty
    // $('#selectAll').on('change', function() {
    //     var isChecked = $(this).is(':checked');
    //     $('#faculty_table tbody tr').each(function() {
    //       $(this).find('input[type="checkbox"]').prop('checked', isChecked);
    //     });
    // });
    //select all department
    // $('#delAllDept').on('change', function() {
    //     var isChecked = $(this).is(':checked');
    //     $('#department_table tbody tr').each(function() {
    //       $(this).find('input[type="checkbox"]').prop('checked', isChecked);
    //     });
    // });
    //select all course
    // $('#selectAllCourse').on('change', function() {
    //     var isChecked = $(this).is(':checked');
    //     $('#course_table tbody tr').each(function() {
    //       $(this).find('input[type="checkbox"]').prop('checked', isChecked);
    //     });
    // });
    $('#update_dept').hide();
    $('#update_faculty').hide();
    $('#update_course').hide();

    //open department modal
    $('#openNewModal').click(function(){
        $('#editDepartment').empty();
        var htm = '<div class="form-group col-md-6"><label>Department Contents</label><textarea name="dept_desc" id="dept_desc" rows="3" class="form-control"></textarea></div>'+
                    '<div class="form-group col-md-6"><label>Objectives/Competencies</label><textarea name="obj_comp" id="obj_comp" rows="3" class="form-control"></textarea></div>';
        $('#editDepartment').html(htm);
        CKEDITOR.replace('dept_desc');
        CKEDITOR.replace('obj_comp');
        $('#exampleModalLabel').html('Add Department');
        $('#insert_dept').html('Save Changes').show();
        $('#update_dept').hide();
        $('#dept_name').val('');
        $('#dept_mobile').val('');
        $('#dept_email').val('');
        $('#dept_desc').val('');
        $('#dept_id').val('');
    });
    //open course modal
    $('#openCourseModal').click(function(){
        $('#editCourse').empty();
        $('#insert_course').html('Save Changes').show();
        $('#update_course').hide();
        $('#courseModalLabel').html('Add Course');
        $('#course_name').val('');
        $('#course_fee').val('');
        $('#course_duration').val('');
        $('#adminssion_criteria').val('');
        $('#eligibility').val('');
        $('#course_intake').val('');
        $('#course_id').val('');
        var htm = '<div class="form-group"><label>Course Description</label><textarea name="course_desc" id="course_desc" rows="3" class="form-control"></textarea></div>';
        $('#editCourse').html(htm);
        CKEDITOR.replace('course_desc');
    });
    $('#openFacultyModal').click(function(){
        //clear insert faculty modal
        $('#addEditor').empty();
        $('#addEditor1').empty();
        var htm = '<div class="form-group col-md-6"><label>Faculty Biography</label><textarea name="faculty_desc" id="faculty_desc" class="form-control" rows="3"></textarea></div>'+
                    '<div class="form-group col-md-6"><label>Recent Publications</label><textarea name="recent_publication" id="recent_publication" class="form-control" rows="3"></textarea></div>';
        $('#addEditor').html(htm);
        var htm1 = '<div class="form-group"><label>Conferences, Seminars & Workshops</label><textarea name="conference" id="conference" class="form-control" rows="3"></textarea></div>';
        $('#addEditor1').html(htm1);
        CKEDITOR.replace('faculty_desc');
        CKEDITOR.replace('recent_publication');
        CKEDITOR.replace('conference');
        $('#facultyModalLabel').html('Add Faculty');
        $('#insert_faculty').html('Add').show();
        $('#update_faculty').hide();
        $('#faculty_id').val('');
        $('#faculty_name').val('');
        $('#faculty_designation').val('');
        $('#faculty_expe').val('');
        $('#faculty_phone').val('');
        $('#faculty_email').val('');
        $('#faculty_address').val('');
        $('#faculty_desc').val('');
        $('#sub_expert').val('');
        $('#rewards').val('');
        $('#research_interest').val('');
    });
    $('#modalClose').click(function(){
        $('#exampleModal').modal('hide');
        $('#courseModal').modal('hide');
        $('#contactUsModal').modal('hide');
        $('#enquireNowModal').modal('hide');
    });
    $('#facultyModalClose').click(function(){
        $('#facultyModal').modal('hide');
    });
    $('#insert_dept').click(function(){
        var dept_name = $('#dept_name').val();
        var dept_desc = CKEDITOR.instances['dept_desc'].getData();//$('#dept_desc').val();
        var obj_comp = CKEDITOR.instances['obj_comp'].getData();//$('#obj_comp').val();
        var dept_image = $('#dept_image')[0].files;
        var dept_mobile = $('#dept_mobile').val();
        var dept_email = $('#dept_email').val();
        var url = $('#url').val();
        $('#dept_name_error').html('');
        // $('#dept_desc_error').html('');
        $('#dept_image_error').html('');
        $('#dept_mobile_error').html('');
        $('#dept_email_error').html('');

        var isValid = true;
        if(dept_name == '')
        {
            $('#dept_name_error').html('Please enter Department Name');
            isValid = false;
        }
        // if(dept_desc.trim() === '') {
        //     $('#dept_desc_error').html('Please enter Department Description');
        //     return false;
        // }
        if(dept_mobile == '')
        {
            $('#dept_mobile_error').html('Please enter mobile number');
            isValid = false;
        }
        // Mobile Number
        var numericRegex = /^[0-9]+$/;
        if (dept_mobile.length !== 10) {
            $('#dept_mobile_error').html('Please enter a valid 10-digit mobile number.');
            return false;
        }
        if (!numericRegex.test(dept_mobile)) {
            $('#dept_mobile_error').html('Please enter only numeric characters for the mobile number.');
            return false;
        }

        if(dept_email == '')
        {
            $('#dept_email_error').html('Please enter email address');
            isValid = false;
        }

        if(dept_image[0] == undefined)
        {
            $('#dept_image_error').html('Please browse Department Image');
            isValid = false;
        }
        if(isValid)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var fd = new FormData();
            fd.append('dept_name',dept_name);
            fd.append('dept_image',dept_image[0]);
            fd.append('dept_mobile',dept_mobile);
            fd.append('dept_email',dept_email);
            if(dept_desc != '')
            fd.append('dept_desc',dept_desc);
            if(obj_comp != '')
            fd.append('obj_comp',obj_comp);

            $.ajax({
                url: url,
                dataType: "json",
                processData: false,
                cache : false,
                contentType: false,
                data: fd,
                method:"POST",
                success:function(data){
                    console.log(data);
                    if(data.status == 'success'){
                        alert('Department Added Successfully');
                        $('#exampleModal').modal('hide');
                        window.location.reload();
                    }
                }
            });
        }
    });
    $('#update_dept').click(function(){
        var dept_name = $('#dept_name').val();
        var dept_desc = CKEDITOR.instances['dept_desc'].getData();//$('#dept_desc').val();
        var dept_image = $('#dept_image')[0].files;
        var obj_comp = CKEDITOR.instances['obj_comp'].getData();
        // var obj_comp = $('#obj_comp').val();
        var dept_mobile = $('#dept_mobile').val();
        var dept_email = $('#dept_email').val();
        var dept_id = $('#dept_id').val();
        if(dept_name == '')
        {
            $('#dept_name_error').html('Please enter Department Name');
            return false;
        }
        if(dept_desc == '')
        {
            $('#dept_desc_error').html('Please enter Department Description');
            return false;
        }
        // if(dept_image[0] == undefined)
        // {
        //     $('#dept_image_error').html('Please browse Department Image');
        //     return false;
        // }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('dept_id',dept_id);
        fd.append('dept_name',dept_name);
        if(dept_mobile != '')
        fd.append('dept_mobile',dept_mobile);
        if(dept_email != '')
        fd.append('dept_email',dept_email);
        if(dept_desc != '')
        fd.append('dept_desc',dept_desc);
        if(obj_comp != '')
        fd.append('obj_comp',obj_comp);
        if(dept_image[0] != undefined)
        fd.append('dept_image',dept_image[0]);
        $.ajax({
            url: '/edit-departments',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Department Updated Successfully');
                    $('#exampleModal').modal('hide');
                    window.location.reload();
                }
            }
        });
    });
    $('#update_faculty').click(function(){
        var faculty_name = $('#faculty_name').val();
        var faculty_id = $('#faculty_id').val();
        var faculty_designation = $('#faculty_designation').val();
        var faculty_expe = $('#faculty_expe').val();
        var faculty_phone = $('#faculty_phone').val();
        var faculty_email = $('#faculty_email').val();
        var faculty_address = $('#faculty_address').val();
        // var faculty_desc = $('#faculty_desc').val();
        var faculty_image = $('#faculty_image')[0].files;
        var sub_expert = $('#sub_expert').val();
        var research_interest = $('#research_interest').val();
        var rewards = $('#rewards').val();
        var recent_publication = CKEDITOR.instances['recent_publication'].getData();//$('#recent_publication').val();
        var conference = CKEDITOR.instances['conference'].getData();//$('#conference').val();
        var faculty_desc = CKEDITOR.instances['faculty_desc'].getData();
        $('#faculty_name_error').html('');
        $('#designation_error').html('');
        $('#faculty_phone_error').html('');  // contact validation 
        $('#faculty_expe_error').html('');

        if(faculty_name == '')
        {
            $('#faculty_name_error').html('Please Enter faculty Name');
            return false;
        }
        if(faculty_designation == '')
        {
            $('#designation_error').html('Please Enter Faculty Designation');
            return false;
        }

        // contact validation 
        var numericRegex = /^[0-9]+$/;
        if (faculty_phone.length !== 10) {
            $('#faculty_phone_error').html('Please enter a valid 10-digit contact number.');
            return false;
        }
        if (!numericRegex.test(faculty_phone)) {
            $('#faculty_phone_error').html('Please enter only numeric characters for the phone number.');
            return false;
        }
        if(faculty_expe == '' || faculty_expe == 0)
        {
            $('#faculty_expe_error').html('Please Enter Faculty Experience');
            return false;
        }

        var fd = new FormData();
        fd.append('faculty_id',faculty_id);
        fd.append('faculty_name',faculty_name);
        fd.append('faculty_designation', faculty_designation);
        if(faculty_expe != '')
        fd.append('faculty_expe',faculty_expe);
        if(faculty_phone != '')
        fd.append('faculty_phone',faculty_phone);
        if(faculty_email != '')
        fd.append('faculty_email',faculty_email);
        if(faculty_address != '')
        fd.append('faculty_address',faculty_address);
        if(faculty_desc != '')
        fd.append('faculty_desc',faculty_desc);
        if(faculty_image[0] != undefined)
        fd.append('faculty_image',faculty_image[0]);
        fd.append('sub_expert',sub_expert);
        if(research_interest != '')
        fd.append('research_interest',research_interest);
        if(rewards != '')
        fd.append('rewards',rewards);
        if(recent_publication != '')
        fd.append('recent_publication',recent_publication);
        if(conference != '')
        fd.append('conference',conference);
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url: '/edit-faculty',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Faculty Updated Successfully');
                    $('#facultyModal').modal('hide');
                    window.location.reload();
                }
            }
        });
    });
    //Update Course
    $('#update_course').click(function(){
        var course_id = $('#course_id').val();
        var course_name = $('#course_name').val();
        var course_fee = $('#course_fee').val();
        var course_duration = $('#course_duration').val();
        var adminssion_criteria = $('#adminssion_criteria').val();
        var eligibility = $('#eligibility').val();
        var course_image = $('#course_image')[0].files;
        var course_desc = CKEDITOR.instances['course_desc'].getData();
        var course_intake = $('#course_intake').val();
        var course_type = $('input[name="course_type"]:checked').val();

        $('#course_name_error').html('');
        $('#course_fee_error').html('');
        $('#course_duration_error').html('');
        // $('#course_intake_error').html('');
        $('#course_type_error').html('');

        if(course_name == '')
        {
            $('#course_name_error').html('Please Enter Course Name');
            return false;
        }
        if(course_fee == '')
        {
            $('#course_fee_error').html('Please Enter Course Fee');
            return false;
        }

        if(course_duration == '')
        {
            $('#course_duration_error').html('Please Enter Course duration');
            return false;
        }
        // if(course_intake == '')
        // {
        //     $('#course_intake_error').html('Please Enter Course Intake');
        //     return false;
        // }
        if(typeof course_type === 'undefined')
        {
            $('#course_type_error').html('Please select Course type');
            return false;
        }

        var fd = new FormData();
        fd.append('id',course_id);
        fd.append('course_name',course_name);
        fd.append('course_fee',course_fee);
        if(course_duration != '')
        fd.append('course_duration',course_duration);
        if(adminssion_criteria != '')
        fd.append('adminssion_criteria',adminssion_criteria);
        if(eligibility != '')
        fd.append('eligibility',eligibility);
        if(course_desc != '')
        fd.append('course_desc',course_desc);
        if(course_image[0] != undefined)
        fd.append('course_image',course_image[0]);
        if(course_intake != '')
        fd.append('course_intake',course_intake);

        if(course_type != '')
        fd.append('course_type',course_type);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/edit-course',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Course Updated Successfully');
                    // $('#courseModal').modal('hide');
                    window.location.reload();
                }
            }
        });
    });
    //Add Course
    $('#insert_course').click(function(){
        var course_type = $('input[name="course_type"]:checked').val();
        var sem = $("input[name='sem_fee[]']").map(function(){return $(this).val();}).get();
        var year = $("input[name='year_fee[]']").map(function(){return $(this).val();}).get();
        var course_name = $('#course_name').val();
        var course_fee = $('#course_fee').val();
        var course_duration = $('#course_duration').val();
        var adminssion_criteria = $('#adminssion_criteria').val();
        var eligibility = $('#eligibility').val();
        var course_image = $('#course_image')[0].files;
        var course_desc = CKEDITOR.instances['course_desc'].getData();//$('#course_desc').val();
        var course_intake = $('#course_intake').val();

        $('#course_name_error').html('');
        $('#course_fee_error').html('');
        $('#course_duration_error').html('');
        // $('#course_intake_error').html('');
        $('#course_type_error').html('');
        
        if(course_name == '')
        {
            $('#course_name_error').html('Please Enter Course Name');
            return false;
        }
        if(course_fee == '')
        {
            $('#course_fee_error').html('Please Enter Course Fee');
            return false;
        }

        if(course_duration == '')
        {
            $('#course_duration_error').html('Please Enter Course duration');
            return false;
        }
        // if(course_intake == '')
        // {
        //     $('#course_intake_error').html('Please Enter Course Intake');
        //     return false;
        // }
        if(typeof course_type === 'undefined')
        {
            $('#course_type_error').html('Please select Course type');
            return false;
        }

        var fd = new FormData();
        fd.append('course_name',course_name);
        fd.append('course_fee',course_fee);
        if(course_type != '')
        fd.append('course_type',course_type);
        if(sem != '')
        fd.append('sem',sem);
        if(year != '')
        fd.append('year',year);
        if(course_duration != '')
        fd.append('course_duration',course_duration);
        if(adminssion_criteria != '')
        fd.append('adminssion_criteria',adminssion_criteria);
        if(eligibility != '')
        fd.append('eligibility',eligibility);
        if(course_desc != '')
        fd.append('course_desc',course_desc);
        if(course_image[0] != undefined)
        fd.append('course_image',course_image[0]);
        if(course_intake != '')
        fd.append('course_intake',course_intake);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin-course',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Course Added Successfully');
                    $('#courseModal').modal('hide');
                    window.location.reload();
                }
            }
        });
    });
    //Add faculty
    $('#insert_faculty').click(function(){
        var faculty_name = $('#faculty_name').val();
        var faculty_designation = $('#faculty_designation').val();
        var faculty_expe = $('#faculty_expe').val();
        var faculty_phone = $('#faculty_phone').val();
        var faculty_email = $('#faculty_email').val();
        var faculty_address = $('#faculty_address').val();
        var faculty_desc = CKEDITOR.instances['faculty_desc'].getData();//$('#faculty_desc').val();
        var faculty_image = $('#faculty_image')[0].files;
        var sub_expert = $('#sub_expert').val();
        var research_interest = $('#research_interest').val();
        var rewards = $('#rewards').val();
        var recent_publication = CKEDITOR.instances['recent_publication'].getData();//$('#recent_publication').val();
        var conference = CKEDITOR.instances['conference'].getData();//$('#conference').val();
        $('#faculty_name_error').html('');
        $('#designation_error').html('');
        $('#faculty_expe_error').html('');
        $('#faculty_phone_error').html('');
        // $('#faculty_phone_error').html('');  // contact validation 
        if(faculty_name == '')
        {
            $('#faculty_name_error').html('Please Enter faculty Name');
            return false;
        }
        if(faculty_designation == '')
        {
            $('#designation_error').html('Please Enter Faculty Designation');
            return false;
        }


        if(faculty_expe == '' || faculty_expe == 0)
        {
            $('#faculty_expe_error').html('Please Enter Faculty Experience');
            return false;
        }

        var numericRegex = /^[0-9]+$/;
        if (faculty_phone.length !== 10) {
            $('#faculty_phone_error').html('Please enter a valid 10-digit contact number.');
            return false;
        }
        if (!numericRegex.test(faculty_phone)) {
            $('#faculty_phone_error').html('Please enter only numeric characters for the phone number.');
            return false;
        }

        // contact validation 
        // var numericRegex = /^[0-9]+$/;
        // if (faculty_phone.length !== 10) {
        //     $('#faculty_phone_error').html('Please enter a valid 10-digit contact number.');
        //     return false;
        // }
        // if (!numericRegex.test(faculty_phone)) {
        //     $('#faculty_phone_error').html('Please enter only numeric characters for the phone number.');
        //     return false;
        // }

        var fd = new FormData();
        fd.append('faculty_name',faculty_name);
        fd.append('faculty_designation', faculty_designation);
        if(faculty_expe != '')
        fd.append('faculty_expe',faculty_expe);
        if(faculty_phone != '')
        fd.append('faculty_phone',faculty_phone);
        if(faculty_email != '')
        fd.append('faculty_email',faculty_email);
        if(faculty_address != '')
        fd.append('faculty_address',faculty_address);
        if(faculty_desc != '')
        fd.append('faculty_desc',faculty_desc);
        if(faculty_image[0] != undefined)
        fd.append('faculty_image',faculty_image[0]);
        if(sub_expert != '')
        fd.append('sub_expert',sub_expert);
        if(research_interest != '')
        fd.append('research_interest',research_interest);
        if(rewards != '')
        fd.append('rewards',rewards);
        if(recent_publication != '')
        fd.append('recent_publication',recent_publication);
        if(conference != '')
        fd.append('conference',conference);
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            url: '/admin-faculty',
            dataType: "json",
            processData: false,
            cache : false,
            contentType: false,
            data: fd,
            method:"POST",
            success:function(data){
                console.log(data);
                if(data.status == 'success'){
                    alert('Faculty Added Successfully');
                    $('#facultyModal').modal('hide');
                    window.location.reload();
                }
            }
        });
    });
});
function edit_department(id)
{
    $('#exampleModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/edit-departments',
        data: {'id':id},
        method:"GET",
        success:function(data){
            if(data.status == 'success')
            {
                $('#editDepartment').empty();
                $('#insert_dept').hide();
                $('#exampleModalLabel').html('Update Department');
                $('#dept_name').val(data.data['dept_name']);
                $('#dept_mobile').val(data.data['dept_mobile']);
                $('#dept_email').val(data.data['dept_email']);
                var htm = '<div class="form-group col-md-6"><label>Department Contents</label><textarea name="dept_desc" id="dept_desc" rows="3" class="form-control">'+data.data['dept_contents']+'</textarea></div>'+
                    '<div class="form-group col-md-6"><label>Objectives/Competencies</label><textarea name="obj_comp" id="obj_comp" rows="3" class="form-control">'+data.data['obj_comp']+'</textarea></div>';
                $('#editDepartment').html(htm);
                $('#dept_id').val(id);
                $('#update_dept').html('Update').show();
                CKEDITOR.replace('dept_desc');
                CKEDITOR.replace('obj_comp');
            }
        }
    });

}
function open_Form_detail(id)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-contact-us-detail',
        method: "GET",
        data: {'id':id},
        success: function(data)
        {
            if(data.status == 'success')
            {
                var message = data.data.message ? data.data.message : 'Not available';
                var course = data.data.course ? data.data.course : 'Not available';
                var specialization = data.data.specialization ? data.data.specialization : 'Not available';
                
                var htm = '<div class="row"><div class="form-group">Name: '+data.data['first_name']+' '+data.data['last_name']+'</div></div>';
                htm += '<div class="row"><div class="form-group">Email: '+data.data['email']+'</div></div>';
                htm += '<div class="row"><div class="form-group">Mobile: '+data.data['mobile']+'</div></div>';
                htm += '<div class="row"><div class="form-group">Message: '+message+'</div></div>';
                htm += '<div class="row"><div class="form-group">Course: '+course+'</div></div>';
                htm += '<div class="row"><div class="form-group">Specialization: '+specialization+'</div></div>';

                $('#appendDetail').html(htm);
                $('#contactUsModal').modal('show');

            }
        }
    });
}
function open_EnquireForm_detail(id)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/admin-enquire-now-detail',
        method: "GET",
        data: {'id':id},
        success: function(data)
        {
            if(data.status == 'success')
            {
                var specialization = data.data.specialization ? data.data.specialization : 'Not available';

                var htm = '<div class="row"><div class="form-group">Name: '+data.data['first_name']+' '+data.data['last_name']+'</div></div>';
                htm += '<div class="row"><div class="form-group">Email: '+data.data['email']+'</div></div>';
                htm += '<div class="row"><div class="form-group">Mobile: '+data.data['mobile']+'</div></div>';
                htm += '<div class="row"><div class="form-group">State: '+data.state+'</div></div>';
                htm += '<div class="row"><div class="form-group">City: '+data.city+'</div></div>';
                htm += '<div class="row"><div class="form-group">Course: '+data.course+'</div></div>';
                htm += '<div class="row"><div class="form-group">Specialization: '+specialization+'</div></div>';
                $('#appendEnquireDetail').html(htm);

                $('#enquireNowModal').modal('show');

            }
        }
    });
}
function delete_department(id)
{
    if(confirm('Are you sure, you want to delete department?'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/delete-departments',
            data: {'id':id},
            method:"POST",
            success:function(data){
                if(data.status == 'success')
                {
                    alert('Department deleted successfully');
                    window.location.reload();
                }
            }
        });
    }
}
function edit_faculty(id)
{
    $('#facultyModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/edit-faculty',
        data:{'id':id},
        method: 'GET',
        success:function(data){
            if(data.status == 'success')
            {
                $('#addEditor').empty();
                $('#addEditor1').empty();
                $('#insert_faculty').hide();
                $('#facultyModalLabel').html('Update Faculty');
                $('#faculty_name').val(data.data['faculty_name']);
                $('#faculty_designation').val(data.data['designation']);
                $('#faculty_expe').val(data.data['experience']);
                $('#faculty_phone').val(data.data['faculty_phone']);
                $('#faculty_email').val(data.data['faculty_email']);
                $('#faculty_address').val(data.data['faculty_address']);
                // $('#faculty_desc').val(data.data['faculty_contents']);
                // $('#addEditor').html('<textarea id="abc"></textarea>');
                // $('#recent_publication').val(data.data['recent_publication']);
                // $('#conference').val(data.data['conference']);
                $('#sub_expert').val(data.data['sub_expert']);
                $('#research_interest').val(data.data['research_interest']);
                $('#rewards').val(data.data['rewards']);
                $('#faculty_id').val(id);
                $('#update_faculty').html('Update').show();
                var htm = '<div class="form-group col-md-6"><label>Faculty Biography</label><textarea name="faculty_desc" id="faculty_desc" class="form-control" rows="3">'+data.data['faculty_contents']+'</textarea></div>'+
                '<div class="form-group col-md-6"><label>Recent Publications</label><textarea name="recent_publication" id="recent_publication" class="form-control" rows="3">'+data.data['recent_publication']+'</textarea></div>';
                $('#addEditor').html(htm);
                var htm1 = '<div class="form-group"><label>Conferences, Seminars & Workshops</label><textarea name="conference" id="conference" class="form-control" rows="3">'+data.data['conference']+'</textarea></div>';
                $('#addEditor1').html(htm1);
                CKEDITOR.replace('faculty_desc');
                CKEDITOR.replace('recent_publication');
                CKEDITOR.replace('conference');
            }
        }
    });
}
function delete_faculty(id)
{
    if(confirm('Are you sure, you want to delete faculty?'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/delete-faculty',
            data: {'id':id},
            method:"POST",
            success:function(data){
                if(data.status == 'success')
                {
                    alert('Faculty deleted successfully');
                    window.location.reload();
                }
            }
        });
    }
}
function delAllDept()
{
    var deleteAll = [];
    $("input:checkbox[name=delAllDept]:checked").each(function(){
    deleteAll.push($(this).val());
    });
    if(deleteAll.length > 0)
    {
        if(confirm("Are you sure to delete departments?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/delete-departments',
                data: {'id':deleteAll},
                method:"POST",
                success:function(data){
                    if(data.status == 'success')
                    {
                        alert('Department deleted successfully');
                        window.location.reload();
                    }
                }
            });
        }
    }
}
function deleteAllData()
{
    var deleteAll = [];
    $("input:checkbox[name=selectAll]:checked").each(function(){
    deleteAll.push($(this).val());
    });
    if(deleteAll.length > 0)
    {
        if(confirm("Are you sure to delete faculties?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/delete-faculty',
                data: {'id':deleteAll},
                method:"POST",
                success:function(data){
                    if(data.status == 'success')
                    {
                        alert('Faculty deleted successfully');
                        window.location.reload();
                    }
                }
            });
        }
    }

}
function edit_course(id)
{
    $('#courseModal').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/edit-course',
        data:{'id':id},
        method: 'GET',
        success:function(data){
            // console.log(data);
            if(data.status == 'success')
            {
                $('#editCourse').empty();
                $('#insert_course').hide();
                $('#update_course').html('Update').show();
                $('#courseModalLabel').html('Update Course');
                $('#course_name').val(data.data['course_name']);
                $('#course_fee').val(data.data['course_fee']);
                $('#course_duration').val(data.data['duration']);
                $('#adminssion_criteria').val(data.data['adminssion_criteria']);
                $('#eligibility').val(data.data['eligibility']);
                $('#course_intake').val(data.data['course_intake']);
                $('#course_id').val(data.data['id']);
                var htm = '<div class="form-group"><label>Course Description</label><textarea name="course_desc" id="course_desc" rows="3" class="form-control">'+data.data['course_desc']+'</textarea></div>';
                $('#editCourse').html(htm);
                CKEDITOR.replace('course_desc');

                // for radio btn
                if (data.data['course_type'] == 'semester') {
                    $('#semester').prop('checked', true);
                } else if (data.data['course_type'] == 'annually') {
                    $('#annually').prop('checked', true);
                }
            }
        }
    });
}
function delete_course(id)
{
    if(confirm('Are you sure to delete courses?'))
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/delete-course',
            data: {'id':id},
            method:"POST",
            success:function(data){
                if(data.status == 'success')
                {
                    alert('Course deleted successfully');
                    window.location.reload();
                }
            }
        });
    }
}
function deleteAllCourseData()
{
    var deleteAll = [];
    $("input:checkbox[name=selectAllCourse]:checked").each(function(){
    deleteAll.push($(this).val());
    });
    if(deleteAll.length > 0)
    {
        if(confirm("Are you sure to delete courses?"))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/delete-course',
                data: {'id':deleteAll},
                method:"POST",
                success:function(data){
                    if(data.status == 'success')
                    {
                        alert('Course deleted successfully');
                        window.location.reload();
                    }
                }
            });
        }
    }
}

function go()
{
    var num = $('#no_sem').val();
    var htm = '';
    for(var i = 1; i<=num; i++)
    {
        htm += '<div class="form-group col-md-6"><label>Semester '+i+' Fee  </label><input class="form-control" type="text" name="sem_fee[]" id="sem_fee_'+i+'"></div>';
    }
    $('#appendMoreInput').html(htm);
}
function goAnnually()
{
    var num = $('#no_year').val();
    var htm = '';
    for(var i = 1; i<=num; i++)
    {
        htm += '<div class="form-group col-md-6"><label>Year '+i+' Fee  </label><input class="form-control" type="text" name="year_fee[]" id="year_fee_'+i+'"></div>';
    }
    $('#appendMoreYear').html(htm);
}
function validateMobile()
{
    var mobile = $('#mobile').val();
    var phoneno = /^(?:\+\d{1,3}\s?)?\d{10}$/;
    $('#mobile_error').html('');
    if(!mobile.match(phoneno))
    {
        $('#mobile_error').html('Please enter valid mobile number');
        return false;
    }
}
