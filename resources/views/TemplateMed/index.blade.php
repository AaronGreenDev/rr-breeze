@extends('layouts.app')



@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
    @endif

    <div class="py-3">
            <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                 <a href="{{ route('med_category.index') }}">
                     Back
                </a>
            </button>
        </div> 

    
        <div class="md:col-span-2">
          <div class="px-4 p-2  sm:px-5">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Add New Medication</h3>
          </div>
        </div>
        <div class="mt-5 md:mt-1 md:col-span-2">
          <form action="{{ route('template_med.store') }}" method="POST">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                
                     
                    <div class="col-span-6 sm:col-span-3">
                      <label for="temp_med" class="block text-sm font-medium text-gray-700">Medication Name</label>
                      <select id="temp_med" name="temp_med" autocomplete="temp_med" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($medNames as $med_name)
                          <option value="{{ $med_name->name }}"> {{ $med_name->name }}</option>
                      
                        
                        
                        @endforeach

                      </select>

                    </div>  

                      <div class="col-span-6 sm:col-span-3">
                   
                        <label for="temp_quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input type="text" name="temp_quantity" id="temp_quantity" autocomplete="temp_quantity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      </div>
                   	 
              </div>

          </div>
      </div>

     
    </div>


                      


    <div class="col-span-6 sm:col-span-3">
        <label for="template_id" class="block text-sm font-medium text-gray-700">Template</label>
        <select id="template_id" name="template_id" autocomplete="template_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @foreach ($packTemplates as $pack_template)
                <option value="{{ $pack_template->id }}"> {{ $pack_template->template_name }}</option>
            @endforeach

        </select>
    </div>
</div>
<br>
<br>
<br>
<br>
</div>
                
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                  </button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <style>
    [x-cloak] {
      display: none;
    }
  </style>

    
@endsection

 

  





