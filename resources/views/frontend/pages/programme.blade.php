@extends('frontend.layouts.app')

@section('title')
   Projet de société 
@endsection



@section('content')
    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->
    <!-- ========== Single Event start ========== -->
    <div class="blog-details section-padding">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="blog-details__wrapper">
                        <div>
                            <img class="img-fluid" src="{{ URL::asset($programme?->getFirstMediaUrl('image') ?? '') }}"
                                alt="image fieni" />
                        </div>
                        <div class="blog-details__content">

                            {{-- <h2 class="blog-details__content__title">
                                Everyone Let's Humanity This Time
                            </h2> --}}
                            <p class="para">
                                {!! $programme->description ?? 'Aucun programme disponible.' !!}
                            </p>



                            <!-- ========== Start chantier ========== -->
                            @include('frontend.sections.sect_programme')
                            <!-- ========== End chantier ========== -->

                            <div
                                class="mt-5 d-flex flex-wrap justify-content-md-start justify-content-center align-items-center">
                                <h4 class="m-0 me-4">Suivez nous:</h4>
                                <div class="social-icon m-0">
                                    <a href="{{ $parametre->lien_facebook ?? '' }}" class="text-dark"><i
                                            class="icofont-facebook"></i></a>
                                    <a href="{{ $parametre->lien_twitter ?? '' }}" class="text-dark"><i
                                            class="icofont-twitter"></i></a>
                                    <a href="{{ $parametre->lien_instagram ?? '' }}" class="text-dark"><i
                                            class="icofont-instagram"></i></a>
                                    <a href="{{ $parametre->lien_youtube ?? '' }}" class="text-dark"><i
                                            class="icofont-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- ========== Single Event end ========== -->
@endsection
