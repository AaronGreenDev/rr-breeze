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

            <div class="mt-1 flex justify-between items-center">        
                <div class="py-3 pr-3">
                    <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                        <a href="{{ route('dashboard') }}">
                            Back
                        </a>
                    </button>
                </div>  
                <div class="order-last">
                    <button title="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 p-3 rounded">
                        <a href="{{ route('meds.create') }}">
                            Add New Stock
                        </a>
                    </button>
                </div>
            
            </div>
           
           
           </br>

           <input id="searchInput" class="w-full h-16 px-3 rounded mb-8 focus:outline-none focus:shadow-outline text-xl p-6 shadow-lg" type="search" placeholder="Search...">

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
                            <option>Category:</option>
                            <option>Asprin</option>
                            <option>Paracetamol</option>
                        </select>
                      </div>
                      <div class="p-1">
                            <select id="statusSelect" class="block appearance-none w-auto bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="">Select Status</option>
                                <option value="1">In Date</option>
                                <option value="0">Expired</option>
                            </select>
                        </div>
                      <div class="p-1">
                        <select class="block appearance-none w-auto bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option>Expires: </option>
                            <option>Soonest</option>
                            <option>Last</option>
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

<br>



        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            @foreach ($med_categories as $med_category)
                            <ul id="myList">
                            <li>
                            <div class="w-full md:w-4/5 mx-auto p-8">
                                        <div class="shadow-md">
                                            <div class="tab w-full overflow-hidden border-t">
                                           
                                                <input class="absolute opacity-0 " id="tab-multi-{{ $med_category->id }} " type="checkbox" name="{{ $med_category->id }} tabs">
                                                
                                                <label class="block p-6 leading-normal cursor-pointer" for="tab-multi-{{ $med_category->id }} ">
                                                <div class="mt-1 flex justify-between items-center"> 
                                                    <div class="order-">
                                                        <strong>{{ $med_category->category_name }}</strong>
                                                    </div>
                                                    <div class="order-2">
                                                        Batches:   
                                                        <p>{{ $med_category->total($med_category->id)}}</p>
                                                    </div>
                                                    <div class="order-last">                  
                                                        Expires Soonest: 
                                                        <p>{{ $med_category->expires_soonest($med_category)}}</p>
                                                    </div>
                                                   
                                                </div>  
                                                    
                                                </label>
                                                
                                                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                                    <table>
                                                    @if($med_category->meds)                                                  
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('category_name', 'Medicine')
                                                                </th>
                                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('batch_no', 'Batch Number')
                                                                </th>
                                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('location', 'Location')
                                                                </th>
                                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('expiry_date', 'Expiry Date')
                                                                </th>
                                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('quantity', 'Quantity')
                                                                </th>
                                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500  tracking-wider">
                                                                    @sortablelink('status', 'Status')
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        @foreach ($med_category->meds as $med)
                                                        <tbody id="medsTable">
                                                            <tr>                                                         
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
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    <div class="text-sm text-gray-500">
                                                                            {{$med->location}}
                                                                    </div>         
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-500">
                                                                            {{ date('m-y', strtotime($med->expiry_date ))}}
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-500">
                                                                            {{ $med->quantity }}
                                                                    </div>
                                                                </td>
                                                                @if($med->check_status($med) === 'Expired')
                                                                    
                                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                                                                                {{ $med->check_status($med) }}
                                                                            </span>
                                                                        </td>
                                                                    
                                                                @else 
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                                                                            {{ $med->check_status($med) }}
                                                                    </span>
                                                                </td>
                                                                @endif  

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


                                                            </td>
                                                    
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                    </table>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  
                                    

                                

                                    
                                       
                                        
                                          
                                            @csrf
                                            @method('DELETE')


                                 
                                    
                                    

                            
                            </li>
                            </ul>
                                    
                            @endforeach

                                       
                        

                            
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

     
      
$(document).ready(function(){
  $("#searchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

   </script>

<script>
$(document).ready(function(){
    $("#statusSelect").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                console.log(optionValue);
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } 
            else
            {
                $(".box").show();
            }
        });
    }).change();
});
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


@endsection
