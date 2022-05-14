{{-- parameters passed into this components --}}
@props(['id', 'childid', 'parentid'])

{{-- this component will act as a list item for the main navigation menu --}}
<li class="w-full relative text-gray-300 hover:text-gray-500 cursor-pointer mt-6"
    {{ $attributes->merge(['id' => $id]) }}>

    {{-- The list item is a link --}}
    <a class="flex justify-between w-full text-sm px-1 pt-1 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded text-gray-300 hover:text-gray-500 transition duration-300 ease-in-out cursor-pointer"
        data-mdb-ripple="true" data-mdb-ripple-color="primary" data-bs-toggle="collapse"
        {{ $attributes->merge(['data-bs-target' => '#' . $childid, 'aria-controls' => $childid]) }}
        aria-expanded="false">

        {{-- if there is svg icon path will be passed --}}
        <div class="flex">

            @if (isset($svgpath))
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">

                    {{-- put path inside svg --}}
                    {{ $svgpath }}
                </svg>
            @endif

            {{-- if title is given display it here --}}
            @if (isset($title))
                <span class="text-sm ml-2">
                    {{ $title }}
                </span>
            @endif
        </div>

        {{-- this is the arrow that will be displayed along side collapsing menu making it dynamic is tricky for now --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </a>

    {{-- corresponding text to display in menu item --}}
    <ul class="relative accordion-collapse collapse"
        {{ $attributes->merge(['aria-labelledby' => $id, 'id' => $childid, 'data-bs-parent' => '#' . $parentid]) }}>
        {{ $slot }}
    </ul>

    {{-- if there is notification to display numbers of new changes / updates then it goes here --}}
    {{-- this is separate than the whole list item meaning this can link to something else later on --}}
    @if (isset($changes))
        <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">
            {{ $changes }}
        </div>
    @endif
</li>
