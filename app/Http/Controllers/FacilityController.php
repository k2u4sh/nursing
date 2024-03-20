<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\facilityHeader;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FacilityController extends Controller
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
                $facility_header = facilityHeader::first();
                $facilities = Facility::all();
                return view('admin.facility.index', compact('data', 'facility_header', 'facilities'));
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
       
        try {

            $facility = new Facility;
            $facility->title = $request->input('title');
            $facility->description = $request->input('description');

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('facility'), $imageName);
                $facility->image = $imageName;
            }
            
            $facility_status = $facility->save();

            if ($facility_status) {
                return response()->json(['success' => 'Facility saved successfully.']);
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
            $facility = Facility::find($id);
            
            if ($facility) {
                return response()->json($facility);
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {

            $facility = Facility::find($request->facility_id);
            $facility->title = $request->input('title');
            $facility->description = $request->input('description');

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('facility'), $imageName);
                $facility->image = $imageName;
            }
            
            $facility_status = $facility->save();

            if ($facility_status) {
                return response()->json(['success' => 'Facility update successfully.']);
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
            $facility_status = Facility::find($id)->delete();

            if ($facility_status) {
                return response()->json(['success'=>'Facility delete successfully.']);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Someting went wrong.']);
        }
    }

    public function header_store(Request $request)
    {
        $facility_header = $request->validate([
            'facility_header_id' => 'nullable',
            'title' => 'required|string|max:100',
        ]);
       
        try {

            if ($request->facility_header_id) {
                $facility_header_status = facilityHeader::first()->update($facility_header);
            } else {
                $facility_header_status = facilityHeader::create($facility_header);
            }

            if ($facility_header_status) {
                return back()->with('success', 'Facility header save successfully.');
            }
        
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function selected_facility_delete(Request $request)
    {
        $selectedIds = $request->input('ids');

        try {
            
            $facility_status = Facility::whereIn('id', $selectedIds)->delete();
    
            if ($facility_status) {
                return response()->json(['success'=>'Facility delete successfully.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting awards & recognitions.']);
        }
    }
}
