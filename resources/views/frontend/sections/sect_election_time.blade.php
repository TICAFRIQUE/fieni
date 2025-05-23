 <section class="section-padding countdown">
     <div class="container">
         <div class="countdown__content">
             <div class="row">
                 <div class="col-lg-6 offset-lg-3">
                     <div class="section__title__center">
                         <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                             KÉVIN FIÉNI,
                             Président de Pro-Côte d'Ivoire
                         </p>
                         <h5 class="color-light" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                             Les élections présidentielles de 2025 approchent à grands pas et il est temps de se
                             préparer pour
                             faire entendre notre voix.
                         </h5>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div id="mycountdown">
                     <ul>
                         <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                             <span class="month">05</span>
                             <p>Mois</p>
                         </li>
                         <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                             <span class="days">19</span>
                             <p>Jours</p>
                         </li>
                         <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="350">
                             <span class="hours">04</span>
                             <p>Heures</p>
                         </li>
                         <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                             <span class="mins">14</span>
                             <p>Minutes</p>
                         </li>
                         <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="450">
                             <span class="secs">36</span>
                             <p>Secondes</p>
                         </li>
                     </ul>
                 </div>

                 <!-- ========== Start ajouter les bouttons adherer et parrainer ========== -->
                 <div class="col-lg-12 text-center mt-4">
                     <div class="countdown__btn">
                         <a href="#contact" class="btn__primary"> <span>j'adhére à PROCI-DPS</span></a>
                         <a href="#contact" class="btn__primary-outline"> <span>Je parraine mon candidat</span></a>
                         
                     </div>
                 </div>

                 <!-- ========== End ajouter les bouttons adherer et parrainer ========== -->

             </div>
         </div>
     </div>
 </section>


 <script>
     function updateCountdown() {
         const endDate = new Date('2025-10-25T00:00:00');
         const now = new Date();
         let diff = endDate - now;

         if (diff <= 0) {
             document.querySelector('.month').textContent = '00';
             document.querySelector('.days').textContent = '00';
             document.querySelector('.hours').textContent = '00';
             document.querySelector('.mins').textContent = '00';
             document.querySelector('.secs').textContent = '00';
             return;
         }

         const seconds = Math.floor(diff / 1000);
         const minutes = Math.floor(seconds / 60);
         const hours = Math.floor(minutes / 60);
         const days = Math.floor(hours / 24);

         const months = Math.floor(days / 30); // approximation
         const daysRemain = days % 30;
         const hoursRemain = hours % 24;
         const minutesRemain = minutes % 60;
         const secondsRemain = seconds % 60;

         document.querySelector('.month').textContent = String(months).padStart(2, '0');
         document.querySelector('.days').textContent = String(daysRemain).padStart(2, '0');
         document.querySelector('.hours').textContent = String(hoursRemain).padStart(2, '0');
         document.querySelector('.mins').textContent = String(minutesRemain).padStart(2, '0');
         document.querySelector('.secs').textContent = String(secondsRemain).padStart(2, '0');
     }

     updateCountdown();
     setInterval(updateCountdown, 1000);
 </script>
