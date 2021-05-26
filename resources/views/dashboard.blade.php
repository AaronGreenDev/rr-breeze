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
                        <button type="button" class="items-center text-center px-2 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium 
                        text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Go
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
                                Restock
                            </h3>
                         
                        </div>
                       
                        <div class="border-t border-gray-200">
                            <div class="flex flex-col">
                                
                            <button type="button" class="items-center text-center px-2 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium 
                            text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Go
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