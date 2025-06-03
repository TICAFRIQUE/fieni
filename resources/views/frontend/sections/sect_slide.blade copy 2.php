{{-- <style>
    /* Style de l'image de fond */
    .slide-bg {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        /* ou une autre hauteur selon ton design */
    }

    /* Image du candidat */
    .hero__image img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    /* Padding pour garder un bon alignement */
    .hero__content {
        padding: 20px 0;
    }

    @media (max-width: 768px) {
        .hero .row {
            flex-direction: column-reverse;
        }

        .hero__content,
        .hero__image {
            text-align: center;
        }
    }
</style> --}}

<style>
    .carousel-item img {
        width: 100%;
        height: auto;
        object-fit: cover;
        max-height: 100vh;
        /* limite la hauteur à la hauteur de la fenêtre */
    }

    @media (max-width: 768px) {
        .carousel-item img {
            height: 70vh;
            /* hauteur plus adaptée au mobile */
            object-fit: cover;
        }

        .carousel-item {
            height: 70vh;
            /* pour que le conteneur prenne aussi cette hauteur */
        }

        .carousel-caption {
            font-size: 14px;
            bottom: 20px;
            padding: 0.5rem 1rem;
            /* padding un peu réduit */
        }
    }
</style>




<section id="hero" class="hero">
    <div id="carouselHero" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($data_slide as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset($item->getFirstMediaUrl('image_background')) }}" class="d-block w-100"
                        alt="slide">
                    <div class="carousel-caption d-block d-md-block bg-dark bg-opacity-50 rounded p-3">
                        <h5>{{ $item->titre }}</h5>
                        @if ($item->sous_titre)
                            <p>{{ $item->sous_titre }}</p>
                        @endif
                        @if ($item->lien)
                            <a href="{{ $item->lien }}" class="btn btn-primary mt-2">En savoir plus</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHero" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHero" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

        <div class="carousel-indicators">
            @foreach ($data_slide as $key => $item)
                <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
    </div>
</section>



@push('scripts')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                dots: true,
                nav: false,
                navText: ["<", ">"]
            });
        });
    </script>
@endpush
