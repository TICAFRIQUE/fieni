@extends('frontend.layouts.app')

@section('title', 'Le projet de société')
@section('subtitle', 'Faire de la Côte d’Ivoire une République Fédérale')

@section('description', $chantier->titre ?? 'Aucune description disponible pour cette actualité.')

@section('content')
    {{-- @push('css')
        <style>
           ul {
                list-style-type:none;
                padding-left: 1.5rem;
                margin-bottom: 1rem;
            }

           ol {
                list-style-type: decimal;
                padding-left: 1.5rem;
                margin-bottom: 1rem;
            }

             li {
                margin-bottom: 0.5rem;
            }

             p {
                margin-bottom: 0.75rem;
            }

           
        </style>
    @endpush --}}




    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->

    <div class="blog-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                    <div class="blog-details__wrapper">
                        <div class="blog-details__wrapper__image">


                            {{-- <style>
                                .image-cover {
                                    width: 100%;
                                    /* ou une largeur fixe */
                                    height: 300px;
                                    /* définit la hauteur */
                                    background-image: url('{{ URL::asset($chantier?->getFirstMediaUrl('image') ?? '') }}');
                                    background-size: cover;
                                    /* ✅ pour que l’image remplisse la div */
                                    background-position: center center;
                                    /* centre l’image */
                                    background-repeat: no-repeat;
                                    /* empêche la répétition */
                                }
                            </style>
                            <div class="image-cover"></div> --}}

                            <img class="img-fluid" src="{{ URL::asset($chantier?->getFirstMediaUrl('image') ?? '') }}"
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


                            <!-- ========== Start chantier ========== -->
                            <style>
                                .missionv2__item__title {
                                    height: 70px;
                                    /* Ajuste selon ton design */
                                    overflow: hidden;
                                    /* Cache l'excès de texte */
                                    display: -webkit-box;
                                    -webkit-line-clamp: 4;
                                    /* Limite à 2 lignes */
                                    -webkit-box-orient: vertical;
                                    line-height: 24px;
                                    /* Ajuste selon la taille de la police */
                                }
                            </style>

                            <section id="mission" class="section-padding missionv2">
                                <div class="container py-2" style="background-color: #ffffff;">
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="section__title__center">
                                                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                                    Le projet de société
                                                </p>
                                                {{-- <h4 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                                                    PRO-CÔTE D’IVOIRE pour la Démocratie, la Prospérité et la Souveraineté
                                                    (PROCI-DPS)
                                                </h4>
                                                <h5> Faire de la Côte d’Ivoire une République Fédérale</h5> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="owl-carousel owl-theme">
                                            @foreach ($data_chantier as $item)
                                                <div class="col-lg-12 col-md-12  mb-xl-0" data-aos="fade-up"
                                                    data-aos-duration="1000" data-aos-delay="300">
                                                    <div class="missionv2__item">
                                                        <div class="missionv2__item__image">
                                                            <img class="img-fluid"
                                                                src="{{ URL::asset($item?->getFirstMediaUrl('image') ?? asset('assets_web/images/web/fieni.jpg')) }}"
                                                                alt="Mission" />
                                                        </div>
                                                        <h3 class="missionv2__item__title fs-5 text-uppercase">
                                                            <a
                                                                href="{{ route('site.chantier', $item->slug) }}">{{ $item->titre }}</a>
                                                        </h3>
                                                        {{-- <p class="missionv2__item__desc">
                             {!! substr(strip_tags($item['description']), 0, 100) !!}...
                         </p> --}}

                                                        <a href="{{ route('site.chantier', $item->slug) }}"
                                                            class="btn__link ml-auto mr-0 d-flex justify-content-end">Lire
                                                            le contenu<i class="icofont-rounded-right"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                    </div>
                                </div>


                            </section>
                            <!-- ========== End chantier ========== -->

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

                <!-- ========== Start actualité recentes col-md-4 ========== -->
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
                    nav: false,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 2
                        }
                    }
                });
            });
        </script>
    @endpush


@endsection
