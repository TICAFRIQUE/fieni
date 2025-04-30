@include('frontend.pages.partials.header')


<main id="main">

    @yield('content')

    {{-- 

        <!-- ======= Services Section ======= -->
        @include('frontend.pages.sections.service')
        <!-- End Services Section -->



        <!-- ======= Presentation Section ======= -->
        @include('frontend.pages.sections.presentation')
        <!-- Presentation Section -->



        <!-- ======= Our Projects Section ======= -->
        @include('frontend.pages.sections.realisation')
        <!-- End Our Projects Section -->

        <!-- ======= Reference Section ======= -->
        @include('frontend.pages.sections.reference')
        <!-- End Reference Section --> --}}

    <!-- ======= Recent Blog Posts Section ======= -->
    {{-- @include('frontend.pages.sections.blog') --}}
    <!-- End Recent Blog Posts Section -->

</main><!-- End #main -->

@include('frontend.pages.partials.footer')
</body>

</html>