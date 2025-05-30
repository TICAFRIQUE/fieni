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
                             <h3 class="missionv2__item__title fs-4 text-capitalize">
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
