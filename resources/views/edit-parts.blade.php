@php

$status = "Machinery sparepart";
$status2 = "Plant sparepart"
@endphp
<x-app-layout title="Forms">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Items
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit
        </h4>

        <div class="px-10 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="/saveItems" enctype="multipart/form-data" method="POST">
                {{@csrf_field()}}
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="items" value="{{$items->item_name}}" />
                    <input type="hidden" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="id" value="{{$items->table_id}}" />

                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Type
                    </span>
                    <select disabled onchange="showDiv(this)" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" required>
                        <option value="" disabled="">Choose Type</option>

                        <option id="Plant sparepart" value="Plant sparepart">Plant sparepart</option>
                        <option id="Machinery sparepart" value="Machinery sparepart">Machinery sparepart</option>
                        <option id="Tool and equipment" value="Tool and equipment">Tool and equipment</option>
                        <option id="Consumeable" value="Consumeable">Consumeable</option>

                    </select>
                </label>
                @if($status != $items->type)
                <div id="hidden_div" style="display:none;">
                    @else
                    <div id="hidden_div" style="display:block;">
                        @endif
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Machinery Type
                            </span>
                            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="subtype" required>
                                <option value="N/A" id="N/A" disabled="">Choose Machinery Type</option>

                                <option id="Paver" value="Paver">Paver</option>
                                <option id="Tyre Roller" value="Tyre Roller">Tyre Roller</option>
                                <option id="Tandem Roller" value="Tandem Roller">Tandem Roller</option>


                            </select>
                        </label>

                    </div>
                    @if($status == $items->type || $status2 == $items->type)
                <div id="hidden_div1" style="display:block;">
                    @else
                    <div id="hidden_div1" style="display:none;">
                        @endif
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Serial Number</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{$items->SerialNum}}" id="number" name="number" required />
                        </label>

                        <div class="form-group mt-4 mb-4">
                        <img src="{{ URL::asset('/storage/image/'.$items->image) }}" width="400"/> <br>

                            <label>Select a new image</label>
                            <div class="custom-file mt-2">
                                <input type="file" class="custom-file-input form-control" id="image" name="image" accept="image/*">
                            </div>



                        </div>
                    </div>

                    <div class="pt-3">
                        <a href="">
                            <button class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700 float-right">Save Changes</button>
                        </a>
                    </div>
            </form>
        </div>

        <script type="text/javascript">
            function myFunction() {
                document.getElementById("{{$items->type}}").selected = "true";
                

                

                var x= "{{$items->subtype}}";
                if(x == "N/A"){
                    document.getElementById('N/A').removeAttribute("disabled");
                    document.getElementById("{{$items->subtype}}").selected = "true";
                }
                else{
                    document.getElementById("{{$items->subtype}}").selected = "true";
                }
            }

            function showDiv(select) {
                if (select.value == "Machinery sparepart" || select.value == "Plant sparepart") {

                    document.getElementById('hidden_div1').style.display = "block";
                    document.getElementById('number').value = "";
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
                    document.getElementById('image').removeAttribute("required");
                }

               
            }
        </script>



</x-app-layout>