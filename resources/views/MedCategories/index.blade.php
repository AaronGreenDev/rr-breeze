@extends('layouts.app')

@section('content')

<style>
         /* Tab content - closed */
         .tab-content {
         max-height: 0;
         -webkit-transition: max-height .35s;
         -o-transition: max-height .35s;
         transition: max-height .35s;
         }
         /* :checked - resize to full height */
         .tab input:checked ~ .tab-content {
         max-height: 100vh;
         }
         /* Label formatting when open */
         .tab input:checked + label{
         /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
         font-size: 1.25rem; /*.text-xl*/
         padding: 1.25rem; /*.p-5*/
         border-left-width: 2px; /*.border-l-2*/
         border-color: #6574cd; /*.border-indigo*/
         background-color: #f8fafc; /*.bg-gray-100 */
         color: #6574cd; /*.text-indigo*/
         }
         /* Icon */
         .tab label::after {
         float:right;
         right: 0;
         top: 0;
         display: block;
         width: 1.5em;
         height: 1.5em;
         line-height: 1.5;
         font-size: 1.25rem;
         text-align: center;
         -webkit-transition: all .35s;
         -o-transition: all .35s;
         transition: all .35s;
         }
         /* Icon formatting - closed */
         .tab input[type=checkbox] + label::after {
         content: "+";
         font-weight:bold; /*.font-bold*/
         border-width: 1px; /*.border*/
         border-radius: 9999px; /*.rounded-full */
         border-color: #b8c2cc; /*.border-grey*/
         }
         .tab input[type=radio] + label::after {
         content: "\25BE";
         font-weight:bold; /*.font-bold*/
         border-width: 1px; /*.border*/
         border-radius: 9999px; /*.rounded-full */
         border-color: #b8c2cc; /*.border-grey*/
         }
         /* Icon formatting - open */
         .tab input[type=checkbox]:checked + label::after {
         transform: rotate(315deg);
         background-color: #6574cd; /*.bg-indigo*/
         color: #f8fafc; /*.text-grey-lightest*/
         }
         .tab input[type=radio]:checked + label::after {
         transform: rotateX(180deg);
         background-color: #6574cd; /*.bg-indigo*/
         color: #f8fafc; /*.text-grey-lightest*/
         }
      </style>

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
                <a href="{{ route('med_category.create') }}">Add Medicine Category</a>
                </button>
              </div>  
              </br>
              </br>
            </div>


        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        
                            @foreach ($med_categories as $med_category)

                            <div class="w-full md:w-3/5 mx-auto p-8">
                                        <p></p>
                                        <div class="shadow-md">
                                            <div class="tab w-full overflow-hidden border-t">
                                           
                                                <input class="absolute opacity-0 " id="tab-multi-{{ $med_category->id }} " type="checkbox" name="{{ $med_category->id }} tabs">
                                                
                                                <label class="block p-5 leading-normal cursor-pointer" for="tab-multi-{{ $med_category->id }} "> {{ $med_category->category_name }} </label>
                                                
                                                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                                    <table>
                                                    @if($med_category->meds)
                                                  
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    ID
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('category_name', 'Medicine')
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('expiry_date', 'Expiry Date')
                                                                </th>
                                                
                                                            </tr>
                                                        </thead>
                                                        @foreach ($med_category->meds as $med)
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
                                                                            {{ $med->expiry_date }}
                                                                    </div>
                                                                </td>
                                                            </td>
                                                    
                                                        @endforeach
                                                    @endif
                                                    </table>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  
                                        <button title="edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                                                <a href="{{ route('med_category.edit', $med_category->id) }}">
                                                    Edit
                                                </a>
                                        </button>
                                    

                                

                                    
                                       
                                        
                                          
                                            @csrf
                                            @method('DELETE')


                                 
                                    
                                    

                            
                         

                                    
                            @endforeach

                                       
                        

                            
                    </div>
                </div>    
            </div>
        </div>
    </div>        
</div>  

<script>
      /* Optional Javascript to close the radio button version by clicking it again */
      var myRadios = document.getElementsByName('tabs2');
      var setCheck;
      var x = 0;
      for(x = 0; x < myRadios.length; x++){
          myRadios[x].onclick = function(){
              if(setCheck != this){
                   setCheck = this;
              }else{
                  this.checked = false;
                  setCheck = null;
          }
          };
      }
   </script>


@endsection
