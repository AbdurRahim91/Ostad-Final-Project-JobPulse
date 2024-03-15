<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\JobCategories;
use App\Models\CompanyInfo;
use App\Models\JobCircular;
use App\Models\CompanyEmployeesInfo;
use App\Models\JobApplication;
class HomeController extends Controller
{
    // user Controller
    public function user_type_check(){
        //return view('dashboard.pages.index');
        //dd(Auth::user());
        // Admin dashboard items
        $totalUser = User::get()->count();
        $totalJobCategory = JobCategories::get()->count();
        $totalCompany = CompanyInfo::get()->count();
        // Company dashboard items
        $totalPendingJob = JobCircular::join('company_infos', 'company_infos.id', '=', 'job_circulars.company_id')->where('company_infos.user_id', '=', Auth::id())->where('job_circulars.status', 0)->get()->count();

        $totalPublishedJob = JobCircular::join('company_infos', 'company_infos.id', '=', 'job_circulars.company_id')->where('company_infos.user_id', '=', Auth::id())->where('job_circulars.status', 1)->get()->count();

        $totalEmployee = CompanyEmployeesInfo::join('company_infos', 'company_infos.id', '=', 'company_employees_infos.company_id')->where('company_infos.user_id', '=', Auth::id())->get('company_employees_infos.id')->count();

        $totalApplication = JobApplication::join('company_infos', 'job_applications.company_id', '=', 'company_infos.id')->where('company_infos.user_id', '=', Auth::id())->get('job_applications.id')->count();

        // User dashboard items
        $totalAppliedJob = JobApplication::where('user_id', '=', Auth::id())->count();
        if(Auth::id()){
            $usertype=Auth()->user()->role;
            // return $usertype;
            if($usertype=== 0){
                return view('dashboard.pages.user.index', compact('totalAppliedJob'));
            } elseif($usertype=== 1) {
                return view('dashboard.pages.admin.index', compact('totalUser', 'totalJobCategory', 'totalCompany'));
            } elseif($usertype=== 2) {
                return view('dashboard.pages.company.index', compact('totalApplication', 'totalEmployee', 'totalPendingJob', 'totalPublishedJob'));
               }
         }
    }
}
