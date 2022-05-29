<x-dashboard-layout>
    <x-slot name="styles">
        {{-- <link rel="stylesheet" href="{{ asset('css/piechart.css') }}"> --}}
    </x-slot>

    {{-- dashboard header --}}
    <x-slot name="header">
        <h2 class="flex justify-between font-semibold text-xl leading-tight">
            <div>
                {{ __('Dashboard') }}
            </div>

            {{-- controls for user to manage their profiles --}}
            <x-useraccount.accountoptions />

        </h2>
    </x-slot>

    <!-- remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
    <div class="w-full h-screen rounded">
        @livewire('weekly-table')
    </div>

    {{-- script for passing data from php to javascript --}}
    {{-- <script>
        var data = {!! json_encode($carehomes->toArray(), JSON_HEX_TAG) !!};
    </script> --}}

    <x-slot name="script">

    </x-slot>
</x-dashboard-layout>
