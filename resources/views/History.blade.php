@php
$user = auth()->user();
$status = auth()->user()->role;
@endphp
<x-app-layout title="Tables">


    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            History
        </h2>

        
        @if($status =='admin')
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            
                            <th class="px-4 py-3">Serial Number</th>
                            <th class="px-4 py-3">Item Name</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Type</th>
                            <th class="px-4 py-3">By</th>
                            <th class="px-4 py-3">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($admin as $admins)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                            {{$admins->SerialNumber}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$admins->item_name}}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$admins->quantity}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$admins->type}}
                            </td>
                            <td class="px-4 py-3">
                            <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{$admins->name}}
                            </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$admins->created_at->todatestring()}}
                            </td>
                         </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
           
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-3 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center">
                    Showing {{count($admin)}}-10 of {{count($total)}};
                    </span>
                
                <!-- Pagination -->
                <div class="min-w-0 flex items-center float-right">
                {!! $admin->links(); !!}
                
                
        </div>
        </div>
        </div>

        @elseif($status =='user')
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            
                            <th class="px-4 py-3">Serial Number</th>
                            <th class="px-4 py-3">Item Name</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Type</th>
                            <th class="px-4 py-3">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($usershow as $users)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                            {{$users->SerialNumber}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$users->item_name}}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$users->quantity}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                            {{$users->type}}
                            <td class="px-4 py-3 text-sm">
                            {{$users->created_at->todatestring()}}
                            </td>
                         </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
           
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-3 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center">
                    Showing {{count($admin)}}-10 of {{count($total)}};
                    </span>
                
                <!-- Pagination -->
                <div class="min-w-0 flex items-center float-right">
                {!! $admin->links(); !!}
                
                
        </div>
        </div>
        </div>
    @endif
</div>
        
</x-app-layout>