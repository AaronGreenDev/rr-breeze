<?php
namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the Medication.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Medicine $med)
    {
       // $meds = $med->latest()->sortable()->paginate(5);

        //return view('medication.index', compact('meds'))
          //  ->with('i', (request()->input('page', 1) - 1) * 5)

     try {
            $meds = $med->select('*')->sortable()->paginate(10);
    
            return view('medication.index', ['meds' => $meds]);

        } 
        catch(\Kyslik\ColumnSortable\Exceptions\ColumnSortableException $e) 
        {
            dd($e);
        }    
    }


    /**
     * Show the form for creating a new Medication.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medication.create');
    }



    /**
     * Store a newly created Medication in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required',
            'med_name' => 'required',
            'batch_no' => 'required',
            'expiry_date' => 'required',
            'location' => 'required',
        ]);

        Medicine::create($request->all());

        return redirect()->route('meds.index')
            ->with('success', 'Medicine added successfully.');
    }




    /**
     * Display the specified Medication.
     *
     * @param  \App\Models\Medicine  $med
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('meds.show', compact('med'));

          //return view('medication.show', [
          //  'meds' => Medicine::findOrFail($med)
         //       ]);

       $med = Medicine::findOrFail($id);

       return view('medication.show', compact('med'));
    }




    /**
     * Display the form for editing the Medication.
     * @param  int  $id
     * @param  \App\Models\Medicine  $med
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // return view('meds.edit', compact('med'));

       $med = Medicine::findOrFail($id);

        return view('medication.edit', compact('med'));
    }



    /**
     * Update the Medication in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $med
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $med)
    {
        $request->validate([
            'med_name' => 'required',
            'batch_no' => 'required',
            'expiry_date' => 'required',
            'location' => 'required',
        
        ]);
        $med->update($request->all());

        return redirect()->route('meds.index')
            ->with('success', 'Medicine updated successfully');
    }



    /**
     * Remove the Medication from storage.
     *
     * @param  \App\Models\Medicine  $med
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $med)
    {
        $med->delete();

        return redirect()->route('meds.index')
            ->with('success', 'Medicine deleted successfully');
    }

    //Sort
    public function indexSorting()
    {
        $meds = Medicine::sortable()->paginate(5);
        return view('meds.index')->with('meds',$meds);
    }

    



}
