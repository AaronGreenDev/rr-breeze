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
                   
                    <div class="flex">

                     <!-- First Column Start -->
                        <div flex>
                          
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div id="container">
                                    <select  id="template_dropdown"  onchange="templateSelection()" name="template_dropdown" autocomplete="template_dropdown" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($packTemplates as $pack_template)

                                            <option id="dropdown_select" value="{{ $pack_template->id }}"> {{ $pack_template->template_name }}</option>
                        
                            
                            
                                        @endforeach

                                    </select>

                                </div>
                                
                              
                                    @foreach ($packTemplates as $pack_template)

                                <!-- Display template by dropdown selection id-->
                                <div id="$pack_template->id" class="box {{$pack_template->id}} ">

                                    <div class="flex w-full md:w-full justify-1 mx-auto p-8">
                                                                    
                                        <div class="shadow-md">
                                            <div class="tab w-full overflow-hidden border-t">
                                                                    
                                                <input class="absolute opacity-0 " id="tab-multi-{{ $pack_template->id }}" type="checkbox" name="{{ $pack_template->id }} tabs">
                                                                            
                                                    <label class="block p-6 leading-normal cursor-pointer" for="tab-multi-{{ $pack_template->id }} ">
                                                        <div class="mt-1 flex justify-between items-center"> 
                                                            <div class="template_name" id="templateName">
                                                                <strong>{{ $pack_template->template_name }}</strong>
                                                              
                                                            </div>               
                                                        </div>  
                                                                        
                                                    </label>
                                                                            
                                                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                                        <table>
                                                            @if($pack_template->children)
                                                                                    
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
                                                                @foreach ($pack_template->children as $template_med)
                                                                    <tr>                                                         
                                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                                            <div class="text-sm text-gray-500">
                                                                                {{ $template_med->temp_med }}
                                                                            </div>
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap">             
                                                                            <div class="text-sm text-gray-500">
                                                                                {{ $template_med->temp_quantity }}
                                                                            </div>
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap">                      
                                                                        
                                                                           
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

                        
                       
                        <!--First Column End -->

                        <!--Second Column Start -->
                        <div class=" h-16 p-3">

                            <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                <a href="{{ route('admin') }}">
                                    Restock Pack
                                </a>
                            </button>

                        </div>
                        <!--Second Column End -->

                        <!--Third Column Start -->
                    
                        <div flex>
                        <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                            
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Location
                                                </th>
                                                
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">                                    
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $pack->pack_id }}
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                            {{ $pack->pack_location }}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>                                
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
                    </div>
                </div>        
            </div>
        </div>
    </div>

</div>



@endsection
