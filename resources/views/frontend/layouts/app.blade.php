@include('frontend.partials.header')

<body>

    <div class="section-wrapper">
        @include('frontend.sections.sect_menu')

        @yield('content')

        <!-- ========== Footer start ========== -->
        @include('frontend.partials.footer')
        <!-- ========== Footer end ========== -->
    </div>



    @include('frontend.links.js')

</body>

</html>
