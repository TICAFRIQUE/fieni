 <section id="event" class="section-padding event" style="background-color: #101324;">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 offset-lg-3">
                 <div class="section__title__center">

                     <h3 class="color-light" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                         AGENDA
                     </h3>

                      <p style="color: var(--primary)" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                         Rejoignez-nous pour un événement spécial
                     </p>
                 </div>
             </div>
         </div>

         <div class="row event__wrapper">
             <div class="col-md-6 col-lg-5 event-left">
                 <!-- Event tab start -->
                 <ul id="event-nav">
                     @foreach ($data_agenda as $item)
                         <li data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                             <a href="#event{{ $item->id }}" class="event__item__link">
                                 <div class="event__item">
                                     <div class="event__item__content">
                                         <div class="event__item__content__tag d-md-none">
                                             <h3> {{ \Carbon\Carbon::parse($item->date_debut)->format('d') ?? 'Jour non spécifique' }}
                                             </h3>
                                             <p> {{ \Carbon\Carbon::parse($item->date_debut)->translatedFormat('F') ?? 'Mois non spécifique' }}
                                             </p>
                                         </div>
                                         <div class="event__item__content__text">
                                             <div class="event__item__content__text__time">
                                                 <p><i class="icofont-clock-time"></i>
                                                     {{ \Carbon\Carbon::parse($item->date_debut)->format('H:i') ?? 'Heure non spécifique' }}
                                                     AM</p>
                                                 <p><i class="icofont-calendar"></i>
                                                     {{ \Carbon\Carbon::parse($item->date_debut)->translatedFormat('d F Y') ?? 'Date non spécifique' }}
                                                 </p>
                                             </div>
                                             <h3 class="event__item__content__title fs-4">
                                                 {{ $item->titre ?? 'Titre non spécifique' }}
                                             </h3>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </li>
                     @endforeach

                 </ul>
                 <!-- Event tab end -->
             </div>
             <div class="col-md-6 col-lg-7" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                 <div id="tabs-content">
                     <!-- Event single details start -->
                     @foreach ($data_agenda as $item)
                         <div id="event{{ $item->id }}" class="tab-content">
                             <img class="img-fluid" src="{{ URL::asset($item->getFirstMediaUrl('image_une') ?? '') }}"
                                 alt="image fieni" />
                             <div class="event__content">
                                 <div class="d-flex mb-4">
                                     <div>
                                         <div class="event__content__tag">
                                             <h3> {{ \Carbon\Carbon::parse($item->date_debut)->format('d') ?? 'Jour non spécifique' }}
                                             </h3>
                                             <p> {{ \Carbon\Carbon::parse($item->date_debut)->translatedFormat('F') ?? 'Mois non spécifique' }}
                                             </p>
                                         </div>
                                     </div>
                                     <ul>
                                         <li><i class="icofont-wall-clock"></i>
                                             {{ \Carbon\Carbon::parse($item->date_debut)->format('H:i') ?? 'Heure non spécifique' }}
                                         </li>
                                         <li>
                                             <i class="icofont-location-pin"></i>
                                             {{ $item->lieu ?? 'Lieu non spécifié' }}
                                         </li>
                                     </ul>
                                 </div>
                                 <h3 class="fs-3">
                                     <a
                                         href="{{ route('site.agenda_details', $item->slug) }}">{{ $item->titre ?? 'Titre non spécifique' }}</a>
                                 </h3>
                                 <p>
                                    {!! Str::limit(strip_tags($item->description), 100, '...') ?? 'Description non spécifique' !!}
                                 </p>
                                 <a href="{{ route('site.agenda_details', $item->slug) }}"
                                     class="btn__link ml-auto mr-0 d-flex justify-content-end">Lire
                                     Plus<i class="icofont-rounded-right"></i></a>
                             </div>
                         </div>
                     @endforeach



                     <!-- Event single details end -->
                 </div>
             </div>

             <div class="text-center my-4">
                 <a href="{{ route('site.agenda') }}" class=" btn btn__primary w-50 text-center"> <span>Voir
                         tous les agendas</span> <i class="icofont-rounded-right"></i> </a>
             </div>
         </div>
     </div>
 </section>
