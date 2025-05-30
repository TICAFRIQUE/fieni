 <section class="section-padding section-bg-dark counters">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <ul class="counters__stats m-0 p-0 row text-center">
                     <li class="col-md-4 col-sm-6 col-12 mb-4 mb-md-0" data-aos="fade-up" data-aos-duration="1000"
                         data-aos-delay="250">
                         <div class="counters__stats__number">
                             <div class="counters__stats__icon">
                                 <i class="icofont-users"></i>
                             </div>
                             <div><span class="odometer" data-count="{{ $compteur_membres }}"></span>+</div>
                             <h6>Membres</h6>
                         </div>
                     </li>
                     <li class="col-md-4 col-sm-6 col-12 mb-4 mb-md-0" data-aos="fade-up" data-aos-duration="1000"
                         data-aos-delay="300">
                         <div class="counters__stats__number">
                             <div class="counters__stats__icon">
                                 <i class="icofont-building"></i>
                             </div>
                             <div><span class="odometer" data-count="7"></span></div>
                             <h6>Chantiers d'Etat</h6>
                         </div>
                     </li>
                     {{-- <li class="col-md-3 col-sm-6 col-12 mb-4 mb-sm-0" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="350">
                                <div class="counters__stats__number">
                                    <div class="counters__stats__icon">
                                        <i class="icofont-hand-drag2"></i>
                                    </div>
                                    <div><span class="odometer" data-count="9285"></span>+</div>
                                    <h6>Expert Volunteer</h6>
                                </div>
                               
                            </li> --}}
                     <li class="col-md-4 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1000"
                         data-aos-delay="400">
                         {{-- <div class="counters__stats__number">
                                    <div class="counters__stats__icon">
                                        <i class="icofont-pay"></i>
                                    </div>
                                    <div><span class="odometer" data-count="158"></span>m</div>
                                    <h6>Donation Raised</h6>
                                </div> --}}

                         <div class="row">
                             <div class="col-md-6">
                                 <a href="{{ route('site.biographie') }}"
                                     class="btn btn-sm btn__primary-outline my-4 fw-bold"><span>Voir
                                         ma biographie</span></a>
                                 <a href="{{ route('site.programme') }}"
                                     class="btn btn-sm btn__primary"><span>Lire mon discours</span></a>
                             </div>

                             <div class="col-md-6">
                                 <a href="{{ route('site.adhesion') }}"
                                     class="btn btn-sm btn__primary-outline my-4 fw-bold"><span>Devenir
                                         membre</span></a>
                                 <a href="{{ route('site.parrainage') }}"
                                     class="btn btn-sm btn__primary"><span>Parrainer mon
                                         candidat</span></a>
                             </div>
                         </div>

                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </section>
