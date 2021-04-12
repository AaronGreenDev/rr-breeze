<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Controlled Pack') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg content-end">-->
            <!--    <div class="p-6 bg-white border-b border-gray-200 "> -->
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
  Filter
</button>
 <input class="w-full h-16 px-3 rounded mb-8 focus:outline-none focus:shadow-outline text-xl p-6 shadow-lg" type="search" placeholder="Search...">
                <!--</div>-->
            <!--</div>-->
       </br>

    <!-- This example requires Tailwind CSS v2.0+ -->
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
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Assigned to
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Meds Expired:
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Location
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
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
                      3177
                    </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-500">
                      Pack 1
                    </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">EMT</div>
                <div class="text-sm text-gray-500">Aaron Green</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">2</div>
                <div class="text-sm text-gray-500">Due to expire: 5</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Ambulance 412
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                  Assigned
                </span>
              </td>
              
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>

            <!-- More items... -->
          </tbody>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900">
                      1011
                    </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-500">
                      Pack 2
                    </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">EMT</div>
                <div class="text-sm text-gray-500">Aaron Green</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">4</div>
                <div class="text-sm text-gray-500">Due to expire: 3</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Ambulance 103
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                  Assigned
                </span>
              </td>
              
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>

            <!-- More items... -->
          </tbody>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900">
                      1023
                    </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-500">
                      Pack 3
                    </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">EMT</div>
                <div class="text-sm text-gray-500">Aaron Green</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">0</div>
                <div class="text-sm text-gray-500">Due to expire: 1</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Ambulance 111
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                  Assigned
                </span>
              </td>
              
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>

            <!-- More items... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>
    </div>

</x-app-layout>