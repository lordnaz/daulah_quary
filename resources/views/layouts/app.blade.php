<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{asset('js/init-alpine.js')}}" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{asset('js/charts-lines.js')}}" defer></script>
    <script src="{{asset('js/charts-pie.js')}}" defer></script>
    <script src="{{asset('js/charts-bars.js')}}" defer></script>

    

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> --}}

    @livewireStyles
    <script>
        import Turbolinks from 'turbolinks';
        Turbolinks.start()
    </script>

    <!-- Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script> --}}

    <style>
        .close {
  position: absolute;
  top:60px;
  right:250px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
</style>
    
</head>

<body onload="myFunction()">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.menu')
        @include('layouts.mobile-menu')

        <div class="flex flex-col flex-1 w-full">
            @include('layouts.navigation-dropdown')
            <main class="h-full overflow-y-auto">
                {{ $slot }}
                
            </main>

            {{-- <footer class="relative inset-x-0 bottom-0 h-16">
                Copyright &copy; 2021 Serba Dinamik Group All rights reserved  Powered By <a class="text-success" href="https://nfylegacy.biz.my/" target="_blank">NFY Legacy</a>
            </footer> --}}
            
        </div>


        @stack('modals')

        @livewireScripts
        
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> --}}

</body>

</html>
