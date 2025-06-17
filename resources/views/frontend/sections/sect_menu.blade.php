 <style>
     .flash-container {
         margin-top: 10px;
         display: flex;
         background: linear-gradient(to right, #0d1224, #0d1224);
         /* fond bleu nuit */
         color: white;
         height: 40px;
         overflow: hidden;
         border-bottom: 2px solid #000;
     }

     .flash-label {
         background-color: var(--secondary);
         padding: 10px 15px;
         font-weight: bold;
         font-style: italic;
         white-space: nowrap;
         flex-shrink: 0;
     }

     .flash-text-wrapper {
         position: relative;
         flex: 1;
         overflow: hidden;
     }

     .flash-text {
         position: absolute;
         white-space: nowrap;
         will-change: transform;
         animation: scroll-left 60s linear infinite;
         color: rgb(255, 255, 255);
         /* background: #ffffff; */

         font-weight: 500;
         padding-left: 100%;
     }

     @keyframes scroll-left {
         0% {
             transform: translateX(0);
         }

         100% {
             transform: translateX(-100%);
         }
     }
 </style>

 <header class="header">

     <!-- ========== Start flash infos ========== -->
     @if (isset($data_flash_info) && count($data_flash_info) > 0)
         <div class="flash-container">
             <div class="flash-label">Flash Info</div>
             <div class="flash-text-wrapper">
                 <div class="flash-text">
                     {!! strip_tags(
                         $data_flash_info->pluck('description')->implode('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'),
                     ) !!}
                 </div>
             </div>
         </div>
     @endif
     <!-- ========== End flash infos ========== -->




     <!-- 🔝 Header top -->
     <div class="top-header bg-light py-2 border-bottom">
         <div class="container-fluid">
             <div class="row align-items-center justify-content-between">
                 <!-- Réseaux sociaux à gauche -->
                 <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
                     <div class="social-icons d-flex gap-3">
                         <a href="{{ $parametre->lien_facebook ?? '' }}" class="text-dark" target="_blank"><i
                                 class="icofont-facebook"></i></a>
                         <a href="{{ $parametre->lien_twitter ?? '' }}" class="text-dark" target="_blank"><i
                                 class="icofont-twitter"></i></a>
                         <a href="{{ $parametre->lien_instagram ?? '' }}" class="text-dark" target="_blank"><i
                                 class="icofont-instagram"></i></a>
                         <a href="{{ $parametre->lien_youtube ?? '' }}" class="text-dark" target="_blank"><i
                                 class="icofont-youtube-play"></i></a>
                         {{-- <div> <i class=" icofont-eye-alt"></i> <span class="odometer" data-count="{{ $compteur_visites }}"></span></div> --}}
                         <a href="#" class="text-dark"><i class=" icofont-eye-alt"></i> {{ $compteur_visites }}
                         </a>
                     </div>
                 </div>

                 <!-- Menu Top header laptop -->
                 <div
                     class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end d-none d-lg-block d-md-block">
                     <div class="top-buttons d-flex gap-2">
                         <a href="{{ route('site.parrainage') }}" class="btn btn-sm btn__primary"><span>Parrainer
                             </span></a>
                         <a href="https://www.donation-proci.com/#adhesion" target="_blank"
                             class="btn btn-sm btn__primary-outline" style="text-transform: none"><span>Adhérez à
                                 <b>PRO CÔTE D'IVOIRE</b></span></a>
                         <a href="https://www.donation-proci.com/" target="_blank"
                             class="btn btn-sm btn__primary"><span>Faire un Don</span></a>

                     </div>
                 </div>


                 <!-- Menu Top header mobile-->
                 <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end d-lg-none d-md-none">
                     <div class="top-buttons d-flex gap-2">
                         <a href="{{ route('site.parrainage') }}" class="btn btn-sm text-white "
                             style="background-color: #0f3460"><span>Parrainer </span></a>
                         <a href="https://www.donation-proci.com/" target="_blank" class="btn btn-sm text-white "
                             style="background-color: #cf9b1b"><span>Devenir membre</span></a>
                         <a href="https://www.donation-proci.com/" target="_blank" class="btn btn-sm text-white "
                             style="background-color: #0f3460"><span>Faire
                                 un Don</span></a>

                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="container">
         <div class="row">
             <nav class="navbar navbar-expand-lg">
                 <div class="d-flex justify-content-between ">
                     <a class="navbar-brand" href="{{ route('site.accueil') }}">
                         {{-- <h1 class="navbar-brand__title">Statesman</h1> --}}
                         <img class="navbar-brand__logo-dark" width="50%"
                             src="{{ URL::asset($parametre->logo_header ?? asset('assets_web/images/web/logo-fieni.png')) }}"
                             alt="logo" />
                         <img class="navbar-brand__logo-white" width="50%"
                             src="{{ URL::asset($parametre->logo_header ?? asset('assets_web/images/web/logo-fieni.png')) }}"
                             alt="logo" />

                     </a>

                     <button class="navbar-toggler collapsed my-auto" type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                         aria-expanded="true" aria-label="Toggle navigation">
                         <span></span><span></span><span></span><span></span><span></span><span></span>
                     </button>
                 </div>
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul id="onepage-nav" class="navbar-nav menu ms-lg-auto align-items-lg-center">
                         <li class="nav-item {{ Route::is('site.accueil') ? 'active' : '' }}">
                             <a class="nav-link scroll" href="/">Accueil</a>
                         </li>
                         <li class="nav-item {{ Route::is('site.biographie') ? 'active' : '' }}">
                             <a class="nav-link scroll" href="{{ route('site.biographie') }}">Biographie</a>
                         </li>
                         <li class="nav-item {{ Route::is('site.programme') ? 'active' : '' }}">
                             <a class="nav-link scroll" href="{{ route('site.programme') }}">Projets de société</a>
                         </li>
                         <li
                             class="nav-item {{ Route::is('site.actualite') || Route::is('site.actualite_details') ? 'active' : '' }}">
                             <a class="nav-link scroll" href="{{ route('site.actualite') }}">Actualités</a>
                         </li>


                         {{-- <li class="nav-item dropdown submenu">
                             <a class="nav-link scroll" href="#">Mediathèque </a>
                             <span class="sub-menu-toggle dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                 aria-expanded="false">
                                 <i class="icofont-rounded-down"></i>
                             </span>
                             <ul class="dropdown-menu">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">Galeries</a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">Videos</a>
                                 </li>
                             </ul>
                         </li> --}}
                         <li class="nav-item {{ Route::is('site.agenda') ? 'active' : '' }}">
                             <a class="nav-link scroll" href="{{ route('site.agenda') }}">Agenda</a>
                         </li>
                         <li class="nav-item {{ Route::is('site.video') ? 'active' : '' }}">
                             <a class="nav-link scroll" href="{{ route('site.video') }}"> <i
                                     class="icofont-youtube-play"></i> Fieni TV</a>
                         </li>

                         <li class="nav-item {{ Route::is('site.contact') ? 'active' : '' }}">
                             <a class="nav-link scroll" href="{{ route('site.contact') }}">M'ecrire</a>
                         </li>


                         {{-- <li class="nav-item">
                             <div class="switch-box">
                                 <label id="switch" class="switch">
                                     <input type="checkbox" onchange="toggleTheme()" id="slider" />
                                     <span class="slider round"></span>
                                 </label>
                             </div>
                         </li> --}}
                     </ul>
                 </div>

             </nav>
         </div>
     </div>
 </header>
