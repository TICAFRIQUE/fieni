 <!-- Default Modals -->
 <div id="myModalEdit{{ $item['id'] }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Modification </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 </button>
             </div>
             <div class="modal-body">

                 <form class="row g-3 needs-validation" method="post" action="{{ route('slide.update', $item['id']) }}"
                     novalidate enctype="multipart/form-data">
                     @csrf
                     <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show material-shadow"
                         role="alert">
                         <i class="ri-airplay-line label-icon"></i><strong>Dimensions (px) : </strong>
                         <ol>
                             <li>Carrousel : <strong>1920 * 685 ou 1080</strong></li>

                         </ol>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>



                     <div class="col-md-12">
                         <label for="validationCustom01" class="form-label">Titre du slide</label>
                         <input type="text" name="titre" value="{{ $item['titre'] }}" class="form-control"
                             id="validationCustom01">
                         <div class="valid-feedback">
                             Looks good!
                         </div>
                     </div>


                     <div class="col-md-12">
                         <label for="validationCustom01" class="form-label">Description</label>
                         <textarea name="description" class="form-control" id="" cols="30" rows="3">
                             {{ $item['description'] }}
                         </textarea>
                         <div class="valid-feedback">
                             Looks good!
                         </div>
                     </div>

                     <div class="alert alert-danger alert-dismissible fade show" id="sizeError" style="display: none;"
                         role="alert">
                         <strong>Erreur !</strong> La taille de l'image ne doit pas dépasser 1 Mo.
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>




                     <div class="row my-3">
                         <div class="col-md-2">
                             <img class="rounded-circle" src="{{ $item->getFirstMediaUrl('image_background') }}"
                                 width="50px" alt="">
                         </div>
                         <div class="col-md-10">
                             <label for="validationCustom01" class="form-label">Image background</label>
                             <input accept="image/*" type="file"  name="image_background"
                                 class="form-control imageInput" >
                             <div class="valid-feedback">
                                 Looks good!
                             </div>
                         </div>
                     </div>


                     <div class="row my-3">
                         <div class="col-md-2">
                             <img class="rounded-circle" src="{{ $item->getFirstMediaUrl('image_candidat') }}" width="50px"
                                 alt="">
                         </div>
                         <div class="col-md-10">
                             <label for="validationCustom01" class="form-label">Image candidat</label>
                             <input accept="image/*" type="file" name="image_candidat" class="form-control imageInput"
                                 >
                             <div class="valid-feedback">
                                 Looks good!
                             </div>
                         </div>
                     </div>

                     <div class="col-md-12">
                         <label for="validationCustom01" class="form-label">Statut</label>
                         <select name="status" class="form-control">
                             <option value="active" {{ $item['status'] == 'active' ? 'selected' : '' }}>
                                 Activé
                             </option>
                             <option value="desactive" {{ $item['status'] == 'desactive' ? 'selected' : '' }}>
                                 Desactivé
                             </option>
                         </select>
                         <div class="valid-feedback">
                             Looks good!
                         </div>
                     </div>

                     <div class="modal-footer">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                         <button type="submit" class="btn btn-primary ">Valider</button>
                     </div>

                 </form>
             </div>
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
 </div><!-- end col -->

 {{-- @section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('build/js/pages/modal.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
@endsection --}}


 {{-- @section('script')
     <script>
         $(document).ready(function() {
             $('#imageBackground').change(function() {
                 var file = this.files[0];
                 if (file.size > 1048576) { // 1 Mo = 1048576 octets
                     $('#sizeError').show();
                     $(this).val('');
                 } else {
                     $('#sizeError').hide();
                 }
             });

             $('#imageCandidat').change(function() {
                 var file = this.files[0];
                 if (file.size > 1048576) { // 1 Mo = 1048576 octets
                     $('#sizeError').show();
                     $(this).val('');
                 } else {
                     $('#sizeError').hide();
                 }
             });
         });
     </script>
 @endsection --}}
