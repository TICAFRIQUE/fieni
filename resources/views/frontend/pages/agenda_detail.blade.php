@extends('frontend.layouts.app')

@section('title', 'Details Agenda')
@section('description', $agenda->description ?? 'Aucune description disponible pour cette actualité.')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->

    <div class="blog-details section-padding">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="blog-details__wrapper">
                        <div>
                            <img class="img-fluid" src="{{ URL::asset($agenda->getFirstMediaUrl('image_detail') ?? '') }}"
                                alt="" />
                        </div>
                        <div class="blog-details__content">
                            <div class="blog-details__content__publish-time">
                                <ul>
                                    <li><i class="icofont-ui-calendar"></i>
                                        {{ \Carbon\Carbon::parse($agenda->date_debut)->format('d M Y') }} </li>
                                    <li><i class="icofont-wall-clock"></i>
                                        {{ \Carbon\Carbon::parse($agenda->date_debut)->format('H:i') }}</li>
                                    <li>
                                        <i class="icofont-location-pin"></i> {{ $agenda->lieu ?? 'Lieu non spécifié' }}
                                    </li>
                                </ul>
                            </div>
                            <h2 class="blog-details__content__title">
                                {{ $agenda->titre ?? 'Titre non spécifié' }}
                            </h2>
                            <p class="para">
                                {!! $agenda->description ?? 'Aucune description disponible pour cet événement.' !!}
                            </p>

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
