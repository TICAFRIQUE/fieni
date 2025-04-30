<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> {{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="asset_front/img/favicon.png" rel="icon">
    <link href="asset_front/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="asset_front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset_front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="asset_front/vendor/aos/aos.css" rel="stylesheet">
    <link href="asset_front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="asset_front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="asset_front/css/main.css" rel="stylesheet">


</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                @if ($parametre && $parametre->hasMedia('logo_header'))
                    <img src="{{ URL::asset($parametre->getFirstMediaUrl('logo_header')) }}" alt="logo_header">
                @endif

                {{-- <h1 class="sitename"> {{ config('app.name') }} </h1> --}}

            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#accueil" class="active">Accueil</a></li>
                    <li><a href="#a-propos">A propos</a></li>
                    <li><a href="#services">Nos services</a></li>
                    <li><a href="#reference">Nos references</a></li>
                    <li><a href="#mot-du-directeur">Mot du directeur</a></li>
                    {{-- <li><a href="#team">Team</a></li> --}}
                    {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> --}}
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="accueil" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">

                @foreach ($data_slide as $item)
                    <div class="carousel-item active">
                        <img src="{{ asset($item->getFirstMediaUrl('image')) }}" alt="slide">
                        <div class="carousel-container">
                            <h2>{{ $item->titre }}</h2>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div><!-- End Carousel Item -->
                @endforeach



                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="a-propos" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>A propos de nous</h2>

            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">

                        @if ($data_presentation && $data_presentation->hasMedia('image'))
                            <img src="{{ URL::asset($data_presentation->getFirstMediaUrl('image')) }}" alt="image">
                        @endif

                        {{-- <img src="{{ asset($data_presentation->getFirstMediaUrl('image')) }}" class="img-fluid"
                            alt=""> --}}
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        {{-- <h3>  {{$data_mot_directeur->nom_directeur}} </h3> --}}
                        <p class="fst-italic">
                            {!! $data_presentation->description ?? '' !!}
                        </p>

                    </div>

                </div>

            </div>

        </section><!-- /About Section -->



        <!-- More Services Section -->
        <section id="services" class="more-services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nos Services</h2>
                <p>Sage Group vous propose plusieurs services, visitez chaque service en cliquant sur le bouton
                    <b>visiter</b>
                </p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    @foreach ($data_service as $item)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <a href=" {{ $item->lien }} ">
                                <div class="card">
                                    <img src="{{ asset($item->getFirstMediaUrl('image')) }}" class="img-fluid"
                                        alt="">
                                    <h3> {{ $item->titre }} </h3>
                                    <p>
                                        {!! $item->description !!}
                                    </p>
                                    <a href=" {{ $item->lien }}" class="read-more"><span>Visiter</span><i
                                            class="bi bi-arrow-right"></i></a>

                                </div>
                            </a>
                        </div><!-- End Card Item -->
                    @endforeach
                </div>

            </div>

        </section><!-- /More Services Section -->

        <!-- Portfolio Section -->
        <section id="reference" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nos references</h2>
                <p>Sage Group a contribué sur plusieurs projets des entreprises qui nous ont fait confiance</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">

                    {{-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-product">Product</li>
                        <li data-filter=".filter-branding">Branding</li>
                        <li data-filter=".filter-books">Books</li>
                    </ul><!-- End Portfolio Filters --> --}}

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        @foreach ($data_reference as $item)
                            <div class="col-lg-2 col-md-2 col-sm-6 portfolio-item isotope-item filter-app mx-auto">
                                <div class="portfolio-content h-100 mx-auto">
                                    <img src="{{ asset($item->getFirstMediaUrl('image')) }}" class="img-fluid"
                                        alt="reference-image">
                                    <div class="portfolio-info">
                                        <h4> {{ $item['titre'] }} </h4>
                                        <a href="{{ asset($item->getFirstMediaUrl('image')) }}"
                                            title="reference-image" data-gallery="portfolio-gallery-app"
                                            class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href=" {{ $item['lien'] }} " title="More Details" class="details-link"><i
                                                class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->
                        @endforeach


                    </div><!-- End Portfolio Container -->


                </div>

            </div>

        </section><!-- /Portfolio Section -->



        <!-- About Section -->
        <section id="mot-du-directeur" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Directeur General</h2>
                <p>{{ $data_mot_directeur->nom_directeur ?? null }}</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        @if ($data_mot_directeur && $data_mot_directeur->hasMedia('logo_header'))
                            <img src="{{ URL::asset($data_mot_directeur->getFirstMediaUrl('image')) }}"
                                alt="image">
                        @endif
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        {{-- <h3>  {{$data_mot_directeur->nom_directeur}} </h3> --}}
                        <p class="fst-italic">
                            {!! $data_mot_directeur->description ?? null !!}
                        </p>

                    </div>

                </div>

            </div>

        </section><!-- /About Section -->





        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Adresse</h3>
                                    <p>{{ $parametre['contact1'] ?? null }}</p>
                                    <p>New York, NY 535022</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Contact</h3>
                                    <p> {{ $parametre['contact1'] ?? null }} </p>
                                    <p> {{ $parametre['contact2'] ?? null }} </p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p> {{ $parametre['email1'] ?? null }} </p>
                                    <p> {{ $parametre['email2'] ?? null }} </p>
                                </div>
                            </div><!-- End Info Item -->



                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="th-widget-about">
                            <div style="text-decoration:none; overflow:hidden;max-width:100%;width:auto;height:450px;">
                                <div id="embed-map-display" style="height:100%; width:100%;max-width:100%;">
                                    {!! $parametre['google_maps'] ?? null !!}
                                </div><a class="googlecoder" href="https://www.bootstrapskins.com/themes"
                                    id="authorize-maps-data"></a>
                                <style>
                                    #embed-map-display img {
                                        max-width: none !important;
                                        background: none !important;
                                        font-size: inherit;
                                        font-weight: inherit;
                                    }
                                </style>
                            </div>
                        </div>
                    </div><!-- End google maps Form -->




                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="#" class="logo d-flex align-items-center">
                        <span class="sitename"> {{ $parametre['nom_projet'] ?? null }}</span>
                    </a>
                    <p>
                        {{ $parametre['description_projet'] ?? null }}
                    </p>
                    <div class="social-links d-flex mt-4">
                        <a href="{{ $parametre['lien_twitter'] ?? null }}" target="_blank"><i
                                class="bi bi-twitter-x"></i></a>
                        <a href="{{ $parametre['lien_facebook'] ?? null }}" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                        <a href="{{ $parametre['lien_instagram'] ?? null }}" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                        <a href="{{ $parametre['lien_linkedin'] ?? null }}" target="_blank"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Lien rapide</h4>
                    <ul>
                        <li><a href="#accueil" class="active">Accueil</a></li>
                        <li><a href="#mot-du-directeur">Mot du directeur</a></li>
                        <li><a href="#services">Nos services</a></li>
                        <li><a href="#reference">Nos references</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Nos Services</h4>
                    <ul>
                        @foreach ($data_service as $item)
                            <li><a href=" {{ $item['lien'] }} "> {{ $item['titre'] }} </a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Nous</h4>
                    <p> {{ $parametre['siege_social'] ?? null }} </p>
                    <p>{{ $parametre['localisation'] ?? null }}</p>
                    <p> {{ $parametre['localisation'] ?? null }}</p>
                    <p class="mt-4"><strong>Telephone:</strong> <span> {{ $parametre['contact1'] ?? null }} </span>
                    </p>
                    <p><strong>Email:</strong> <span>{{ $parametre['email1'] ?? null }}</span></p>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $parametre['nom_projet'] ?? null }} </strong>
                <span>Tous droits
                    reservés</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://ticafrique.ci/">Tic@frique</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="asset_front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset_front/vendor/php-email-form/validate.js"></script>
    <script src="asset_front/vendor/aos/aos.js"></script>
    <script src="asset_front/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="asset_front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="asset_front/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="asset_front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="asset_front/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="asset_front/js/main.js"></script>

</body>

</html>
