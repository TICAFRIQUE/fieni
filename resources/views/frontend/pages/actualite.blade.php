@extends('frontend.layouts.app')

@section('title')
    Actualités
@endsection


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

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->


    <!-- ========== Blog Grid start ========== -->
    <section class="section-padding all-blogs-area">
        <div class="container">
            <div class="row justify-content-center">
                @forelse($actualite as $item)
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

                @empty
                    <div class="col-md-12">
                        <div class="alert alert-info text-center">
                            <strong>Aucune actualité trouvée.</strong>
                        </div>
                    </div>
                @endforelse


            </div>
            {{-- <div class="blog__pagination" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> --}}

            <div class="blog__pagination" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                <nav aria-label="Page navigation example">
                    {{ $actualite->links('pagination::bootstrap-5') }}
                </nav>
            </div>

        </div>
    </section>
    <!-- ========== Blog Grid end ========== -->
@endsection
