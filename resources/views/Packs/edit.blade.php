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

    <form action="{{ route('packs.update', $pack->pack_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
            
              <div class="col-span-6 sm:col-span-3">
                <label for="pack_id" class="block text-sm font-medium text-gray-700">Pack ID</label>
                <input type="text" name="pack_id" id="pack_id" value="{{ $pack->pack_id }}"  autocomplete="pack_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
    </form>      
          <form action="{{ route('packs.destroy', $pack) }}" method="POST">
                                            
                                                @csrf
                                                @method('DELETE')


                                                <div class="p-1">  
                                                    <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                        Delete
                                                    </button>
                                                </div>

                                        
                                            </form> 
        </div>

    </form>
  </div>
</div>    
@endsection