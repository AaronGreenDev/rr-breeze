<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MedPack;
use App\Models\TemplateMed;
use App\Models\PackTemplate;
use App\Models\MedCategory;
use App\Models\Medicine;



class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packs = MedPack::get();
        $template_meds = TemplateMed::get();
        $pack_templates = PackTemplate::get();


        return view('packs.index', ['packs'=> $packs])->withTemplateMeds($template_meds)->withPackTemplates($pack_templates);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packs.create');
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
            'pack_id' => 'required',
            'status' => 'required',
            'assigned_to' => 'required',
            'pack_location' => 'required',

        ]);   

        MedPack::create($request->all());

        return redirect()->route('packs.index')->with('success', 'Pack Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $pack = MedPack::findOrFail($id);

        return view('packs.edit', compact('pack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedPack $pack)
    {
        $request->validate([
            'pack_id' => 'required',
        
        ]);
        $pack->update($request->all());

        return redirect()->route('packs.index')
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

    public function allPacks()
    {
        $packs = MedPack::get();
        $template_meds = TemplateMed::get();
        $pack_templates = PackTemplate::get();


        return view('packs.allPacks', ['packs'=> $packs])->withTemplateMeds($template_meds)->withPackTemplates($pack_templates);;

       
    }
}
