<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_hostel(Request $request)
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $hostel = Hostel::where('soft_delete','0')->get();
            // dd($testimonial);
            return view('admin.admin_hostel',compact('data','hostel'));
    	}else{
            return redirect('/admin-login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_hostel_insert(Request $request)
    {
        $hostel = new Hostel;
        $hostel->occupacy_type = $request->occu_type;
        $hostel->room_desc = $request->room_desc?$request->room_desc:'';
        $hostel->recent_publication = $request->recent_publication?$request->recent_publication:'';
        $hostel->hostel_info = $request->hostel_info?$request->hostel_info:'';
        $hostel->no_of_room = $request->no_room?$request->no_room:'';
        $hostel->seat_available = $request->avail_seat?$request->avail_seat:'';
        $hostel->security_deposite = $request->security_deposite?$request->security_deposite:'';
        $hostel->hostel_fee = $request->hostel_fee?$request->hostel_fee:'';
        $hostel_img = $request->file('room_image');
        $path = public_path('/upload/hostel/');
        if(!empty($hostel_img))
        {
            $img_file = $hostel_img->getClientOriginalName();
            $hostel_img->move($path,$img_file);
            $hostel->room_img = $img_file;
        }
        // dd($img_file);
        $insertData = $hostel->save();
        if($insertData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_edit_hostel(Request $request)
    {
        $hostel_data = Hostel::find($request->id);
        if($hostel_data){
            $json_resp['status'] = 'success';
            $json_resp['data'] = $hostel_data;
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function admin_hostel_update(Request $request)
    {
        $hostel = Hostel::find($request->id);
        $hostel->id = $request->id;
        $hostel->occupacy_type = $request->occu_type;
        $hostel->room_desc = $request->room_desc?$request->room_desc:'';
        $hostel->recent_publication = $request->recent_publication?$request->recent_publication:'';
        $hostel->hostel_info = $request->hostel_info?$request->hostel_info:'';
        $hostel->no_of_room = $request->no_room?$request->no_room:'';
        $hostel->seat_available = isset($request->avail_seat)?$request->avail_seat:NULL;
        $hostel->security_deposite = $request->security_deposite?$request->security_deposite:'';
        $hostel->hostel_fee = $request->hostel_fee?$request->hostel_fee:'';
        $hostel_img = $request->file('room_image');
        $path = public_path('/upload/hostel/');
        if(!empty($hostel_img))
        {
            $img_file = $hostel_img->getClientOriginalName();
            $hostel_img->move($path,$img_file);
            $hostel->room_img = $img_file;
        }
        // dd($img_file);
        $insertData = $hostel->update();
        if($insertData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function delete_hostel(Request $request)
    {
        if(is_array($request->id))
        {
            foreach($request->id as $id)
            {
                $hostel = Hostel::where('id',$id)->first();
                $hostel->soft_delete = '1';
                $updatedData = $hostel->update();
            }
        }else{
            $hostel = Hostel::find($request->id);
            $hostel->soft_delete = '1';
            $updatedData = $hostel->update();
        }

        if($updatedData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hostel $hostel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        //
    }
}
