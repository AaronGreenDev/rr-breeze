
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
                        


                    </div>  


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
                                                        Edit
                                                    </a>
                                                </button>
                                                
                                                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                                    <table>
                                                    @if($pack->children)
                                                
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('temp_med', 'Name')
                                                                </th>
                                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('temp_quantity', 'Qty')
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        @foreach ($pack->children as $med)
                                                            <tr>                                                         
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-500">
                                                                            {{ $med->med_name }}
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">             
                                                                    <div class="text-sm text-gray-500">
                                                                            {{ $med->batch_no }}
                                                                    </div>
                                                                </td>
                                                            </td>
                                                    
                                                        @endforeach
                                                    @endif
                                                
                                                    </table>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
            
            
                                    </div>

                
                                @endforeach
                            </div>  
                        </div>    

                        @endsection