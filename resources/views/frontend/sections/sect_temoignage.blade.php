 <section id="review" class="p-80px-t p-80px-b md-p-150px-b testimonial-section" style="background-color: #101324;">
     <div class="container" >
         <div class="row testimonialv2__content" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
             <div class="row">
                 <div class="">
                     <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" class="text-white text-center fw-bold fs-5">
                         DES MEMBRES S'EXPRIMENT
                     </p>

                 </div>
             </div>
             <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 m-auto order-2 order-lg-1 testimonialv2">
                 <div class="row testi-row">
                     <div class="col-12">
                         <div class="testimonialv2__wrapper">
                             <div class="swiper-wrapper">

                                 <!-- testimonial item start -->
                                 @foreach ($data_temoignage as $item)
                                     <div class="swiper-slide p-5px-lr">
                                         <div class="testi-card card h-100 translateEffect1">
                                             <div class="testimonial__card bg-white">
                                                 {{-- <h3 class="testimonial__card__title fs-3">
                                                        
                                                    </h3> --}}
                                                 <p class="lh-base">
                                                     {!! $item->description !!}
                                                 </p>
                                                 <div class="testimonial__user">
                                                     <div class="testimonial__user__info">
                                                         <div class="testimonial__user__image">
                                                             <img src="{{ $item->getFirstMediaUrl('image') ?: asset('assets_web/images/web/avatar_user.jpg') }}"
                                                                 class="img-fluid" alt="User Image" />

                                                         </div>
                                                         <div>
                                                             <h2 class="testimonial__user__title">
                                                                 {{ $item->nom }}
                                                             </h2>
                                                             <h4 class="testimonial__user__subtitle">
                                                                 {{ $item->fonction }}
                                                             </h4>
                                                         </div>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach
                                 <!-- testimonial item end -->
                             </div>
                             <div class="swiper-button-next"></div>
                             <div class="swiper-button-prev"></div>
                         </div>
                     </div>
                 </div>
             </div>
             {{-- <div class="col-lg-3 col-xl-3 col-md-3 d-sm-none order-1 order-lg-2 testimonialv2__image">
                 <img class="img-fluid" src="{{ URL::asset('assets_web/images/web/Biographie/670X800.png') }}"
                     alt="image" />
             </div> --}}
         </div>
     </div>
 </section>
