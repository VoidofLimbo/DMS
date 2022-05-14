{{-- master page defining layout of components for webpages implementing dashboard layout --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{-- This is tailwing css --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- This is livewire css --}}
    @livewireStyles

    {{-- custom css to override above css goes here --}}
    @if (isset($styles))
        {{ $styles }}
    @endif

    <!-- Scripts -->
    {{-- This is essential js including tailwind that needs to load before contents --}}
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    {{-- will be useful to display messages attached with session if requested by client --}}
    <x-jet-banner />

    <div class="min-h-screen">
        <div class="flex flex-no-wrap h-full">
            <!-- Nav Bar -->
            <x-navigation.sidenav />

            {{-- body --}}
            <div class="md:ml-64 w-full bg-slate-800">

                {{-- if there is header put it here --}}
                @if (isset($header))
                    <header class="bg-white shadow fixed w-full bg-slate-700 text-white z-40">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                            {{-- actual header items can be different in different childrens --}}
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- rest of the page Content -->
                <main class="relative pt-20 bg-slate-800 min-h-screen h-full">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>



    {{-- stack models sent by implementing pages --}}
    @stack('modals')

    {{-- necessary javascript for layout itself --}}
    <script src="{{ asset('/js/dashboard.js') }}"></script>

    {{-- script from implementing blade templates --}}

    @if (isset($script))
        {{ $script }}
    @endif

    {{-- inserting necessary laravel livewire scripts --}}
    @livewireScripts

</body>

</html>
