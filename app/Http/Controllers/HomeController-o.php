<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use App\Mail\AdmissionEmail;
use App\Models\About;
use App\Models\ContactUs;
use App\Models\AdminCourse;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hostel;
use App\Models\AdminModel;
use App\Models\Testimonial;
use App\Models\EnquireNow;
use App\Models\AdmissionForm;
use App\Models\ApplicantPersonalInfo;
use App\Models\ApplicantEducationalBackground;
use App\Models\ApplicantWorkExperience;
use App\Models\ApplicantContactDetail;
use App\Models\PaymentDocument;
use App\Models\AdmissionDoc;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class HomeController extends Controller
{
    public function __construct()
    {
        // $departmentData = Department::get();
        // return view('header',compact('departmentData'));
    }
    /*
    @authod: Mohd Amir
    @function: index()
    @description: home page Function
    */
    public function index()
    {
        // $departmentData = Department::get();
        // return view('home',compact('departmentData'));
        $aboutData = About::get();
        $courseData = AdminCourse::where('soft_delete','0')->take(4)->get();
        $allDepartment = Department::where('soft_delete','0')->get();
        $allFaculties = Faculty::where('soft_delete','0')->get();
        $allTestimonial = Testimonial::get();
        // dd($allTestimonial);
        return view('home',compact('aboutData','courseData','allDepartment','allFaculties','allTestimonial'));
    }
    /*
    @authod: Mohd Amir
    @function: about_us()
    @description: about us Function
    */
    public function about_us()
    {
        $data = About::get();
        return view('about_us', compact('data'));
    }
    /*
    @authod: Mohd Amir
    @function: admissions()
    @description: admissions Function
    */
    public function admissions()
    {
        return view('admissions');
    }
    /*
    @authod: Mohd Amir
    @function: testimonials()
    @description: testimonials Function
    */
    public function testimonials()
    {
        return view('testimonials');
    }
    /*
    @authod: Mohd Amir
    @function: events()
    @description: events Function
    */
    public function events()
    {
        return view('events');
    }
    /*
    @authod: Mohd Amir
    @function: publications()
    @description: publications Function
    */
    public function publications()
    {
        return view('publications');
    }
    /*
    @authod: Mohd Amir
    @function: event_detail()
    @description: event detail Function
    */
    public function event_detail()
    {
        return view('event_detail');
    }
    /*
    @authod: Mohd Amir
    @function: department()
    @description: department Function
    */
    public function department(Request $request, $id = null)
    {
        $department = Department::find($id);
        $allDepartment = Department::where('soft_delete', '0')->get();
        return view('departments',compact('department','allDepartment'));
    }
    public function department_list()
    {
        $allDepartment = Department::where('soft_delete','0')->get();
        return view('department-list',compact('allDepartment'));
    }
    public function faculty(Request $request)
    {
        $faculty = Faculty::where('soft_delete', '0')->get();
        return view('faculty',compact('faculty'));
    }
    public function faculty_detail(Request $request, $id = null)
    {
        $faculty = Faculty::find($id);
        // dd($faculty);
        return view('faculty_detail', compact('faculty'));
    }
    public function courses()
    {
        $course = AdminCourse::where('soft_delete','0')->get();
        return view('courses',compact('course'));
    }
    public function course_detail(Request $request,$id = null)
    {
        $courseDetailData = AdminCourse::find($id);
        $course = AdminCourse::where('soft_delete','0')->get();
        return view('course_detail',compact('course','courseDetailData'));
    }
    public function gallery()
    {
        $allGallery = DB::table('galleries')
                      ->select('galleries.id','galleries.image_name', 'galleries.img_alt', 'galleries.cat_id','gallery_cat.cat_name')
                      ->leftjoin('gallery_cat','galleries.cat_id','=','gallery_cat.id')
                      ->where('galleries.soft_delete','0')
                      ->get();
        $allCatGallery = DB::table('gallery_cat')->where('soft_delete','0')->get();
        return view('gallery',compact('allGallery','allCatGallery'));
    }
    public function cat_gallery(Request $request)
    {
        $allGallery = DB::table('galleries')
                        ->select('galleries.id','galleries.image_name', 'galleries.img_alt', 'galleries.cat_id','gallery_cat.cat_name')
                        ->leftjoin('gallery_cat','galleries.cat_id','=','gallery_cat.id')
                        ->where('galleries.soft_delete','0')
                        ->where('galleries.cat_id',$request->id)
                        ->get();
        // dd($cat_galleryData);
        $allCatGallery = DB::table('gallery_cat')->where('soft_delete','0')->get();
        return view('gallery',compact('allGallery','allCatGallery'));
    }
    public function hostel()
    {
        $hostel = Hostel::where('soft_delete','0')->get();
        // dd($hostel);
        return view('hostel',compact('hostel'));
    }
    public function contact_us()
    {
        return view('contact-us');
    }
    public function contact_us_submit(Request $request)
    {
        $user_id = Session::get('studentId');
        $contactus = new ContactUs;
        if(!empty($user_id))
        {
            $user = AdminModel::where('registration_num',$user_id)->where('user_type_id','3')->first();
            $contactus->user_id = $user->id;
        }
        $contactus->first_name = $request->first_name;
        $contactus->last_name = $request->last_name;
        $contactus->email = $request->email;
        $contactus->mobile = $request->mobile;
        $contactus->message = $request->message;
        $ins = $contactus->save();
        if($ins)
        {
            $json_resp['status'] = 'success';
        }
        else
        {
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function enquire_now()
    {
        $states = DB::table('states')->get();
        // dd($states);
        return view('enquire-now',compact('states'));
    }
    public function enquire_now_submit(Request $request)
    {
        $enquire = new EnquireNow;
        $enquire->first_name = $request->first_name;
        $enquire->last_name = $request->last_name;
        $enquire->email = $request->email;
        $enquire->mobile = $request->mobile;
        $enquire->state = $request->state;
        $enquire->city = $request->city;
        $enquire->course = $request->course;
        $enquire->specialization = $request->specialization;
        $ins = $enquire->save();
        if($ins)
        {
            $json_resp['status'] = 'success';
        }
        else
        {
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admission_form()
    {
        $courses = DB::table('admin_courses')->where('soft_delete','0')->get();
        $states = DB::table('states')->get();
        return view('admission-form',compact('states','courses'));
    }
    public function admission_form_submit(Request $request)
    {
        $admission_form = new AdmissionForm;
        $admission_form->first_name = $request->first_name;
        $admission_form->last_name = $request->last_name;
        $admission_form->email = $request->email;
        $admission_form->mobile = $request->mobile;
        $admission_form->qualification = $request->qualification;
        $admission_form->course_id = $request->courseId;
        $admission_form->state_id = $request->stateId;
        $admission_form->city_id = $request->cityId;
        $password =  uniqid();
        $admission_form->password = bcrypt($password);
        $insert = $admission_form->save();
        $data = ([
    		'name' => $request->first_name.' '.$request->last_name,
    		'email' => $request->email,
    		'mobile' => $request->mobile,
            'password' => $password
    	]);
    	Mail::to($request->email)->send(new WelcomeEmail($data));
        if($insert){
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admission_form_login(Request $request)
    {
        $admission = AdmissionForm::where('email',$request->email)->get();
        // dd($admission);
        if($admission)
        {
            if(Hash::check($request->password, $admission[0]->password))
            {
                $form_data = ['first_name' => $admission[0]->first_name,
                              'last_name'  => $admission[0]->last_name,
                              'email'      => $request->email,
                              'mobile'     => $admission[0]->mobile,
                              'state_id'   => $admission[0]->state_id,
                              'city_id'    => $admission[0]->city_id,
                              'id'         => $admission[0]->id,
                            ];
                // dd(json_encode($form_data));
                $request->session()->put('register_data', json_encode($form_data));
                $request->session()->put('email', $request->email);
                // dd('amir');
                $json_resp['status'] = 'success';
            }else{
                $json_resp['status'] = 'error';
            }

        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admission_detail_form()
    {
        if(Session::has('email')){
            $countries = DB::table('countries')->get();
            $states = DB::table('states')->get();
            // dd($states);
            return view('admission-detail-form',compact('countries','states'));
        }else{
            return redirect('/admission-form');
        }
    }
    public function personal_info(Request $request)
    {
        // dd($request->all());
        $personal_data = [
                           'full_name' => $request->full_name,
                           'dob'       => $request->dob,
                           'mother_tongue' => $request->mother_tongue,
                           'gender' => $request->gender,
                           'nationality' => $request->nationality,
                           'religion' => $request->religion,
                           'caste' => $request->caste,
                           'adhaar_card' => $request->adhaar_card,
                           'phone' => $request->phone,
                           'email' => $request->email,
                           'address1' => $request->address1,
                           'address2' => $request->address2,
                           'state_id' => $request->state_id,
                           'city_id' => $request->city_id,
                           'uploadFile' => $request->file('uploadFile')->getClientOriginalName()
                        ];
        $photo = $request->file('uploadFile');
        $path = public_path('/upload/admission-flow/');
        $photo_name = $photo->getClientOriginalName();
        $photo->move($path,$photo_name);
        $request->session()->put('personal_data', json_encode($personal_data));
        $json_resp['status'] = 'success';
        return response()->json(@$json_resp);
        // dd(Session::get('personal_data'));
    }
    public function educational_background(Request $request)
    {
        // dd($request->all());
        // dd($request['qualification_others'][1]);
        $education_data = [
                            'qualification_10th' => $request['10th_qualification'],
                            'register_no_10th'   => $request['10th_register_no'],
                            'yr_pass_10th'       => $request['10th_yr_pass'],
                            'university_10th'    => $request['10th_university'],
                            'college_10th'       => $request['10th_college'],
                            'grade_10th'         => $request['10th_grade'],
                            'qualification_12th' => $request['12th_qualification'],
                            'register_no_12th'   => $request['12th_register_no'],
                            'yr_pass_12th'       => $request['12th_yr_pass'],
                            'university_12th'    => $request['12th_university'],
                            'college_12th'       => $request['12th_college'],
                            'grade_12th'         => $request['12th_grade'],
                            'physics'            => $request['physics'],
                            'chemistry'          => $request['chemistry'],
                            'biology'            => $request['biology'],
                            'english'            => $request['english'],
                            'maths'              => $request['maths'],
                            'others1_qualification' => $request['qualification_others'][0]?$request['qualification_others'][0]:'',
                            'others2_qualification' => $request['qualification_others'][1]?$request['qualification_others'][1]:'',
                            'others1_register_no' => $request['other_register_no'][0]?$request['other_register_no'][0]:'',
                            'others2_register_no' => $request['other_register_no'][1]?$request['other_register_no'][1]:'',
                            'others1_pass_year' => $request['other_yr_pass'][0]?$request['other_yr_pass'][0]:'',
                            'others2_pass_year' => $request['other_yr_pass'][1]?$request['other_yr_pass'][1]:'',
                            'others1_university' => $request['other_university'][0]?$request['other_university'][0]:'',
                            'others2_university' => $request['other_university'][1]?$request['other_university'][1]:'',
                            'others1_college' => $request['other_college'][0]?$request['other_college'][0]:'',
                            'others2_college' => $request['other_college'][1]?$request['other_college'][1]:'',
                            'others1_grade' => $request['other_grade'][0]?$request['other_grade'][0]:'',
                            'others2_grade' => $request['other_grade'][1]?$request['other_grade'][1]:'',
                          ];
        // dd($education_data);
        $request->session()->put('educational_data', json_encode($education_data));
        $json_resp['status'] = 'success';
        return response()->json(@$json_resp);
    }
    public function work_experience(Request $request)
    {
        // dd($request->all());
        $work_exp = [
            'previous_compnay' => $request['previous_compnay'],
            'previous_designation' => $request['previous_designation'],
            'from_date' => $request['from_date'],
            'to_date' => $request['to_date'],
            'number_of_month' => $request['number_of_month'],
            'job_description' => $request['job_description'],
            'previous_compnay_others' => $request['mprevious_compnay_others'],
            'previous_designation_others' => $request['previous_designation_others'],
            'from_date_other' => $request['from_date_other'],
            'to_date_other' => $request['to_date_other'],
            'number_of_month_other' => $request['number_of_month_other'],
            'job_description_other' => $request['job_description_other']
        ];
        // dd($work_exp);
        $request->session()->put('work_exp', json_encode($work_exp));
        $json_resp['status'] = 'success';
        return response()->json(@$json_resp);
    }
    public function contact_detail(Request $request)
    {
        // dd($request->all());
        $contact_detail = [
            'father_name' => $request['father_name'],
            'edu_qualification' => $request['edu_qualification'],
            'father_occupation' => $request['father_occupation'],
            'father_company' => $request['father_company'],
            'father_designation' => $request['father_designation'],
            'father_address' => $request['father_address'],
            'father_email' => $request['father_email'],
            'father_phone' => $request['father_phone'],
            'mother_name' => $request['mother_name'],
            'educ_qualification' => $request['educ_qualification'],
            'mother_occupation' => $request['mother_occupation'],
            'mother_company' => $request['mother_company'],
            'mother_designation' => $request['mother_designation'],
            'mother_address' => $request['mother_address'],
            'mother_email' => $request['mother_email'],
            'mother_phone' => $request['mother_phone']
        ];
        $request->session()->put('contact_detail', json_encode($contact_detail));
        $personal_data = json_decode(Session::get('personal_data'));
        $educational_data = json_decode(Session::get('educational_data'));
        $work_exp = json_decode(Session::get('work_exp'));
        $contact_d = json_decode(Session::get('contact_detail'));
        //personal data inserted
        $personal_info = new ApplicantPersonalInfo;
        $personal_info->full_name = $personal_data->full_name;
        $personal_info->dob = $personal_data->dob;
        $personal_info->mother_tongue = $personal_data->mother_tongue;
        $personal_info->gender = $personal_data->gender;
        $personal_info->nationality = $personal_data->nationality;
        $personal_info->religion = $personal_data->religion;
        $personal_info->caste = $personal_data->caste;
        $personal_info->adhaar_card = $personal_data->adhaar_card;
        $personal_info->mobile = $personal_data->phone;
        $personal_info->email = $personal_data->email;
        $personal_info->address1 = $personal_data->address1;
        $personal_info->address2 = $personal_data->address2;
        $personal_info->city_id = $personal_data->city_id;
        $personal_info->state_id = $personal_data->state_id;
        $personal_info->photo = $personal_data->uploadFile;
        $personal_info->save();
        //educational background
        $education_info = new ApplicantEducationalBackground;
        $education_info->appicant_id = $personal_info->id;
        $education_info->qualification_10th = $educational_data->qualification_10th;
        $education_info->register_no_10th = $educational_data->register_no_10th;
        $education_info->pass_year_10th = $educational_data->yr_pass_10th;
        $education_info->university_10th = $educational_data->university_10th;
        $education_info->college_10th = $educational_data->college_10th;
        $education_info->grade_10th = $educational_data->grade_10th;
        $education_info->physics = $educational_data->physics;
        $education_info->chemistry = $educational_data->chemistry;
        $education_info->biology = $educational_data->biology;
        $education_info->english = $educational_data->english;
        $education_info->maths = $educational_data->maths;
        $education_info->qualification_12th = $educational_data->qualification_12th;
        $education_info->register_no_12th = $educational_data->register_no_12th;
        $education_info->pass_year_12th = $educational_data->yr_pass_12th;
        $education_info->university_12th = $educational_data->university_12th;
        $education_info->college_12th = $educational_data->college_12th;
        $education_info->grade_12th = $educational_data->grade_12th;
        $education_info->others1_qualification = $educational_data->others1_qualification?$educational_data->others1_qualification:'';
        $education_info->others1_register_no = $educational_data->others1_register_no?$educational_data->others1_register_no:'';
        $education_info->others1_pass_year = $educational_data->others1_pass_year?$educational_data->others1_pass_year:'';
        $education_info->others1_university = $educational_data->others1_university?$educational_data->others1_university:'';
        $education_info->others1_college = $educational_data->others1_college?$educational_data->others1_college:'';
        $education_info->others1_grade = $educational_data->others1_grade?$educational_data->others1_grade:'';
        $education_info->others2_qualification = $educational_data->others2_qualification?$educational_data->others2_qualification:'';
        $education_info->others2_register_no = $educational_data->others2_register_no?$educational_data->others2_register_no:'';
        $education_info->others2_pass_year = $educational_data->others2_pass_year?$educational_data->others2_pass_year:'';
        $education_info->others2_university = $educational_data->others2_university?$educational_data->others2_university:'';
        $education_info->others2_college = $educational_data->others2_college?$educational_data->others2_college:'';
        $education_info->others2_grade = $educational_data->others2_grade?$educational_data->others2_grade:'';
        $education_info->save();
        //work experience
        $work_experience = new ApplicantWorkExperience;
        $work_experience->appicant_id = $personal_info->id;
        $work_experience->edu_back_id = $education_info->id;
        $work_experience->previous_company = $work_exp->previous_compnay;
        $work_experience->previous_designation = $work_exp->previous_designation;
        $work_experience->from_date = $work_exp->from_date;
        $work_experience->to_date = $work_exp->to_date;
        $work_experience->duration = $work_exp->number_of_month;
        $work_experience->job_description = $work_exp->job_description;
        $work_experience->previous_company_1 = $work_exp->previous_compnay_others?$work_exp->previous_compnay_others:'';
        $work_experience->previous_designation_1 = $work_exp->previous_designation_others?$work_exp->previous_designation_others:'';
        $work_experience->from_date_1 = $work_exp->from_date_other?$work_exp->from_date_other:'';
        $work_experience->to_date_1 = $work_exp->to_date_other?$work_exp->to_date_other:'';
        $work_experience->duration_1 = $work_exp->number_of_month_other?$work_exp->number_of_month_other:'';
        $work_experience->job_description_1 = $work_exp->job_description_other?$work_exp->job_description_other:'';
        $work_experience->save();
        //contact detail
        $contact_info = new ApplicantContactDetail;
        $contact_info->appicant_id = $personal_info->id;
        $contact_info->edu_back_id = $education_info->id;
        $contact_info->work_exp_id = $work_experience->id;
        $contact_info->father_name = $contact_d->father_name;
        $contact_info->father_qualification = $contact_d->edu_qualification;
        $contact_info->father_occupation = $contact_d->father_occupation;
        $contact_info->father_company_name = $contact_d->father_company;
        $contact_info->father_designation = $contact_d->father_designation;
        $contact_info->father_address = $contact_d->father_address;
        $contact_info->father_email = $contact_d->father_email;
        $contact_info->father_mobile = $contact_d->father_phone;
        $contact_info->mother_name = $contact_d->mother_name;
        $contact_info->mother_qualification = $contact_d->educ_qualification;
        $contact_info->mother_occupation = $contact_d->mother_occupation;
        $contact_info->mother_company_name = $contact_d->mother_company;
        $contact_info->mother_designation = $contact_d->mother_designation;
        $contact_info->mother_address = $contact_d->mother_address;
        $contact_info->mother_email = $contact_d->mother_email;
        $contact_info->mother_mobile = $contact_d->mother_phone;
        $submit_id = $contact_info->save();
        if($submit_id)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
        // dd(Session::get('personal_data'));
        // dd(Session::get('educational_data'));
        // dd(Session::get('work_exp'));
        // dd(Session::get('contact_detail'));
        // $json_resp['status'] = 'success';
        // return response()->json(@$json_resp);
    }
    public function admission_doc(Request $request)
    {
        if(Session::has('contact_detail'))
        {
            return view('admission-doc');
        }else if(Session::has('email')){
            $countries = DB::table('countries')->get();
            $states = DB::table('states')->get();
            return view('admission-detail-form',compact('countries','states'));
        }else{
            return redirect('/');
        }
    }
    public function admission_doc_submit(Request $request)
    {
        $doc = new AdmissionDoc;
        $sessionData = json_decode(Session::get('register_data'));
        $doc->appli   = $sessionData->id;
        $doc->attachment_type = $request->attachment_type;
        $doc->attachment_name = $request->attachment_name;
        $doc->file_name       = $request->file('fileName')->getClientOriginalName();
        $photo = $request->file('fileName');
        $path = public_path('/upload/admission-flow/doc/');
        $photo_name = $photo->getClientOriginalName();
        $photo->move($path,$photo_name);
        $ins = $doc->save();
        if($ins)
        {
            $json_resp['status'] = 'success';
            $json_resp['attachment_type'] = $request->attachment_type;
            $json_resp['id'] = $doc->id;
            $json_resp['fileName'] = $request->file('fileName')->getClientOriginalName();
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admission_doc_delete(Request $request)
    {
        $doc = AdmissionDoc::find($request->id);
        $delete = $doc->delete();
        if($delete)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admission_pay(Request $request)
    {
        if(Session::has('contact_detail'))
        {
            return view('admission-pay');
        }else{
            return redirect('/');
        }
    }
    public function payment_document(Request $request)
    {
        if(Session::has('contact_detail'))
        {
            return view('payment-document');
        }else{
            return redirect('/');
        }
    }
    public function payment_document_submit(Request $request)
    {
        $paymentDoc = new PaymentDocument;
        $sessionData = json_decode(Session::get('register_data'));
        $fullName = json_decode(Session::get('personal_data'));
        $paymentDoc->appli   = $sessionData->id;
        $paymentDoc->payment = $request->payment;
        $paymentDoc->transaction_no = $request->transaction_no;
        $paymentDoc->transaction_date = $request->transaction_date;
        $paymentDoc->uploadFile = $request->file('uploadFile')->getClientOriginalName();
        $photo = $request->file('uploadFile');
        $path = public_path('/upload/admission-flow/payment-doc/');
        $photo_name = $photo->getClientOriginalName();
        $photo->move($path,$photo_name);
        $ins = $paymentDoc->save();
        if($ins)
        {
            $data = (['name' => $fullName->full_name]);
            Mail::to($sessionData->email)->send(new AdmissionEmail($data));
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
}
