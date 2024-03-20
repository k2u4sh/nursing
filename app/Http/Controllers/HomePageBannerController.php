<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Session;
use App\Models\HomePageBanner;

class HomePageBannerController extends Controller
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
                $homePageBanner = HomePageBanner::first();
                return view('admin.home-page-banner.index', compact('data', 'homePageBanner'));
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
        $banner_data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title_1' => 'required',
            'title_2' => 'required',
            'description' => 'nullable|max:255',
            'staff' => 'nullable',
            'department' => 'nullable',
            'facility' => 'nullable',
        ]);

        try {
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $banner_data['image'] = $imageName;
            }
            
            $banner_status = HomePageBanner::create($banner_data);
    
            if ($banner_status) {
                return redirect()->route('home-page-banners.index')->with('success', 'Banner created successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
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
    public function update(Request $request, $home_page_banner)
    {   
        $banner_request = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title_1' => 'required',
            'title_2' => 'required',
            'description' => 'nullable|max:255',
            'staff' => 'nullable',
            'department' => 'nullable',
            'facility' => 'nullable',
        ]);
        
        try {
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $banner_request['image'] = $imageName;
            }
    
            $banner = HomePageBanner::find($home_page_banner);
            
            $banner_status = $banner->update($banner_request);
    
            if ($banner_status) {
                return redirect()->route('home-page-banners.index')->with('success', 'Banner update successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
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
            // $homePageBannerStatus = $homePageBanner->delete();

            // if ($homePageBannerStatus) {
            //     return redirect()->route('home_page_banners.index')->with('success', 'Banner deleted successfully.');
            // }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function strip_index()
    {
        try {
            
            if(Session::has('loginId'))
            {
                $homePageBanner = HomePageBanner::first();
                return view('admin.home-page-banner.strip-index', compact('homePageBanner'));
            }
            else
            {
                return redirect('admin-login');
            }

        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
    }
}
