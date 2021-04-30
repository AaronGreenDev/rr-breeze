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

    <form action="{{ route('med_category.update', $med_category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
             <!-- <div class="col-span-6 sm:col-span-3">
                <label for="id" class="block text-sm font-medium text-gray-700">Medication Id</label>
                <input type="text" name="id" id="id" value="{{ $med_category->id }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>-->

              <div class="col-span-6 sm:col-span-3">
                <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="category_name" id="category_name" value="{{ $med_category->category_name }}"  autocomplete="category_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

        
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class=" justify-center py-3 px-6 border border-transparent uppercase shadow-sm text-sm font-bold rounded text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          

    </form>      

    
    <form action="{{ route('med_category.destroy', $med_category->id) }}" method="POST">
                @csrf
                @method('DELETE')

               

                <button class="bg-red-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                    Delete
                    </button>
                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                    <div class="relative w-auto my-6 mx-auto max-w-sm">
                        <!--content-->
                        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                            <h3 class="text-3xl font-semibold">
                            Warning!
                            </h3>
                            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                            <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                ×
                            </span>
                            </button>
                        </div>
                        <!--body-->
                        <div class="relative p-6 flex-auto">
                            <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
                            You are about to delete this category, are you sure you wish to proceed?
                            </p>
                        </div>
                        <!--footer-->
                        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                            <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                Close
                            </button>
                            <button type="submit" class="bg-emerald-500 text-gray-500 active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" onclick="toggleModal('modal-id')">
                                Delete Category
                            </button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                    <script type="text/javascript">
                    function toggleModal(modalID){
                        document.getElementById(modalID).classList.toggle("hidden");
                        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                        document.getElementById(modalID).classList.toggle("flex");
                        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                    }
                    </script>
          </form>
          </div>
        </div>

    </form>
  </div>
</div>    
@endsection