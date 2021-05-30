@extends('layouts.app')


@section('content')
<div class="py-12">




<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pack Templates') }}
        </h2>
</x-slot>

<!--Header Start-->    
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
                            <button id="backButton" title="back" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                
                                    Back
                                
                            </button>
                        


                    </div>  
<!--Header End-->  


                    <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Template Med Name
                                                </th>
                                            
                                                
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">                                    
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $template_med->temp_med }}
                                                        </div>
                                                    </div>
                                                </td>

                                              
                                            </tr>
                                        </tbody>
                                    </table>  
                                                              
                                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                        <table>
                                            @if($template_med->children)                                            
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                            @sortablelink('med_name', 'Name')
                                                        </th>
                                                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                            @sortablelink('batch_no', 'Batch Number')
                                                        </th>
                                                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                            @sortablelink('expiry_date', 'Expiry Date')
                                                        </th>
                                                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                            @sortablelink('quantity', 'Quantity')
                                                        </th>
                                                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                            @sortablelink('location', 'Location')
                                                        </th>
                                                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                            @sortablelink('status', 'Status')
                                                        </th>
                                                    </tr>
                                                </thead>
                                                @foreach ($template_med->children as $med)
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
                                                        <td class="px-6 py-4 whitespace-nowrap">             
                                                            <div class="text-sm text-gray-500">
                                                                {{ $med->expiry_date }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">             
                                                            <div class="text-sm text-gray-500">
                                                                {{ $med->quantity }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">             
                                                            <div class="text-sm text-gray-500">
                                                                {{ $med->location }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">             
                                                            <div class="text-sm text-gray-500">
                                                                {{ $med->status }}
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">             
                                                            <div class="text-sm text-gray-500">
                                                                <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                                    <a href="{{ route('template_med.show', $template_med->id) }}">
                                                                        Add
                                                                    </a>
                                                                </button>
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
                    </div>
                </div> 
            </div>
        </div>
    </div>  
<script>
    $('#backButton').on('click', function(e){
    e.preventDefault();
    window.history.back();
});            
</script>
    @endsection     