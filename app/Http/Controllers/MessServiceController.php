<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MessService;
use App\Models\MessServiceHeader;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class MessServiceController extends Controller
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
            if(Session::has('loginId')){
                $data = AdminModel::where('user_type_id', Session::get('loginId'))->first();
                $mess_services = MessService::all();
                $mess_services_header = MessServiceHeader::first();
                return view('admin.mess-services.index', compact('data', 'mess_services', 'mess_services_header'));
            }
            else {
                return redirect('/admin-login');
            }
           
        } catch (\Throwable $th) {
            //throw $th;
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
            'title' => 'required',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $messService = new MessService([
                'title' => $request->input('title'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
            ]);
    
            $mess_service_status = $messService->save();

            if ($mess_service_status) {
                return response()->json(['success' => 'Mess service created successfully.']);
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
            $mess_service_status = MessService::find($id);
            
            if ($mess_service_status) {
                return response()->json($mess_service_status);
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
            'title' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {

            $messService = MessService::find($request->mess_service_id);
            $messService -> title = $request->input('title');
            $messService -> from = $request->input('from');
            $messService->to = $request->input('to');
            $mess_service_status = $messService->save();

            if ($mess_service_status) {
                return response()->json(['success' => 'Mess service updated successfully.']);
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
    public function destroy($id = null)
    {
        try {
            $mess_service_status = MessService::find($id)->delete();

            if ($mess_service_status) {
                return response()->json(['success'=>'Mess service deleted successfully.']);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong']);
        }
    }

    public function selected_mess_service_delete(Request $request)
    {
        $selectedIds = $request->input('ids');

        try {
            
            $mess_service_status = MessService::whereIn('id', $selectedIds)->delete();
    
            if ($mess_service_status) {
                return response()->json(['success'=>'Mess service delete successfully.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Strip.']);
        }
    }

    public function header_store(Request $request)
    {
        $mess_header = $request->validate([
            'mess_header_id' => 'nullable',
            'title' => 'required|string|max:100',
        ]);
       
        try {

            if ($request->mess_header_id) {
                $mess_header_status = MessServiceHeader::first()->update($mess_header);
            } else {
                $mess_header_status = MessServiceHeader::create($mess_header);
            }

            if ($mess_header_status) {
                return back()->with('success', 'Mess service header save successfully.');
            }
        
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong.');
        }
    }
}
