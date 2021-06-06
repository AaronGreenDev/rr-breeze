<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateMed;
use App\Models\MedName;
use App\Models\PackTemplate;
use App\Models\Medicine;
use App\Models\MedPack;

class TemplateMedController extends Controller
{
    public function index()
    {
        $template_meds = TemplateMed::get();
        $med_names = MedName::get();
        $pack_templates = PackTemplate::get();

        return view('templateMed.index')->with([
            'template_meds' => $template_meds
        ])->withMedNames($med_names)->withTemplateMeds($template_meds)->withPackTemplates($pack_templates);


    }

    public function create()
    {
        $pack_templates = PackTemplate::with('children')->whereNull('template_id')->get();
        $med_names = MedName::get();
        return view('templateMed.index')->withPackTemplates($pack_templates)->withMedNames($med_names);
    }

    public function store(Request $request)
    {
        $request->validate([
            'template_id' => 'required',
            'temp_med' => 'required',
        ]);

        TemplateMed::create($request->all());

        return redirect()->route('pack_template.index')
            ->with('success', 'Medicine added successfully.');
    }
    public function show($id)
    {
        //return view('meds.show', compact('med'));

          //return view('medication.show', [
          //  'meds' => Medicine::findOrFail($med)
         //       ]);
       $packs = MedPack::get(); 
       $template_med = TemplateMed::findOrFail($id);
     

       return view('templateMed.show', compact('template_med'))->with('children');
    }

    public function edit($id)
    {
       // return view('meds.edit', compact('med'));

       $template_med = TemplateMed::findOrFail($id);

       $pack_templates = PackTemplate::with('children')->whereNull('id')->get();

        return view('templateMed.edit', compact('template_med'))->withPackTemplates($pack_templates);
    }



    /**
     * Update the Medication in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $med
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemplateMed $template_med)
    {
        $request->validate([
            'template_id' => 'required',
            'temp_med' => 'required',
            'quantity' => 'required',

        ]);
        $template_med->update($request->all());

        return redirect()->route('pack_template.index')
            ->with('success', 'Medicine updated successfully');
    }

    public function destroy(TemplateMed $template_med)
    {
         
        $template_med->delete();

        return redirect()->route('pack_template.index')->with('success','You have successfully removed a Medication from the Template');
    }

    public function findMedFromTemplate(TemplateMed $template_med)
    {
        //Find medicine where template_med_id == $template_med->id
        $meds = Medicine::findOrFail($template_med->id);
    }

}
