<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackTemplate extends Model
{
    use HasFactory;


    protected $fillable =[
        'template_name',
        'contains',
        'quantity',
    ];


    public function children()
    {
        return $this->hasMany('App\Models\TemplateMed','template_id');
    }
}
