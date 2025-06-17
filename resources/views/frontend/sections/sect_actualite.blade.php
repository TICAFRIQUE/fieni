<style>
    .blogv2__item__content__title,
    .blogv2__item__content__text {
        height: 70px;
        /* Ajuste selon ton design */
        overflow: hidden;
        /* Cache l'excès de texte */
        display: -webkit-box;
        -webkit-line-clamp: 5;
        /* Limite à 2 lignes */
        -webkit-box-orient: vertical;
        line-height: 18px;
        /* Ajuste selon la taille de la police */
    }
</style>

<section class="section-padding blog" id="blog" style="background-color: #101324;">
    <div class="container p-3" style="background-color: #ffffff;">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="section__title__center">
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        Actualités
                    </p>
                    <h3 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                        Activités récentes
                    </h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            {{-- @foreach ($data_actualite as $item)
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="300">
                    <div class="blog__area">
                        <div class="blog__image">
                            <img class="img-fluid" src="{{ URL::asset($item?->getFirstMediaUrl('image_une') ?? asset('assets_web/images/web/fieni.jpg')) }}" alt="Blog 01" />
                        </div>
                        <div class="blog__content">
                            <p>{{ \Carbon\Carbon::parse($item->date_publication)->translatedFormat('d F Y') }}</p>
                            <h3 class="fs-6 text-capitalize">
                                <a href="{{ route('site.actualite_details', $item->slug) }}">{{ $item->titre }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach --}}

            @foreach ($data_actualite as $item)
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="350">
                    <div class="blogv2__item">
                        <div class="blogv2__item__image">
                            <img class="img-fluid" src="{{ URL::asset($item?->getFirstMediaUrl('image_une') ?? '') }}"
                                alt="image_une" />
                            <div class="blogv2__item__image__date">
                                <p>
                                    <i class="icofont-clock-time"></i><a href="#">
                                        {{ \Carbon\Carbon::parse($item->date_publication)->diffForHumans() }}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="blogv2__item__content">
                            {{-- <ul>
                                <li><i class="icofont-user"></i> <a href="#">Jonus</a></li>
                                <li>
                                    <i class="icofont-comment"></i>
                                    <a href="#">Comments (8)</a>
                                </li>
                            </ul> --}}
                            <h3 class="fs-6 blogv2__item__content__title">
                                <a href="{{ route('site.actualite_details', $item->slug) }}">{{ $item->titre }}</a>
                            </h3>
                            <p class="blogv2__item__content__text">
                                {!! Str::limit(strip_tags($item->description), 100, '...') ?? 'Description non spécifique' !!}
                            </p>
                            <a href="{{ route('site.actualite_details', $item->slug) }}"
                                class="btn__link justify-content-end">Lire plus <i
                                    class="icofont-rounded-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="text-center mt-4">
                <a href="{{ route('site.actualite') }}" class=" btn btn__primary w-50 text-center"> <span>Voir toutes
                        les actualités</span> <i class="icofont-rounded-right"></i> </a>
            </div>
        </div>
    </div>
</section>
