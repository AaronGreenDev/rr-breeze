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
        return $this->hasMany('App\Models\Medicine','parent_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Medicine');
    }

    public function meds()
    {
        return $this->hasMany('App\Models\Medicine','category_id');
    }

    public function total($id)
    {
        $med_category = MedCategory::findOrFail($id);
        $total = 0;
       
            foreach ($med_category->get() as $child)
            {
               
                foreach ($child->meds as $med) 
                {
                   
                    $total = $total + 1;
            
                }

                return $total;
            }
            
            
        

    }

    public function expires_soonest(MedCategory $med_category)
    {
        $expires_soonest = 0;
        if ($med_category->children) {
            foreach ($med_category->children()->with('meds')->get() as $child) {
               
                foreach ($child->meds as $med) {
                    if($med->expiry_date < $expires_soonest)
                    {
                        $expires_soonest = $med->expiry_date;
                    }
            
                }

                return $expires_soonest;
            }
            
            
        }
    }
}
