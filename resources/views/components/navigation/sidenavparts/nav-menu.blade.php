{{-- menu for pc devices or larger tablet devices --}}
<div class="w-64 fixed top-0 left-0 bottom-0 bg-slate-900 shadow h-full flex-col justify-between hidden md:flex">

    {{-- actual navigation content --}}
    <div class="px-8">
        @if(isset($logo))
            {{-- logo goes here --}}
            {{ $logo }}
        @endif
        <ul class="mt-12">
            {{-- rest of the items go here --}}
            {{ $slot }}
        </ul>
    </div>

    {{-- menu in bottom --}}
    <x-navigation.sidenavparts.nav-bottom-options />

</div>
