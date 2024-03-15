<?php

namespace App\Http\Controllers;
use App\Models\JobCircular;
use App\Models\JobCategories;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobscategories= JobCategories::orderBy('id', 'desc')->get();
       // dd('$jobscategories');
         return view('dashboard.pages.admin.job_category', compact('jobscategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat_id=JobCategories::find($id);
        return response()->json([
        'status'=>200,
        'cat_id'=>$cat_id,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cat = JobCategories::findOrFail($id);

        $cat->category_name = $request->input('edit_cat_name');
        // Update the category
        $cat->update();
    
        return response()->json([
            'status' => 200, 
            'tr'=>'tr_'.$id,
            'message' => 'Category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
