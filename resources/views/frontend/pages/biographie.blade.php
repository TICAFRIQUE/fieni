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
                                src="{{ asset($biographie->getFirstMediaUrl('image') ?? asset('assets_web/images/web/fieni.jpg')) }}"
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
                <div class="col-lg-4" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    <div class="blog__sidebar">
                        
                        <div class="blog__sidebar__item">
                            <div class="blog-category">
                                <div class="blog-category__title">
                                    <h4>Actualites récentes</h4>
                                    <span></span>
                                </div>
                                <div class="blog-category__area">
                                    <ul>
                                      @foreach ($data_actualite as $item)

                                            <li class="d-flex align-items-center">
                                            <div class="post-img">
                                                <a href="details-right-sidebar.html"><img class="img-fluid" alt="image"
                                                        src="{{ asset($item->getFirstMediaUrl('image_une') ?? asset('assets_web/images/web/fieni.jpg')) }}" /></a>
                                            </div>
                                            <div class="post-content">
                                                <h6>
                                                    <a href="details-right-sidebar.html">{{ Str::substr($item->titre, 1, 50) }}...</a>
                                                </h6>
                                                <span><i class="icofont-ui-calendar"></i> {{ \Carbon\Carbon::parse($item->date_publication)->diffForHumans() }}</span>
                                            </div>
                                        </li>
                                      @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
