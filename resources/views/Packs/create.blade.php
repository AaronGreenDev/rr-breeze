@extends('layouts.app')

@section('content')

<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Create New Pack') }}
  </h2>
</x-slot>

    
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if ($message = Session::get('success'))
      <div role="alert">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
          Success!
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
          <p>{{ $message }}</p>
        </div>
      </div>
     @endif


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
                    <a href="{{ route('admin') }}">
                        Back
                    </a>
                </button>
        </div> 



    
        <div class="md:col-span-2">
          <div class="px-4 p-2  sm:px-5">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Create New Pack </h3>
          </div>
        </div>
        <div class="mt-5 md:mt-1 md:col-span-2">
          <form action="{{ route('packs.store') }}" method="POST">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
            

                  <div class="col-span-6 sm:col-span-3">
                    <label for="pack_id" class="block text-sm font-medium text-gray-700">Pack Number</label>
                    <input type="text" name="pack_id" id="pack_id" autocomplete="pack_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                <!--
                  <div class="col-span-6 sm:col-span-3">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <input type="text" name="status" id="status" autocomplete="status" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="assigned_to" class="block text-sm font-medium text-gray-700">Assigned to</label>
                    <input type="text" name="assigned_to" id="assigned_to" autocomplete="assigned_to" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="pack_location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="pack_location" id="pack_location" autocomplete="pack_location" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

            
                  -->
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
    </div>
  </div>                      

        @endsection




