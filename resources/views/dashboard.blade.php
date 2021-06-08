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
        


            <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">


            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-pink-500 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-blue-600"><i class="fa fa-archive fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">Total Stock</h5>
                                <h3 class="font-bold text-3xl">256 Medications <span class="text-green-500"></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-pink-500 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-archive fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">Expired</h5>
                                <h3 class="font-bold text-3xl">3 Medications<span class="text-pink-500"></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-pink-500 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-archive fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">Due to Expire</h5>
                                <h3 class="font-bold text-3xl">2 Medications<span class="text-yellow-600"></span></h3>
                            </div>
                        </div>
                    </div>
                
                
                    <!--/Metric Card-->
                </div>


                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-pink-500 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-archive fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-white">Packs</h5>
                                <h3 class="font-bold text-3xl">5 Packs Missing items<span class="text-yellow-600"></span></h3>
                            </div>
                        </div>
                    </div>
                
                
                    <!--/Metric Card-->
                </div>
            </div>


          

            


        </div>
    </div>            


</div>





  

</x-app-layout>