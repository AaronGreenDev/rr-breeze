<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Control Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
       
        <div class="flex flex-wrap overflow-hidden sm:-mx-2">

        <div class="w-full overflow-hidden sm:my-2 sm:px-2 lg:w-1/3">
            <!-- Column Content -->
            <div class="bg-pink-500 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-white">
                    Stock Settings
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-6">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        <a href="{{ route('med_name.index') }}">Edit Medication Names</a>
                        </button>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-6">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        <a href="{{ route('med_category.create') }}">Edit Category Names</a>
                        </button>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-6">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        <a href="{{ route('locations.create') }}"> Edit Stock Locations</a>
                        </button>
                    </div>
                </dl>
        </div>

        </div>
        </div>
        <div class="w-full overflow-hidden sm:my-2 sm:px-2 lg:w-1/3">
            <!-- Column Content -->
            <div class="bg-pink-500 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-white">
                    Pack Settings
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-6">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        <a href="{{ route('packs.create') }}"> Create Pack</a>
                        </button>
                    </div>                                      
                 
                   
                                                                          
                </dl>
        </div>


        

</div>






</div>
   <!-- This example requires Tailwind CSS v2.0+ -->


   <div class="w-full overflow-hidden sm:my-2 sm:px-2 lg:w-1/3">
            <!-- Column Content -->
            <div class="bg-pink-500 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-white">
                    Template Settings
                </h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-6">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        <a href="{{ route('pack_template.index') }}">Create Templates</a>
                        </button>
                    </div>
                    
                        </li>
                        </ul>
                    </dd>
                    </div>
                </dl>
        </div>

</div>
    </div>

</x-app-layout>