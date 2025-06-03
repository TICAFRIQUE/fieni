<!-- Inclure Bootstrap CSS (si ce n’est pas déjà fait) -->

<style>
    /* Style principal */
    #herocarousel {
        padding-top: 130px;
        /* Espace pour le header sur desktop */
    }

    .carousel-item {
        position: relative;
        /* height: calc(100vh - 70px); */
        /* hauteur écran moins header */
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1rem;
        border-radius: 0.5rem;
    }

    /* Responsive mobile */
    @media (max-width: 768px) {
        #herocarousel {
            padding-top: 50px;
            padding-bottom: 0
        }

        .carousel-item {
            height: 50vh;
          
            background-color: #101324;
            /* Couleur secondaire de Bootstrap */
            /* ou autre couleur de fond */
        }

        .carousel-item img {
            padding-top: 150px;
            /* max-height: 100%;
            max-width: 100%; */
            object-fit: contain;
        }

        .carousel-inner {
            overflow: hidden;
        }

        .carousel-caption {
            position: absolute;
            bottom: 15px;
            left: 20px;
            right: 20px;
            text-align: center;
            padding: 0.75rem;
        }

        .carousel-caption h5 {
            font-size: 1.25rem;
        }

        .carousel-caption p {
            font-size: 0.9rem;
        }
    }
</style>

<section id="herocarousel">
    <div id="carouselHero" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true" data-bs-interval="4000">
        <div class="carousel-inner">
            @foreach ($data_slide as $key => $item)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ asset($item->getFirstMediaUrl('image_background')) }}" class="d-block w-100 img-fluid"
                        alt="Slide">
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
                    class="{{ $key === 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}">
                </button>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousel = new bootstrap.Carousel(document.getElementById('carouselHero'), {
                interval: 4000,
                touch: true
            });
        });
    </script>
@endpush
