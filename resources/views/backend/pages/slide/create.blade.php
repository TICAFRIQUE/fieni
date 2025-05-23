<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <!-- Default Modals -->
            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
                style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Créer un nouveau slide </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">


                            <form class="row g-3 needs-validation" method="post" action="{{ route('slide.store') }}"
                                novalidate enctype="multipart/form-data">
                                @csrf

                                <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show material-shadow"
                                    role="alert">
                                    <i class="ri-airplay-line label-icon"></i><strong>Dimensions (px) : </strong>
                                    <ol>
                                        <li>Carrousel : <strong>1920 * 685 ou 1080</strong></li>
                                    </ol>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>


                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Titre du slide</label>
                                    <input type="text" name="titre" class="form-control" id="validationCustom01">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                              


                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Image background du slide</label>
                                    <input type="file"  name="image_background" accept="image/*"
                                        class="form-control imageInput"  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Image candidat du slide</label>
                                    <input type="file"  name="image_candidat" accept="image/*"
                                        class="form-control imageInput"  required>



                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Statut du slide</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Activé</option>
                                        <option value="desactive">Desactivé</option>

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

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->
</div>
<!--end row-->

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
