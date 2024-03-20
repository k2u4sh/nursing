<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSW</title>
    <script src="https://kit.fontawesome.com/ea16b2b73c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../fonts/lato/stylesheet.css">
    <link href="../css/plugin.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/custom-tejveer.css">
    <link href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

</head>

<body>
@php
$register_data = json_decode(Session::get('register_data'));
$personal_info = json_decode(Session::get('personal_data'));
$educational_info = json_decode(Session::get('educational_data'));
$work_exp = json_decode(Session::get('work_exp'));
$contact_info = json_decode(Session::get('contact_detail'));
// dd($contact_info);
// dd($work_exp);
// dd($personal_info);
// dd($educational_info);
//$educational_background = isset($_COOKIE['EducationalBackground'])?json_decode($_COOKIE['EducationalBackground']):'';
//print_r($educational_background);
     @endphp
    <div class="login-wrapp cover no-repeat admission-login-wrap card-lg" style="background-image: url('../img/login-bg.jpg');">
        <div>
            <div class="login-logo-block">
                <img src="../img/logo.png" alt="">
            </div>
            <div class="line-start w-auto d-flex justify-content-center">
                <ul class="nav nav-pills mb-3 sm justify-content-start position-relative" id="mytabs" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="g-1-tab" data-bs-toggle="pill" data-bs-target="#g-1" type="button" role="tab" aria-controls="g-1" aria-selected="true">Personal Information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="g-2-tab" data-bs-toggle="pill" data-bs-target="#g-2" type="button" role="tab" aria-controls="g-2" aria-selected="false">Educational Background</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="g-3-tab" data-bs-toggle="pill" data-bs-target="#g-3" type="button" role="tab" aria-controls="g-2" aria-selected="false">Work Experience</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="g-4-tab" data-bs-toggle="pill" data-bs-target="#g-4" type="button" role="tab" aria-controls="g-2" aria-selected="false">Contact Details</button>
                      </li>
                      <div class="line"></div>
                  </ul>

            </div>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="g-1" role="tabpanel" aria-labelledby="g-1-tab">
                    <div class="row gap-top-md">
                        <div class="col-md-12 admission-personal-info-wrap">
                            <form id="pi" method="post">
                                @csrf
                                <div class="row scroll-form-block scrollbar-block gx-5">
                                    <div class="contact-form-block col-md-4">
                                        <label>Full Name <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" placeholder="Enter Full Name" id="full_name" name="full_name" value="{{isset($personal_info->full_name)?$personal_info->full_name:$register_data->first_name.' '.$register_data->last_name}}">
                                            <span id="full_name_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Date of Birth <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" name="dob" placeholder="Enter Date of Birth" id="dob" value="{{isset($personal_info->dob)?$personal_info->dob:''}}">
                                            <span id="dob_error" class="red-text error-block"></span>
                                            <span class="input-icon-block right no-border">
                                                <img src="../img/calendar.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Mother Tongue <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <select class="select" name="mother_tongue" id="mother_tongue">
                                                <option value="">Select Mother Tongue</option>
                                                <option value="English" {{isset($personal_info->mother_tongue) && ($personal_info->mother_tongue == 'English')?'selected':''}}>English</option>
                                                <option value="Hindi" {{isset($personal_info->mother_tongue) && ($personal_info->mother_tongue == 'Hindi')?'selected':''}}>Hindi</option>
                                                <option value="Urdu" {{isset($personal_info->mother_tongue) && ($personal_info->mother_tongue == 'Urdu')?'selected':''}}>Urdu</option>
                                                <option value="Kannada" {{isset($personal_info->mother_tongue) && ($personal_info->mother_tongue == 'Kannada')?'selected':''}}>Kannada</option>
                                            </select>
                                            <span id="mother_tongue_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Gender <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <select class="select" name="gender" id="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{isset($personal_info->gender) && ($personal_info->gender == 'Male')?'selected':''}}>Male</option>
                                                <option value="Female" {{isset($personal_info->gender) && ($personal_info->gender == 'Female')?'selected':''}}>Female</option>
                                                <option value="Other" {{isset($personal_info->gender) && ($personal_info->gender == 'Other')?'selected':''}}>Other</option>
                                            </select>
                                            <span id="gender_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Nationality <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <select class="select" name="nationality" id="nationality">
                                                <option value="">Select Nationality</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{isset($personal_info->nationality) && ($personal_info->nationality == $country->id)? 'selected': ''}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            <span id="nationality_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Religion <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <select class="select" name="religion" id="religion">
                                                <option value="">Select Religion</option>
                                                <option value="Hinduism" {{isset($personal_info->religion) && ($personal_info->religion == 'Hinduism')?'selected': ''}}>Hinduism</option>
                                                <option value="Muslim" {{isset($personal_info->religion) && ($personal_info->religion == 'Muslim')?'selected': ''}}>Muslim</option>
                                                <option value="Christianity" {{isset($personal_info->religion) && ($personal_info->religion == 'Christianity')?'selected': ''}}>Christianity</option>
                                                <option value="Judaism" {{isset($personal_info->religion) && ($personal_info->religion == 'Judaism')?'selected': ''}}>Judaism</option>
                                                <option value="Buddhism" {{isset($personal_info->religion) && ($personal_info->religion == 'Buddhism')?'selected': ''}}>Buddhism</option>
                                                <option value="Jainism" {{isset($personal_info->religion) && ($personal_info->religion == 'Jainism')?'selected': ''}}>Jainism</option>
                                                <option value="Sikhism" {{isset($personal_info->religion) && ($personal_info->religion == 'Sikhism')?'selected': ''}}>Sikhism</option>
                                                <option value="Zoroastrianism" {{isset($personal_info->religion) && ($personal_info->religion == 'Zoroastrianism')?'selected': ''}}>Zoroastrianism</option>
                                            </select>
                                            <span id="religion_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Caste <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <select class="select" name="caste" id="caste">
                                                <option value="">Select Caste</option>
                                                <option value="Pandit" {{isset($personal_info->caste) && ($personal_info->caste == 'Pandit')?'selected':''}}>Pandit</option>
                                                <option value="Thakur" {{isset($personal_info->caste) && ($personal_info->caste == 'Thakur')?'selected':''}}>Thakur</option>
                                                <option value="Rajbhar" {{isset($personal_info->caste) && ($personal_info->caste == 'Rajbhar')?'selected':''}}>Rajbhar</option>
                                                <option value="Tyagi" {{isset($personal_info->caste) && ($personal_info->caste == 'Tyagi')?'selected':''}}>Tyagi</option>
                                                <option value="Soni" {{isset($personal_info->caste) && ($personal_info->caste == 'Soni')?'selected':''}}>Soni</option>
                                                <option value="SC & ST" {{isset($personal_info->caste) && ($personal_info->caste == 'SC & ST')?'selected':''}}>SC & ST</option>
                                                <option value="Pathan" {{isset($personal_info->caste) && ($personal_info->caste == 'Pathan')?'selected':''}}>Pathan</option>
                                                <option value="Sayyed" {{isset($personal_info->caste) && ($personal_info->caste == 'Sayyed')?'selected':''}}>Sayyed</option>
                                                <option value="Ansar" {{isset($personal_info->caste) && ($personal_info->caste == 'Ansar')?'selected':''}}>Ansar</option>
                                            </select>
                                            <option id="caste_error" class="red-text error-block"></option>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Aadhar Card Number <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" placeholder="Enter Your Aadhar Card Number" id="adhaar_card" name="adhaar_card" value="{{isset($personal_info->adhaar_card)?$personal_info->adhaar_card:''}}">
                                            <span id="adhaar_card_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Phone Number <span class="red-text">*</span></label>
                                        <div class="position-relative mobile-number-block">
                                            <input type="text" placeholder="Mobile No." name="phone" id="phone" value="{{isset($personal_info->mobile)?$personal_info->mobile:$register_data->mobile}}">
                                            <span class="vect input-icon-block">+91</span>
                                            <span class="phoneImg" style=""><img src="https://www.transparentpng.com/thumb/line/stRuJH-vertical-black-line-illustration-png.png"></span>
                                            <span id="phone_error" class="red-text error-block"></span>
                                            
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Email <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" placeholder="Enter Email Address" name="email" id="email" value="{{isset($personal_info->email)?$personal_info->email:$register_data->email}}">
                                            <span id="email_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Address Line 1 <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" placeholder="Enter Address 1" id="address1" name="address1" value="{{isset($personal_info->address1)?$personal_info->address1:''}}">
                                            <span id="address1_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Address Line 2 <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" placeholder="Enter Address 2" id="address2" name="address2" value="{{isset($personal_info->address2)?$personal_info->address2:''}}">
                                            <span id="address2_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Select State <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <select class="select" id="state_id" name="state_id">
                                                <option value="">Select State</option>
                                                @foreach($states as $state)
                                                <option value="{{$state->id}}" data-id="{{$state->id}}" {{isset($personal_info->state_id) && ($personal_info->state_id == $state->id)? 'selected' : ''}}>{{$state->state_title}}</option>
                                                @endforeach
                                            </select>
                                            <span id="state_id_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-4">
                                        <label>Select City <span class="red-text">*</span></label>
                                        <div class="position-relative">
                                            <select class="select" name="city_id" id="city_id">
                                                <option value="">Select City</option>

                                            </select>
                                            <span id="city_id_error" class="red-text error-block"></span>
                                        </div>
                                    </div>
                                    <div class="contact-form-block col-md-12">
                                        <div class="uploadOuter">
                                            <span class="dragBox">
                                                <!-- <img src="../img/folder.png" alt="" class="fplder-img-blokc"> -->
                                                <div class="drag-title">
                                                    Drag your recent passport size photos (Allowed file size less than 10mb).
                                                </div>
                                                <div class="modal-or-text position-relative">OR</div>
                                                <input type="file" onChange="dragNdrop(event)" ondragover="drag()"
                                                    ondrop="drop()" name="uploadFile" id="uploadFile" accept="image/*"/ value="">
                                            </span>
                                            <div class="brws-and-clk-btn-block d-flex justify-content-center flex-wrap">
                                                <label for="uploadFile" class="btn-v rounded blue cursor-pointer">Browse files</label>
                                                <div class="ulpod-file-name w-100 mt-4" id="file_name"></div>
                                            </div>
                                        </div>
                                        <span id="uploadFile_error" style="color: red;"></span>
                                    </div>
                                </div>
                                <div class="btn-groups-block d-flex justify-content-between mt-5">
                                    <a href="#" class="btn-v rounded gray sm" id="personal_infor">Save</a>
                                    <a href="javascript:void(0);" class="btn-v rounded sm next-btn" id="personal_info">Next</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="g-2" role="tabpanel" aria-labelledby="g-2-tab">
                    <div class="row gap-top-md">
                        <div class="col-md-12 admission-eb-info-wrap">
                            <form id="eb" mathod="post">
                                @csrf
                                <div class="add-btn-block text-end">
                                    <a href="javascript:void(0);" class="btn-v blue rounded add-more-qualification-1 sm">+ Add More Qualification</a>
                                </div>
                                <div class="row scroll-form-block scrollbar-block gx-5 gap-top-md">

                                    <div class="col-md-12" id="attributes_1">
                                        <div class="row gx-5 adding-row attr attr-1">
                                            <div class="col-md-12 label-lg d-flex align-items-center justify-content-between">
                                                <span>Qualification <span class="quali-block">10th</span></span>
                                                <a href="javascript:void(0);" class="remove remove-1"><i class="fa-solid fa-trash-can"></i></a>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Qualification <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="10th_qualification" id="10th_qualification" value="{{isset($educational_info->qualification_10th)?$educational_info->qualification_10th:'10th Standard'}}" disabled="">
                                                    <span id="10th_qualification_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Register No <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="10th_register_no" id="10th_register_no" placeholder="Enter 10th Register No" value="{{isset($educational_info->register_no_10th)?$educational_info->register_no_10th:''}}">
                                                    <span id="10th_register_no_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Year of Passing <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="10th_yr_pass" id="10th_yr_pass" placeholder="Enter 10th Year of Passing" value="{{isset($educational_info->yr_pass_10th)?$educational_info->yr_pass_10th:''}}">
                                                    <span id="10th_yr_pass_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>University/Board <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="10th_university" id="10th_university" placeholder="Enter 10th University/Board" value="{{isset($educational_info->university_10th)?$educational_info->university_10th:''}}">
                                                    <span id="10th_university_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>College/School <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="10th_college" id="10th_college" placeholder="Enter 10th College/School" value="{{isset($educational_info->college_10th)?$educational_info->college_10th:''}}">
                                                    <span id="10th_college_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Grade/CGPA/Percentage <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="10th_grade" id="10th_grade" placeholder="Enter 10th Grade/CGPA/Percentage" value="{{isset($educational_info->grade_10th)?$educational_info->grade_10th:''}}">
                                                    <span id="10th_grade_error" class="red-text error-block"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row gx-5 mt-4">
                                            <div class="col-md-12 label-lg">Qualification 12th</div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Qualification <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="12th_qualification" id="12th_qualification" value="12th Standard" value="{{isset($educational_info->qualification_12th)?$educational_info->qualification_12th:'12th Standard'}}" disabled="">
                                                    <span id="12th_qualification_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Register No <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="12th_register_no" id="12th_register_no" placeholder="Enter 12th Register No" value="{{isset($educational_info->register_no_12th)?$educational_info->register_no_12th:''}}">
                                                    <span id="12th_register_no_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Year of Passing <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="12th_yr_pass" id="12th_yr_pass" placeholder="Enter 12th Year of Passing" value="{{isset($educational_info->yr_pass_12th)?$educational_info->yr_pass_12th:''}}">
                                                    <span id="12th_yr_pass_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>University/Board <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="12th_university" id="12th_university" placeholder="Enter 12th University/Board" value="{{isset($educational_info->university_12th)?$educational_info->university_12th:''}}">
                                                    <span id="12th_university_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Colledge/School <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="12th_college" id="12th_college" placeholder="Enter 12th Colledge/School" value="{{isset($educational_info->college_12th)?$educational_info->college_12th:''}}">
                                                    <span id="12th_college_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Grade/CGPA/Percentage <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="12th_grade" id="12th_grade" placeholder="Enter 12th Grade/CGPA/Percentage" value="{{isset($educational_info->grade_12th)?$educational_info->grade_12th:''}}">
                                                    <span id="12th_grade_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gx-5">
                                            <div class="contact-form-block col">
                                                <label>Physics <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="number" name="physics" id="physics" placeholder="Enter Physics Marks" value="{{isset($educational_info->physics)?$educational_info->physics:''}}">
                                                    <span id="physics_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col">
                                                <label>Chemistry <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="number" name="chemistry" id="chemistry" placeholder="Enter Chemistry Marks" value="{{isset($educational_info->chemistry)?$educational_info->chemistry:''}}">
                                                    <span id="chemistry_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col">
                                                <label>Biology <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="number" name="biology" id="biology" placeholder="Enter Biology Marks" value="{{isset($educational_info->biology)?$educational_info->biology:''}}">
                                                    <span id="biology_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col">
                                                <label>English <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="number" name="english" id="english" placeholder="Enter English Marks" value="{{isset($educational_info->english)?$educational_info->english:''}}">
                                                    <span id="english_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col">
                                                <label>Maths <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="number" name="maths" id="maths" placeholder="Enter Maths Marks" value="{{isset($educational_info->maths)?$educational_info->maths:''}}">
                                                    <span id="maths_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-groups-block d-flex justify-content-between mt-5">
                                    <a href="#" class="btn-v rounded gray sm" id="edicational_background_save">Save</a>
                                    <a href="javascript:void(0);" class="btn-v rounded sm next-btn" id="edicational_background">Next</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="g-3" role="tabpanel" aria-labelledby="g-3-tab">
                    <div class="row gap-top-md">
                        <div class="col-md-12 admission-we-info-wrap">
                            <form id="we" method="post">
                                @csrf
                                <div class="add-btn-block text-end">
                                    <a href="javascript:void(0);" class="btn-v blue rounded add-more-qualification-2 sm">+ Add More Experience</a>
                                </div>
                                <div class="row scroll-form-block scrollbar-block gx-5 gap-top-md">

                                    <div class="col-md-12" id="attributes_2">
                                        <div class="row gx-5 adding-row attr attr-2">
                                            <div class="col-md-12 label-lg d-flex align-items-center justify-content-between">
                                                <span>Work Experience</span>
                                                <a href="javascript:void(0);" class="remove remove-2"><i class="fa-solid fa-trash-can"></i></a>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Previous Company <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="previous_compnay" id="previous_compnay" placeholder="Enter Previous Company" value="{{isset($work_exp->previous_compnay)?$work_exp->previous_compnay:''}}">
                                                    <span id="previous_compnay_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Previous Designation<span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="previous_designation" id="previous_designation" placeholder="Enter Previous Designation" value="{{isset($work_exp->previous_designation)?$work_exp->previous_designation:''}}">
                                                    <span id="previous_designation_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>From Date<span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="from_date" id="from_date" placeholder="Enter Date of Birth" value="{{isset($work_exp->from_date)?$work_exp->from_date:''}}">
                                                    <span class="input-icon-block right no-border">
                                                        <img src="../img/calendar.png" alt="">
                                                    </span>
                                                    <span id="from_date_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>To Date <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="to_date" id="to_date" placeholder="Enter Date of Birth" value="{{isset($work_exp->to_date)?$work_exp->to_date:''}}">
                                                    <span class="input-icon-block right no-border">
                                                        <img src="../img/calendar.png" alt="">
                                                    </span>
                                                    <span id="to_date_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Number of months <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="number" name="number_of_month" id="number_of_month" placeholder="Enter Number of months" value="{{isset($work_exp->number_of_month)?$work_exp->number_of_month:''}}">
                                                    <span id="number_of_month_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Job Description<span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" name="job_description" id="job_description" placeholder="Enter Job Description" value="{{isset($work_exp->job_description)?$work_exp->job_description:''}}">
                                                    <span id="job_description_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-groups-block d-flex justify-content-between mt-5">
                                    <a href="#" class="btn-v rounded gray sm">Save</a>
                                    <a href="javascript:void(0);" class="btn-v rounded sm next-btn" id="work_experience">Next</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="g-4" role="tabpanel" aria-labelledby="g-4-tab">
                    <div class="row gap-top-md">
                        <div class="col-md-12 admission-cd-wrap">
                            <form id="cd" method="post">
                                @csrf
                                <div class="row scroll-form-block scrollbar-block gx-5">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 label-lg d-flex align-items-center justify-content-between">
                                                <span>Father Information</span>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Name <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Father Name" name="father_name" id="father_name" value="{{isset($contact_info->father_name)?$contact_info->father_name:''}}">
                                                    <span id="father_name_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Education Qualification <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Education Qualification" name="edu_qualification" id="edu_qualification" value="{{isset($contact_info->edu_qualification)?$contact_info->edu_qualification:''}}">
                                                    <span id="edu_qualification_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Occupation <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Occupation" name="father_occupation" id="father_occupation" value="{{isset($contact_info->father_occupation)?$contact_info->father_occupation:''}}">
                                                    <span id="father_occupation_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Name of the Company <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Name of the Company" name="father_company" id="father_company" value="{{isset($contact_info->father_company)?$contact_info->father_company:''}}">
                                                    <span id="father_company_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Designation <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Designation" name="father_designation" id="father_designation" value="{{isset($contact_info->father_designation)?$contact_info->father_designation:''}}">
                                                    <span id="father_designation_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Communication Address <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Communication Address" name="father_address" id="father_address" value="{{isset($contact_info->father_address)?$contact_info->father_address:''}}">
                                                    <span id="father_address_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Email-ID <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Email-ID" name="father_email" id="father_email" value="{{isset($contact_info->father_email)?$contact_info->father_email:''}}">
                                                    <span id="father_email_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="phonBar contact-form-block col-md-6">
                                            <label>Mobile Number <span class="red-text">*</span></label>
                                                <div class="position-relative mobile-number-block">
                                                    <input type="text" placeholder="Mobile No." name="father_phone" id="father_phone" onkeyup="validateMobile()">
                                                    <span class="vect input-icon-block">+91</span>
                                                    <span class="phoneImg" style=""><img src="https://www.transparentpng.com/thumb/line/stRuJH-vertical-black-line-illustration-png.png"></span>
                                                    <span id="father_phone_error" class="red-text error-block"></span>
                                                    <!-- <span id="mother_phone_error" class="red-text error-block"></span> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12 label-lg d-flex align-items-center justify-content-between">
                                                <span>Mother Information</span>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Name <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Name" name="mother_name" id="mother_name" value="{{isset($contact_info->mother_name)?$contact_info->mother_name:''}}">
                                                    <span id="mother_name_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Education Qualification <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Education Qualification" name="educ_qualification" id="educ_qualification" value="{{isset($contact_info->educ_qualification)?$contact_info->educ_qualification:''}}">
                                                    <span id="educ_qualification_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Occupation <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Occupation" name="mother_occupation" id="mother_occupation" value="{{isset($contact_info->mother_occupation)?$contact_info->mother_occupation:''}}">
                                                    <span id="mother_occupation_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Name of the Company <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Name of the Company" name="mother_company" id="mother_company" value="{{isset($contact_info->mother_company)?$contact_info->mother_company:''}}">
                                                    <span id="mother_company_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Designation <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Designation" name="mother_designation" id="mother_designation" value="{{isset($contact_info->mother_designation)?$contact_info->mother_designation:''}}">
                                                    <span id="mother_designation_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Communication Address <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Communication Address" name="mother_address" id="mother_address" value="{{isset($contact_info->mother_address)?$contact_info->mother_address:''}}">
                                                    <span id="mother_address_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Email-ID <span class="red-text">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Enter Email-ID" name="mother_email" id="mother_email" value="{{isset($contact_info->mother_email)?$contact_info->mother_email:''}}">
                                                    <span id="mother_email_error" class="red-text error-block"></span>
                                                </div>
                                            </div>
                                            <div class="contact-form-block col-md-4">
                                                <label>Mobile Number <span class="red-text">*</span></label>
                                                <div class="position-relative mobile-number-block">
                                                    <input type="text" placeholder="Enter Mobile No." maxlength="10" name="mother_phone" id="mother_phone" value="{{isset($contact_info->mother_phone)?$contact_info->mother_phone:''}}">
                                                    
                                                    <span class="vect input-icon-block">+91</span>
                                                    <span class="phoneImg" style=""><img src="https://www.transparentpng.com/thumb/line/stRuJH-vertical-black-line-illustration-png.png"></span>
                                                    <span id="mother_phone_error" class="red-text error-block"></span>
                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-groups-block d-flex justify-content-between mt-5">
                                    <a href="#" class="btn-v rounded gray sm">Save</a>
                                    <!-- <a href="login-detail.html" class="btn-v rounded sm" id="contact_detail">Next</a> -->
                                    <a href="#" class="btn-v rounded sm" id="contact_detail">Submit</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
              <!-- <button type="button" class="btn btn-primary next-btn ">Next</button> -->
        </div>
    </div>


    <script src="../js/plugin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="admin/assets/js/admission-detail-form.js"></script>
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</body>

</html>
