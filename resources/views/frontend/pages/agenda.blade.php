@extends('frontend.layouts.app')

@section('title')
    Agenda
@endsection


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->


    <!-- ========== All Events start ========== -->
    <section class="all-events section-padding">
        <div class="container">
            <div class="row justify-content-center">
                @forelse ($agenda as $item)
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="350">
                        <div class="all-event__item">
                            <img class="img-fluid" src="{{ URL::asset($item->getFirstMediaUrl('image_une') ?? '') }}"
                                alt="" />
                            <div class="event__content">
                                <div class="d-flex mb-4">
                                    <div>
                                        <div class="event__content__tag">
                                            <h3>{{ \Carbon\Carbon::parse($item->date_debut)->format('d') }}</h3>
                                            <p>{{ \Carbon\Carbon::parse($item->date_debut)->translatedFormat('F') }}</p>
                                        </div>
                                    </div>
                                    <ul class="d-block ps-4">
                                        <li><i class="icofont-wall-clock"></i>
                                            {{ \Carbon\Carbon::parse($item->date_debut)->format('H:i') }}</li>
                                        <li>
                                            <i class="icofont-location-pin"></i>
                                            {{ $item->lieu ?? 'Lieu non spécifié' }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="fs-4">
                                    <a href="{{ route('site.agenda_details', $item->slug) }}"
                                        class="text-capital">{{ $item->titre ?? 'Titre non spécifique' }}</a>
                                </h3>
                                <p>
                                    {!! Str::limit($item->description, 100, '...') ?? 'Description non spécifiée' !!}
                                </p>
                                <a href="{{ route('site.agenda_details', $item->slug) }}"
                                    class="btn__link ml-auto mr-0 d-flex justify-content-end">Lire Plus<i
                                        class="icofont-rounded-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-info text-center">
                            <strong>Aucun événement trouvé.</strong>
                        </div>
                @endforelse

            </div>
            <div class="blog__pagination" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                <nav aria-label="Page navigation example">
                    {{ $agenda->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </section>
    <!-- ========== All Events end ========== -->
@endsection
