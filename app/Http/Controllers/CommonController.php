<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\Exam;
use App\Models\Staff_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function staff_login()
    {
        return view('staff_login');
    }
    public function staff_login_submit(Request $request)
    {
        $request->validate([
    		'staff_id'    => 'required',
    		'staff_pass' => 'required'
    	]);
        $staffData = AdminModel::where('registration_num',$request->staff_id)->where('user_type_id', '2')->first();
        if($staffData)
        {
            if(Hash::check($request->staff_pass, $staffData->password)){
    			$request->session()->put('staffId', $staffData->registration_num);
    			return redirect('dashboard-staff');
    		}else{
    			Session::flash('fail', 'Password does not match');
    			// return back()->with('fail', 'Password does not matches');
    			return redirect('/staff-login');
    		}
        }else{
            return back()->with('fail', 'Staff ID does not exist');
        }
    }
    public function staff_logout()
    {
        if(Session::has('staffId')){
    		Session::pull('staffId');
    		return redirect('/staff-login');
    	}
    }
    public function student_login()
    {
        return view('student_login');
    }
    public function student_login_submit(Request $request)
    {
        $request->validate([
    		'student_id'    => 'required',
    		'student_pass' => 'required'
    	]);
        $studentData = AdminModel::where('registration_num',$request->student_id)->where('user_type_id', '3')->first();

        if($studentData){
            if(Hash::check($request->student_pass, $studentData->password)){
    			$request->session()->put('studentId', $studentData->registration_num);
    			return redirect('dashboard-student');
    		}else{
    			Session::flash('fail', 'Password does not match');
    			// return back()->with('fail', 'Password does not matches');
    			return redirect('/student-login');
    		}
        }else{
            return back()->with('fail', 'Student ID does not exist');
        }
    }
    public function student_logout()
    {
        if(Session::has('studentId')){
    		Session::pull('studentId');
    		return redirect('/student-login');
    	}
    }
    public function dashboard_student()
    {
        $data = array();
    	if(Session::has('studentId')){
    		$data = AdminModel::where('registration_num', Session::get('studentId'))->first();
            return view('student.dashboard_student',compact('data'));
    	}else{
            return redirect('/student-login');
        }
    }
    public function dashboard_staff()
    {
        $data = array();
    	if(Session::has('staffId')){
    		$data = AdminModel::where('registration_num', Session::get('staffId'))->first();
            return view('staff.dashboard_staff',compact('data'));
    	}else{
            return redirect('/staff-login');
        }
    }
    public function staff_profile(Request $request)
    {
        $data = array();
    	if(Session::has('staffId')){
    		$data = AdminModel::where('registration_num', Session::get('staffId'))->first();
            return view('staff.staff-profile',compact('data'));
    	}else{
            return redirect('/staff-login');
        }
    }
    public function staff_edit_profile()
    {
        $data = array();
    	if(Session::has('staffId')){
    		$data = AdminModel::where('registration_num', Session::get('staffId'))->first();
            // dd($data);
            $state = DB::table('states')->select('*')->get();
            return view('staff.staff-profileDetail',compact('data','state'));
    	}else{
            return redirect('/staff-login');
        }
    }
    public function staff_update_profile(Request $request)
    {
        if(Session::has('staffId')){
            $user = AdminModel::where('registration_num',Session::get('staffId'))->where('user_type_id','2')->first();
            // dd($request->all());
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->registration_num = $request->user_name;
            $user->mobile = $request->mobile?$request->mobile:'';
            $user->state_id = $request->state_id?$request->state_id:'';
            $user->city_id = $request->cityId?$request->cityId:'';
            $user->biodata = $request->biodata?$request->biodata:'';
            $updateData = $user->update();
            if($updateData)
            {
                $json_resp['status'] = 'success';
            }else{
                $json_resp['status'] = 'error';
            }
            return response()->json(@$json_resp);

        }else{
            return redirect('/staff-login');
        }
    }
    public function student_profile(Request $request)
    {
        $data = array();
    	if(Session::has('studentId')){
    		$data = AdminModel::where('registration_num', Session::get('studentId'))->first();
            return view('student.student-profile',compact('data'));
    	}else{
            return redirect('/student-login');
        }
    }
    public function student_edit_profile()
    {
        $data = array();
    	if(Session::has('studentId')){
    		$data = AdminModel::where('registration_num', Session::get('studentId'))->first();
            // dd($data);
            $state = DB::table('states')->select('*')->get();
            return view('student.student-profileDetail',compact('data','state'));
    	}else{
            return redirect('/student-login');
        }
    }
    public function student_update_profile(Request $request)
    {
        if(Session::has('studentId')){
            $user = AdminModel::where('registration_num',Session::get('studentId'))->where('user_type_id','3')->first();
            // dd($request->all());
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->registration_num = $request->user_name;
            $user->mobile = $request->mobile?$request->mobile:'';
            $user->state_id = $request->state_id?$request->state_id:'';
            $user->city_id = $request->city_id?$request->city_id:'';
            $user->biodata = $request->biodata?$request->biodata:'';
            $updateData = $user->update();
            if($updateData)
            {
                $json_resp['status'] = 'success';
            }else{
                $json_resp['status'] = 'error';
            }
            return response()->json(@$json_resp);

        }else{
            return redirect('/student-login');
        }
    }
    public function city_list(Request $request)
    {
        $allCity = DB::table('cities')->where('state_id',$request->st_id)->get();
        $cityList = DB::table('cities')->where('state_id',$request->st_id)->where('id',$request->ct_id)->first();

        $json_resp['allCity'] = $allCity;
        $json_resp['cityList'] = $cityList;
        return response()->json(@$json_resp);
    }
    public function exam_details(Request $request)
    {
        $data = array();
    	if(Session::has('studentId')){
    		$data = AdminModel::where('registration_num', Session::get('studentId'))->first();
            $exam_details = Exam::where('user_id',$data->id)->get();
            // dd($exam_details);
            return view('student.exam_details',compact('data','exam_details'));
    	}else{
            return redirect('/student-login');
        }
        // if(Session::has('studentId')){
        //     $student_id = Session::get('studentId');
        //     $user_id = AdminModel::where('registration_num',$student_id)->first();
        //     $exam_details = Exam::where('user_id',$user_id->id)->get();
        //     return view('student.exam_details');
        // }else{
        //     return redirect('/student-login');
        // }
    }
    public function staff_upload_assignment()
    {
        $data = array();
    	if(Session::has('staffId')){
    		$data = AdminModel::where('registration_num', Session::get('staffId'))->first();
            return view('staff.staff-upload-assignment',compact('data'));
    	}else{
            return redirect('/student-login');
        }
    }
    public function staff_submit_assignment(Request $request)
    {
        $file = $request->file('staff_assignment');
        $assignment = new Staff_Assignment;
        $path = public_path('/upload/staff-assignment/');
        if(!empty($file)){
            $img_file = $file->getClientOriginalName();
            $file->move($path,$img_file);
            $assignment->assignment_name = $img_file;
            $staff_id = AdminModel::where('registration_num',Session::get('staffId'))->first();
            $assignment->staff_id = $staff_id->id;
            $ins = $assignment->save();
        }

        if($ins)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function staff_assignment_list(Request $request)
    {
        $data = array();
    	if(Session::has('staffId')){
    		$data = AdminModel::where('registration_num', Session::get('staffId'))->first();
            $assignmentData = Staff_Assignment::where('soft_delete','0')->get();
            return view('staff.staff-assignment-list',compact('data','assignmentData'));
    	}else{
            return redirect('/student-login');
        }
    }
    public function change_status(Request $request)
    {
        $assignment = Staff_Assignment::find($request->id);
        $assignment->status = $request->selected;
        $updateData = $assignment->update();
        if($updateData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
}
