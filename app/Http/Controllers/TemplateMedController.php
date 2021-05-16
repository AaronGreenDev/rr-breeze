<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateMed;
use App\Models\MedName;
use App\Models\PackTemplate;

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

}
