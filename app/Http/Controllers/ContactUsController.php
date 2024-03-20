<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SecondContactUs;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
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
                $second_contact_us = SecondContactUs::first();
                return view('admin.contact-us.index', compact('data', 'second_contact_us'));
            }
            else {
                return redirect('/admin-login');
            }
           
        } catch (\Throwable $th) {
            return redirect('/admin-login');
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
        $contact_us = $request->validate([
            'second_contact_us_id' => 'nullable',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^\+?[0-9]+$/|min:10|max:13',
            'address' => 'required|string',
        ]);
       
        try {

            if ($request->second_contact_us_id) {
                $contact_us_status = SecondContactUs::first()->update($contact_us);
            } else {
                $contact_us_status = SecondContactUs::create($contact_us);
            }

            if ($contact_us_status) {
                return back()->with('success', 'Contact-us save successfully.');
            }
        
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
