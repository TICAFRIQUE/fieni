 <!-- ========== copier ce code dans le formulaire  ,  donner id="myForm" au formulaire =========== -->
 {{-- <div class="form-group col-md-3 m-auto py-3">
     <label class="mb-2" id="captcha-question">Combien font ?</label>
     <input type="number" id="captcha-answer" class="form-control" required>
     <small id="captcha-error" class="text-danger" style="display: none;">Mauvaise réponse.
         Réessayez.</small>
 </div> --}}
 <!-- ========== End instruction ========== -->






 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
     let num1, num2;

     function generateCaptcha() {
         num1 = Math.floor(Math.random() * 10); // entre 0 et 9
         num2 = Math.floor(Math.random() * 10); // entre 0 et 9
         $('#captcha-question').html(
             `Combien font <strong style="color: #d9534f; font-size: 20px"> ${num1} + ${num2} ?</strong>`);
         $('#captcha-answer').val('');
         // $('#captcha-error').hide();
     }

     $(document).ready(function() {
         generateCaptcha();

         // Gérer la soumission du formulaire
         //myForm est l'ID de votre formulaire

         $('#myForm').on('submit', function(e) {
             e.preventDefault();

             const userAnswer = parseInt($('#captcha-answer').val(), 10);
             const correctAnswer = num1 + num2;

             if (userAnswer === correctAnswer) {
                 this.submit(); // soumettre si bonne réponse
             } else {
                 $('#captcha-error').show();

                 setTimeout(function() {
                     $('#captcha-error').fadeOut();
                 }, 3000); // 3000 ms = 3 secondes
                 generateCaptcha(); // nouveau captcha
             }
         });
     });
 </script>
