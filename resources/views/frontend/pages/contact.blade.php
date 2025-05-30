@extends('frontend.layouts.app')

@section('title')
    Contact
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->

    <section class=" contact my-4 " id="contact">
        <div class="contact__area bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="section__title__center">
                            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                Contactez-nous.
                            </p>
                            <h5 class="color-light text-dark " data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                               Vous voulez contribuer à la transformation de notre pays ?
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                        <div class="contact__wrapper">
                            <form id="contact-form" method="post" action="php/message.php">
                               
                                <div class="d-md-flex gap-3">
                                    <div class="text-start w-100">
                                        <input name="name" class="contact-name form__input" id="contact-name"
                                            type="text" placeholder="Name" required="" />
                                        <label for="contact-name" class="form__label">Nom & prenoms</label>
                                    </div>
                                    <div class="text-start w-100">
                                        <input name="email" class="contact-email" id="contact-email" type="email"
                                            placeholder="Email" required="" />
                                        <label for="contact-email" class="form__label">Email</label>
                                    </div>
                                </div>
                                <div class="text-start w-100">
                                    <input name="subject" class="contact-subject" id="contact-subject" type="text"
                                        placeholder="Subject" required="" />
                                    <label for="contact-subject" class="form__label">Objet</label>
                                </div>
                                <div class="text-start w-100">
                                    <textarea name="message" class="contact-message" id="contact-message" placeholder="Message" rows="3"
                                        required=""></textarea>
                                    <label for="contact-message" class="form__label">Message</label>
                                </div>
                                <button class="btn__primary align-items-center">
                                    <span>Envoyer</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                        <div class="contact__address">
                            <div id="map">
                                 {!! $parametre['google_maps'] ?? null !!}
                            </div>
                            <ul>
                                <li>
                                    <i class="icofont-google-map"></i> {{ $parametre->adresse ?? 'Adresse non définie' }}</li>
                                </li>
                                <li>
                                    <i class="icofont-email"></i>
                                    <a href="#">{{ $parametre->email1 ?? 'Email non définie' }}</a>
                                </li>
                                <li>
                                    <i class="icofont-ui-call"></i>
                                    <a href="tel:{{ $parametre->contact1 ?? 'Tel non définie' }}">{{ $parametre->contact1 ?? 'Tel non définie' }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
