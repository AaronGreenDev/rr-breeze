<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;



class Medicine extends Model
{
    use HasFactory;
    use Sortable;
    use Filterable;

    protected $fillable =[
        'med_name',
        'category_id',
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

    private static $whiteListFilter =[
            'med_name',
            'batch_no',
            'expiry_date',
            'location',
            'status',
    ];



    /*public function getRouteKeyName()
    {
        return 'slug';
    }
    */
    public function medCategory()
    {
        $category = MedCategory::find(1);
        return $category->category->category_name;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\MedCategory','category_id');
    }

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
