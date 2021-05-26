
@extends('layouts.app')

@section('content')

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Packs') }}
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

                            <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                <a href="{{ route('packs.create') }}">
                                    Add
                                </a>
                            </button>
                        


                    </div>  

                    <input class="w-full h-16 px-3 rounded mb-8 focus:outline-none focus:shadow-outline text-xl p-6 shadow-lg" type="search" placeholder="Search...">

            <ul class="block w-11/12  mx-auto" x-data="{selected:null}">
                <li class="flex align-center flex-col">
                    <h4 @click="selected !== 0 ? selected = 0 : selected = null"
                    class="cursor-pointer px-5 py-3 bg-indigo-300 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3 rounded-t"> Filters</h4>
                    <div x-show="selected == 0" class="border py-4 px-2">
                        <div class="relative">
                            <div class="mt-5 md:mt-1 md:col-span-2">
                             <div class="flex flex-row ...">
                                  <div class="p-1">
                                    <select class="block appearance-none w-auto bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option>Standard</option>
                                        <option>Controlled</option>
                                    </select>
                                  </div>
                                  <div class="p-1">
                                    <select class="block appearance-none w-auto bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option>In Date</option>
                                        <option>Expired</option>
                                    </select>
                                  </div>
                                  <div class="p-1">
                                    <select class="block appearance-none w-auto bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option>Expires: </option>
                                        <option>Soonest</option>
                                        <option>Last</option>
                                    </select>
                                  </div>
                                  <div class="p-1">  
                                    <div class="p-2">  
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded content-end">
                                            Filter
                                        </button>
                                    </div>
                                  </div>    
                               </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <br>


                    <div class="flex shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">                    
                        @foreach ($packs as $pack)

                            <div class="w-full md:w-full justify-1 mx-auto p-8">
                                <div class="shadow-md">
                                    <div class="tab w-full overflow-hidden border-t">                                        
                                        <input class="absolute opacity-0 " id="tab-multi-{{ $pack->id }} " type="checkbox" name="{{ $pack->id }} tabs">                                                
                                            <label class="block p-6 leading-normal cursor-pointer" for="tab-multi-{{ $pack->id }} ">
                                                <div class="mt-1 flex justify-between items-center"> 
                                                    <div class="order-">
                                                        <strong>Pack: {{ $pack->pack_id }}</strong>
                                                    </div>                                                                                                    
                                                </div>  
                                            
                                            </label>
                                            <button title="edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                <a href="{{ route('packs.edit', $pack->pack_id) }}">
                                                    View
                                                </a>
                                            </button>

                                            <button title="view" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                 <a href="{{ route('packs.show', $pack->pack_id) }}" title="show">
                                                    Refill
                                                </a>
                                            </button>
                                                
                                                
                                            
                                        </div>
                                    </div>
            
            
                                    </div>

                
                        @endforeach
                            </div>  
                        </div>    

                        @endsection