@php
    $role = auth()->user()->role;
@endphp

<x-app-layout title="Dashboard">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Inventories
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            @if ($role == 'admin')
                <!-- Card -->
                <a href="{{ route('insert-parts') }}">
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 cursor-pointer hover:border-purple-700 border-2 border-purple-300">
                        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Add New Parts
                            </p>
                        </div>
                    </div>
                </a>
                
                <!-- Card -->
                <a href="{{ route('UpQuantity') }}">
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 cursor-pointer hover:border-purple-700 border-2 border-purple-300">
                        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Update Inventories
                            </p>
                        </div>
                    </div>
                </a>
            @endif
            
            
            <!-- Card -->
            <a href="{{ route('consumption') }}">
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 cursor-pointer hover:border-purple-700 border-2 border-purple-300">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                          </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Usage
                        </p>
                    </div>
                </div>
            </a>

        </div>        
    </div>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Maintenance
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

            @if ($role == 'admin')
                <!-- Card -->
                <a href="{{ route('report') }}">
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 cursor-pointer hover:border-purple-700 border-2 border-purple-300">
                        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Add Report
                            </p>
                        </div>
                    </div>
                </a>
            @endif
            
            <a href="{{ route('view_report') }}">
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 cursor-pointer hover:border-purple-700 border-2 border-purple-300">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            View Report
                        </p>
                    </div>
                </div>
            </a>
            
        </div>        
    </div>

</x-app-layout>