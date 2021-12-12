<x-app-layout title="Maintenance View">
<!-- Alert Message -->
@php 
    $status= session('msgg');
    $role = auth()->user()->role;
@endphp

@if ($status=='success')
<div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
  <p class="font-bold">Success!</p>
  <p>New item has been succesfully add</p>
</div>
@elseif ($status=='save')
<div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
  <p class="font-bold">Success!</p>
  <p>Succesfully to change the report</p>
</div>
@elseif ($status=='delete')
<div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
  <p>The report has been removed</p>
  <span class="absolute inset-y-0 right-0 flex items-center mr-4">
    <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
  </span>
</div>
@endif
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
                                <th class="px-4 py-3">Planned type</th>
                                <th class="px-4 py-3">From</th>
                                <th class="px-4 py-3">To</th>
                                <th class="px-4 py-3">Download</th>
                                @if ($role == 'admin')
                                <th class="px-4 py-3">Actions</th>
                                @endif
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
                                 {{$item->planned}}                               
                                </td>
                                <td class="px-4 py-3 text-sm">
                                {{$item->created_at->todatestring()}}
                                
                                </td>
                                <td class="px-4 py-3 text-sm">
                                 {{$item->updated_at->todatestring()}} 
                                
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
                                @if ($role == 'admin')
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                    
                                        <a href="EditReport/{{$item['id']}}">
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
                                        <a href="DeleteReport/{{$item['id']}}">
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
                                @endif
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