<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedPack extends Model
{
    use HasFactory;

    public function meds()
    {
        return $this->hasMany(Medicine::class);
    }

    public function getMeds(){

    return $medicine = MedPack::find(10)->meds()
                    ->where('location', 'pack 1');

    }          

    protected $fillable =[
        'pack_id',
        'status',
        'assigned_to',
        'pack_location',

    ];
}
