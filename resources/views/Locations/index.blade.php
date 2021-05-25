@extends('layouts.app')

@section('content')

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Locations') }}
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

        <h1>Please Select Your Location</h1>
        <br>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                       
                            @foreach ($locations as $location)
                            <div class="flex items-center">
                                    <div class="px-6 py-4 whitespace-nowrap">
                                        
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $location->location_name }}
                                            </div>
                                        
                                    </div>

                                    
                                    
                                        <div class="mt-1 flex items-center">
                                            <button title="edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                <a href="{{ route('locations.edit', $location->id) }}">
                                                    Select
                                                </a>
                                            </button>
                                            
                                        </div>
                                    </div>

                                    <hr>
                                        
                                
                            @endforeach
                       
                    </div>
                </div>    
            </div>
        </div>
    </div>        
</div>                     

@endsection
