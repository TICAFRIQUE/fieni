<style>
    .card-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        border-radius: 10px;
        overflow: hidden;
    }

    .card-item:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    /* Animation de l'image au survol (optionnel) */
    .card-bg {
        background-size: cover;
        background-position: center;
        height: 200px;
        transition: transform 0.5s ease;
    }

    .card-item:hover .card-bg {
        transform: scale(1.1);
    }
</style>




<section id="services" class="constructions" data-aos="fade-up">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Nos Services</h2>
            {{-- <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt
                quis dolorem
                dolore earum</p> --}}
        </div>

        <div class="row gy-4">

            @foreach ($data_service as $item)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="card-bg"
                                    style="background-image: url({{ $item->getFirstMediaUrl('image') }});">
                                </div>
                            </div>
                            <div class="col-xl-7 d-flex align-items-center">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $item['titre'] }}</h4>
                                            <p> {!! substr(strip_tags($item['description']), 0, 100) !!}....</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <a href="{{ route('service-detail') }}"
                                                class="btn btn-warning border-0 rounded-0 fw-semibold ">Savoir
                                                plus
                                                <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div><!-- End Card Item -->
            @endforeach

        </div>

    </div>
</section>
