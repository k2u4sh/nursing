<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddHeaderData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $data = DB::table('departments')->where('soft_delete', '0')->get();
        \Illuminate\Support\Facades\View::share('departmentData', $data);
        $coursedata = DB::table('admin_courses')->where('soft_delete','0')->get();
        \Illuminate\Support\Facades\View::share('courseData', $coursedata);
        return $next($request);
    }
}
