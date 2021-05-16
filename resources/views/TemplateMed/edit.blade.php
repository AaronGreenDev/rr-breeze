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
                 <a href="{{ route('pack_template.index') }}">
                     Back
                </a>
            </button>
        </div> 

    <form action="{{ route('template_med.update', $template_med->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
            
              <div class="col-span-6 sm:col-span-3">
                <label for="temp_med" class="block text-sm font-medium text-gray-700">Medication Name</label>
                <input type="text" name="temp_med" id="temp_med" value="{{ $template_med->temp_med }}"  autocomplete="temp_med" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="temp_quantity" class="block text-sm font-medium text-gray-700">Batch Number</label>
                <input type="number" name="temp_quantity" placeholder="Quantity" value='{{  $template_med->temp_quantity  }}' id="temp_quantity" autocomplete="temp_quantity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

             <!--
              <div class="col-span-6 sm:col-span-3">
                  <label for="template_id" class="block text-sm font-medium text-gray-700">Template</label>
                  <select id="template_id" name="template_id" placeholder="{{ $template_med->template_id }}">
                    @foreach ($packTemplates as $pack_template)
                      <option value="{{ $pack_template->id }}" {{ $pack_template->id === $template_med->template_id ? 'selected' : '' }}>{{ $pack_template->template_name }} </option>
                      @if ($pack_template->children)
                          @foreach ($pack_template->children as $child)
                              <option value="{{ $child->id }}" {{ $child->id === $template_med->template_id ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->temp_med }}</option>
                          @endforeach
                      @endif
                    @endforeach
                  </select>
              </div>

              -->

            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
         
       

    </form>

    <form action="{{ route('template_med.destroy', $template_med->id) }}" method="POST">
                                           <div>
                                            
                                          
                                            @csrf
                                            @method('DELETE')


                                            
                                                <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                    Delete
                                                </button>
                                            </div>
    
                                        </form>
                                        </div>
                                        </div>
  </div>
</div>    
@endsection