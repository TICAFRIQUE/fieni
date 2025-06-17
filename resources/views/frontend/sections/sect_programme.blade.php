 <style>
    .missionv2__item__title {
    height: 70px;               /* Ajuste selon ton design */
    overflow: hidden;           /* Cache l'excès de texte */
    display: -webkit-box;
    -webkit-line-clamp: 4;      /* Limite à 2 lignes */
    -webkit-box-orient: vertical;
    line-height: 24px;         /* Ajuste selon la taille de la police */
}

 </style>
 
 <section id="mission" class="section-padding missionv2" style="background-color: #101324;">
     <div class="container py-2" style="background-color: #ffffff;">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="section__title__center">
                     <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                         Le projet de société
                     </p>
                     <h4 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                         PRO-CÔTE D’IVOIRE pour la Démocratie, la Prospérité et la Souveraineté (PROCI-DPS)
                     </h4>
                     <h5> Faire de la Côte d’Ivoire une République Fédérale</h5>
                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="owl-carousel owl-theme">
                 @foreach ($data_chantier as $item)
                     <div class="col-lg-12 col-md-12  mb-xl-0" data-aos="fade-up" data-aos-duration="1000"
                         data-aos-delay="300">
                         <div class="missionv2__item">
                             <div class="missionv2__item__image">
                                 <img class="img-fluid"
                                     src="{{ URL::asset($item?->getFirstMediaUrl('image') ?? asset('assets_web/images/web/fieni.jpg')) }}"
                                     alt="Mission" />
                             </div>
                             <h3 class="missionv2__item__title fs-5 text-uppercase">
                                 <a href="{{ route('site.chantier', $item->slug) }}">{{ $item->titre }}</a>
                             </h3>
                             {{-- <p class="missionv2__item__desc">
                             {!! substr(strip_tags($item['description']), 0, 100) !!}...
                         </p> --}}

                             <a href="{{ route('site.chantier', $item->slug) }}"
                                 class="btn__link ml-auto mr-0 d-flex justify-content-end">Lire le contenu<i
                                     class="icofont-rounded-right"></i></a>
                         </div>
                     </div>
                 @endforeach
             </div>


         </div>
     </div>

     @push('scripts')
         <script>
             $(document).ready(function() {
                 $(".owl-carousel").owlCarousel({
                     loop: true,
                     margin: 10,
                     nav: false,
                     dots: true,
                     responsive: {
                         0: {
                             items: 1
                         },
                         600: {
                             items: 2
                         },
                         1000: {
                             items: 3
                         }
                     }
                 });
             });
         </script>
     @endpush
 </section>
