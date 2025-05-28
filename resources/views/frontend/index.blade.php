@extends('frontend.layouts.app')
@section('title', 'Accueil')


@section('content')

    {{-- 
  <!-- ========== Header start ========== -->
@include('frontend.sections.sect_menu')
<!-- ========== Header end ========== --> --}}

    <!-- ========== Hero section start ========== -->
    @include('frontend.sections.sect_slide')
    <!-- ========== Hero section end ========== -->


    <!-- ========== About section start========== -->
    @include('frontend.sections.sect_biographie')
    <!-- ========== About section end ========== -->


    <!-- ========== Countdown start ========== -->
    @include('frontend.sections.sect_election_time')
    <!-- ========== Countdown end ========== -->


    <!-- ========== Mission start ========== -->
    @include('frontend.sections.sect_programme')
    <!-- ========== Mission end ========== -->


    <!-- ========== Donation start ========== -->
    {{-- @include('frontend.sections.sect_don') --}}
    <!-- ========== Donation end ========== -->


    <!-- ========== Event start ========== -->
    @if (isset($data_agenda) && $data_agenda->count() > 0)
        @include('frontend.sections.sect_agenda')
    @endif
    <!-- ========== Event end ========== -->


    <!-- ========== fun fact section start ========== -->
    @include('frontend.sections.sect_statistique')
    <!-- ========== fun fact section end ========== -->


    <!-- ========== Blog section start ========== -->
    @include('frontend.sections.sect_actualite')
    <!-- ========== Blog section end ========== -->
    <!-- ========== Contact section start ========== -->



    <!-- ========== Testimonial start ========== -->
    @if (isset($data_temoignage) && $data_temoignage->count() > 0)
        @include('frontend.sections.sect_temoignage')
        
    @endif
    <!-- ========== Testimonial end ========== -->


    {{-- @include('frontend.sections.sect_contact') --}}
    <!-- ========== Contact section end ========== -->


@endsection
