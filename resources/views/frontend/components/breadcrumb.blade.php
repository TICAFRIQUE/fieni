 <section
        id="all-blogs"
        class="all-blogs overflow-hidden position-relative"
      >
        <div class="container">
          <div class="row">
            <div class="blog-title">
              <h1
                class="display-3"
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="200"
              >
               @yield('title')
              </h1>
              <ul>
                <li
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-delay="250"
                >
                  <a href="#" onclick="history.back()">Retour</a>
                </li>
                <li
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-delay="250"
                >
                  <i class="icofont-rounded-right"></i>
                  <a href="{{ route('site.accueil') }}">Accueil</a>
                </li>
                <li
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-delay="250"
                >
                  <i class="icofont-rounded-right"></i>
                </li>
                <li
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-delay="300"
                >
                  @yield('title')
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>



      @include('backend.components.alertMessage')