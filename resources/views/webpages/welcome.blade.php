<x-public-layout>

    {{-- The login component for welcome page --}}
    <x-slot name="loginbar">
        <x-spareparts.loginbutton />
    </x-slot>

    {{-- The footer component for welcome page --}}
    <x-slot name="footer">
        <x-footers.welcomefooter />
    </x-slot>

    {{-- can put body here --}}
    <x-bodies.welcomebody />

</x-public-layout>
