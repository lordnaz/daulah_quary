<x-app-layout title="Maintenance View">

        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Maintenance Report List
            </h2>
    
            
            <!-- With actions -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Report Lists  
            </h4>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Created By</th>
                                <th class="px-4 py-3">Created At</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($collection as $item)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                {{$item->title}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$item->description}}
                                    </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{$item->created_by}}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                {{-- {{$item->created_at}} --}}
                                {{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y g:i:s A') }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                    
                                        {{-- <a href="{{ $item->external_link }}" target="_blank">
                                            {{ $item->external_link }}
                                        </a>  --}}
                                    <a href="{{$item->doc_path}}" target="_blank">
                                        <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            <span>Download</span>
                                        </button>
                                        
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
                        Showing {{count($collection)}}-8 of {{count($totals)}};
                        </span>
                    
                    <!-- Pagination -->
                    <div class="min-w-0 flex items-center float-right">
                    {!! $collection->links(); !!}
                    
                    
            </div>
        </div>
    </x-app-layout>