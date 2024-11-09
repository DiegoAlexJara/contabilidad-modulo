<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Default Title')</title>
    
    @stack('estyls')

    {{-- FlowBite CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    
</head>

<body>
    <div class="flex h-screen">
        @include('components.nav-bar')

        <main class="flex-1  justify-center bg-gray-300">
            <div class="text-center">
                @yield('content')

            </div>
        </main>
    </div>
    @stack('JS')

    
   

    {{-- FlowBite JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @livewireScripts
</body>

</html>
