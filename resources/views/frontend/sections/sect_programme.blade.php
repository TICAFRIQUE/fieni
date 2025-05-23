 <section id="mission" class="section-padding missionv2">
     <div class="container">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="section__title__center">
                     <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                         Mon Programme de société
                     </p>
                     <h4 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                         Je suis Pro-Côte d'Ivoire Parce que la Côte d'Ivoire mérite mieux
                     </h4>
                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             @foreach ($data_chantier as $item)
                 <div class="col-lg-4 col-md-6 mb-4 mb-xl-0" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="300">
                     <div class="missionv2__item">
                         <div class="missionv2__item__image">
                             <img class="img-fluid"
                                 src="{{ URL::asset($item?->getFirstMediaUrl('image') ?? asset('assets_web/images/web/fieni.jpg')) }}"
                                 alt="Mission" />
                         </div>
                         <h3 class="missionv2__item__title fs-3">
                             <a href="#">{{ $item->titre }}</a>
                         </h3>
                         {{-- <p class="missionv2__item__desc">
                             {!! substr(strip_tags($item['description']), 0, 100) !!}...
                         </p> --}}

                         <a href="single-event.html" class="btn__link ml-auto mr-0 d-flex justify-content-end">Lire le contenu<i class="icofont-rounded-right"></i></a>
                     </div>
                 </div>
             @endforeach

         </div>
     </div>
 </section>
