@include('frontend.pages.partials.header')

<body>
    <div class="section-wrapper">
        <!-- ========== Header start ========== -->
       @include('frontend.pages.sections.sect_menu')
        <!-- ========== Header end ========== -->

        <!-- ========== Hero section start ========== -->
       @include('frontend.pages.sections.sect_slide')
        <!-- ========== Hero section end ========== -->
        <!-- ========== About section start========== -->
       @include('frontend.pages.sections.sect_biographie')
        <!-- ========== About section end ========== -->
        <!-- ========== Countdown start ========== -->
       @include('frontend.pages.sections.sect_election_time')
        <!-- ========== Countdown end ========== -->
        <!-- ========== Mission start ========== -->
       @include('frontend.pages.sections.sect_programme')
        <!-- ========== Mission end ========== -->
        <!-- ========== Donation start ========== -->
      @include('frontend.pages.sections.sect_don')
        <!-- ========== Donation end ========== -->
        <!-- ========== Event start ========== -->
       @include('frontend.pages.sections.sect_agenda')
        <!-- ========== Event end ========== -->
        <!-- ========== fun fact section start ========== -->
       @include('frontend.pages.sections.sect_statistique')t
        <!-- ========== fun fact section end ========== -->
        <!-- ========== Testimonial start ========== -->
       @include('frontend.pages.sections.sect_temoignage')
        <!-- ========== Testimonial end ========== -->
       
        <!-- ========== Blog section start ========== -->
        @include('frontend.pages.sections.sect_actualite')
        <!-- ========== Blog section end ========== -->
        <!-- ========== Contact section start ========== -->
       @include('frontend.pages.sections.sect_contact')
        <!-- ========== Contact section end ========== -->
        <!-- ========== Footer start ========== -->
         @include('frontend.pages.partials.footer')
        <!-- ========== Footer end ========== -->
    </div>



   @include('frontend.links.js')

</body>

</html>
