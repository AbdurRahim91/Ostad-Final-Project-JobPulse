<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CompanyEmployeesInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class CompanyEmployeesInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function employeeListItems(){
        $empl_list = CompanyEmployeesInfo::orderBy('id', 'desc')->get();
        return view('dashboard.pages.company.employee.employeelist', compact('empl_list'));
    }

    function CompanyEmployee(){
        $employees = User::join('company_employees_infos', 'users.id', '=', 'company_employees_infos.user_id')->join('company_details', 'company_employees_infos.company_id', '=', 'company_details.id')->select('users.*', 'company_details.*', 'company_employees_infos.*')->get();
        return response()->json($employees);
    }

     // Employee By Id
     function EmployeeById($employeeId){
        $employee = User::join('company_employees_infos', 'users.id', '=', 'company_employees_infos.user_id')
        ->join('company_details', 'company_employees_infos.company_id', '=', 'company_details.id')
        ->select('users.*', 'company_details.*', 'company_employees_infos.*')
        ->where('users.id', '=', $employeeId)
        ->get();
        return response()->json($employee);
    }
    public function index()
    {
        $empl_list = DB::table('users')
        ->join('company_employees_infos', 'users.id', '=', 'company_employees_infos.user_id')
        ->select('users.*', 'company_employees_infos.company_role','company_employees_infos.address', 'company_employees_infos.contact', 'company_employees_infos.joining_date')
        ->get();
        //dd($empl_list );
        return view('dashboard.pages.company.employee.employeelist', compact('empl_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companyEmployeesInfos= CompanyEmployeesInfo::get();
        return view('dashboard.pages.company.employee.create', compact('companyEmployeesInfos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'contact' => 'required|string|max:100',
            'address' => 'required',
            'password' => 'required|string|min:3',
            'gender' => 'required',
            'joining_date' => 'required',
            'company_role'=>'required',
        ]);
        $newUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => '2',
            'password' => $request->input('password'),
        ]);
        if($newUser){
            $user = User::latest('id')->first();
            $userId = $user->id;

            $employee = CompanyEmployeesInfo::create([
                'user_id' => $userId,
                'company_id' => $request->input('company_id'),
                'company_role' => $request->input('company_role'),
                'gender' => $request->input('gender'),
                'contact' => $request->input('contact'),
                'address' => $request->input('address'),
                'image' => $request->input('image'),
                'joining_date' => $request->input('joining_date'),
            ]);
            if($employee){
                return redirect('/company-employee')->with('success', 'Employee Added Successfully');

            }
             else{
                return back()->with('error', 'Something went wrong');
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyEmployeesInfo $companyEmployeesInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $emplEdit= DB::table('users')
        ->join('company_employees_infos', 'users.id', '=', 'company_employees_infos.user_id')
        ->select('users.*', 'company_employees_infos.company_role','company_employees_infos.address', 'company_employees_infos.contact', 'company_employees_infos.joining_date')
        ->where('user_id', $id)
        ->first();
        // ->get();
                
       //dd($emplEdit);
        //$emplEdit= CompanyEmployeesInfo::findOrFail($id);
        return view('dashboard.pages.company.employee.edit', compact('emplEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , string $id)
    {
        $request->validate([
            'company_role'=>'required',
        ]);

        $employee = CompanyEmployeesInfo::where('user_id', $id)->firstOrFail();
        $employee->update([
            'company_role' => $request->input('company_role')
        ]);
        return redirect('/company-employee')->with('success', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // first find user id and employee id
        $employee = CompanyEmployeesInfo::where('user_id', $id)->firstOrFail();
        $user = User::findOrFail($employee->user_id);
        if($employee->delete() && $user->delete()){
            return redirect('/company-employee')->with('success', 'Employee Deleted Successfully');
        }
        else{
            return back()->with('error', 'Something went wrong');
        }

    }
}
