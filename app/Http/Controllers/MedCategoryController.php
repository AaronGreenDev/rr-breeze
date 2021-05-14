<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedCategory;
use App\Models\Medicine;

// Table name: med_categories
// Model name: MedCategory


class MedCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $med_categories = MedCategory::with('children')->whereNull('parent_id')->get();

        return view('medcategories.index')->with([
            'med_categories' => $med_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $med_categories = MedCategory::get();

        return view('medcategories.create')->with([
            'med_categories' => $med_categories
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //'id' => 'required',
            'category_name' => 'required',
        ]);

        MedCategory::create($request->all());

        return redirect()->route('med_category.index')
            ->with('success', 'Medicine Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('meds.edit', compact('med'));

       $med_category = MedCategory::findOrFail($id);

       return view('medcategories.edit', compact('med_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedCategory $med_category)
    {
        $request->validate([
            'category_name' => 'required',
        
        ]);
        $med_category->update($request->all());

        return redirect()->route('med_category.index')
            ->with('success', 'Medicine updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedCategory $med_category)
    {
        if ($med_category->children) {
            foreach ($med_category->children()->with('meds')->get() as $child) {
                foreach ($child->meds as $med) {
                    $med->update(['category_id' => NULL]);
                }
            }
            
            $med_category->children()->delete();
        }

        
        foreach ($med_category->meds as $med) {
            $med->update(['category_id' => NULL]);
        }

        $med_category->delete();

        return redirect()->route('med_category.index')->with('success','You have successfully deleted a Category!');
    }


      //Sort
      public function indexSorting()
      {
          $meds = Medicine::sortable()->paginate(5);
          return view('med_category.index')->with('meds',$meds);
      }


      public function indexFiltering(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
             $med_categories = MedCategory::sortable()
            ->where('med_categories.name', 'like', '%'.$filter.'%')
            ->paginate(5);
        } 
        else 
        {
            $med_categories = MedCategory::sortable()
            ->paginate(5);
        }

    return view('med_category.index')->with('med_categories', $med_categories)->with('filter', $filter);
    }

    public function indexDatatables()
{
    return view('med_category.index-datatables');
}

public function categoryDataSource(Request $request) {

    $search = $request->query('search', array('value' => '', 'regex' => false));
    $draw = $request->query('draw', 0);
    $start = $request->query('start', 0);
    $length = $request->query('length', 25);
    $order = $request->query('order', array(1, 'asc'));        

    $filter = $search['value'];

    $sortColumns = array(
        0 => 'category_name',
        1 => 'meds.name',
        2 => 'meds.batch_no',
        3 => 'meds.location',
        4 => 'meds.expiry_date',
        5 => 'meds.quantity',
        6 => 'meds.status',
    );

    $query = MedCategory::join('med_category', 'med_category.parent_id', '=', 'med.category_id')
            ->select('med.*', 'med_categories.category_name as med_category');

    if (!empty($filter)) {
        $query->where('med.med_name', 'like', '%'.$filter.'%');
    }

    $recordsTotal = $query->count();

    $sortColumnName = $sortColumns[$order[0]['column']];

    $query->orderBy($sortColumnName, $order[0]['dir'])
            ->take($length)
            ->skip($start);

    $json = array(
        'draw' => $draw,
        'recordsTotal' => $recordsTotal,
        'recordsFiltered' => $recordsTotal,
        'data' => [],
    );

    $products = $query->get();

    foreach ($meds as $med) {

        $json['data'][] = [
            $med->category->name,
            $med->name,
            $med->batch_no,
            $med->location,
            $med->expiry_date,
            $med->quantity,
            $med->status,
        ];
    }

    return $json;
}

    


  
}

