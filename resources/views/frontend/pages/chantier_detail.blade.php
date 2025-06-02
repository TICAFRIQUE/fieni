@extends('frontend.layouts.app')

@section('title', 'Chantier Etat')
@section('description', $chantier->titre ?? 'Aucune description disponible pour cette actualité.')

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
                                src="{{ URL::asset($chantier?->getFirstMediaUrl('image') ?? '') }}"
                                alt="image fieni" />
                        </div>
                        <div class="blog-details__content">
                            <h2 class="blog-details__title my-3">{{ $chantier->titre ?? 'Aucune titre disponible.' }}</h2>
                            <p class="para">
                                {!! $chantier->description ?? 'Aucune description disponible.' !!}
                            </p>


{{-- 
                            <!-- ========== Start afficher la galerie ========== -->
                            <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                <div class="blog-details__wrapper__image">
                                    <h3 class="text-center mb-4">Galeries</h3>
                                    <div class="row">
                                        <div class="owl-carousel owl-theme">
                                            @foreach ($chantier->getMedia('galerie') as $media)
                                                <div class="item">
                                                    <a href="{{ $media->getUrl() }}" data-lightbox="galerie"
                                                        data-title="{{ $media->name }}">
                                                        <img class="img-fluid" src="{{ $media->getUrl() }}"
                                                            alt="{{ $media->name }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ========== End afficher la galerie ========== --> --}}

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

                <!-- ========== Start actualité recentes ========== -->
                @include('frontend.partials.actualite_recente')
                <!-- ========== End actualité recentes ========== -->
                
              
            </div>
        </div>


    </div>


    @push('scripts')
        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
            });
        </script>
    @endpush


@endsection
