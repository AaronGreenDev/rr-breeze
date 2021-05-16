@extends('layouts.app')

@section('content')

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



    
        <div class="md:col-span-2">
          <div class="px-4 p-2  sm:px-5">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Create New Pack Template</h3>
          </div>
        </div>
        <div class="mt-5 md:mt-1 md:col-span-2">
          <form action="{{ route('pack_template.store') }}" method="POST">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
            

                  <div class="col-span-6 sm:col-span-3">
                    <label for="template_name" class="block text-sm font-medium text-gray-700">Template Name</label>
                    <input type="text" name="template_name" id="template_name" autocomplete="template_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
    </div>











         


        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500  tracking-wider">
                                    @sortablelink('template_name', 'Name')
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pack_templates as $pack_template)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $pack_template->template_name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-1 flex items-center">
                                            <button title="edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                <a href="{{ route('pack_template.edit', $pack_template->id) }}">
                                                    Edit
                                                </a>
                                            </button>
                                            <form action="{{ route('pack_template.destroy', $pack_template->id) }}" method="POST">
                                            
                                                @csrf
                                                @method('DELETE')


                                                <div class="p-1">  
                                                    <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                        Delete
                                                    </button>
                                                </div>

                                        
                                            </form> 
                                        </div>
                                    </td>
                                        
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>  


     <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        
                            @foreach ($pack_templates as $pack_template)

                            <div class="w-full md:w-4/5 mx-auto p-8">
                                        <p></p>
                                        <div class="shadow-md">
                                            <div class="tab w-full overflow-hidden border-t">
                                           
                                                <input class="absolute opacity-0 " id="tab-multi-{{ $pack_template->id }} " type="checkbox" name="{{ $pack_template->id }} tabs">
                                                
                                                <label class="block p-6 leading-normal cursor-pointer" for="tab-multi-{{ $pack_template->id }} ">
                                                <div class="mt-1 flex justify-between items-center"> 
                                                    <div class="order-">
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
                                                                

                                                                <td>
                                                                
                                                                        <button title="view" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                                            <a href="{{ route('pack_template.index', $pack_template->id) }}" title="show">
                                                                                View
                                                                            </a>
                                                                        </button>
                                                                        <button title="edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                                            <a href="{{ route('pack_template.index', $pack_template->id) }}">
                                                                                Edit
                                                                            </a>
                                                                        </button>
                                                                        @csrf
                                                                        @method('DELETE')


                                                                   
                                                                </td>


                                                            </td>
                                                    
                                                        @endforeach
                                                    @endif
                                                  
                                                    </table>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  
                                    

                                

                                    
                                       
                                        
                                          
                                            @csrf
                                            @method('DELETE')


                                 
                                    
                                    

                            
                         

                                    
                            @endforeach

                                       
                        

                            
                   
                
            </div>
        </div>
    </div>              
</div>                     

@endsection
