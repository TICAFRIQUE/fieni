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
         background-color: #0d1224;
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
         animation: scroll-left 30s linear infinite;
         color: #000;
         background: white;
         padding-left: 100%;
         /* pour bien démarrer hors-écran */
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
     <div class="flash-container">
         <div class="flash-label">Flash Info</div>
         <div class="flash-text-wrapper">
             <div class="flash-text">
                 📰 Kévin FIÉNI, Président Fondateur du parti politique PRO CÔTE D'IVOIRE pour la Démocratie, la
                 Prospérité
                 et la Souveraineté (PROCI-DPS), Candidat pour faire de la Côte d'Ivoire une RÉPUBLIQUE FÉDÉRALE.
             </div>
         </div>
     </div>
     <!-- ========== End flash infos ========== -->




     <!-- 🔝 Header top -->
     <div class="top-header bg-light py-2 border-bottom">
         <div class="container-fluid">
             <div class="row align-items-center justify-content-between">
                 <!-- Réseaux sociaux à gauche -->
                 <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
                     <div class="social-icons d-flex gap-3">
                         <a href="{{$parametre->lien_facebook ?? ''}}" class="text-dark"><i class="icofont-facebook"></i></a>
                         <a href="{{$parametre->lien_twitter ?? ''}}" class="text-dark"><i class="icofont-twitter"></i></a>
                         <a href="{{$parametre->lien_instagram ?? ''}}" class="text-dark"><i class="icofont-instagram"></i></a>
                         <a href="{{$parametre->lien_youtube ?? ''}}" class="text-dark"><i class="icofont-youtube-play"></i></a>
                     </div>
                 </div>

                 <!-- Boutons à droite -->
                 <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                     <div class="top-buttons d-flex gap-2">
                         <a href="#" class="btn btn-sm btn__primary" ><span>Parrainer mon candidat</span></a>
                         <a href="#" class="btn btn-sm btn__primary-outline"><span>Adhérez à PROCI-DPS</span></a>
                         <a href="#" class="btn btn-sm btn__primary"><span>Faire un Don</span></a>

                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="container-fluid">
         <div class="row">
             <nav class="navbar navbar-expand-lg">
                 <a class="navbar-brand" href="index.html">
                     {{-- <h1 class="navbar-brand__title">Statesman</h1> --}}
                     <img class="navbar-brand__logo-dark" width="50%" src="{{ URL::asset($parametre->logo_header ?? asset('assets_web/images/web/logo-fieni.png'))}}" alt="logo" />
                     <img class="navbar-brand__logo-white" width="50%" src="{{ URL::asset($parametre->logo_header ?? asset('assets_web/images/web/logo-fieni.png'))}}" alt="logo" />
                 </a>
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul id="onepage-nav" class="navbar-nav menu ms-lg-auto align-items-lg-center">
                         <li class="nav-item">
                             <a class="nav-link scroll" href="#">Accueil</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link scroll" href="#">Biographie</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link scroll" href="#">Mon programme</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link scroll" href="#">Actualités</a>
                         </li>
                         <li class="nav-item dropdown submenu">
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
                         </li>
                         <li class="nav-item">
                             <a class="nav-link scroll" href="#">Agenda</a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link scroll" href="#">Contact-nous</a>
                         </li>


                         <li class="nav-item">
                             <div class="switch-box">
                                 <label id="switch" class="switch">
                                     <input type="checkbox" onchange="toggleTheme()" id="slider" />
                                     <span class="slider round"></span>
                                 </label>
                             </div>
                         </li>
                     </ul>
                 </div>
                 <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                     aria-expanded="true" aria-label="Toggle navigation">
                     <span></span><span></span><span></span><span></span><span></span><span></span>
                 </button>
             </nav>
         </div>
     </div>
 </header>
