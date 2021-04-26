<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedCategory;

// Table name: med_categories
// Model name: MedCategory


class MedCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $med_categories = MedCategory::with('children')->whereNull('parent_id')->get();

        return view('medcategories.index')->with([
            'med_categories' => $med_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //'id' => 'required',
            'category_name' => 'required',
        ]);

        MedCategory::create($request->all());

        return redirect()->route('med_category.index')
            ->with('success', 'Medicine Category added successfully.');
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
        // return view('meds.edit', compact('med'));

       $med_category = MedCategory::findOrFail($id);

       return view('medcategories.edit', compact('med_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedCategory $med_category)
    {
        $request->validate([
            'category_name' => 'required',
        
        ]);
        $med_category->update($request->all());

        return redirect()->route('medcategories.index')
            ->with('success', 'Medicine updated successfully');
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