@extends('frontend.layouts.app')
@section('title')
    Video
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->

    <section id="mission" class="section-padding missionv2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section__title__center">
                        <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            Fieni - TV
                        </p>
                        {{-- <h3 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                            Make america great again
                        </h3> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($data_video as $item)
                    <div class="col-lg-4 col-md-6 mb-4 mb-xl-0" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="300">
                        <div class="missionv2__item">
                            <div class="missionv2__item__image">
                                <img class="img-fluid" src="{{ asset('assets_web/images/web/logo-fieni.png') }}"
                                    alt="Mission" />
                                <div class="missionv2__item__video">
                                    <div class="play-btn-box">
                                        <a href="https://www.youtube.com/watch?v={{ $item->lien }}"
                                            class="glightbox3 play-button">
                                            <i class="icofont-play"></i>
                                        </a>
                                        <div class="play-btn-line1">
                                            <div class="play-btn-line2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="missionv2__item__title fs-3">
                                <a href="#" target="_blank">{{ $item->titre }}</a>
                            </h3>
                            <p class="missionv2__item__desc">
                                {{ $item->description ?? 'Description non spécifique' }}
                            </p>
                            <div class="missionv2__item__meta">
                                <span class="missionv2__item__date">
                                    <i class="icofont-calendar"></i>
                                    {{\Carbon\Carbon::parse($item->created_at)->diffForHumans() ?? \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}} 
                                </span>
                                <span class="missionv2__item__author">
                                    <i class="icofont-user"></i>
                                    {{ $item->auteur ?? 'Auteur inconnu' }}
                                </span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
