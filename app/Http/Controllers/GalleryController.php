<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class GalleryController extends Controller
{
    public function admin_gallery()
    {
        $data = array();
    	if(Session::has('loginId')){
    		$data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
            $gallery_cat = DB::table('gallery_cat')->where('soft_delete','0')->get();
            $allgallaryData = Gallery::where('soft_delete','0')->get();
            // dd($allgallaryData);
            return view('admin.admin_gallery',compact('data','gallery_cat','allgallaryData'));
    	}else{
            return redirect('/admin-login');
        }
    }
    public function admin_gallery_insert(Request $request)
    {
        $gallery_image = $request->file('img_name');
        $path = public_path('/upload/gallery/');
        if(!empty($gallery_image))
        {
            $gall_img = $gallery_image->getClientOriginalName();
            $gallery_image->move($path,$gall_img);
        }
        $gallery = new Gallery;
        $gallery->cat_id = $request->cat_id;
        $gallery->img_alt = $request->img_alt?$request->img_alt:'';
        $gallery->image_name = $gall_img;
        $insertData = $gallery->save();
        if($insertData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admin_edit_gallery(Request $request)
    {
        $galleryData = Gallery::find($request->id);
        $allGalleryCategory = DB::table('gallery_cat')->where('soft_delete', '0')->get();
        if($galleryData){
            $json_resp['status'] = 'success';
            $json_resp['galleryData'] = $galleryData;
            $json_resp['allGalleryCategory'] = $allGalleryCategory;
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admin_gallery_update(Request $request)
    {
        $gallery = Gallery::find($request->gallry_id);
        $gallery->id = $request->gallry_id;
        $gallery->cat_id = $request->cat_id;
        if(!empty($request->img_alt))
        $gallery->img_alt = $request->img_alt;
        $gall_img = $request->file('img_name');
        $path = public_path('/upload/gallery/');
        if(!empty($gall_img))
        {
            $img_file = $gall_img->getClientOriginalName();
            $gall_img->move($path,$img_file);
            $gallery->image_name = $img_file;
        }
        $insertData = $gallery->update();
        if($insertData)
        {
            $json_resp['status'] = 'success';
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admin_getGalleryCat()
    {
        $allGalleryCategory = DB::table('gallery_cat')->where('soft_delete', '0')->get();
        if($allGalleryCategory)
        {
            $json_resp['status'] = 'success';
            $json_resp['allGalleryCategory'] = $allGalleryCategory;
        }else{
            $json_resp['status'] = 'error';
        }
        return response()->json(@$json_resp);
    }
    public function admin_gallery_delete(Request $request)
    {
        // dd($request->all());
        if(is_array($request->id)){
            foreach($request->id as $id){
                $gallery = Gallery::where('id',$id)->first();
                $gallery->soft_delete = '1';
                $updateData = $gallery->update();
            }
        }else{
            $gallery = Gallery::find($request->id);
            $gallery->id = $request->id;
            $gallery->soft_delete = '1';
            $updateData = $gallery->update();
        }

        if($updateData)
        {
            $json_resp['status'] = 'success';
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
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
