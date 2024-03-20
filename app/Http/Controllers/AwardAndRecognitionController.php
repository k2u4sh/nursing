<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AwardAndRecognition;
use App\Models\AwardHeader;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AwardAndRecognitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        try {

            $data = array();
            if(Session::has('loginId'))
            {
                $data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
                $award_recognitions = AwardAndRecognition::all();
                $award_header = AwardHeader::first();
                return view('admin.awards-recognition.index', compact('data', 'award_recognitions', 'award_header'));
            }
            else
            {
                return redirect('admin-login');
            }

        } catch (\Throwable $th) {
            return redirect('/');
        }
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
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img_title' => 'required|string|max:255',
            'img_description' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
       
        try {

            $award_recognition = new AwardAndRecognition;
            $award_recognition->img_title = $request->input('img_title');
            $award_recognition->img_description = $request->input('img_description');

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('awards'), $imageName);
                $award_recognition->image = $imageName;
            }
            
            $award_recognition_status = $award_recognition->save();

            if ($award_recognition_status) {
                return response()->json(['success' => 'Award & Recognition saved successfully.']);
            }
        
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Someting went wrong.']);
        }
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $award_recognition = AwardAndRecognition::find($id);
            
            if ($award_recognition) {
                return response()->json($award_recognition);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Someting went wrong.']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {   
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img_title' => 'required|string|max:255',
            'img_description' => 'required|string',
        ]);
        
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {

            $award_recognition = AwardAndRecognition::find($request->awardRecognition_id);
            $award_recognition->img_title = $request->input('img_title');
            $award_recognition->img_description = $request->input('img_description');

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('awards'), $imageName);
                $award_recognition->image = $imageName;
            }
            
            $award_recognition_status = $award_recognition->save();

            if ($award_recognition_status) {
                return response()->json(['success' => 'Award & Recognition update successfully.']);
            }

        } catch (\Throwable $th) {
            return response()->json(['error', 'Something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $award_recognition_status = AwardAndRecognition::find($id)->delete();

            if ($award_recognition_status) {
                return response()->json(['success'=>'Award & Recognition delete successfully.']);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Someting went wrong.']);
        }
    }

    public function header_store(Request $request)
    {
        $award_header = $request->validate([
            'award_header_id' => 'nullable',
            'title' => 'required|string|max:100',
            'description' => 'required',
        ]);
       
        try {

            if ($request->award_header_id) {
                $award_header_status = AwardHeader::first()->update($award_header);
            } else {
                $award_header_status = AwardHeader::create($award_header);
            }

            if ($award_header_status) {
                return back()->with('success', 'Awards header save successfully.');
            }
        
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function selected_award_delete(Request $request)
    {
        $selectedIds = $request->input('ids');

        try {
            
            $award_recognition_status = AwardAndRecognition::whereIn('id', $selectedIds)->delete();
    
            if ($award_recognition_status) {
                return response()->json(['success'=>'Award & Recognition delete successfully.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting awards & recognitions.']);
        }
    }
}
