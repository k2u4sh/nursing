<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Strip;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StripController extends Controller
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
                $strips = Strip::all();
                return view('admin.strip.index', compact('data','strips'));
            }
            else
            {
                return redirect('admin-login');
            }

        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
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
            'name' => 'required|string|max:100',
            'count' => 'required|numeric|digits_between:1,8',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $strip = new Strip([
                'name' => $request->input('name'),
                'count' => $request->input('count'),
            ]);
    
            $strip_status = $strip->save();

            if ($strip_status) {
                return response()->json(['success' => 'Strip saved successfully.']);
            }
        
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong']);
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
            $strip_status = Strip::find($id);
            
            if ($strip_status) {
                return response()->json($strip_status);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong']);
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
            'name' => 'required|string|max:100',
            'count' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $strip = Strip::find($request->strip_id);
            $strip->name = $request->name;
            $strip->count = $request->count;
            $strip_status = $strip->save();

            if ($strip_status) {
                return response()->json(['success'=>'Strip update successfully.']);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong']);
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
            $strip_status = Strip::find($id)->delete();

            if ($strip_status) {
                return response()->json(['success'=>'Strip delete successfully.']);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong']);
        }
    }


    public function selected_strip_delete(Request $request)
    {
        $selectedIds = $request->input('ids');

        try {
            
            $strip_recognition_status = Strip::whereIn('id', $selectedIds)->delete();
    
            if ($strip_recognition_status) {
                return response()->json(['success'=>'Strip delete successfully.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Strip.']);
        }
    }
}
