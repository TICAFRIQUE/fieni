@include('frontend.partials.header')

<body>
    <div class="section-wrapper">


        @yield('content')

        <!-- ========== Footer start ========== -->
        @include('frontend.partials.footer')
        <!-- ========== Footer end ========== -->
    </div>



    @include('frontend.links.js')

</body>

</html>
