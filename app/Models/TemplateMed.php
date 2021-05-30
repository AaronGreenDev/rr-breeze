<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMed extends Model
{
    use HasFactory;


    protected $fillable =[
        'temp_med',
        'template_id',
        'temp_quantity',

    ];


    public function template()
    {
        return $this->belongsTo('App\Models\PackTemplate','template_id');
    }

    public function findTemplate()
    {
        $template = PackTemplate::find(1);
        return $template->template->template_name;
    }

     //Assigns medicine as a child element of MedPack
    public function parentTemplate()
    {
        return $this->belongsTo(PackTemplate::class);
    }

    public function children()
    {
        return $this->hasMany('App\Models\Medicine','id');
    }

}
