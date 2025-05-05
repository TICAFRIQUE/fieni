 <!-- ======= Our Team Section ======= -->
 <section id="equipe" class="team">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Notre equipe</h2>
        <p>« Nous avons une équipe dynamique et motivée, prête à répondre à vos besoins. » </p>
      </div>

      <div class="row gy-5">

     @foreach ($data_equipe as $item)
     <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
      <div class="member-img">
        <img src="{{ $item->getFirstMediaUrl('image') ? asset($item->getFirstMediaUrl('image')) : asset('images/user-icon.png') }}"class="img-fluid" alt="membre-image">
        {{-- <div class="social">
          <a href="#"><i class="bi bi-twitter"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
        </div> --}}
      </div>
      <div class="member-info text-center">
        <h4> {{$item['nom']}} </h4>
        <span>{{$item['job']}}</span>
        {{-- <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum distinctio dire flow --}}
        </p>
      </div>
    </div><!-- End Team Member -->
     @endforeach
      </div>

    </div>
  </section><!-- End Our Team Section -->