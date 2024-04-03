<x-guest-layout>
    
    <!-- preloader-start -->
    <div id="preloader">
        <div class="rasalina-spin-box"></div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <x-frontend.header />

    <!-- main-area -->
    <main>

        <x-frontend.banner />

        <x-frontend.about :about="$about" />

        <x-frontend.service />

        <x-frontend.work-progress />

        <x-frontend.portfolio />

        <x-frontend.partner />

        <x-frontend.testimonial />

        <x-frontend.blog />

        <x-frontend.contact />

    </main>
    <!-- main-area-end -->

    <x-frontend.footer />

</x-guest-layout>