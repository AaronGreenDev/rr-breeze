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
}
