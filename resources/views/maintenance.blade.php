<x-app-layout title="Report">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">Maintenance Reports</h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Add Maintenance Reports
            </h4>

            <form method="POST" action="/add_report" enctype="multipart/form-data" accept-charset='UTF-8'>
                {{@csrf_field()}}
    
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Document Title" name="title" required/>
                </label>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Description</span>

                    <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="description" id="" cols="30" rows="6" placeholder="Some description here..." required></textarea>
                </label>

                <div class="form-group mt-4 mb-4">
                    <label>Attachment</label>
                    <div class="custom-file mt-2">
                        <input type="file" class="custom-file-input form-control" id="file-upload" name="file-upload" accept="file/*" required>
                    </div>
                    <small><i>Maximum file size is 20MB</i></small>

                    {{-- <input type="file" class="form-control" name="mobileBanner" id="mobileBanner" accept="file/*" required> --}}
                    {{-- <small><i>Maximum file size is 20MB</i></small> --}}
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

</x-app-layout>



