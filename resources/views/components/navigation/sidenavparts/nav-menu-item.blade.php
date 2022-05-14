{{-- generic format for menu item --}}
<li class="flex w-full justify-between text-gray-300 hover:text-gray-500 cursor-pointer items-center mt-6">
    {{-- need to put the links here --}}
    <x-navigation.sidenavparts.nav-link :attributes="$attributes"
        class="flex w-full items-center">

        {{-- if there is svg icon path will be passed --}}
        @if (isset($svgpath))
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">

                {{-- put path inside svg --}}
                {{ $svgpath }}
            </svg>
        @endif

        {{-- corresponding text to display in menu item --}}
        <span class="text-sm ml-2"> {{ $slot }} </span>
    </x-navigation.sidenavparts.nav-link>

    {{-- if there is notification to display numbers of new changes / updates then it goes here --}}
    @if (isset($changes))
        <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">
            {{ $changes }}
        </div>
    @endif
</li>
