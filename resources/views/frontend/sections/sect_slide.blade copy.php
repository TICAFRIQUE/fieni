 <style>
     /* CSS for the hero section from styles.css */
     .hero__content {
         color: #ffffff;
         z-index: 999;
     }

     .hero__content h1 {
         color: #ffffff;
     }

     @media only screen and (max-width: 991px) {
         .hero__content {
             text-align: center;
             margin-bottom: 25px;
         }
     }

     .hero__image {
         position: relative;
         min-height: 750px;
         transition: all 2s;
         z-index: 999;
         margin-top: 50px;
     }

     @media only screen and (max-width: 1199px) {
         .hero__image {
             min-height: 700px;
         }
     }

     @media only screen and (max-width: 991px) {
         .hero__image {
             min-height: 600px;
         }
     }

     @media only screen and (max-width: 767px) {
         .hero__image {
             min-height: 500px;
         }
     }

     .hero__image .back-shape {
         background: #cf9b1b;
         width: 100%;
         height: 600px;
         clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
         position: absolute;
         bottom: 0;
     }

     @media only screen and (max-width: 1199px) {
         .hero__image .back-shape {
             height: 500px;
         }
     }

     @media only screen and (max-width: 380px) {
         .hero__image .back-shape {
             height: 450px;
         }
     }

     .hero__image .front-img {
         position: absolute;
         left: 0;
         bottom: 0;
     }

     @media only screen and (max-width: 991px) {
         .hero__image .front-img {
             max-height: 100%;
             left: 15%;
         }
     }

     @media screen and (max-width: 450px) {
         .hero__image .front-img {
             left: 5%;
         }
     }

     @media only screen and (max-width: 380px) {
         .hero__image .front-img {
             left: 0;
         }
     }

     .hero .swiper-pagination {
         bottom: 20px;
         text-align: left;
     }

     .hero .swiper-pagination-bullet {
         width: var(--swiper-pagination-bullet-width,
                 var(--swiper-pagination-bullet-size, 5px));
         height: var(--swiper-pagination-bullet-height,
                 var(--swiper-pagination-bullet-size, 5px));
         background: #ffffff;
         opacity: 1;
     }

     @media only screen and (max-width: 991px) {
         .hero .swiper-pagination {
             display: none;
         }
     }

     .hero .swiper-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet,
     .hero .swiper-pagination-horizontal.swiper-pagination-bullets .swiper-pagination-bullet {
         margin: 0 var(--swiper-pagination-bullet-horizontal-gap, 6px);
         width: 22px;
         height: 8px;
         border-radius: 2px;
     }

     .hero span.swiper-pagination-bullet.swiper-pagination-bullet-active {
         position: relative;
         background: #cf9b1b;
     }

     .hero .swiper-wrapper .swiper-slide-active .hero__content .badge-text {
         animation: slideContent 0.4s linear 0.5s backwards;
     }

     .hero .swiper-wrapper .swiper-slide-active .hero__content h1 {
         animation: slideContent 0.5s linear 0.6s backwards;
     }

     .hero .swiper-wrapper .swiper-slide-active .hero__content p {
         animation: slideContent 0.7s linear 0.7s backwards;
     }

     .hero .swiper-wrapper .swiper-slide-active .hero__content a {
         animation: slideContent 0.8s linear 0.8s backwards;
     }

     .hero .swiper-wrapper .swiper-slide-active .hero__image .back-shape {
         animation: slideImage 0.5s linear 0.5s backwards;
     }

     .hero .swiper-wrapper .swiper-slide-active .hero__image .front-img {
         animation: slideImage 1s linear 1s backwards;
     }

     .hero .swiper-slide {
         padding-top: 130px;
         transition: all 2s ease;
         background-size: cover;
         background-position: center center;
         background-repeat: no-repeat;
         /* animation: inOut 9s infinite alternate; */
     }

     .hero .swiper-slide::before {
         position: absolute;
         left: 0;
         top: 0;
         right: 0;
         bottom: 0;
         content: "";
         z-index: -1;
         /* background-color: #282f31b2; */
     }

     @media only screen and (max-width: 1400px) {
         .hero .swiper-slide {
             padding-top: 20px;
         }
     }

     @media only screen and (max-width: 991px) {
         .hero .swiper-slide {
             padding-top: 130px;
         }
     }

     .hero .btn-next {
         right: 30px;
     }

     @media only screen and (max-width: 380px) {
         .hero .btn-next {
             right: 15px;
         }
     }

     .hero .btn-prev {
         left: 30px;
     }

     @media only screen and (max-width: 380px) {
         .hero .btn-prev {
             left: 15px;
         }
     }
 </style>
















 <section id="hero" class="hero section-bg-light">
     <div class="swiper heroSwiper">
         <div class="swiper-wrapper">
             @foreach ($data_slide as $item)
             <div class="swiper-slide"
                 style="background-image: url({{ asset($item->getFirstMediaUrl('image_background')) }})">
                 <div class="container">
                     <div class="row align-items-center">

                         <div class="col-lg-5 offset-lg-1">
                             <div class="text-center hero__image">
                                 {{-- <div class="back-shape"></div> --}}
                                 <img class="img-fluid front-img" data-value="4"
                                     src="{{ asset($item->getFirstMediaUrl('image_candidat')) }}" alt="" />
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="hero__content position-relative">
                                 {{-- <p class="badge-text" data-aos="fade-right">
                                     Upcoming election
                                 </p> --}}
                                 {{-- <h1 class="display-3  mt-4 text-capitalize">
                                    {{ $item->titre }}
                                 </h1> --}}
                                 <p class="pt-3 fs-4">
                                     {{ $item->titre }}
                                 </p>
                                 {{-- <a class="btn__primary" href="#"><span>Show Support</span></a> --}}
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