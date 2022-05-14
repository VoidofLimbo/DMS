{{-- responsive menu for mobile device --}}
<div class="w-64 fixed top-0 left-0 bottom-0 bg-slate-900 shadow flex-col justify-between transition duration-150 ease-in-out flex md:hidden"
    id="mobile-nav">

    {{-- button to show navigation menu --}}
    <button aria-label="toggle sidebar" id="openSideBar"
        class="h-10 w-10 bg-slate-900 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
        onclick="sidebarHandler(true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20" height="20"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <circle cx="6" cy="10" r="2" />
            <line x1="6" y1="4" x2="6" y2="8" />
            <line x1="6" y1="12" x2="6" y2="20" />
            <circle cx="12" cy="16" r="2" />
            <line x1="12" y1="4" x2="12" y2="14" />
            <line x1="12" y1="18" x2="12" y2="20" />
            <circle cx="18" cy="7" r="2" />
            <line x1="18" y1="4" x2="18" y2="5" />
            <line x1="18" y1="9" x2="18" y2="20" />
        </svg>
    </button>

    {{-- button to hide navigation menu --}}
    <button aria-label="Close sidebar" id="closeSideBar"
        class="hidden h-10 w-10 bg-slate-900 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
        onclick="sidebarHandler(false)">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
    </button>

    {{-- actual navigation content --}}
    <div class="px-8">
        @if (isset($logo))
            {{ $logo }}
        @endif
        <ul class="mt-12">
            {{ $slot }}
        </ul>
    </div>

    {{-- menu in bottom --}}
    <x-navigation.sidenavparts.nav-bottom-options />

</div>
