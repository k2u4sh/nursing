<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\About;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\ContactUs;
use App\Models\EnquireNow;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class AdminModelController extends Controller
{
    //Admin Login Function
    public function admin_login()
    {
        return view('admin.admin_login');
    }

    /*
    @authod: Mohd Amir
    @function: admin_login_submit()
    @description: Admin Login Form Submit Function
    */
    public function admin_login_submit(Request $request)
    {
        if($request->email == '' && $request->password == ''){
            return back()->with('fail','Please enter email address and password');
        }else if($request->email == ''){
            return back()->with('fail','Please enter email address');
        }else if($request->password == ''){
            return back()->with('fail','Please enter password');
        }
        $request->validate([
    		'email'    => 'required|email',
    		'password' => 'required'
    	]);
        $users = AdminModel::where('email',$request->email)->where('user_type_id', '1')->first();
        if($users){
            if(Hash::check($request->password, $users->password)){
    			$request->session()->put('loginId', $users->user_type_id);
    			return redirect('dashboard-admin');
    		}else{
    			// Session::flash('fail', 'Password does not match');
    			return back()->with('fail', 'Password does not matches')->withInput();
    			return redirect('/admin-login');
    		}
        }else{
            return back()->with('fail', 'Email does not exist');
        }
    }
    /*
    @authod: Mohd Amir
    @function: dashboard_admin()
    @description: Admin Dashboard Function
    */
    public function dashboard_admin()
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            return view('admin.dashboard-admin',compact('data'));
    	}else{
            return redirect('/admin-login');
        }
    }
    public function admin_profile(Request $request)
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            return view('admin.admin_profile',compact('data'));
    	}else{
            return redirect('/admin-login');
        }
    }
    public function admin_edit_profile(Request $request)
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $state = DB::table('states')->select('*')->get();
            return view('admin.admin_edit_profile',compact('data','state'));
    	}else{
            return redirect('/admin-login');
        }
    }
    public function admin_update_profile(Request $request)
    {
        if(Session::has('loginId')){
            $user = AdminModel::find(Session::get('loginId'));
            $user->first_name = $request->first_name?$request->first_name:'';
            $user->last_name = $request->last_name?$request->last_name:'';
            $user->registration_num = $request->user_name?$request->user_name:'';
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
                return redirect('/admin-login');
            }
    }
    public function cities_list(Request $request)
    {
        $selectedCities = DB::table('cities')->select('*')->where('state_id', $request->id)->get();
        if($selectedCities){
            $json_resp['status'] = 'success';
            $json_resp['data'] = $selectedCities;
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    /*
    @authod: Mohd Amir
    @function: logout()
    @description: Admin logout Function
    */
    public function logout()
    {
    	if(Session::has('loginId')){
    		Session::pull('loginId');
    		return redirect('/admin-login');
    	}
    }
    /*
    @authod: Mohd Amir
    @function: admin_aboutus()
    @description: Admin Aboutus Function
    */
    public function admin_aboutus()
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $aboutData = About::find('1');
            // dd($aboutData->contents);
            return view('admin.admin_aboutus',compact('data', 'aboutData'));
    	}else{
            return redirect('/admin-login');
        }
    }
    /*
    @authod: Mohd Amir
    @function: admin_aboutus_update()
    @description: Admin Aboutus update Function
    */
    public function admin_aboutus_update(Request $request)
    {
        $aboutAlldata = About::find(1);
        // dd($aboutAlldata->title);
        $banner_image = $request->file('about_banner');
        $side_image = $request->file('side_image');
        $objectiveFile = $request->file('objectiveFile');
        $princi_file = $request->file('principal_image');
        $contents = $request->aboutus;
        $title = $request->aboutTitle;
        $objective = $request->objective;
        $philosophy = $request->philosophy;
        $banner_file = $aboutAlldata->banner_image;
        $side_file = $aboutAlldata->side_image;
        $obj_file = $aboutAlldata->objective_image;
        $philosophy_text = $request->philosophy?$philosophy:$aboutAlldata->philosophy;
        $principal_file = $aboutAlldata->principal_image;
        $princi_msg = $request->princi_msg?$request->princi_msg:$aboutAlldata->princi_msg;
        $path = public_path('/upload/aboutus/');
        if(!empty($banner_image))
        {
            $banner_file = $banner_image->getClientOriginalName();
            $banner_image->move($path,$banner_file);
        }
        if(!empty($side_image))
        {
            $side_file = $side_image->getClientOriginalName();
            $side_image->move($path,$side_file);
        }
        if(!empty($objectiveFile))
        {
            $obj_file = $objectiveFile->getClientOriginalName();
            $objectiveFile->move($path,$obj_file);
        }
        if(!empty($princi_file))
        {
            $principal_file = $princi_file->getClientOriginalName();
            $princi_file->move($path,$principal_file);
        }
        // if(!empty($banner_file) && !empty($side_file)){
        //     $data = About::where('id', '1')->update(['title' => $title, 'objectives' =>$objective,'banner_image' => $banner_file, 'side_image' => $side_file, 'contents' => $contents]);
        // }else if(!empty($banner_file) && empty($side_file)){
        //     $data = About::where('id', '1')->update(['title' => $title, 'objectives' =>$objective, 'banner_image' => $banner_file, 'contents' => $contents]);
        // }else if(empty($banner_file) && !empty($side_file)){
        //     $data = About::where('id', '1')->update(['title' => $title, 'objectives' =>$objective, 'side_image' => $side_file, 'contents' => $contents]);
        // }else{
        //     $data = About::where('id', '1')->update(['title' => $title, 'objectives' =>$objective, 'contents' => $contents]);
        // }
        $data = About::where('id', '1')->update(['title' => $title,'philosophy'=>$philosophy_text,'principal_image'=>$principal_file,'princi_msg'=>$princi_msg, 'objectives' =>$objective,'objective_image'=>$obj_file,'banner_image' => $banner_file, 'side_image' => $side_file, 'contents' => $contents]);
        if($data)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    /*
    @authod: Mohd Amir
    @function: admin_dept()
    @description: Admin department Function
    */
    public function admin_dept()
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $dept_data = Department::where('soft_delete','0')->get();
            // dd($dept_data->dept_name);
            return view('admin.admin_dept',compact('data','dept_data'));
    	}else{
            return redirect('/admin-login');
        }
    }
    /*
    @authod: Mohd Amir
    @function: add_departments()
    @description: Admin add department Function
    */
    public function add_departments(Request $request)
    {
        $request->validate([
    		'dept_name'    => 'required',
    		'dept_desc' => 'required'
    	]);
        $dept_image = $request->file('dept_image');
        $path = public_path('/upload/department/');
        if(!empty($dept_image))
        {
            $dept_img = $dept_image->getClientOriginalName();
            $dept_image->move($path,$dept_img);
        }
        $department = new Department;
        $department->dept_name = $request->dept_name;
        $department->dept_contents = $request->dept_desc?$request->dept_desc:'';
        $department->obj_comp = $request->obj_comp?$request->obj_comp:'';
        $department->dept_image = $dept_img;
        $insertData = $department->save();
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
    @function: edit_departments()
    @description: Admin edit department Function
    */
    public function edit_departments(Request $request)
    {
        $departmentData = Department::find($request->id);
        if($departmentData){
            $json_resp['status'] = 'success';
            $json_resp['data'] = $departmentData;
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    /*
    @authod: Mohd Amir
    @function: update_departments()
    @description: Admin update department Function
    */
    public function update_departments(Request $request)
    {
        $request->validate([
    		'dept_name'    => 'required',
    		'dept_desc' => 'required'
    	]);
        $department = Department::find($request->dept_id);
        $department->id = $request->dept_id;
        $department->dept_name = $request->dept_name;
        $department->dept_contents = $request->dept_desc?$request->dept_desc:'';
        $department->obj_comp = $request->obj_comp?$request->obj_comp:'';

        $dept_image = $request->file('dept_image');
        $path = public_path('/upload/department/');
        if(!empty($dept_image))
        {
            $dept_img = $dept_image->getClientOriginalName();
            $dept_image->move($path,$dept_img);
            $department->dept_image = $dept_img;
        }

        $updateData = $department->update();
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
    @function: delete_departments()
    @description: Admin delete department Function
    */
    public function delete_departments(Request $request)
    {
        if(is_array($request->id)){
            foreach($request->id as $id){
                $department = Department::where('id', $id)->first();
                $department->soft_delete = '1';
                $updateData = $department->update();
            }
        }else{
            $department = Department::find($request->id);
            $department->id = $request->id;
            $department->soft_delete = '1';
            $updateData = $department->update();
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
    @function: admin_faculty()
    @description: Admin faculty list Function
    */
    public function admin_faculty(Request $request)
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $facultyData = Faculty::where('soft_delete','0')->get();
            return view('admin.admin_faculties',compact('data','facultyData'));
    	}else{
            return redirect('/admin-login');
        }
    }
    /*
    @authod: Mohd Amir
    @function: admin_faculty()
    @description: Admin add faculty Function
    */
    public function admin_insertFaculty(Request $request)
    {
        $faculty = new Faculty;
        $faculty->faculty_name = $request->faculty_name;
        $faculty->designation = $request->faculty_designation;
        $faculty->experience = $request->faculty_expe?$request->faculty_expe:'';
        $faculty->faculty_phone = $request->faculty_phone?$request->faculty_phone:'';
        $faculty->faculty_email = $request->faculty_email?$request->faculty_email:'';
        $faculty->faculty_address = $request->faculty_address?$request->faculty_address:'';
        $faculty->faculty_contents = $request->faculty_desc?$request->faculty_desc:'';
        $faculty->sub_expert = $request->sub_expert?$request->sub_expert:'';
        $faculty->research_interest = $request->research_interest?$request->research_interest:'';
        $faculty->rewards = $request->rewards?$request->rewards:'';
        $faculty->recent_publication = $request->recent_publication?$request->recent_publication:'';
        $faculty->conference = $request->conference?$request->conference:'';
        $faculty_image = $request->file('faculty_image');
        $path = public_path('/upload/faculty/');
        if(!empty($faculty_image))
        {
            $img_file = $faculty_image->getClientOriginalName();
            $faculty_image->move($path,$img_file);
            $faculty->faculty_image = $img_file;
        }
        $insertData = $faculty->save();
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
    @function: edit_faculty()
    @description: Admin edit faculty Function
    */
    public function edit_faculty(Request $request)
    {
        $faculty_data = Faculty::find($request->id);
        if($faculty_data){
            $json_resp['status'] = 'success';
            $json_resp['data'] = $faculty_data;
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function update_faculty(Request $request)
    {
        $request->validate([
    		'faculty_name'    => 'required',
    		'faculty_designation' => 'required'
    	]);

        $faculty = Faculty::find($request->faculty_id);
        $faculty->faculty_name = $request->faculty_name;
        $faculty->designation = $request->faculty_designation;
        $faculty->experience = $request->faculty_expe?$request->faculty_expe:'';
        $faculty->faculty_phone = $request->faculty_phone?$request->faculty_phone:'';
        $faculty->faculty_email = $request->faculty_email?$request->faculty_email:'';
        $faculty->faculty_address = $request->faculty_address?$request->faculty_address:'';
        $faculty->faculty_contents = $request->faculty_desc?$request->faculty_desc:'';
        $faculty->sub_expert = $request->sub_expert?$request->sub_expert:'';
        $faculty->research_interest = $request->research_interest?$request->research_interest:'';
        $faculty->rewards = $request->rewards?$request->rewards:'';
        $faculty->recent_publication = $request->recent_publication?$request->recent_publication:'';
        $faculty->conference = $request->conference?$request->conference:'';
        $faculty_image = $request->file('faculty_image');
        $path = public_path('/upload/faculty/');
        if(!empty($faculty_image))
        {
            $img_file = $faculty_image->getClientOriginalName();
            $faculty_image->move($path,$img_file);
            $faculty->faculty_image = $img_file;
        }
        $updateData = $faculty->update();
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
    @function: delete_faculty()
    @description: Admin delete faculty Function
    */
    public function delete_faculty(Request $request)
    {
        if(is_array($request->id))
        {
            foreach($request->id as $id)
            {
                $faculty = Faculty::where('id',$id)->first();
                $faculty->soft_delete = '1';
                $updateData = $faculty->update();
            }
        }else{
            $faculty = Faculty::find($request->id);
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
    @function: admin_contactus()
    @description: Admin contact us Function
    */
    public function admin_contactus()
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $contactdata = ContactUs::get();
            return view('admin.admin-contact-us',compact('data','contactdata'));
    	}else{
            return redirect('/admin-login');
        }
    }
    /*
    @authod: Mohd Amir
    @function: admin_contactusDetail()
    @description: Admin contact us detail info Function
    */
    public function admin_contactusDetail(Request $request)
    {
        $contactdata = ContactUs::find($request->id);
        if($contactdata)
        {
            $json_resp['status'] = 'success';
            $json_resp['data'] = $contactdata;
        }
        else
        {
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    /*
    @authod: Mohd Amir
    @function: admin_enquire()
    @description: Admin enquire Function
    */
    public function admin_enquire()
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $contactdata = EnquireNow::get();
            return view('admin.admin-enquire',compact('data','contactdata'));
    	}else{
            return redirect('/admin-login');
        }
    }
    /*
    @authod: Mohd Amir
    @function: admin_enquireNowDetail()
    @description: Admin enquire now Function
    */
    public function admin_enquireNowDetail(Request $request)
    {
        $contactdata = EnquireNow::find($request->id);
        $state_name = State::find($contactdata->state);
        $city_name = City::find($contactdata->city);
        // dd($contactdata->course);
        $course_name  = DB::table('courses')->where('id',$contactdata->course)->get();
        $specialization = DB::table('specializations')->where('id', $contactdata->specialization)->get();
        // dd($specialization[0]->name);
        if($contactdata)
        {
            $json_resp['status'] = 'success';
            $json_resp['data'] = $contactdata;
            $json_resp['state'] = $state_name->state_title;
            $json_resp['city'] = $city_name->name;
            $json_resp['course'] = $course_name[0]->course_name;
            $json_resp['specialization'] = $specialization[0]->name;
        }
        else
        {
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
}
