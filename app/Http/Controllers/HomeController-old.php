<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\ContactUs;
use App\Models\AdminCourse;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hostel;
use App\Models\AdminModel;
use App\Models\Testimonial;
use App\Models\EnquireNow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        // dd($hostel[0]->room_desc);
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
}
