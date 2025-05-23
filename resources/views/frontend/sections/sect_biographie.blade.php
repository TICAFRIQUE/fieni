 <section class="section-padding about-v2" id="about">
     <div class="container">
         <div class="row">
             <div class="col-lg-5 order-2 order-lg-1 about-v2__image" data-aos="fade-right" data-aos-duration="1000"
                 data-aos-delay="250">
                 <img class="img-fluid"
                     src="{{ URL::asset($data_biographie?->getFirstMediaUrl('image') ?? asset('assets_web/images/web/fieni.jpg')) }}"
                     alt="image fieni" />
                 {{-- <div class="about-v2__image__box">
                     <div class="image__box__content">
                         <div class="position-relative fs-4 fs-sm-2 fw-bold">
                             <span class="odometer" data-count="6"></span><sub>Times</sub>
                             <p>City Mayor</p>
                         </div>
                     </div>
                 </div> --}}
             </div>
             <div class="col-lg-6 offset-lg-1 mt-0 mt-lg-3 mb-3 mb-lg-0 order-1 order-lg-2" data-aos="fade-left"
                 data-aos-duration="1000" data-aos-delay="250">
                 <div class="section__title__left">
                     {{-- <p>About Candidate</p> --}}
                     <h3>Qui est FIÉNI</h3>
                     <p>
                         Je suis Pro-Côte d'Ivoire Parce que la Côte d'Ivoire mérite mieux
                     </p>
                 </div>
                 <!-- About tab  -->
                 <div class="about-v2">
                     {{-- <div class="row">
                                <div class="about-v2__tab-btn">
                                    <ul id="about-nav">
                                        <li>
                                            <a href="#about-btn1">
                                                <p>Details</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#about-btn2">
                                                <p>History</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#about-btn3">
                                                <p>Achievement</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="about-v2__tab-content">
                                    <div id="about-content">
                                        <div id="about-btn1" class="about-v2__content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="about-v2__content__details">
                                                        <li>
                                                            <p>Name</p>
                                                            <h5>Jack Snow</h5>
                                                        </li>
                                                        <li>
                                                            <p>Email</p>
                                                            <h5>abcd@gmail.com</h5>
                                                        </li>
                                                        <li>
                                                            <p>Language</p>
                                                            <h5>English, Spanish</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="about-v2__content__details">
                                                        <li>
                                                            <p>Phone</p>
                                                            <h5>+0087956421</h5>
                                                        </li>
                                                        <li>
                                                            <p>Address</p>
                                                            <h5>36/8 Los angles</h5>
                                                        </li>
                                                        <li>
                                                            <p>Nationality</p>
                                                            <h5>American</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="about-btn2" class="about-v2__content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="about-v2__content__details">
                                                        <li>
                                                            <p>2018</p>
                                                            <h5>Political Journey started</h5>
                                                        </li>
                                                        <li>
                                                            <p>2019</p>
                                                            <h5>Member at Congress party</h5>
                                                        </li>
                                                        <li>
                                                            <p>2020</p>
                                                            <h5>Vice chairman at Congress</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="about-v2__content__details">
                                                        <li>
                                                            <p>2021</p>
                                                            <h5>Mayor of ST. Josseph state</h5>
                                                        </li>
                                                        <li>
                                                            <p>2022</p>
                                                            <h5>Special member of Parliament</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="about-btn3" class="about-v2__content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="about-v2__content__details">
                                                        <li>
                                                            <p>Major politics</p>
                                                            <h5>Graduated form Harvard in politics</h5>
                                                        </li>
                                                        <li>
                                                            <p>Young Changer</p>
                                                            <h5>
                                                                Best young politician award form president
                                                            </h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="about-v2__content__details">
                                                        <li>
                                                            <p>Big margin win</p>
                                                            <h5>
                                                                Won first ever election of mayor with big
                                                                margin
                                                            </h5>
                                                        </li>
                                                        <li>
                                                            <p>Youngest Candidate</p>
                                                            <h5>
                                                                Youngest president candidate of the history
                                                            </h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                     {{-- <p>
                         {!! $data_biographie->description ?? '' !!}
                     </p> --}}

                     @php
                         use Illuminate\Support\Str;

                         $descriptionHtml = $data_biographie->description ?? '';
                         $description = html_entity_decode(strip_tags($descriptionHtml)); // texte sans HTML ni entités
                         $maxLength = 1000;
                     @endphp

                     <div id="biographie-content">
                         <span id="short-description">
                             {{ Str::limit($description, $maxLength) }}
                             @if (strlen($description) > $maxLength)
                                 <a href="javascript:void(0);" id="read-more" class="btn__link ml-auto mr-0 d-flex justify-content-end">Lire plus <i class="icofont-rounded-right"></i></a>
                             @endif
                         </span>

                         <span id="full-description" style="display:none;">
                             {!! $data_biographie->description ?? '' !!}
                             <a href="javascript:void(0);" class="btn__link ml-auto mr-0 d-flex justify-content-end" id="read-less"><i class="icofont-rounded-left"></i>  Réduire</a>
                         </span>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </section>


 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const readMore = document.getElementById("read-more");
         const readLess = document.getElementById("read-less");
         const shortDesc = document.getElementById("short-description");
         const fullDesc = document.getElementById("full-description");

         if (readMore) {
             readMore.addEventListener("click", function() {
                 shortDesc.style.display = "none";
                 fullDesc.style.display = "inline";
             });
         }

         if (readLess) {
             readLess.addEventListener("click", function() {
                 shortDesc.style.display = "inline";
                 fullDesc.style.display = "none";
             });
         }
     });
 </script>
