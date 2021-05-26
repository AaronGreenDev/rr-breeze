<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MedPack;
use App\Models\TemplateMed;
use App\Models\PackTemplate;
use App\Models\MedCategory;
use App\Models\Medicine;



class RefillController extends Controller
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

}    