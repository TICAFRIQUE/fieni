<section class="section-padding blog" id="blog">
    <div class="container">
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

            @foreach ($data_actualite as $item)
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="300">
                    <div class="blog__area">
                        <div class="blog__image">
                            <img class="img-fluid" src="{{ URL::asset($item?->getFirstMediaUrl('image_une') ?? asset('assets_web/images/web/fieni.jpg')) }}" alt="Blog 01" />
                        </div>
                        <div class="blog__content">
                            <p>{{ \Carbon\Carbon::parse($item->date_publication)->translatedFormat('d F Y') }}</p>
                            <h3 class="fs-5">
                                <a href="#">{{ $item->titre }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach

                <div class="text-center mt-4">
                    <a href="#" class=" btn btn__primary w-50 text-center"> <span>Voir toutes les actualités</span> <i class="icofont-rounded-right"></i> </a>
                </div>
        </div>
    </div>
</section>
