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
        <form action="/addItems" enctype="multipart/form-data" method="POST">
        {{@csrf_field()}}
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="items" required />
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Type
                </span>
                <select id="mySelect" onchange="showDiv(this)" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" required>
                <option value="" selected="true" disabled="">Choose Type</option>
                
                    <option value="Plant sparepart">Plant sparepart</option>
                    <option value="Machinery sparepart">Machinery sparepart</option>
                    <option value="Tool and equipment">Tool and equipment</option>
                    <option value="Consumeable">Consumeable</option>
                
                </select>
            </label>

            <div id="hidden_div" style="display:none;">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                   Machinery Type
                </span>
                <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="subtype" required>
                <option value="N/A" id="N/A" selected="true" disabled="">Choose Machinery Type</option>
                
                    <option value="Paver">Paver</option>
                    <option value="Tyre Roller">Tyre Roller</option>
                    <option value="Tandem Roller">Tandem Roller</option>
                    
                
                </select>
            </label>
</div>

<div id="hidden_div1" style="display:none;">
<label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Serial Number</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="" id="number" name="number" required />
            </label>

            <div class="form-group mt-4 mb-4">
                    <label>Image</label>
                    <div class="custom-file mt-2">
                        <input type="file" class="custom-file-input form-control" value="" id="image" name="img" accept="image/*">
                    </div>
                    


                </div>
</div>
           
            <div class="pt-3">
            <a href="">
                <button class="h-10 px-5 m-2 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800 float-right">Confirm</button>
            </a> 
        </div>
</form>
    </div>

<script type="text/javascript">
   function showDiv(select) {
                if (select.value == "Machinery sparepart" || select.value == "Plant sparepart") {

                    document.getElementById('hidden_div1').style.display = "block";
                    document.getElementById('number').value = "";
                    document.getElementById('image').value = "";
                    if (select.value == "Machinery sparepart") {
                    document.getElementById('hidden_div').style.display = "block";
                } else {
                    document.getElementById('N/A').removeAttribute("disabled");
                    document.getElementById('N/A').selected = "true";
                    document.getElementById('hidden_div').style.display = "none";
                }

                } else {
                    document.getElementById('hidden_div1').style.display = "none";
                    document.getElementById('N/A').removeAttribute("disabled");
                    document.getElementById('N/A').selected = "true";
                    document.getElementById('hidden_div').style.display = "none";
                    document.getElementById('number').value = "N/A";
                    document.getElementById('image').value = "N/A";
                    document.getElementById('number').removeAttribute("required");
                    document.getElementById('image').removeAttribute("required");
                }

               
            }
</script>

</x-app-layout>