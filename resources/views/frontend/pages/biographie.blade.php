@extends('frontend.layouts.app')

@section('title')
    Ma Biographie
@endsection


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->

    <div class="blog-details section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                    <div class="blog-details__wrapper">
                        <div class="blog-details__wrapper__image">
                            <img class="img-fluid"
                                src="{{ URL::asset($biographie?->getFirstMediaUrl('image') ?? asset('assets_web/images/web/fieni.jpg')) }}"
                                alt="image fieni" />
                        </div>
                        <div class="blog-details__content">


                            <p class="para">
                                {!! $biographie->description ?? 'Aucune biographie disponible.' !!}
                            </p>

                            <div class="blog-tag">
                                <div class="row">
                                    <div
                                        class="col-md-6 d-flex flex-wrap justify-content-md-start justify-content-center align-items-center">
                                        <h4>Suivez nous</h4>
                                        <div class="social-icon">
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
                <!-- ========== Start Actualité recentes  ========== -->
                @include('frontend.partials.actualite_recente')
                <!-- ========== End Actualité recentes ========== -->


            </div>
        </div>
    </div>
@endsection
