 <div class="col-lg-4" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
     <div class="blog__sidebar">
         <div class="blog__sidebar__item">
             <div class="blog-category">
                 <div class="blog-category__title">
                     <h4>Actualites récentes</h4>
                     <span></span>
                 </div>
                 <div class="blog-category__area">
                     <ul>
                         @foreach ($data_actualite as $item)
                             <li class="d-flex align-items-center">
                                 <div class="post-img">
                                     <a href="{{ route('site.actualite_details', $item->slug) }}"><img class="img-fluid"
                                             alt="image"
                                             src="{{ asset($item->getFirstMediaUrl('image_une') ?? asset('assets_web/images/web/fieni.jpg')) }}" /></a>
                                 </div>
                                 <div class="post-content">
                                     <h6>
                                         <a
                                             href="{{ route('site.actualite_details', $item->slug) }}">{{ Str::substr($item->titre, 0, 50) }}...</a>
                                     </h6>
                                     <span><i class="icofont-ui-calendar"></i>
                                         {{ \Carbon\Carbon::parse($item->date_publication)->diffForHumans() }}</span>
                                 </div>
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>
     </div>

     <!-- ========== Start frame facebook ========== -->
     <div class="col-lg-12" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
         <div class="blog__sidebar">
             <div class="blog__sidebar__item">
                 <div class="blog-category">
                     <div class="blog-category__title">
                         <h4>Suivez-moi sur Facebook</h4>
                         <span></span>
                     </div>
                     <div class="blog-category__area">
                         <iframe
                             src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F1956324791305481&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                             width="340" height="500" style="border:none;overflow:hidden" scrolling="no"
                             frameborder="0" allowfullscreen="true"
                             allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                         </iframe>
                     </div>

                 </div>
             </div>
         </div>
     </div>
     <!-- ========== End frame facebook ========== -->
 </div>
