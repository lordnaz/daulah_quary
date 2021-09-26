<x-app-layout title="Forms">

    <div class="container grid px-6 mx-auto" >
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Items
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Items
        </h4>
        
        <div class="px-10 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="/addItems" method="POST">
        {{@csrf_field()}}
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="items"  />
            </label>
           
            <div class="pt-3">
            <a href="">
                <button class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800 float-right">Confirm</button>
            </a>
        </div>
</form>
    </div>

</x-app-layout>