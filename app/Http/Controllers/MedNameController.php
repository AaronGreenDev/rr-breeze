<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MedName;

class MedNameController extends Controller
{
    public function index()
    {
        $med_names = MedName::get();

        return view('medname.index')->with([
            'med_names' => $med_names
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medname.create');
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
            'name' => 'required',
        ]);

        MedName::create($request->all());

        return redirect()->route('med_name.index')
            ->with('success', 'Medicine Name added successfully.');
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

       $med_name = MedName::findOrFail($id);

       return view('medname.edit', compact('med_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedName $med_name)
    {
        $request->validate([
            'name' => 'required',
        
        ]);
        $med_name->update($request->all());

        return redirect()->route('medname.index')
            ->with('success', 'Medicine Name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedName $med_name)
    {
        
        $med_name->delete();

        return redirect()->route('med_name.index')->with('success','You have successfully removed a Medication Name!');
    }

}
