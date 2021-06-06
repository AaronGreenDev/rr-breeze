<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           

       <div class="flex flex-wrap overflow-hidden sm:-mx-2">


            <!-- Column Content -->
            <div class="p-5 ">
            <div class="bg-pink-500 shadow overflow-hidden sm:rounded-lg ">
                <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-white">
                            Refill Pack
                        </h3>
            
                    </div>
                  
                    <div class="border-t border-gray-200">
                        <div class="flex flex-col">
                        <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                <a href="{{ route('packs.index') }}">
                                    Go
                                </a>
                            </button>

                        </div>
                    </div>
                </div>
            </div>    
                <!-- Column Content -->
                <div class="p-5">
                <div class="bg-pink-500 shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-white">
                                Restock Medication
                            </h3>
                         
                        </div>
                       
                        <div class="border-t border-gray-200">
                            <div class="flex flex-col">
                                
                            <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                <a href="{{ route('med_category.index') }}">
                                    Go
                                </a>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>


            


        </div>
    </div>            








  

</x-app-layout>