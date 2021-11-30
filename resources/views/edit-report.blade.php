<x-app-layout title="Report">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">Maintenance Reports</h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Edit Maintenance Reports
            </h4>

            <form method="POST" action="/save_report" enctype="multipart/form-data" accept-charset='UTF-8'>
                {{@csrf_field()}}

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Document Title" name="title" value="{{$report->title}}" required />
                </label>

                <input type="text" hidden name="id" value="{{$report->id}}">

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Description</span>

                    <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="description" id="" cols="30" rows="6" placeholder="Some description here..." required>{{$report->description}}</textarea>
                </label>

                <div class="form-group mt-4 mb-4">
                    <label>Select a New File</label>
                    <div class="custom-file mt-2">
                        <input type="file" class="custom-file-input form-control" id="file-upload" name="file-upload" accept="file/*">
                    </div>
                    <small><i>Maximum file size is 20MB</i></small>

                    {{-- <input type="file" class="form-control" name="mobileBanner" id="mobileBanner" accept="file/*" required> --}}
                    {{-- <small><i>Maximum file size is 20MB</i></small> --}}
                </div>

                <div class="mt-4">
                    <span class="text-gray-700">Maintenance Type</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input onclick="check()" type="radio" class="form-radio" name="maintenanceType" id="Unplanned Maintenance" value="Unplanned Maintenance">
                            <span class="ml-2">Unplanned Maintenance</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input onclick="uncheck()" type="radio" class="form-radio" name="maintenanceType" id="Planned Maintenance" value="Planned Maintenance">
                            <span class="ml-2">Planned Maintenance</span>
                        </label>
                    </div>
                </div>

                <br>

                <div id="hidden_div" style="display:none;">
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center">
                                <input id="mycheck" type="checkbox" class="form-checkbox" />
                                <span class="ml-2">More than 1 day</span>
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div id="hidden_div1" style="display:none;">
                    <div class="mt-2">
                        <label for="birthday">From:</label>
                        <input type="date" value="{{$report->created_at->todatestring()}}" id="from" name="from">

                        <label class="pl-10" for="birthday">To:</label>
                        <input type="date" value="{{$report->updated_at->todatestring()}}" id="to" name="to">

                    </div>
                </div>


                {{-- <button class="h-8 px-5 text-indigo-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-500 hover:text-indigo-100">Done</button> --}}
                <button class="h-10 px-5 text-indigo-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-500 hover:text-indigo-100 float-right" type="submit">Submit</button>
            </form>
        </div>
    </div>


    {{-- <script>
        $(document).ready(function () {
    
            // alert(moment())
    
            // today
            var minDate = moment().add('days', 3)
    
            $('.datepicker').daterangepicker({
                locale: {format: 'YYYY-MM-DD'},
                singleDatePicker: true,
                minDate:minDate
            });
    
        });
        
    </script> --}}

    <script type="text/javascript">
        function myFunction() {
            document.getElementById("{{$report->planned}}").checked = true;
            var x = "{{$report->planned}}";
            var from = "{{$report->created_at}}";
            var to = "{{$report->updated_at}}";
            

                document.getElementById('hidden_div').style.display = "block";

                if (from != to){

                    document.getElementById("mycheck").checked = true;
                    document.getElementById('hidden_div1').style.display = "block";

                }

            

        }

        function check() {

            document.getElementById('hidden_div').style.display = "block";
            

        }

        function uncheck() {
            document.getElementById('hidden_div').style.display = "block";
            

        }

        var view = document.getElementById("mycheck");
        view.onchange = function() {
            var from = "{{$report->created_at->todatestring()}}";
            var to = "{{$report->updated_at->todatestring()}}";
            if (this.checked) {
                document.getElementById('hidden_div1').style.display = "block";
                document.getElementById('from').setAttribute("required", "");
                document.getElementById('to').setAttribute("required", "");
                document.getElementById('from').value = from;
                document.getElementById('to').value = to;
            } else {
                document.getElementById('hidden_div1').style.display = "none";
                document.getElementById('from').removeAttribute("required");
                document.getElementById('to').removeAttribute("required");
                document.getElementById('from').value = "";
                document.getElementById('to').value = "";
            }

        }
    </script>

</x-app-layout>