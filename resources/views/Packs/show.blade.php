@extends('layouts.app')


@section('content')
<div class="py-12">



<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex flex-col">
    <div class="py-3">
            <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                 <a href="{{ route('packs.index') }}">
                     Back
                </a>
            </button>
        </div> 
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
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
                                                {{ $medPack->pack_id }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $medPack->pack_location }}
                                            </div>
                                        </div>
                                    </td>


                                    
                                    
                                    

                                    <td>
                                        <form action="{{ route('packs.destroy', $medPack->pack_id) }}" method="POST">
                                           <div>
                                            
                                            <button title="edit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-3 p-2 m-1 rounded">
                                                <a href="{{ route('meds.edit', $medPack->pack_id) }}">
                                                    Edit
                                                </a>
                                            
                                            @csrf
                                            @method('DELETE')


                                            
                                                <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                    Delete
                                                </button>
                                            </div>
    
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>        
</div>
</div>


@endsection
