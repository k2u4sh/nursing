<?php

use App\Http\Controllers\AdminCourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminModelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HostelController;
use App\Models\AdminCourse;
use App\Models\Testimonial;
use Illuminate\Console\Command;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('addHeaderData')->group(function () {
    Route::get('/',[HomeController::class,'index']);


    // Route::get('staff-login',[CommonController::class,'staff_login'])->name('staff_login');
    // Route::post('student-login',[CommonController::class,'student_login_submit'])->name('student_login_submit');
    Route::get('about-us', [HomeController::class, 'about_us'])->name('about_us');
    Route::get('/departments/{id?}',[HomeController::class,'department'])->name('department');
    Route::get('department-list',[HomeController::class,'department_list'])->name('department_list');
    Route::get('faculty',[HomeController::class,'faculty'])->name('faculty');
    Route::get('/faculty-detail/{id?}',[HomeController::class,'faculty_detail'])->name('faculty_detail');
    Route::get('/courses/{id?}',[HomeController::class,'course_detail'])->name('course_detail');
    Route::get('courses-list',[HomeController::class,'courses'])->name('courses');
    Route::get('gallery',[HomeController::class,'gallery'])->name('gallery');
    Route::get('cat-gallery',[HomeController::class,'cat_gallery'])->name('cat_gallery');
    Route::get('login',[CommonController::class,'login'])->name('login');
    Route::get('hostel',[HomeController::class,'hostel'])->name('hostel');
    Route::get('contact-us',[HomeController::class,'contact_us'])->name('contact_us');
    Route::post('contact-us',[HomeController::class,'contact_us_submit'])->name('contact_us_submit');
    Route::get('enquire-now',[HomeController::class,'enquire_now'])->name('enquire_now');
    Route::post('enquire-now',[HomeController::class,'enquire_now_submit'])->name('enquire_now_submit');
    Route::get('admissions',[HomeController::class,'admissions'])->name('admissions');
    Route::get('events',[HomeController::class,'events'])->name('events');
    Route::get('publications',[HomeController::class,'publications'])->name('publications');
    Route::get('testimonials',[HomeController::class,'testimonials'])->name('testimonials');
    Route::get('event-detail',[HomeController::class,'event_detail'])->name('event_detail');
    Route::get('admission-form',[HomeController::class,'admission_form'])->name('admission_form');
    Route::post('admission-form',[HomeController::class,'admission_form_submit'])->name('admission_form_submit');
    Route::post('admission-form-login',[HomeController::class,'admission_form_login'])->name('admission_form_login');
    Route::get('admission-detail-form',[HomeController::class,'admission_detail_form'])->name('admission_detail_form');
    Route::post('personal-info',[HomeController::class,'personal_info'])->name('personal_info');
    Route::post('educational-background',[HomeController::class,'educational_background'])->name('educational_background');
    Route::post('work-experience',[HomeController::class,'work_experience'])->name('work_experience');
    Route::post('contact-detail',[HomeController::class,'contact_detail'])->name('contact_detail');
    Route::get('admission-doc',[HomeController::class,'admission_doc'])->name('admission_doc');
    Route::post('admission-doc-submit',[HomeController::class,'admission_doc_submit'])->name('admission_doc_submit');
    Route::post('admission-doc-delete',[HomeController::class,'admission_doc_delete'])->name('admission_doc_delete');
    Route::get('admission-pay',[HomeController::class,'admission_pay'])->name('admission_pay');
    Route::get('payment-document',[HomeController::class,'payment_document'])->name('payment_document');
    Route::post('payment-document',[HomeController::class,'payment_document_submit'])->name('payment_document_submit');
});
Route::middleware('studentLogged')->group(function() {
    // Route::get('login',[CommonController::class,'login'])->name('login');
    Route::get('student-login',[CommonController::class,'student_login'])->name('student_login');
    Route::post('student-login',[CommonController::class,'student_login_submit'])->name('student_login_submit');
    Route::get('student-logout', [CommonController::class,'student_logout'])->name('student_logout');
    Route::get('dashboard-student',[CommonController::class,'dashboard_student'])->name('dashboard_student');
    Route::get('student-profile',[CommonController::class,'student_profile'])->name('student_profile');
    Route::get('student-edit-profile',[CommonController::class,'student_edit_profile'])->name('student_edit_profile');
    Route::post('student-edit-profile',[CommonController::class,'student_update_profile'])->name('student_update_profile');
    Route::get('city-list',[CommonController::class,'city_list'])->name('city_list');
    Route::get('exam-details',[CommonController::class,'exam_details'])->name('exam_details');
    Route::get('student-holiday-list',[CommonController::class,'student_holiday_list'])->name('student_holiday_list');
});
Route::middleware('staffLogged')->group(function() {
    // Route::get('login',[CommonController::class,'login'])->name('login');
    Route::get('staff-login',[CommonController::class,'staff_login'])->name('staff_login');
    Route::post('staff-login',[CommonController::class,'staff_login_submit'])->name('staff_login_submit');
    Route::get('staff-logout', [CommonController::class,'staff_logout'])->name('staff_logout');
    Route::get('dashboard-staff',[CommonController::class,'dashboard_staff'])->name('dashboard_staff');
    Route::get('staff-profile',[CommonController::class,'staff_profile'])->name('staff_profile');
    Route::get('staff-edit-profile',[CommonController::class,'staff_edit_profile'])->name('staff_edit_profile');
    Route::post('staff-edit-profile',[CommonController::class,'staff_update_profile'])->name('staff_update_profile');
    Route::get('city-list',[CommonController::class,'city_list'])->name('city_list');
    Route::get('staff-upload-assignment',[CommonController::class,'staff_upload_assignment'])->name('staff_upload_assignment');
    Route::post('staff-upload-assignment',[CommonController::class,'staff_submit_assignment'])->name('staff_submit_assignment');
    Route::get('staff-assignment-list',[CommonController::class,'staff_assignment_list'])->name('staff_assignment_list');
    Route::post('staff-assignment-status-change',[CommonController::class,'change_status'])->name('change_status');
});
Route::middleware('adminLogged')->group(function () {
    Route::get('admin-profile',[AdminModelController::class,'admin_profile'])->name('admin_profile');
    Route::get('admin-edit-profile',[AdminModelController::class,'admin_edit_profile'])->name('admin_edit_profile');
    Route::post('admin-edit-profile',[AdminModelController::class,'admin_update_profile'])->name('admin_update_profile');
    Route::get('cities-list',[AdminModelController::class,'cities_list'])->name('cities_list');
    Route::get('admin-login', [AdminModelController::class,'admin_login'])->name('admin_login');
    Route::post('admin-login', [AdminModelController::class,'admin_login_submit']);
    // Route::get('admin-forget-password',[AdminModelController::class,'admin_forget_password'])->name('admin_forget_password');
    Route::get('/admin-change-password',[AdminModelController::class,'admin_change_password'])->name('admin_change_password');
    Route::post('admin-change-password',[AdminModelController::class,'admin_change_pass_submit'])->name('admin_change_pass_submit');
    Route::get('logout', [AdminModelController::class,'logout'])->name('logout');
    Route::get('dashboard-admin', [AdminModelController::class,'dashboard_admin'])->name('dashboard_admin');
    Route::get('admin-aboutus', [AdminModelController::class,'admin_aboutus'])->name('admin_aboutus');
    Route::post('admin-aboutus', [AdminModelController::class,'admin_aboutus_update'])->name('admin_aboutus_update');
    Route::get('admin-departments',[AdminModelController::class,'admin_dept'])->name('admin_dept');
    Route::post('add-departments',[AdminModelController::class,'add_departments'])->name('add_departments');
    Route::get('edit-departments',[AdminModelController::class,'edit_departments'])->name('edit_departments');
    Route::post('edit-departments',[AdminModelController::class,'update_departments'])->name('update_departments');
    Route::post('delete-departments',[AdminModelController::class,'delete_departments'])->name('delete_departments');
    Route::get('admin-faculty',[AdminModelController::class,'admin_faculty'])->name('admin_faculty');
    Route::post('admin-faculty',[AdminModelController::class,'admin_insertFaculty'])->name('admin_insertFaculty');
    Route::get('edit-faculty',[AdminModelController::class,'edit_faculty'])->name('edit_faculty');
    Route::post('edit-faculty',[AdminModelController::class,'update_faculty'])->name('update_faculty');
    Route::post('delete-faculty',[AdminModelController::class,'delete_faculty'])->name('delete_faculty');
    //course
    Route::get('admin-course',[AdminCourseController::class,'admin_course'])->name('admin_course');
    Route::post('admin-course',[AdminCourseController::class,'admin_insertCourse'])->name('admin_insertCourse');
    Route::post('delete-course',[AdminCourseController::class,'delete_course'])->name('delete_course');
    Route::get('edit-course',[AdminCourseController::class,'edit_course'])->name('edit_course');
    Route::post('edit-course',[AdminCourseController::class,'update_course'])->name('update_course');
    //testimonail
    Route::get('admin-testimonial',[TestimonialController::class,'admin_testimonial'])->name('admin_testimonial');
    Route::post('admin-testimonial',[TestimonialController::class,'admin_testi_submit'])->name('admin_testi_submit');
    Route::post('admin-testimonial-status',[TestimonialController::class,'admin_testi_status'])->name('admin_testi_status');
    //gallery
    Route::get('admin-gallery',[GalleryController::class,'admin_gallery'])->name('admin_gallery');
    Route::post('admin-gallery',[GalleryController::class,'admin_gallery_insert'])->name('admin_gallery_insert');
    Route::get('admin-edit-gallery',[GalleryController::class,'admin_edit_gallery'])->name('admin_edit_gallery');
    Route::get('admin-get-gallertcat',[GalleryController::class,'admin_getGalleryCat']);
    Route::post('admin-update-gallery',[GalleryController::class,'admin_gallery_update'])->name('admin_gallery_update');
    Route::post('admin-delete-gallery',[GalleryController::class,'admin_gallery_delete'])->name('admin_gallery_delete');
    //hostel
    Route::get('admin-hostel',[HostelController::class,'admin_hostel'])->name('admin_hostel');
    Route::post('admin-hostel',[HostelController::class,'admin_hostel_insert'])->name('admin_hostel_insert');
    Route::get('admin-edit-hostel',[HostelController::class,'admin_edit_hostel'])->name('admin_edit_hostel');
    Route::post('admin-hostel-update',[HostelController::class,'admin_hostel_update'])->name('admin_hostel_update');
    Route::post('delete-hostel',[HostelController::class,'delete_hostel'])->name('delete_hostel');
    //contact us
    Route::get('admin-contact-us',[AdminModelController::class,'admin_contactus'])->name('admin_contactus');
    Route::get('admin-contact-us-detail',[AdminModelController::class,'admin_contactusDetail'])->name('admin_contactusDetail');
    //enquire now
    Route::get('admin-enquire',[AdminModelController::class,'admin_enquire'])->name('admin_enquire');
    Route::get('admin-enquire-now-detail',[AdminModelController::class,'admin_enquireNowDetail'])->name('admin_enquireNowDetail');
    //Holiday
    Route::get('admin-holiday',[AdminModelController::class,'admin_holiday'])->name('admin_holiday');
    Route::post('admin-holiday',[AdminModelController::class,'admin_holiday_submit'])->name('admin_holiday_submit');
    Route::post('admin-delete-holiday',[AdminModelController::class,'delete_holiday'])->name('delete_holiday');
    Route::get('admin-edit-holiday',[AdminModelController::class,'edit_holiday'])->name('edit_holiday');
    Route::post('admin-update-holiday',[AdminModelController::class,'update_holiday'])->name('update_holiday');
});
