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
        $packs = MedPack::get();
        $template_meds = TemplateMed::get();
        $pack_templates = PackTemplate::get();


        return view('packs.create', ['packs'=> $packs])->withTemplateMeds($template_meds)->withPackTemplates($pack_templates);;
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
           

        ]);   

        MedPack::create($request->all());

        return redirect()->route('packs.index')->with('success', 'Pack Created Successfully!');
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
    public function destroy(MedPack $pack)
    {
         
        $pack->delete();

        return redirect()->route('packs.index')->with('success','You have successfully removed a Pack ');
    }

    public function allPacks()
    {
        $packs = MedPack::get();
        $template_meds = TemplateMed::get();
        $pack_templates = PackTemplate::get();


        return view('packs.allPacks', ['packs'=> $packs])->withTemplateMeds($template_meds)->withPackTemplates($pack_templates);

       
    }


    public function show($id)
    {
        //return view('meds.show', compact('med'));

          //return view('medication.show', [
          //  'meds' => Medicine::findOrFail($med)
         //       ]);

        
        $template_meds = TemplateMed::get();
        $pack_templates = PackTemplate::get();


        

       $pack = MedPack::findOrFail($id);
       

       return view('packs.show', compact('pack'))->withTemplateMeds($template_meds)->withPackTemplates($pack_templates);
    }

    public function addMedToPack ($packId, $templateMedId, $templateMedQuantity)
    {
        //Find template med 
       $templateMed = TemplateMed::findOrFail($templateMedId);

       //Find the pack thats getting filled 
       $pack = MedPack::findOrFail($packId);

       //Pull each child medicine from the template 
       foreach ($templateMed.children() as $child)
       {
            //Order medicines by expiry date



            //If desired quantity is available remove from stock 


            //else calculate remaining required and remove from next batch


            //if next batch not available cancel order


            //Create new medicine object with desired quantity if there is enough stock
           
       }

         
        return view ('packs.addMedToPack',compact('med'))->withMedCategories($med_categories);
    }

    public function selectLocation()
    {
        $meds = Medicine::get();
        return view('packs.selectLocation')->withMeds($meds);
    }

    public function filter(Request $request) {
    
        $packs = MedPack::where( function($query) use($request){
                         return $request->status ?
                                $query->from('med_packs')->where('status',$request->status) : '';
                    })
                    ->get();
    
        return view('packs.index',compact('packs'));
    
    }

}
