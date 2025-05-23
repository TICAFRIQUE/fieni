  <footer>
      <div class="footer">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1000"
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
                              <h4>Adresse</h4>
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
                                  <h4 class="footer__event__title">
                                      <a href="single-event.html">Prochaine Rencontre</a>
                                  </h4>
                                  <span>Bientot</span>
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
      </div>
      <hr />
      <div class="footer__copyright">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <p class="m-0 text-center">
                          &copy; @php
                              echo date('Y');
                          @endphp - {{config('app.name')}} All right reserved. Made with
                          <i class="icofont-heart"></i> by
                          <a href="https://www.ticafrique.ci" target="_blank">ticafrique.ci</a>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </footer>
