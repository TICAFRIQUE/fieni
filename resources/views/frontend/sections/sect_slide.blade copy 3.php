<!-- Inclure Bootstrap CSS (si ce n’est pas déjà fait) -->

<style>
    #hero {
        margin-top: 130px
    }

    .carousel-item {
        position: relative;
        height: calc(100vh - 70px);
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1rem;
        border-radius: 0.5rem;
    }

    @media (max-width: 768px) {
        .carousel-item {
            height: 30vh;
            /* hauteur = 60% de la hauteur de la fenêtre */
        }

        .carousel-item img {
            height: 30vh;
            /* même hauteur que le parent */
            /* width: 100%; */
            object-fit: cover;
            /* image remplie sans déformation */
        }

        .carousel-caption {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            text-align: center;
        }

        .carousel-caption h5 {
            font-size: 1.25rem;
        }

        .carousel-caption p {
            font-size: 0.9rem;
        }

        .carousel-caption {
            bottom: 15px;
            padding: 0.75rem;
        }
    }
</style>

<section id="hero">
    <div id="carouselHero" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($data_slide as $key => $item)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ asset($item->getFirstMediaUrl('image_background')) }}" class="d-block w-100 img-fluid"
                        alt="Slide">
                    {{-- <div class="carousel-caption text-start text-white">
                        <h5>{{ $item->titre }}</h5>
                        @if ($item->sous_titre)
                            <p>{{ $item->sous_titre }}</p>
                        @endif
                        @if ($item->lien)
                            <a href="{{ $item->lien }}" class="btn btn-primary mt-2">En savoir plus</a>
                        @endif
                    </div> --}}
                </div>
            @endforeach
        </div>

        <!-- Contrôles gauche/droite -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHero" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHero" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

        <!-- Indicateurs -->
        <div class="carousel-indicators">
            @foreach ($data_slide as $key => $item)
                <button type="button" data-bs-target="#carouselHero" data-bs-slide-to="{{ $key }}"
                    class="{{ $key === 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
    </div>
</section>
