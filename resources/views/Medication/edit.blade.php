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

    <form action="{{ route('meds.update', $med->medicine_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <!--<div class="col-span-6 sm:col-span-3">
                <label for="medicine_id" class="block text-sm font-medium text-gray-700">Medication Id</label>
                <input type="text" name="medicine_id" id="medicine_id" value="{{ $med->medicine_id }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>-->

              <div class="col-span-6 sm:col-span-3">
                      <label for="med_name" class="block text-sm font-medium text-gray-700">Medication Name</label>
                      <select id="med_name" value="{{ $med->med_name }}" name="med_name" autocomplete="med_name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="{{ $med->med_name,'selected' }}">{{$med->med_name}}</option>
                        @foreach ($medNames as $med_name)
                          
                          <option value="{{ $med_name->name }}"> {{ $med_name->name }}</option>
                      
                        
                        
                        @endforeach

                      </select>

              </div>  

              <div class="col-span-6 sm:col-span-3">
                <label for="batch_no" class="block text-sm font-medium text-gray-700">Batch Number</label>
                <input type="text" name="batch_no" placeholder="Batch Number" value='{{  $med->batch_no  }}' id="batch_no" autocomplete="batch_no" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date" placeholder="expiry_date" value='{{  $med->expiry_date  }}' autocomplete="expiry_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" placeholder="100" value='{{  $med->quantity  }}' autocomplete="quantity" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="template_med_id" class="block text-sm font-medium text-gray-700">template_med_id</label>
                <input type="number" name="template_med_id" id="template_med_id" value='{{  $med->template_med_id  }}' autocomplete="template_med_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <select id="location" name="location" placeholder="{{ $med->location }}"
                        value="{{ $med->location }}" autocomplete="location" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option>Cannock</option>
                  <option>Essex</option>
                </select>
              </div>


              <div class="col-span-6 sm:col-span-3">
                  <label for="location" class="block text-sm font-medium text-gray-700">Category</label>
                  <select id="category_id" name="category_id" placeholder="{{ $med->category_id }}">
                    @foreach ($medCategories as $med_category)
                      <option value="{{ $med_category->id }}" {{ $med_category->id === $med->category_id ? 'selected' : '' }}>{{ $med_category->category_name }} </option>
                      @if ($med_category->children)
                          @foreach ($med_category->children as $child)
                              <option value="{{ $child->medicine_id }}" {{ $child->medicine_id === $medicine->category_id ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->med_name }}</option>
                          @endforeach
                      @endif
                    @endforeach
                  </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                  <label for="pack" class="block text-sm font-medium text-gray-700">Pack</label>
                  <select id="pack_id" name="pack_id" placeholder="{{ $med->pack_id }}">
                  <option value="">None</option>
                    @foreach ($medPacks as $pack)
                      <option value="{{ $pack->pack_id }}" {{ $pack->pack_id === $med->pack_id ? 'selected' : '' }}>{{ $pack->pack_id }} </option>
                    @endforeach
                  </select>
              </div>


              

            </div>
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
@endsection