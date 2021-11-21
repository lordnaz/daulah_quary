@php
$user = auth()->user();
$status = auth()->user()->role;
@endphp
<x-app-layout title="Forms">
@php $statuss= session('msgg'); @endphp
@if ($statuss=='success')
<div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
  <p class="font-bold">Success!</p>
  <p>New item has been succesfully add</p>
</div>
@elseif ($statuss=='limit')
<div class="px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
  <p>Please try again with available quantity</p>
</div>
@endif
<!-- Container -->
<div class="container grid px-6 mx-auto" >
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Consumption
        </h2>
            
        <!-- Role Admin -->
        @if($status =='admin')
            <div class="grid gap-5 mb-10 md:grid-cols-2">
            <!-- Doughnut/Pie chart -->
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Admin
                </h4>
            <!-- Admin Input -->
            <form action="/adminConsumption" method="POST">
            {{@csrf_field()}}
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="name" value="{{$user->name}}"readonly=""/>
            </label>
              <!-- Item name -->
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Items
                </span>
                <select id="quantity" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="items" id="items" required>              
                <option value="" selected="true" disabled="">Choose Item</option>
                             
                @foreach ($item as $items)                              
              
                <option value="{{$items->item_name}}">{{$items->item_name}} 
                    (
                        {{$items->type}}
                        @if($items->subtype != 'N/A')
                            - {{$items->subtype}}
                        @endif
                    )

                    QTY : (
                        {{$items->quantity}}
                    )
                    
                </option> 
               
                @endforeach
                </select>
            </label>
             <!-- Item Quantity -->
             <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                   Quantity
                </span>
                
                <input type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="quantity" required />
            </label>
            <div class="pt-3">
            <a href="">
            <button class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700 float-right">Submit</button>
            </a>
            </div>
            </form>

            </div>
            <!-- End Admin -->
            
            <!-- User role admin -->
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    User
                </h4>
               <!-- User Input -->
            <form action="/useConsumption" method="POST">
            {{@csrf_field()}}
             <!-- User name -->
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    User Name
                </span>
                <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="user" id="user" required>
                <option value="" selected="true" disabled="">Choose User</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
            </label>
             <!-- Item name -->
             <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Items
                </span>
                <select id="quantity" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="items" id="items" required>              
                <option value="" selected="true" disabled="">Choose Item</option>
                             
                @foreach ($item as $items)                              
              
                <!-- <option value="{{$items->item_name}}">{{$items->item_name}}</option>  -->
                <option value="{{$items->item_name}}">{{$items->item_name}} 
                    (
                        {{$items->type}}
                        @if($items->subtype != 'N/A')
                            - {{$items->subtype}}
                        @endif
                    )

                    QTY : (
                        {{$items->quantity}}
                    )
                    
                </option> 
               
                @endforeach
                </select>
            </label>
             <!-- Item Quantity -->
             <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                   Quantity
                </span>
                
                <input type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="quantity" required />
            </label>
      
            <div class="pt-3">
            <a href="">
            <button class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700 float-right">Submit</button>
            </a>
            </div>
            </form>            
            </div>
            </div>

            <!-- table -->
<div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">User</th>
                            <th class="px-4 py-3">Created At</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($showadmin as $admins)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                            {{$admins->item}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$admins->quantityout}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$admins->name}}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$admins->created_at}}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                
                                <a href="return/{{$admins['itemout_id']}}">
                                <button class="h-8 px-5 text-indigo-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-500 hover:text-indigo-100">Return</button>
                                </a>
                            
                                </div>
                            </td>
                         </tr>
                         @endforeach
                         
                    </tbody>
                </table>
            </div>
           
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-3 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center">
                    Showing {{count($showadmin)}}-4 of {{count($totaladmin)}};
                    </span>
                
                <!-- Pagination -->
                <div class="min-w-0 flex items-center float-right">
                {!! $showadmin->links(); !!}
                
                
                </div>
            </div>


            <!-- Role User -->
            @elseif($status =='user')
            <div class="grid gap-5 mb-10 md:grid-cols-1">
            <!-- Doughnut/Pie chart -->
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    User
                </h4>
            <!-- Admin Input -->
            <form action="/userkeluar" method="POST">
            {{@csrf_field()}}
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="user" value="{{$user->name}}"readonly=""/>
            </label>
            <!-- Item name -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Items
                </span>
                <select id="quantity" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="items" id="items" required>              
                <option value="" selected="true" disabled="">Choose Item</option>
                             
                @foreach ($item as $items)                              
              
                <!-- <option value="{{$items->item_name}}">{{$items->item_name}}</option>  -->

                <option value="{{$items->item_name}}">{{$items->item_name}} 
                    (
                        {{$items->type}}
                        @if($items->subtype != 'N/A')
                            - {{$items->subtype}}
                        @endif
                    )
                    
                    QTY : (
                        {{$items->quantity}}
                    )
                    
                </option> 
               
                @endforeach
                </select>
            </label>
             <!-- Item Quantity -->
             <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                   Quantity
                </span>
                
                <input type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="quantity" required />
            </label>
            <div class="pt-3">
            <a href="">
            <button class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700 float-right">Submit</button>
            </a>
            </div>
            </form>
            <!-- End Admin -->
            </div>
            <!-- table -->
<div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">User</th>
                            <th class="px-4 py-3">Created At</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($showuser as $users)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                            {{$users->item}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$users->quantityout}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$users->name}}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$users->created_at}}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                
                                <a href="return/{{$users['itemout_id']}}">
                                <button class="h-8 px-5 text-indigo-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-500 hover:text-indigo-100">Return</button>
                                </a>
                            
                                </div>
                            </td>
                         </tr>
                         @endforeach
                         
                    </tbody>
                </table>
            </div>
           
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-3 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center">
                    Showing {{count($showuser)}}-4 of {{count($totaluser)}};
                    </span>
                
                <!-- Pagination -->
                <div class="min-w-0 flex items-center float-right">
                {!! $showuser->links(); !!}
                
                
                </div>
            </div>
            @endif


        </div>
    </div>
</x-app-layout>