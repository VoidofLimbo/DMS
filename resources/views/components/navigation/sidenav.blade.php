{{-- nav menu container --}}
<div class="h-screen fixed z-50" id="sideNav">

    {{-- Formatted navigation menu for larger and medium devices --}}
    <x-navigation.sidenavparts.nav-menu>

        {{-- menu content --}}
        <x-navigation.sidenavparts.nav-menu-content />

    </x-navigation.sidenavparts.nav-menu>

    {{-- Formatted navigation menu for small devices --}}
    <x-navigation.sidenavparts.nav-menu-mobile>

        {{-- menu content --}}
        <x-navigation.sidenavparts.nav-menu-content />

    </x-navigation.sidenavparts.nav-menu-mobile>

    {{-- old version of sidebar navs kept for future purposes --}}
    {{-- Normal Nav menu --}}
    {{-- <x-navigation.sidenavparts.lg-nav-menu /> --}}

    {{-- responsive / mobile navigation menu --}}
    {{-- <x-navigation.sidenavparts.md-nav-menu /> --}}
</div>
