<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable =[
        'med_name',
        'batch_no',
        'expiry_date',
        'location',
        'status',

    ];

    public function medpack()
    {
        return $this->belongsTo(MedPack::class);
    }

    public function getMedPack()
    {
        $medicine = Medicine::find(1);

        return $this->medpack->pack_id;

    }

   
}
