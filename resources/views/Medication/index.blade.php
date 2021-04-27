@extends('layouts.app')

@section('content')

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock List') }}
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
                                        <option>Cannock</option>
                                        <option>Essex</option>
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
                                        <option>Expires: Next Week</option>
                                        <option>Expires: Next Month</option>
                                        <option>Expires: Next Year</option>
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
            <div class="flex justify-end">
              <div class="p-1">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                <a href="{{ route('meds.create') }}">Add</a>
                </button>
              </div>
              
              
              </br>
              </br>
            </div>


        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500  tracking-wider">
                                    @sortablelink('med_name', 'Name')
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500  tracking-wider">
                                    @sortablelink('batc_no', 'Batch Number')
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500  tracking-wider">
                                    @sortablelink('expiry_date', 'Expiry Date') 
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                                    @sortablelink('location', 'Location')
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider">
                                    @sortablelink('status', 'Status')
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($meds as $med)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $med->medicine_id }}
                                            </div>
                                        </div>
                                    </td>

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
        
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-gray-500">
                                                {{$med->location}}
                                        </div>         
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-gray-500">
                                        
                                        {{ $med->category ? $med->category->category_name : 'Uncategorized'}}
                                        
                                        </div>         
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                                {{ $med->status }}
                                    </span>
                                </td>

                                    <td>
                                       <!-- <form action="{{ route('meds.destroy', $med->medicine_id) }}" method="POST">-->
                                            <button title="view" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                <a href="{{ route('meds.show', $med->medicine_id) }}" title="show">
                                                    View
                                                </a>
                                            </button>
                                            <button title="edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                <a href="{{ route('meds.edit', $med->medicine_id) }}">
                                                    Edit
                                                </a>
                                            </button>
                                            @csrf
                                            @method('DELETE')


                                           <!-- <div class="p-1">  
                                                <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                    X
                                                </button>
                                            </div>-->
    
                                     <!--   </form> -->
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
</div>                     
{!! $meds->appends(Request::except('page'))->render() !!}
@endsection
