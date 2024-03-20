<?php

namespace App\Http\Controllers;

use App\Models\AdminCourse;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCourseController extends Controller
{
    /*
    @authod: Mohd Amir
    @function: admin_course()
    @description: admin course Function
    */
    public function admin_course()
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $course_data = AdminCourse::where('soft_delete','0')->get();
            return view('admin.admin_course',compact('data','course_data'));
    	}else{
            return redirect('/admin-login');
        }
    }
    /*
    @authod: Mohd Amir
    @function: admin_insertCourse()
    @description: admin insert course Function
    */
    public function admin_insertCourse(Request $request)
    {
        $request->validate([
    		'course_name'    => 'required',
    		'course_fee' => 'required'
    	]);
        $course = new AdminCourse;
        $course->course_type = $request->course_type?$request->course_type:'';
        $i = 1;
        if($request->sem)
        {
            $no_of_sem = explode(',',$request->sem);
            foreach($no_of_sem as $val)
            {
                $course->{'sem_fee_' . $i} = $val;
                $i++;
            }
        }
        if($request->year)
        {
            $no_of_year = explode(',',$request->year);
            foreach($no_of_year as $val)
            {
                $course->{'year_fee_' . $i} = $val;
                $i++;
            }
        }

        $course->course_name = $request->course_name;
        $course->course_fee = $request->course_fee;
        $course->course_desc = $request->course_desc?$request->course_desc:'';
        $course->duration = $request->course_duration?$request->course_duration:'';
        $course->adminssion_criteria = $request->adminssion_criteria?$request->adminssion_criteria:'';
        $course->eligibility = $request->eligibility?$request->eligibility:'';
        $course->course_intake = isset($request->course_intake) && $request->course_intake !== '' ? $request->course_intake : null;

        $course_image = $request->file('course_image');
        $path = public_path('/upload/course/');
        if(!empty($course_image)){
            $img_file = $course_image->getClientOriginalName();
            $course_image->move($path,$img_file);
            $course->course_image = $img_file;
        }
        $insertData = $course->save();
        if($insertData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    /*
    @authod: Mohd Amir
    @function: delete_course()
    @description: admin delete course Function
    */
    public function delete_course(Request $request)
    {
        if(is_array($request->id))
        {
            foreach($request->id as $id)
            {
                $faculty = AdminCourse::where('id',$id)->first();
                $faculty->soft_delete = '1';
                $updateData = $faculty->update();
            }
        }else{
            $faculty = AdminCourse::find($request->id);
            $faculty->id = $request->id;
            $faculty->soft_delete = '1';
            $updateData = $faculty->update();
        }

        if($updateData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    /*
    @authod: Mohd Amir
    @function: edit_course()
    @description: admin edit course Function
    */
    public function edit_course(Request $request)
    {
        $course_data = AdminCourse::find($request->id);
        if($course_data){
            $json_resp['status'] = 'success';
            $json_resp['data'] = $course_data;
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function update_course(Request $request)
    {
        // return $request;die;
        $request->validate([
    		'course_name'    => 'required',
    		'course_fee' => 'required'
    	]);
        $course = AdminCourse::find($request->id);
        $course->id = $request->id;
        $course->course_name = $request->course_name;
        $course->course_fee = $request->course_fee;
        $course->course_desc = $request->course_desc?$request->course_desc:'';
        $course->duration = $request->course_duration?$request->course_duration:'';
        $course->adminssion_criteria = $request->adminssion_criteria?$request->adminssion_criteria:'';
        $course->eligibility = $request->eligibility?$request->eligibility:'';
        $course->course_intake = isset($request->course_intake) && $request->course_intake !== '' ? $request->course_intake : null;
        $course->course_type = $request->course_type;

        $course_image = $request->file('course_image');
        $path = public_path('/upload/course/');
        if(!empty($course_image)){
            $img_file = $course_image->getClientOriginalName();
            $course_image->move($path,$img_file);
            $course->course_image = $img_file;
        }
        $insertData = $course->save();
        if($insertData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
}
