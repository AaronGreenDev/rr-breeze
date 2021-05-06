<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        foreach ($med_category->meds as $med) 
        {
                   
            $total = $total + 1;
            
        }
        
        return $total;
                
    }

    public function expires_soonest(MedCategory $med_category)
    {
        //$expires_soonest = Carbon::now();
        //$expires_soonest = new Carbon();
        $expires_soonest = 2100-00-00;
        $expires_soonest_batch = 'None';
        $earliest_med = new Medicine();

      
        //Compares the expiry date against the current datetime and returns the batch number of the med that is less
               
        foreach ($med_category->meds as $med) 
        {
            
            if($med->expiry_date < $expires_soonest)
            {
                $expires_soonest = $med->expiry_date;
                $earliest_med = $med; 

            }
        //If there is only one medication in the category return the batch number    
          
        $expires_soonest_batch = $med->batch_no;
                
           
        }

    
        return $earliest_med->batch_no;
            
            
        
    }

    
}
