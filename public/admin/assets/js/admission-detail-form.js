$(document).ready(function(){
    $('#personal_info').removeClass('next-btn');
    // $('#dob').val('');
    // $('#pi').serialize();
    $('#personal_info').click(function(){
        let isValid = true;
        var full_name = $('#full_name').val();
        var dob = $('#dob').val();
        var mother_tongue = $('#mother_tongue').find(':selected').val();
        var gender = $('#gender').find(':selected').val();
        var nationality = $('#nationality').find(':selected').val();
        var religion = $('#religion').find(':selected').val();
        var caste = $('#caste').find(':selected').val();
        var adhaar_card = $('#adhaar_card').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();
        var state_id = $('#state_id').find(':selected').val();
        var city_id = $('#city_id').find(':selected').val();
        var photo = $('#uploadFile')[0].files;
        var phoneno = /^(?:\+\d{1,3}\s?)?\d{10}$/;
        var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        $('#full_name_error').html('');
        $('#dob_error').html('');
        $('#mother_tongue_error').html('');
        $('#gender_error').html('');
        $('#nationality_error').html('');
        $('#religion_error').html('');
        $('#caste_error').html('');
        $('#adhaar_card_error').html('');
        $('#phone_error').html('');
        $('#email_error').html('');
        $('#address1_error').html('');
        $('#address2_error').html('');
        $('#state_id_error').html('');
        $('#city_id_error').html('');
        $('#uploadFile_error').html('');
        if(full_name == '')
        {
            $('#full_name_error').html('Please Enter Full Name');
            isValid = false;
        }
        if(dob == '')
        {
            $('#dob_error').html('Please Enter Date of Birth');
            isValid = false;
        }
        if(mother_tongue == '')
        {
            $('#mother_tongue_error').html('Please Select Mother Tongue');
            isValid = false;
        }
        if(gender == '')
        {
            $('#gender_error').html('Please Select Gender');
            isValid = false;
        }
        if(nationality == '')
        {
            $('#nationality_error').html('Please Select Nationality');
            isValid = false;
        }
        if(religion == '')
        {
            $('#religion_error').html('Please Select Religion');
            isValid = false;
        }
        if(caste == '')
        {
            $('#caste_error').html('Please Select Caste');
            isValid = false;
        }
        if(adhaar_card == '')
        {
            $('#adhaar_card_error').html('Please Enter Adhaar Card Number');
            isValid = false;
        }
        if(phone == '')
        {
            $('#phone_error').html('Please Enter Mobile Number');
            isValid = false;
        }
        if(!phone.match(phoneno))
        {
            $('#phone_error').html('Please Enter Valid Mobile Number');
            isValid = false;
        }
        if(email == '')
        {
            $('#email_error').html('Please Enter Email Address');
            isValid = false;
        }
        if(!pattern.test(email))
        {
            $('#email_error').html('Please enter valid email address');
            isValid = false;
        }
        if(address1 == '')
        {
            $('#address1_error').html('Please Enter Address 1');
            isValid = false;
        }
        if(address2 == '')
        {
            $('#address2_error').html('Please Enter Address 2');
            isValid = false;
        }
        if(state_id == '')
        {
            $('#state_id_error').html('Please Select State');
            isValid = false;
        }
        if(city_id == '')
        {
            $('#city_id_error').html('Please Select City');
            isValid = false;
        }
        if(photo[0] == undefined)
        {
            $('#uploadFile_error').html('Please Browse Applicant Photo');
            isValid = false;
        }
        $('#personal_info').addClass('next-btn');
        if(isValid)
        {
            var data = new FormData();
            var formData = $('#pi').serializeArray();
            $.each(formData, function (key, input) {
                data.append(input.name, input.value);
            });
            data.append("uploadFile", photo[0]);
            console.log(data);
            $.ajax({
                url: '/personal-info',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    $('.nav-item > .nav-link.active').parent('.nav-item').next('li').find('button').trigger('click');
                }
            });
            // $('.nav-item > .nav-link.active').parent('.nav-item').next('li').find('button').trigger('click');
            // $('#g-2-tab').prop('disabled',false);
        }
        // console.log($('#pi').serializeArray());
    });
    $('#personal_infor').click(function(){
        let isValid = true;
        var full_name = $('#full_name').val();
        var dob = $('#dob').val();
        var mother_tongue = $('#mother_tongue').find(':selected').val();
        var gender = $('#gender').find(':selected').val();
        var nationality = $('#nationality').find(':selected').val();
        var religion = $('#religion').find(':selected').val();
        var caste = $('#caste').find(':selected').val();
        var adhaar_card = $('#adhaar_card').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();
        var state_id = $('#state_id').find(':selected').val();
        var city_id = $('#city_id').find(':selected').val();
        var photo = $('#uploadFile')[0].files;
        // var phoneno = /^(?:\+\d{1,3}\s?)?\d{10}$/;
        // var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        // $('#full_name_error').html('');
        // $('#dob_error').html('');
        // $('#mother_tongue_error').html('');
        // $('#gender_error').html('');
        // $('#nationality_error').html('');
        // $('#religion_error').html('');
        // $('#caste_error').html('');
        // $('#adhaar_card_error').html('');
        // $('#phone_error').html('');
        // $('#email_error').html('');
        // $('#address1_error').html('');
        // $('#address2_error').html('');
        // $('#state_id_error').html('');
        // $('#city_id_error').html('');
        // $('#uploadFile_error').html('');
        // if(full_name == '')
        // {
        //     $('#full_name_error').html('Please enter full name');
        //     isValid = false;
        // }
        // if(dob == '')
        // {
        //     $('#dob_error').html('Please Enter Date of Birth');
        //     isValid = false;
        // }
        // if(mother_tongue == '')
        // {
        //     $('#mother_tongue_error').html('Please Select Mother Tongue');
        //     isValid = false;
        // }
        // if(gender == '')
        // {
        //     $('#gender_error').html('Please Select Gender');
        //     isValid = false;
        // }
        // if(nationality == '')
        // {
        //     $('#nationality_error').html('Please Select Nationality');
        //     isValid = false;
        // }
        // if(religion == '')
        // {
        //     $('#religion_error').html('Please Select Religion');
        //     isValid = false;
        // }
        // if(caste == '')
        // {
        //     $('#caste_error').html('Please Select Caste');
        //     isValid = false;
        // }
        // if(adhaar_card == '')
        // {
        //     $('#adhaar_card_error').html('Please Enter Adhaar Card Number');
        //     isValid = false;
        // }
        // if(phone == '')
        // {
        //     $('#phone_error').html('Please Enter Mobile Number');
        //     isValid = false;
        // }
        // if(!phone.match(phoneno))
        // {
        //     $('#phone_error').html('Please Enter Valid Mobile Number');
        //     isValid = false;
        // }
        // if(email == '')
        // {
        //     $('#email_error').html('Please Enter Email Address');
        //     isValid = false;
        // }
        // if(!pattern.test(email))
        // {
        //     $('#email_error').html('Please enter valid email address');
        //     isValid = false;
        // }
        // if(address1 == '')
        // {
        //     $('#address1_error').html('Please Enter Address 1');
        //     isValid = false;
        // }
        // if(address2 == '')
        // {
        //     $('#address2_error').html('Please Enter Address 2');
        //     isValid = false;
        // }
        // if(state_id == '')
        // {
        //     $('#state_id_error').html('Please Select State');
        //     isValid = false;
        // }
        // if(city_id == '')
        // {
        //     $('#city_id_error').html('Please Select City');
        //     isValid = false;
        // }
        // if(photo[0] == undefined)
        // {
        //     $('#uploadFile_error').html('Please Browse Applicant Photo');
        //     isValid = false;
        // }
        // $('#personal_info').addClass('next-btn');
        if(isValid)
        {
            var formData = {
                full_name: full_name,
                dob: dob,
                mother_tongue: mother_tongue,
                gender: gender,
                nationality: nationality,
                religion: religion,
                caste: caste,
                adhaar_card: adhaar_card,
                phone: phone,
                email: email,
                address1: address1,
                address2: address2,
                state_id: state_id,
                city_id: city_id,
                photo: photo
            };
            var jsonData = JSON.stringify(formData);
            var now = new Date();
            var time = now.getTime();
            var expireTime = time + 1000*36000;
            now.setTime(expireTime);
            document.cookie = 'PersonalInformation=' + jsonData + '; expires='+now.toUTCString()+'; path=/';
            alert('Personal information is saved successfully');
        }
    });
    $('#10th_register_no').on('keyup',function(){
        var register_no_10th = $('#10th_register_no').val();
        if(register_no_10th.length > 10){
            $('#10th_register_no_error').html('Please enter correct registration number');
        }else{
            $('#10th_register_no_error').html('');
        }
    });
    $('#12th_register_no').on('keyup',function(){
        var register_no_12th = $('#12th_register_no').val();
        if(register_no_12th.length > 12){
            $('#12th_register_no_error').html('Please enter correct registration number');
        }else{
            $('#12th_register_no_error').html('');
        }
    });
    $('#10th_yr_pass').each(function () {
        var currentYear = new Date().getFullYear();
        $(this).datepicker({
            autoclose: true,
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years",
            startDate: '1950',
            endDate: currentYear.toString()
        });
        $(this).datepicker('clearDates');
    });
    $('#12th_yr_pass').each(function () {
        var currentYear = new Date().getFullYear();
        $(this).datepicker({
            autoclose: true,
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years",
            startDate: '1950',
            endDate: currentYear.toString()
        });
        $(this).datepicker('clearDates');
    });
    $('#edicational_background').click(function(){
        var qualification_10th = $('#10th_qualification').val();
        var register_no_10th = $('#10th_register_no').val();
        var yr_pass_10th = $('#10th_yr_pass').val();
        var university_10th = $('#10th_university').val();
        var college_10th = $('#10th_college').val();
        var grade_10th = $('#10th_grade').val();
        var qualification_12th = $('#12th_qualification').val();
        var register_no_12th = $('#12th_register_no').val();
        var yr_pass_12th = $('#12th_yr_pass').val();
        var university_12th = $('#12th_university').val();
        var college_12th = $('#12th_college').val();
        var grade_12th = $('#12th_grade').val();
        var physics = $('#physics').val();
        var chemistry = $('#chemistry').val();
        var biology = $('#biology').val();
        var english = $('#english').val();
        var maths = $('#maths').val();
        var other_qualification = $("input[name='qualification_others[]']").map(function(){return $(this).val();}).get();
        var other_register_no = $("input[name='other_register_no[]']").map(function(){return $(this).val();}).get();
        var other_yr_pass = $("input[name='other_yr_pass[]']").map(function(){return $(this).val();}).get();
        var other_university = $("input[name='other_university[]']").map(function(){return $(this).val();}).get();
        var other_college = $("input[name='other_college[]']").map(function(){return $(this).val();}).get();
        var other_grade = $("input[name='other_grade[]']").map(function(){return $(this).val();}).get();
        $('#10th_qualification_error').html('');
        $('#10th_register_no_error').html('');
        $('#10th_yr_pass_error').html('');
        $('#10th_university_error').html('');
        $('#10th_college_error').html('');
        $('#10th_grade_error').html('');
        $('#12th_qualification_error').html('');
        $('#12th_register_no_error').html('');
        $('#12th_yr_pass_error').html('');
        $('#12th_university_error').html('');
        $('#12th_college_error').html('');
        $('#12th_grade_error').html('');
        $('#physics_error').html('');
        $('#chemistry_error').html('');
        $('#biology_error').html('');
        $('#english_error').html('');
        $('#maths_error').html('');
        let isValid = true;
        if(qualification_10th == '')
        {
            $('#10th_qualification_error').html('Please enter 10th standard');
            isValid = false;
        }
        if(register_no_10th == '')
        {
            $('#10th_register_no_error').html('Please enter 10th registration number');
            isValid = false;
        }
        if(yr_pass_10th == '')
        {
            $('#10th_yr_pass_error').html('Please enter 10th year of passing');
            isValid = false;
        }
        if(university_10th == '')
        {
            $('#10th_university_error').html('Please enter 10th university');
            isValid = false;
        }
        if(college_10th == '')
        {
            $('#10th_college_error').html('Enter 10th College/School');
            isValid = false;
        }
        if(grade_10th == '')
        {
            $('#10th_grade_error').html('Please enter 10th grade');
            isValid = false;
        }
        if(qualification_12th == '')
        {
            $('#12th_qualification_error').html('Please enter 12th standard');
            isValid = false;
        }
        if(register_no_12th == '')
        {
            $('#12th_register_no_error').html('Please enter 12th registration number');
            isValid = false;
        }
        if(yr_pass_12th == '')
        {
            $('#12th_yr_pass_error').html('Please enter 12th year of passing');
            isValid = false;
        }
        if(university_12th == '')
        {
            $('#12th_university_error').html('Please enter 12th university');
            isValid = false;
        }
        if(college_12th == '')
        {
            $('#12th_college_error').html('Please enter 12th college');
            isValid = false;
        }
        if(grade_12th == '')
        {
            $('#12th_grade_error').html('Please enter 12th grade');
            isValid = false;
        }
        if(physics == '')
        {
            $('#physics_error').html('Please enter physics marks');
            isValid = false;
        }
        if(chemistry == '')
        {
            $('#chemistry_error').html('Please enter chemistry marks');
            isValid = false;
        }
        if(biology == '')
        {
            $('#biology_error').html('Please enter biology marks');
            isValid = false;
        }
        if(english == '')
        {
            $('#english_error').html('Please enter english marks');
            isValid = false;
        }
        if(maths == '')
        {
            $('#maths_error').html('Please enter maths marks');
            isValid = false;
        }
        if(isValid)
        {
            var data = new FormData();
            var formData = $('#eb').serializeArray();
            $.each(formData, function (key, input) {
                data.append(input.name, input.value);
            });
            data.append('qualification_10th',qualification_10th);
            data.append('qualification_12th',qualification_12th);
            $.ajax({
                url: '/educational-background',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    $('.nav-item > .nav-link.active').parent('.nav-item').next('li').find('button').trigger('click');
                }
            });
        }
    });
    $('#edicational_background_save').click(function(){
        var qualification_10th = $('#10th_qualification').val();
        var register_no_10th = $('#10th_register_no').val();
        var yr_pass_10th = $('#10th_yr_pass').val();
        var university_10th = $('#10th_university').val();
        var college_10th = $('#10th_college').val();
        var grade_10th = $('#10th_grade').val();
        var qualification_12th = $('#12th_qualification').val();
        var register_no_12th = $('#12th_register_no').val();
        var yr_pass_12th = $('#12th_yr_pass').val();
        var university_12th = $('#12th_university').val();
        var college_12th = $('#12th_college').val();
        var grade_12th = $('#12th_grade').val();
        var physics = $('#physics').val();
        var chemistry = $('#chemistry').val();
        var biology = $('#biology').val();
        var english = $('#english').val();
        var maths = $('#maths').val();
        var other_qualification = $("input[name='qualification_others[]']").map(function(){return $(this).val();}).get();
        var other_register_no = $("input[name='other_register_no[]']").map(function(){return $(this).val();}).get();
        var other_yr_pass = $("input[name='other_yr_pass[]']").map(function(){return $(this).val();}).get();
        var other_university = $("input[name='other_university[]']").map(function(){return $(this).val();}).get();
        var other_college = $("input[name='other_college[]']").map(function(){return $(this).val();}).get();
        var other_grade = $("input[name='other_grade[]']").map(function(){return $(this).val();}).get();
        var formDataEducataion = {
            qualification_10th: qualification_10th,
            register_no_10th: register_no_10th,
            yr_pass_10th: yr_pass_10th,
            university_10th: university_10th,
            college_10th: college_10th,
            grade_10th: grade_10th,
            qualification_12th: qualification_12th,
            register_no_12th: register_no_12th,
            yr_pass_12th: yr_pass_12th,
            university_12th: university_12th,
            college_12th: college_12th,
            grade_12th: grade_12th,
            physics: physics,
            chemistry: chemistry,
            biology: biology,
            english: english,
            maths: maths,
            other_qualification: other_qualification,
            other_register_no: other_register_no,
            other_yr_pass: other_yr_pass,
            other_university: other_university,
            other_college: other_college,
            other_grade: other_grade
        };
        var jsonData = JSON.stringify(formDataEducataion);
        var now = new Date();
        var time = now.getTime();
        var expireTime = time + 1000*36000;
        now.setTime(expireTime);
        document.cookie = 'EducationalBackground=' + jsonData + '; expires='+now.toUTCString()+'; path=/';
        alert('Educational Background is saved successfully');
    });
    $('#edicational_background_save').click(function(){
        var qualification_10th = $('#10th_qualification').val();
        var register_no_10th = $('#10th_register_no').val();
        var yr_pass_10th = $('#10th_yr_pass').val();
        var university_10th = $('#10th_university').val();
        var college_10th = $('#10th_college').val();
        var grade_10th = $('#10th_grade').val();
        var qualification_12th = $('#12th_qualification').val();
        var register_no_12th = $('#12th_register_no').val();
        var yr_pass_12th = $('#12th_yr_pass').val();
        var university_12th = $('#12th_university').val();
        var college_12th = $('#12th_college').val();
        var grade_12th = $('#12th_grade').val();
        var physics = $('#physics').val();
        var chemistry = $('#chemistry').val();
        var biology = $('#biology').val();
        var english = $('#english').val();
        var maths = $('#maths').val();
        var other_qualification = $("input[name='qualification_others[]']").map(function(){return $(this).val();}).get();
        var other_register_no = $("input[name='other_register_no[]']").map(function(){return $(this).val();}).get();
        var other_yr_pass = $("input[name='other_yr_pass[]']").map(function(){return $(this).val();}).get();
        var other_university = $("input[name='other_university[]']").map(function(){return $(this).val();}).get();
        var other_college = $("input[name='other_college[]']").map(function(){return $(this).val();}).get();
        var other_grade = $("input[name='other_grade[]']").map(function(){return $(this).val();}).get();
        $('#10th_qualification_error').html('');
        $('#10th_register_no_error').html('');
        $('#10th_yr_pass_error').html('');
        $('#10th_university_error').html('');
        $('#10th_college_error').html('');
        $('#10th_grade_error').html('');
        $('#12th_qualification_error').html('');
        $('#12th_register_no_error').html('');
        $('#12th_yr_pass_error').html('');
        $('#12th_university_error').html('');
        $('#12th_college_error').html('');
        $('#12th_grade_error').html('');
        $('#physics_error').html('');
        $('#chemistry_error').html('');
        $('#biology_error').html('');
        $('#english_error').html('');
        $('#maths_error').html('');
        let isValid = true;
        if(qualification_10th == '')
        {
            $('#10th_qualification_error').html('Please enter 10th standard');
            isValid = false;
        }
        if(register_no_10th == '')
        {
            $('#10th_register_no_error').html('Please enter 10th registration number');
            isValid = false;
        }
        if(yr_pass_10th == '')
        {
            $('#10th_yr_pass_error').html('Please enter 10th year of passing');
            isValid = false;
        }
        if(university_10th == '')
        {
            $('#10th_university_error').html('Please enter 10th university');
            isValid = false;
        }
        if(college_10th == '')
        {
            $('#10th_college_error').html('Please enter 10th college');
            isValid = false;
        }
        if(grade_10th == '')
        {
            $('#10th_grade_error').html('Please enter 10th grade');
            isValid = false;
        }
        if(qualification_12th == '')
        {
            $('#12th_qualification_error').html('Please enter 12th standard');
            isValid = false;
        }
        if(register_no_12th == '')
        {
            $('#12th_register_no_error').html('Please enter 12th registration number');
            isValid = false;
        }
        if(yr_pass_12th == '')
        {
            $('#12th_yr_pass_error').html('Please enter 12th year of passing');
            isValid = false;
        }
        if(university_12th == '')
        {
            $('#12th_university_error').html('Please enter 12th university');
            isValid = false;
        }
        if(college_12th == '')
        {
            $('#12th_college_error').html('Please enter 12th college');
            isValid = false;
        }
        if(grade_12th == '')
        {
            $('#12th_grade_error').html('Please enter 12th grade');
            isValid = false;
        }
        if(physics == '')
        {
            $('#physics_error').html('Please enter physics Marks');
            isValid = false;
        }
        if(chemistry == '')
        {
            $('#chemistry_error').html('Please enter chemistry marks');
            isValid = false;
        }
        if(biology == '')
        {
            $('#biology_error').html('Please enter biology marks');
            isValid = false;
        }
        if(english == '')
        {
            $('#english_error').html('Please enter english marks');
            isValid = false;
        }
        if(maths == '')
        {
            $('#maths_error').html('Please enter maths marks');
            isValid = false;
        }
        if(isValid)
        {
            var formData = {
                qualification_10th: qualification_10th,
                register_no_10th: register_no_10th,
                yr_pass_10th: yr_pass_10th,
                university_10th: university_10th,
                college_10th: college_10th,
                grade_10th: grade_10th,
                qualification_12th: qualification_12th,
                register_no_12th: register_no_12th,
                yr_pass_12th: yr_pass_12th,
                university_12th: university_12th,
                college_12th: college_12th,
                grade_12th: grade_12th,
                physics: physics,
                chemistry: chemistry,
                biology: biology,
                english: english,
                maths: maths,
                other_qualification: other_qualification,
                other_register_no: other_register_no,
                other_yr_pass: other_yr_pass,
                other_university: other_university,
                other_college: other_college,
                other_grade: other_grade
            };
            var jsonData = JSON.stringify(formData);
            var now = new Date();
            var time = now.getTime();
            var expireTime = time + 1000*36000;
            now.setTime(expireTime);
            document.cookie = 'EducationalBackground=' + jsonData + '; expires='+now.toUTCString()+'; path=/';
            alert('Educational Background is saved successfully');
        }
    });
    $('#work_experience').click(function(){
        var previous_compnay = $('#previous_compnay').val();
        var previous_designation = $('#previous_designation').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var number_of_month = $('#number_of_month').val();
        var job_description = $('#job_description').val();
        var previous_compnay_others = $('#previous_compnay_others').val();
        var previous_designation_others = $('#previous_designation_others').val();
        var from_date_other = $('#from_date_other').val();
        var to_date_other = $('#to_date_other').val();
        var number_of_month_other = $('#number_of_month_other').val();
        var job_description_other = $('#job_description_other').val();
        isValid = true;
        if(previous_compnay == '')
        {
            $('#previous_compnay_error').html("Please enter previous company name");
            isValid = false;
        }
        if(previous_designation == '')
        {
            $('#previous_designation_error').html('Please enter previous designation');
            isValid = false;
        }
        if(from_date == '')
        {
            $('#from_date_error').html('Please choose from date');
            isValid = false;
        }
        if(to_date == '')
        {
            $('#to_date_error').html('Please choose to date');
            isValid = false;
        }
        if(number_of_month == '')
        {
            $('#number_of_month_error').html('Please enter number of months');
            isValid = false;
        }
        if(job_description == '')
        {
            $('#job_description_error').html('Please enter job description');
            isValid = false;
        }
        if(previous_compnay_others == '')
        {
            $('#previous_compnay_others_error').html('Please enter other previous company name');
            isValid = false;
        }
        if(previous_designation_others == '')
        {
            $('#previous_designation_others_error').html('Please enter other previous designation');
            isValid = false;
        }
        if(from_date_other == '')
        {
            $('#from_date_other_error').html('Please choose other from date');
            isValid = false;
        }
        if(to_date_other == '')
        {
            $('#to_date_other_error').html('Please choose other to date');
            isValid = false;
        }
        if(number_of_month_other == '')
        {
            $('#number_of_month_other_error').html('Please enter other number of months');
            isValid = false;
        }
        if(job_description_other == '')
        {
            $('#job_description_other_error').html('Please enter other job description');
            isValid = false;
        }
        if(isValid)
        {
            var data = new FormData();
            var formData = $('#we').serializeArray();
            $.each(formData, function (key, input) {
                data.append(input.name, input.value);
            });
            $.ajax({
                url: '/work-experience',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    $('.nav-item > .nav-link.active').parent('.nav-item').next('li').find('button').trigger('click');
                }
            });
        }
    });
    $('#contact_detail').click(function(){
        var father_name = $('#father_name').val();
        var edu_qualification = $('#edu_qualification').val();
        var father_occupation = $('#father_occupation').val();
        var father_company = $('#father_company').val();
        var father_designation = $('#father_designation').val();
        var father_address = $('#father_address').val();
        var father_email = $('#father_email').val();
        var father_phone = $('#father_phone').val();
        var mother_name = $('#mother_name').val();
        var educ_qualification = $('#educ_qualification').val();
        var mother_occupation = $('#mother_occupation').val();
        var mother_company = $('#mother_company').val();
        var mother_designation = $('#mother_designation').val();
        var mother_address = $('#mother_address').val();
        var mother_email = $('#mother_email').val();
        var mother_phone = $('#mother_phone').val();
        isValid = true;
        $('#father_name_error').html('');
        $('#edu_qualification_error').html('');
        $('#father_occupation_error').html('');
        $('#father_company_error').html('');
        $('#father_designation_error').html('');
        $('#father_address_error').html('');
        $('#father_email_error').html('');
        $('#father_phone_error').html('');
        $('#mother_name_error').html('');
        $('#educ_qualification_error').html('');
        $('#mother_occupation_error').html('');
        $('#mother_company_error').html('');
        $('#mother_designation_error').html('');
        $('#mother_address_error').html('');
        $('#mother_email_error').html('');
        $('#mother_phone_error').html('');
        if(father_name == '')
        {
            $('#father_name_error').html('Please enter father name');
            isValid = false;
        }
        if(edu_qualification == '')
        {
            $('#edu_qualification_error').html('Please enter father qualification');
            isValid = false;
        }
        if(father_occupation == '')
        {
            $('#father_occupation_error').html('Please enter father occupation');
            isValid = false;
        }
        if(father_company == '')
        {
            $('#father_company_error').html('Please enter father company name');
            isValid = false;
        }
        if(father_designation == '')
        {
            $('#father_designation_error').html('Please enter father designation');
            isValid = false;
        }
        if(father_address == '')
        {
            $('#father_address_error').html('Please enter father address');
            isValid = false;
        }
        if(father_email == '')
        {
            $('#father_email_error').html('Please enter father email address');
            isValid = false;
        }
        if(father_phone == '')
        {
            $('#father_phone_error').html('Please enter father mobile number');
            isValid = false;
        }
        if(mother_name == '')
        {
            $('#mother_name_error').html('Please enter mother name');
            isValid = false;
        }
        if(educ_qualification == '')
        {
            $('#educ_qualification_error').html('Please enter mother qualification');
            isValid = false;
        }
        if(mother_occupation == '')
        {
            $('#mother_occupation_error').html('Please enter mother occupation');
            isValid = false;
        }
        if(mother_company == '')
        {
            $('#mother_company_error').html('Please enter mother company name');
            isValid = false;
        }
        if(mother_designation == '')
        {
            $('#mother_designation_error').html('Please enter mother designation');
            isValid = false;
        }
        if(mother_address == '')
        {
            $('#mother_address_error').html('Please enter mother address');
            isValid = false;
        }
        if(mother_email == '')
        {
            $('#mother_email_error').html('Please enter mother email address');
            isValid = false;
        }
        if(mother_phone == '')
        {
            $('#mother_phone_error').html('Please enter mother mobile number');
            isValid = false;
        }
        if(isValid)
        {
            var data = new FormData();
            var formData = $('#cd').serializeArray();
            $.each(formData, function (key, input) {
                data.append(input.name, input.value);
            });
            $.ajax({
                url: '/contact-detail',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(response){
                    if(response.status == 'success')
                    {
                        alert('Data submitted successfully');
                        window.location = "/admission-doc";
                    }
                    // console.log(response);
                    // $('.nav-item > .nav-link.active').parent('.nav-item').next('li').find('button').trigger('click');
                }
            });
        }
    });
    $('#submit_doc').click(function(e){
        e.preventDefault();
        // data-bs-dismiss="modal"
        var attachment_type = $('#attachment_type').find(":selected").val();
        var attachment_name = $('#attachement_name').val();
        var fileName = $('#uploadFile')[0].files;
        isValid = true;
        $('#attachment_type_error').html('');
        $('#attachement_name_error').html('');
        $('#uploadFile_err').html('');
        if(attachment_type == '')
        {
            $('#attachment_type_error').html('Please select attachment type');
            isValid = false;
        }
        if(attachment_name == '')
        {
            $('#attachement_name_error').html('Please enter attachment name');
            isValid = false;
        }
        if(fileName[0] == undefined)
        {
            $('#uploadFile_err').html('Please browse file');
            isValid = false;
        }
        if(isValid)
        {
            var fd = new FormData();
            fd.append('attachment_type',attachment_type);
            fd.append('attachment_name',attachment_name);
            fd.append('fileName',fileName[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admission-doc-submit',
                processData: false,
                contentType: false,
                data: fd,
                method:"POST",
                success:function(data){
                    console.log(data);
                    if(data.status == 'success')
                    {
                        var formattedDate = new Date().toLocaleString('en-US', {
                            month: 'short',
                            day: 'numeric',
                            year: 'numeric'
                        });
                        const now = new Date();
                        const currentTime = now.toLocaleString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true });
                        if(data.attachment_type == '10th')
                        {
                            $('#addRow10th').append(`
                            <tr id="delete_${data.id}">                           
                            <td style="width: 20%;">${data.attachment_type}</td>
                            <td style="width: 20%;">${data.fileName}</td>
                            <td style="width: 20%;">${formattedDate}</td>
                            <td style="width: 20%;">${currentTime}</td>
                            <td style="width: 20%;">
                            <div class="actions justify-content-center">
                                <a href="/upload/admission-flow/doc/${data.fileName}" target="_blank" class="btn btn-sm blue  me-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="delete_doc(${data.id})" class="btn btn-sm red">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>
                            </td>
                            </tr>`);
                        }else if(data.attachment_type == '12th')
                        {
                            $('#addRow12th').append(`
                            <tr id="delete_${data.id}">
                            <td>${data.attachment_type}</td>
                            <td>${data.fileName}</td>
                            <td>${formattedDate}</td>
                            <td>${currentTime}</td>
                            <td>
                            <div class="actions justify-content-center">
                                <a href="/upload/admission-flow/doc/${data.fileName}" target="_blank" class="btn btn-sm blue  me-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="delete_doc(${data.id})" class="btn btn-sm red">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>
                            </td>
                            </tr>`);
                        }else if(data.attachment_type == 'Graduation')
                        {
                            $('#addRowGraduation').append(`
                            <tr id="delete_${data.id}">
                            <td>${data.attachment_type}</td>
                            <td>${data.fileName}</td>
                            <td>${formattedDate}</td>
                            <td>${currentTime}</td>
                            <td>
                            <div class="actions justify-content-center">
                                <a href="/upload/admission-flow/doc/${data.fileName}" target="_blank" class="btn btn-sm blue  me-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="delete_doc(${data.id})" class="btn btn-sm red">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>
                            </td>
                            </tr>`);
                        }
                        $('#myForm').trigger("reset");
                        $('#upload_more_attchment').modal('hide');
                    }
                }
            });
        }
    });
    //final submit
    $('#transaction_no').on('keyup',function(){
        $('#transaction_no_error').html('');
        let transaction = $('#transaction_no').val();
        if(transaction.length > 23){
            $('#transaction_no_error').html('Please enter transaction no. below 23 character');
        }
    });
    $('#payment').on('keyup',function(){
        $('#payment_error').html('');
        var payment = $('#payment').val();
        // if(payment < 0)
        // {
        //     $('#payment_error').html('Payment can not be negative');
        // }
        let isnum = /^\d+$/.test(payment);
        if(!isnum)
        {
            $('#payment_error').html('Character and negative amount not allowed');
        }
    });
    $('#final_submit').click(function(){
        var payment = $('#payment').val();
        var transaction_no = $('#transaction_no').val();
        var transaction_date = $('#transaction_date').val();
        var uploadFile = $('#uploadFile')[0].files;
        isValid = true;
        $('#payment_error').html('');
        $('#transaction_no_error').html('');
        $('#transaction_date_error').html('');
        $('#uploadFile_error').html('');
        if(payment == '')
        {
            $('#payment_error').html('Please enter payment');
            isValid = false;
        }
        if(transaction_no == '')
        {
            $('#transaction_no_error').html('Please enter transaction number');
            isValid = false;
        }else if(transaction_no.length > 23){
            $('#transaction_no_error').html('Please enter transaction no. below 23 character');
            isValid = false;
        }
        if(transaction_date == '')
        {
            $('#transaction_date_error').html('Please enter transaction date');
            isValid = false;
        }
        if(uploadFile[0] == undefined)
        {
            $('#uploadFile_error').html('Please browse file');
            isValid = false;
        }
        if(isValid)
        {
            var fd = new FormData();
            fd.append('payment',payment);
            fd.append('transaction_no',transaction_no);
            fd.append('transaction_date',transaction_date);
            fd.append('uploadFile',uploadFile[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/payment-document',
                processData: false,
                contentType: false,
                data: fd,
                method:"POST",
                success: function(data)
                {
                    console.log(data);
                    if(data.status == 'success')
                    {
                        $('#thankyou_message').modal('show');
                    }
                }
            });
        }
    });
    $('#done').click(function(){
        window.location.replace('/');
    });
    //find selected cities
    $('#state_id').on('change',function(){
        $('#city_id').empty();
        var selected = $('#state_id').find('option:selected');
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
                    $('#city_id').append('<option value="">Select City</option>');
                    $.each(data.data, function (i) {
                        var htm = '<option value="'+data.data[i]['id']+'">'+data.data[i]['name']+'</option>';
                        $('#city_id').append(htm);
                    });
                }
            }
        });
    });
});
$(document).ready(function () {
    $("#adhaar_card").on("input", function () {
        checkAdhaarCard();
    });
    $('#phone').on('input',function(){
        checkPhoneNumber();
    });
    $('#email').on('input', function(){
        checkEmail();
    });
    $('#father_email').on('input', function(){
        checkFatherEmail();
    });
    $('#father_phone').on('input',function(){
        checkFatherPhoneNumber();
    });
    $('#mother_email').on('input', function(){
        checkMotherEmail();
    });
    $('#mother_phone').on('input',function(){
        checkMotherPhoneNumber();
    });
    var id = $('#state_id').find(':selected').val();
    if(state_id != '')
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#city_id').empty();
        $.ajax({
            url: '/cities-list',
            data: {'id':id},
            method:"GET",
            success:function(data){
                if(data.status == 'success')
                {
                    console.log(data.sessionData.city_id);
                    var selected = '';
                    $('#city_id').append('<option value="">Select City</option>');
                    $.each(data.data, function (i) {
                        if(data.data[i]['id'] == data.sessionData.city_id){selected = 'selected'}
                        var htm = '<option value="'+data.data[i]['id']+'" '+selected+'>'+data.data[i]['name']+'</option>';
                        $('#city_id').append(htm);
                    });
                }
            }
        });
    }
});
function delete_doc(id)
{
    if(confirm('Are you sure to delete attached document?'))
    {
        $.ajax({
            url: '/admission-doc-delete',
            type: "POST",
            data: {'id':id},
            success: function(data)
            {
                console.log(data);
                if(data.status == 'success')
                {
                    $('#delete_'+id).remove();
                }
            }
        });
    }
}
function checkAdhaarCard() {
    var adhaarNumber = $("#adhaar_card").val();
    var adhaarPattern = /^\d{12}$/; // Aadhar card has 12 digits
    if (adhaarPattern.test(adhaarNumber)) {
        $('#adhaar_card_error').html('');
        return true;
    } else {
        $('#adhaar_card_error').html('Please Enter Valid Adhaar Card Number');
        return false;
    }
}
function checkPhoneNumber()
{
    var phone = $('#phone').val();
    var phoneno = /^(?:\+\d{1,3}\s?)?\d{10}$/;
    if(!phone.match(phoneno))
    {
        $('#phone_error').html('Please Enter Valid Mobile Number');
        return false;
    }
    else{
        $('#phone_error').html('');
        return true;
    }
}
function checkEmail()
{
    var email = $('#email').val();
    var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    if(!pattern.test(email))
    {
        $('#email_error').html('Please enter valid email address');
        return false;
    }else{
        $('#email_error').html('');
        return true;
    }
}
function checkFatherEmail()
{
    var email = $('#father_email').val();
    var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    if(!pattern.test(email))
    {
        $('#father_email_error').html('Please enter valid email address');
        return false;
    }else{
        $('#father_email_error').html('');
        return true;
    }
}
function checkFatherPhoneNumber()
{
    var phone = $('#father_phone').val();
    var phoneno = /^(?:\+\d{1,3}\s?)?\d{10}$/;
    if(!phone.match(phoneno))
    {
        $('#father_phone_error').html('Please Enter Valid Mobile Number');
        return false;
    }
    else{
        $('#father_phone_error').html('');
        return true;
    }
}
function checkMotherEmail()
{
    var email = $('#mother_email').val();
    var pattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    if(!pattern.test(email))
    {
        $('#mother_email_error').html('Please enter valid email address');
        return false;
    }else{
        $('#mother_email_error').html('');
        return true;
    }
}
function checkMotherPhoneNumber()
{
    var phone = $('#mother_phone').val();
    var phoneno = /^(?:\+\d{1,3}\s?)?\d{10}$/;
    if(!phone.match(phoneno))
    {
        $('#mother_phone_error').html('Please Enter Valid Mobile Number');
        return false;
    }
    else{
        $('#mother_phone_error').html('');
        return true;
    }
}
