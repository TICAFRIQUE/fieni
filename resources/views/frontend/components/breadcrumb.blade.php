 <style>
    #all-blogs {
background-image: url('/assets_web/images/web/1200X500B.webp');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

#all-blogs::before {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0, 0, 0, 0.5); /* noir semi-transparent */
    z-index: 1;
}

#all-blogs .container {
    position: relative;
    z-index: 2; /* pour que le contenu passe au-dessus du filtre */
}


 </style>
 
 
 <section id="all-blogs" class="all-blogs overflow-hidden position-relative">
     <div class="container">
         <div class="row">
             <div class="blog-title ">
                 <h1 class=" display-3 mt-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                     @yield('title')
                 </h1>

                 <h3 class="text-white" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    @yield('subtitle')
                 </h3>
                 <ul>
                     <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                         <a href="#" onclick="history.back()">Retour</a>
                     </li>
                     <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                         <i class="icofont-rounded-right"></i>
                         <a href="{{ route('site.accueil') }}">Accueil</a>
                     </li>
                     <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                         <i class="icofont-rounded-right"></i>
                     </li>
                     <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                         @yield('title')
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </section>



 @include('backend.components.alertMessage')
