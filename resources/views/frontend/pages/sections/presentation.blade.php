<section id="a-propos" class="alt-services" data-aos="fade-up">
    <div class="container">

        <div class="row justify-content-around gy-4" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-6 img-bg" style="background-image: url({{$data_presentation->getFirstMediaUrl('image')}});"
                data-aos="zoom-in" data-aos-delay="100"></div>

            <div class="col-lg-5 d-flex flex-column justify-content-center">
                <h3>Qui sommes nous ?</h3>
                <p>
                    {!! $data_presentation->description !!}
                </p>
            </div>
        </div>

    </div>
</section>




<!-- ======= Stats Counter Section ======= -->
<section id="stats-counter" class="stats-counter section-bg" data-aos="fade-up" data-aos-delay="100">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Clients</p>
                    </div>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Réalisations</p>
                    </div>
                </div>
            </div><!-- End Stats Item -->


            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-people color-pink flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Membres de l'équipe</p>
                    </div>
                </div>
            </div><!-- End Stats Item -->


            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-clock color-pink flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Années d'experiences</p>
                    </div>
                </div>
            </div><!-- End Stats Item -->

        </div>

    </div>
</section><!-- End Stats Counter Section -->
