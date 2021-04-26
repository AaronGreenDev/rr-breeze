<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'category_name',
    ];

    public function children()
    {
        return $this->hasMany('App\Models\MedCategory','parent_id');
    }

    public function meds()
    {
        return $this->hasMany('App\Models\Medicine');
    }
}
