<x-app-layout title="Tables">

<!-- Alert Message -->
@php $status= session('msgg'); @endphp
@if ($status=='success')
<div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
  <p class="font-bold">Success!</p>
  <p>New item has been succesfully add</p>
</div>
@elseif ($status=='plus')
<div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
  <p>Quantity has been added</p>
</div>
@elseif ($status=='minus')
<div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
  <p>Quantity has been deduct</p>
  <span class="absolute inset-y-0 right-0 flex items-center mr-4">
    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
  </span>
</div>
@elseif ($status=='exist')
<div class="px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
  <p>The item already exist in the data</p>
</div>
@elseif ($status=='save')
<div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
  <p class="font-bold">Success!</p>
  <p>Succesfully to change the item</p>
</div>
@elseif ($status=='delete')
<div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
  <p>The item has been removed</p>
  <span class="absolute inset-y-0 right-0 flex items-center mr-4">
    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
  </span>
</div>
@endif
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Items
        </h2>

        
        <!-- With actions -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Items List    
        </h4>
        <table>
       
<tr>
    <td>
        <label class="block mt-4 text-sm" for="inline-full-name">
                <span class="text-gray-700 dark:text-gray-400">
                    Category
                </span>
                </label>      
                <select onchange="window.location.href=this.options[this.selectedIndex].value;" class="block w-1/3 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" id="inline-full-name">
                <option value="{{ route('insert-parts') }}" >All</option>
                
                    <option value="" selected="true" disabled="">Plant sparepart</option>
                    <option value="{{ route('machinery') }}">Machinery sparepart</option>
                    <option value="{{ route('Tool') }}">Tool and equipment</option>
                    <option value="{{ route('Consumeable') }}" >Consumeable</option>
                
                </select>
</td>
<td class="pt-10">    

            <a href="/addparts">
                <button class="flex items-center justify-between px-5 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple float-right">
               
                <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                        <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                    <span>Add Item</span>
                </button>
            </a>
</td>
</tr>

        
        </table>
        <br>
        
        @php $index = 1; @endphp
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Serial Number</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Created By</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Add/Deduct Quantities</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($items as $item)
                        <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            {{$item->SerialNum}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$item->item_name}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$item->created_by}}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$item->quantity}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                            <a href="Minus1/{{$item['table_id']}}">
                            <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-red-500 text-red-500 text-lg rounded-lg hover:bg-red-500 hover:text-gray-100 focus:border-4 focus:border-green-300">
                            <svg class="h-4 w-4"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            </button>
                            </a>

                            <a href="Plus1/{{$item['table_id']}}">
                            <button class="p-2 pl-5 pr-5 bg-transparent border-2 border-green-500 text-green-500 text-lg rounded-lg hover:bg-green-500 hover:text-gray-100 focus:border-4 focus:border-green-300">
                            <svg class="h-4 w-4"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            </button>
                            </a>

                            </td>
                            <td class="px-4 py-3">
                                    <div id="{{ $index }}" class="flex items-center space-x-4 text-sm">
                                    
                                       
                                        <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            <span>View</span>
                                        </button>
                                        
                                   
                                    </div>
                                </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">

                                <a href="EditItem/{{$item['table_id']}}">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                </a>
                                <a href="DeleteItem/{{$item['table_id']}}">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </a>
                                </div>
                                
                            </td>
                         </tr>
                          
                         <!--Modal-->
         <div id="modal" class="{{ $index }}" style="display:none;">
         
         <div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center">
             
           <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
           <div class="modal-container bg-white rounded shadow-lg z-50 overflow-y-auto">
           <span class="close" name="{{ $index }}">&times;</span>
           <img src="{{asset('storage/image/'. $item->image)}}" onerror="this.onerror=null; this.src='/img/not.jpg'" style="width:auto;height:auto;"/>
             
       
           
               
             </div>
           </div>
         </div>
         @php $index++; @endphp
                         @endforeach
                    </tbody>
                </table>
            </div>
           <input type="hidden" id="count" value="{{count($items)}}"/>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-3 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center">
                    Showing {{count($items)}}-8 of {{count($totals)}};
                    </span>
                
                <!-- Pagination -->
                <div class="min-w-0 flex items-center float-right">
                {!! $items->links(); !!}
                
                
        </div>
    </div>


    <script>

var x = document.getElementById("count").value;        
for (let i = 1; i <= x; i++) {

var view = document.getElementById(i);
view.onclick = function(){


var modal = document.getElementsByClassName(i)[0];
modal.style.display = "block";

var span = document.getElementsByName(i)[0];

span.onclick = function() { 
  modal.style.display = "none";
}

}
}

// Get the <span> element that closes the modal


</script>
</x-app-layout>