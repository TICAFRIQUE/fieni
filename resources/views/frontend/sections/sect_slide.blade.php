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
    @media (min-width: 320px) and (max-width: 768px) {
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


    /* Responsive tablette */
    @media (min-width: 768px) and (max-width: 1024px) {
        #herocarousel {
            padding-top: 130px;
            padding-bottom: 0
        }

        .carousel-item {
            height: 70vh;
            /* hauteur écran moins header */
            background-color: #101324;

        }

        .carousel-item img {
            object-fit: contain;
            padding-top: 10px;

        }

        .carousel-caption {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            text-align: center;
            padding: 1rem;
        }

        .carousel-caption h5 {
            font-size: 1.5rem;
        }

        .carousel-caption p {
            font-size: 1rem;
        }
    }


    /*ANIMATION*/

   /* Fade */
.carousel-fade .carousel-item {
    opacity: 0;
    transition: opacity 1s ease-in-out;
}
.carousel-fade .carousel-item.active {
    opacity: 1;
}

/* Zoom */
.carousel-zoom .carousel-item {
    transform: scale(0.8);
    opacity: 0;
    transition: transform 0.8s ease, opacity 0.8s ease;
}
.carousel-zoom .carousel-item.active {
    transform: scale(1);
    opacity: 1;
}

/* Rotate Y */
.carousel-rotate-y .carousel-item {
    transform: perspective(1000px) rotateY(90deg);
    opacity: 0;
    transition: transform 0.8s ease, opacity 0.8s ease;
    transform-origin: center right;
}
.carousel-rotate-y .carousel-item.active {
    transform: perspective(1000px) rotateY(0deg);
    opacity: 1;
}

/* Rotate X */
.carousel-rotate-x .carousel-item {
    transform: perspective(1000px) rotateX(90deg);
    opacity: 0;
    transition: transform 0.8s ease, opacity 0.8s ease;
    transform-origin: center bottom;
}
.carousel-rotate-x .carousel-item.active {
    transform: perspective(1000px) rotateX(0deg);
    opacity: 1;
}

/* Slide Left */
.carousel-slide-left .carousel-item {
    transform: translateX(100%);
    transition: transform 0.8s ease;
}
.carousel-slide-left .carousel-item.active {
    transform: translateX(0%);
}

/* Slide Up */
.carousel-slide-up .carousel-item {
    transform: translateY(100%);
    transition: transform 0.8s ease;
}
.carousel-slide-up .carousel-item.active {
    transform: translateY(0%);
}

/* Flip 3D */
.carousel-flip .carousel-item {
    transform: perspective(1200px) rotateY(180deg);
    opacity: 0;
    transition: transform 0.8s ease-in-out, opacity 0.8s ease-in-out;
    backface-visibility: hidden;
}
.carousel-flip .carousel-item.active {
    transform: perspective(1200px) rotateY(0deg);
    opacity: 1;
}

/* Base styles */
/* .carousel-inner {
    position: relative;
    overflow: hidden;
    height: 100%;
}
.carousel-item {
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
} */

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
            const carousel = document.getElementById('carouselHero');
            const transitions = [
                'carousel-fade',
                'carousel-zoom',
                'carousel-rotate-y',
                'carousel-rotate-x',
                'carousel-slide-left',
                'carousel-slide-up',
                'carousel-flip'
            ];

            const applyRandomTransition = () => {
                // Enlever les anciennes transitions
                transitions.forEach(cls => carousel.classList.remove(cls));

                // Ajouter une transition aléatoire
                const randomTransition = transitions[Math.floor(Math.random() * transitions.length)];
                carousel.classList.add(randomTransition);
            };

            // Bootstrap carousel instance
            const carouselInstance = bootstrap.Carousel.getOrCreateInstance(carousel);

            // Appliquer une transition au chargement
            applyRandomTransition();

            // Changer de transition à chaque slide
            carousel.addEventListener('slide.bs.carousel', () => {
                applyRandomTransition();
            });
        });
    </script>
@endpush
