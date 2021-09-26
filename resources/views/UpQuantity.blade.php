<x-app-layout title="Forms">
<!-- Alert Message -->
@php $status= session('msgg'); @endphp
@if ($status=='quantity')
<div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
  <p class="font-bold">Success!</p>
  <p>New quantity has been updated to the selected item</p>
</div>
@endif

<!-- Container -->
    <div class="container grid pl-8 float-left pr-10" >
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Update Parts Item
        </h2>

        <!-- Form -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Update Item
        </h4>
        
        <div class="px-10 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="/UpdateQuantity" method="POST">
        {{@csrf_field()}}
        <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Requested Limit
                </span>
                <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="items">
                <option value="" selected="true" disabled="">Choose Item</option>
                @foreach ($items as $item)
                    <option>{{$item->item_name}}</option>
                @endforeach
                </select>
            </label>
           
            <label class="block text-sm pt-8">
                <span class="text-gray-700 dark:text-gray-400">Quantity</span>
                <input type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="quantity" />
            </label>

            <div class="pt-3">
            <a href="">
            <button class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700 float-right">Update Quantity</button>
            </a>
        </div>
</form>
    </div>

</x-app-layout>