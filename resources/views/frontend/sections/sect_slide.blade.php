 <section id="hero" class="hero section-bg-light">
     <div class="swiper heroSwiper">
         <div class="swiper-wrapper">
           @foreach ($data_slide as $item)
                 <div class="swiper-slide" style="background-image: url({{asset($item->getFirstMediaUrl('image_background'))}})">
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-lg-6">
                             <div class="hero__content position-relative">
                                 {{-- <p class="badge-text" data-aos="fade-right">
                                     Upcoming election
                                 </p> --}}
                                 {{-- <h1 class="display-3 mb-2 text-capitalize">
                                    {{ $item->titre }}
                                 </h1> --}}
                                 <p class="mb-4 fs-4">
                                     {{ $item->titre }}
                                 </p>
                                 {{-- <a class="btn__primary" href="#"><span>Show Support</span></a> --}}
                             </div>
                         </div>
                         <div class="col-lg-5 offset-lg-1">
                             <div class="text-center hero__image">
                                 {{-- <div class="back-shape"></div> --}}
                                 <img class="img-fluid front-img" data-value="4" src="{{asset($item->getFirstMediaUrl('image_candidat'))}}"
                                     alt="" />
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
           @endforeach
           
         </div>
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="position-relative">
                         <div class="swiper-pagination"></div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="swiper-button-next btn-next"></div>
         <div class="swiper-button-prev btn-prev"></div>
     </div>
 </section>
