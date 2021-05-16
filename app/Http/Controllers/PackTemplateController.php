<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackTemplate;

class PackTemplateController extends Controller
{
    public function index()
    {
        $pack_templates = PackTemplate::get();

        return view('packTemplates.index')->with([
            'pack_templates' => $pack_templates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pack_templates = PackTemplate::get();

        return view('packTemplates.create')->with([
            'pack_templates' => $pack_templates
            ]);
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
            'template_name' => 'required',
            
        ]);

        PackTemplate::create($request->all());

        return redirect()->route('pack_template.index')
            ->with('success', 'Pack Template added successfully.');
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

       $pack_template = PackTemplate::findOrFail($id);

       return view('packTemplates.edit', compact('pack_template'));
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
            'template_name' => 'required',
        
        ]);
        $pack_template->update($request->all());

        return redirect()->route('packTemplates.index')
            ->with('success', 'Template updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackTemplate $pack_template)
    {
         
        $pack_template->delete();

        return redirect()->route('packTemplates.index')->with('success','You have successfully removed a Pack Template');
    }
}
