
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>{{config('app.name')}} </h3>
                            <p>
                                {{$parametre->localisation ?? ''}}
                              <br>
                                <strong>Contact:</strong>   {{$parametre->contact1 ?? ''}}<br>
                                <strong>Email:</strong>   {{$parametre->email1 ?? ''}}<br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <a href="{{$parametre->lien_twitter ?? ''}}" target="_blank" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="{{$parametre->lien_facebook ?? ''}}"  target="_blank" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="{{$parametre->lien_instagram ?? ''}}" target="_blank" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{$parametre->lien_linkedin ?? ''}}" target="_blank" class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End footer info column-->

                    <div class="col-lg-4 col-md-3 footer-links">
                        <h4>Menu</h4>
                        <ul>
                            <li><a href="#accueil" class="active">Accueil</a></li>
                            <li><a href="#a-propos">Qui sommes nous</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#realisations">Realisations</a></li>
                            <li><a href="#equipe">Notre equipes</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-4 col-md-3 footer-links">
                        <h4>Nos Services</h4>
                        <ul>
                            @foreach ($data_service as $item)
                            <li><a href=" {{route('service-detail')}} " class="active">{{$item->titre}}</a></li>
                            @endforeach
                           
                           

                        </ul>
                    </div><!-- End footer links column-->

                    {{-- <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Hic solutasetp</h4>
                        <ul>
                            <li><a href="#">Molestiae accusamus iure</a></li>
                            <li><a href="#">Excepturi dignissimos</a></li>
                            <li><a href="#">Suscipit distinctio</a></li>
                            <li><a href="#">Dilecta</a></li>
                            <li><a href="#">Sit quas consectetur</a></li>
                        </ul>
                    </div><!-- End footer links column--> --}}

                    {{-- <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Nobis illum</h4>
                        <ul>
                            <li><a href="#">Ipsam</a></li>
                            <li><a href="#">Laudantium dolorum</a></li>
                            <li><a href="#">Dinera</a></li>
                            <li><a href="#">Trodelas</a></li>
                            <li><a href="#">Flexo</a></li>
                        </ul>
                    </div><!-- End footer links column--> --}}

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span> {{config('app.name')}} </span></strong>. All Rights Reserved
                </div>
                <div class="">
                   
                    Designed by <a href="https://ticafrique.com/">Tic@frique</a>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="asset_front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset_front/vendor/aos/aos.js"></script>
    <script src="asset_front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="asset_front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="asset_front/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="asset_front/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="asset_front/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="asset_front/js/main.js"></script>