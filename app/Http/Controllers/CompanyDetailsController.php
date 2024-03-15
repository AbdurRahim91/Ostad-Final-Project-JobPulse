<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_id = auth()->user()->id;
        // $existingCompany = DB::table('company_infos')
        // ->where('user_id', $auth_id)
        // ->first();
        //dd($existingCompany);
        $com_details = DB::table('company_infos')
        ->where('user_id', $auth_id)
        ->get();
        return view('dashboard.pages.company.company_porfile.company_details', compact('com_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.company.company_porfile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:100',
            'company_email' => 'required|email|max:100',
            'company_contact' => 'required|string|max:100',
            'company_address' => 'required|string|max:100',
        ]);
        $com_details = CompanyInfo::create([
            'user_id'=> $request->input('user_id'),
            'company_name' => $request->input('company_name'),
            'company_email' => $request->input('company_email'),
            'company_contact' => $request->input('company_contact'),
            'company_address' => $request->input('company_address'),
        ]);
        $result = $com_details->save();
        if ($result) {
            return back()->with('success', 'Job Circular Created Successfully');
        } else {
            return back()->with('failed', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $com_details = CompanyInfo::findOrFail($id);
        return view('dashboard.pages.company.company_porfile.show', compact('com_details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $com_details = CompanyInfo::findOrFail($id);
        return view('dashboard.pages.company.company_porfile.edit', compact('com_details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:100',
            'company_email' => 'required|email|max:100',
            'company_contact' => 'required|string|max:100',
            'company_address' => 'required|string|max:100',
        ]);
        $com_details = CompanyInfo::findOrFail($id);
        $com_details->update([
            'user_id'=> $request->input('user_id'),
            'company_name' => $request->input('company_name'),
            'company_email' => $request->input('company_email'),
            'company_contact' => $request->input('company_contact'),
            'company_address' => $request->input('company_address'),
        ]);
        $result = $com_details->save();
        if ($result) {
            return back()->with('success', 'Job Circular Updated Successfully');
        } else {
            return back()->with('failed', 'Something went wrong');
        }
        // return redirect('company-details')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catList = CompanyInfo::findOrFail($id);
        $catList->delete();
        return redirect()->back()->with('success', 'Post deleted successfully');
    }
}
