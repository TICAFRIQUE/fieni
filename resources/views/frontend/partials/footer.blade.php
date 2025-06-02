  <footer>
      <div class="footer text-white">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 " data-aos="fade-up" data-aos-duration="1000"
                      data-aos-delay="250">
                      <div class="footer-wrapper">
                          {{-- <h3 class="footer__title fs-3">Statesman</h3> --}}
                          <img src="{{ URL::asset($parametre->logo_footer ?? asset('assets_web/images/web/logo-fieni.png')) }}"
                              alt="logo_footer" class="img-fluid mb-3">
                          <div class="footer__info">
                              {{-- <p>
                                        For any additional inquiries please feel free to send us
                                        an e-mail or call
                                    </p> --}}
                              <h4 class="text-white">Adresse</h4>
                              <p class="color-primary">{{ $parametre->email1 ?? '' }}</p>
                              <span class="color-primary">{{ $parametre->contact1 ?? '' }}</span>
                          </div>
                          <div class="social-icon">
                              <a href="{{ $parametre->lien_facebook ?? '' }}" class="text-dark"><i
                                      class="icofont-facebook"></i></a>
                              <a href="{{ $parametre->lien_twitter ?? '' }}" class="text-dark"><i
                                      class="icofont-twitter"></i></a>
                              <a href="{{ $parametre->lien_instagram ?? '' }}" class="text-dark"><i
                                      class="icofont-instagram"></i></a>
                              <a href="{{ $parametre->lien_youtube ?? '' }}" class="text-dark"><i
                                      class="icofont-youtube-play"></i></a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000"
                      data-aos-delay="300">
                      <div class="footer-wrapper">
                          <h3 class="footer__title fs-3">Biographie</h3>
                          <ul class="footer__event">
                              <li class="footer-news-text smooth">
                                  “Je suis CANDIDAT à l'Election Présidentielle à venir.
                                  Adhérez massivement à PRO-CÔTE D'IVOIRE
                                  Inscrivez vous sur la liste électorale.”
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000"
                      data-aos-delay="350">
                      <div class="footer-wrapper">
                          <h3 class="footer__title fs-3">Agendas</h3>
                          <ul class="footer__event">


                              <li class="footer-news-text">
                                  <h5 class="footer__event__title">
                                      <ul>
                                          <li><a class="nav-link " href="{{ route('site.accueil') }}">Accueil</a></li>
                                          <li><a href="{{ route('site.biographie') }}">Biographie</a></li>
                                          <li><a href="{{ route('site.programme') }}">Projet de société</a></li>
                                          <li><a href="{{ route('site.adhesion') }}">Adhésion</a></li>
                                          <li><a href="{{ route('site.parrainage') }}">Parrainage</a></li>
                                          <li><a href="{{ route('site.actualite') }}">Actualités</a></li>
                                          <li><a href="{{ route('site.contact') }}">Contact</a></li>
                                      </ul>

                                  </h5>
                                  
                              </li>
                          </ul>
                      </div>
                  </div>

                  <div class="col-lg-3 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000"
                      data-aos-delay="350">
                      <div class="footer-wrapper">
                          <h3 class="footer__title fs-3">Actualités recentes</h3>
                          <ul class="footer__event">


                              @foreach ($data_actualite as $item)
                                  <li class="footer-news-text">
                                      <h4 class="footer__event__title">
                                          <a href="details-right-sidebar.html">{{ $item->titre }}</a>
                                      </h4>
                                      <span>{{ \Carbon\Carbon::parse($item->date_publication)->diffForHumans() }}</span>
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
          </div>

          <!-- ========== Start compteur de visite ========== -->
          <div class="container">
              <div class="row">
                  <div class="col-12 text-center">
                      <div class="compteur">
                          <h4 class="text-white">Visiteurs total</h4>
                          <p>
                              {{-- <div> <i class=" icofont-eye-alt"></i> <span class="odometer" data-count="{{ $compteur_visites }}"></span></div> --}}

                              <span class="counter"> <b><i class=" icofont-eye-alt"></i>
                                      {{ $compteur_visites }}</b></span>
                          </p>
                      </div>
                  </div>
              </div>
          </div>

          <!-- ========== End compteur de visite ========== -->

      </div>
      <hr />
      <div class="footer__copyright">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <p class="m-0 text-center text-white">
                          &copy; @php
                              echo date('Y');
                          @endphp - {{ config('app.name') }} All right reserved. Made with
                          <i class="icofont-heart"></i> by
                          <a class="text-white" href="https://www.ticafrique.ci" target="_blank">ticafrique.ci</a>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </footer>
