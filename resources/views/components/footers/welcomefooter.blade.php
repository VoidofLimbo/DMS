{{-- footer --}}
<footer class="text-center bg-gray-900 text-white">
    <div class="px-6 pt-6">

        {{-- simplify socials more --}}
        <x-footers.footerparts.socials />

        {{-- when they press joinus give them a form  or take them to learn more page --}}
        <x-footers.footerparts.joinus />

        {{-- what is the company`s main selling statement --}}
        <x-footers.footerparts.punchline />

        {{-- company`s contact details --}}
        <x-footers.footerparts.contact />

        {{-- terms and conditions and privacy policies can go here --}}

        {{-- copyright to the developer or the company also --}}
    </div>
    <x-footers.footerparts.copyright />
</footer>
