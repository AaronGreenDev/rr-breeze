<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Medicine extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable =[
        'med_name',
        'batch_no',
        'expiry_date',
        'location',
        'status',

    ];

    //Changes primary key from default = id
    protected $primaryKey = 'medicine_id';

    //Defines sortable columns
    public $sortable =[
            'med_name',
            'batch_no',
            'expiry_date',
            'location',
            'status',

    ];


    //Assigns medicine as a child element of MedPack
    public function medpack()
    {
        return $this->belongsTo(MedPack::class);
    }


    //Returns the MedPack of the given medicine
    public function getMedPack()
    {
        $medicine = Medicine::find(1);

        return $this->medpack->pack_id;

    }

   
}
