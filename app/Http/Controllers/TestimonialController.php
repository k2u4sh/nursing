<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    public function admin_testimonial()
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $testimonial = Testimonial::get();
            // dd($testimonial);
            return view('admin.admin_testimonial',compact('data','testimonial'));
    	}else{
            return redirect('/admin-login');
        }
    }
    public function admin_testi_submit(Request $request)
    {
        if(Session::has('loginId')){
            $user_id = Session::get('loginId');
            $testimonial = new Testimonial;
            $testimonial->user_id = $user_id;
            $testimonial->title = $request->title;
            $testimonial->name = $request->testi_name1;
            $testimonial->occupation = $request->occupation;
            $testimonial->rating = $request->rating?$request->rating:'';
            $testimonial->description = $request->desc?$request->desc:'';
            $ins = $testimonial->save();
            if($ins)
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
    public function admin_testi_status(Request $request)
    {
        if(Session::has('loginId')){
            $testimonial = Testimonial::find($request->id);
            $testimonial->soft_delete = ($testimonial->soft_delete == '0')?'1':'0';
            $updatedData = $testimonial->update();
            if($updatedData){
                $json_resp['status'] = 'success';
            }else{
                $json_resp['status'] = 'error';
            }
            return response()->json(@$json_resp);
        }else{
            return redirect('/admin-login');
        }
    }
    public function delete_testimonial(Request $request)
    {
        if(is_array($request->id))
        {
            foreach($request->id as $id)
            {
                $hostel = Testimonial::where('id',$id)->first();
                // $hostel->soft_delete = '1';
                $updatedData = $hostel->delete();
            }
        }else{
            $hostel = Testimonial::find($request->id);
            // $hostel->soft_delete = '1';
            $updatedData = $hostel->delete();
        }

        if($updatedData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }

    public function view_testimonial(Request $request)
    {
        $hostel_data = Testimonial::find($request->id);
        if($hostel_data){
            $json_resp['status'] = 'success';
            $json_resp['data'] = $hostel_data;
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
