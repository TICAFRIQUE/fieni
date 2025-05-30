@extends('backend.layouts.master')
@section('title')
    video
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            video
        @endslot
        @slot('title')
            Créer une video
        @endslot
    @endcomponent

    <style>
        .image-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 10px;
        }

        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 1px solid #dee2e6;
        }

        .remove-image {
            position: absolute;
            top: 4px;
            right: 4px;
            background-color: rgba(220, 53, 69, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            width: 24px;
            height: 24px;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
            z-index: 10;
        }
    </style>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- ========== Start generer un code uuid pour attribuer a limage temporaire ========== -->
                    @php
                        $draft_token = \Str::uuid()->toString();
                    @endphp
                    <!-- ========== End generer un code uuid pour attribuer a limage temporaire ========== -->

                    <form id="videoForm" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="row my-3">
                            <div class="col-md-9 border border-primary rounded p-3 mb-3">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Titre ou libellé </label>
                                    <input type="text" name="titre" class="form-control" id="validationCustom01"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <!-- ========== Start recuperer le token draft_token ========== -->
                                    <input type="hidden" name="draft_token" value="{{ $draft_token }}">
                                    <!-- ========== End recuperer le token draft_token ========== -->
                                    <label for="validationCustom01" class="form-label">Description</label>
                                    <textarea name="description" class="tinymce-editor"> </textarea><!-- End TinyMCE Editor -->
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3 border border-primary rounded p-3 mb-3">

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Lien de la video </label>
                                    <input type="text" name="lien" class="form-control" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <label for="validationCustom01" class="form-label">Public </label>
                                    <select name="status" class="form-control" required>
                                        <option value="active">Oui</option>
                                        <option value="desactive">Non</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="validationCustom01" class="form-label">Vedette </label>
                                    <select name="vedette" class="form-control" required>
                                        <option value="non">Non</option>
                                        <option value="oui">Oui</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 ">Valider</button>
                    </form>
                </div>
            </div><!-- end row -->
        </div><!-- end col -->
    </div>
    <!--end row-->

@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('build/js/pages/modal.init.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script> --}}
    <script src="{{ URL::asset('build/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('build/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('build/tinymce/fr_FR.js') }}"></script>
    <script>
        /**
         * Initiate TinyMCE Editor
         */

        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

        tinymce.init({
            language: 'fr_FR',
            language_url: 'build/tinymce/fr_FR.js',
            selector: 'textarea.tinymce-editor',
            height: 300,
            plugins: 'image code lists link preview fullscreen charmap emoticons hr pagebreak nonbreaking anchor insertdatetime advlist wordcount imagetools textpattern noneditable help codesample',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            // toolbar: 'undo redo | link image | code',
            images_upload_handler: function(blobInfo, success, failure) {
                const file = blobInfo.blob();

                // Vérifie que le fichier ne dépasse pas 1 Mo (1 048 576 octets)
                if (file.size > 1048576) {
                    failure('L’image ne doit pas dépasser 1 Mo.');
                    return;
                }

                const formData = new FormData();
                formData.append('file', file, blobInfo.filename());
                formData.append('draft_token', document.querySelector('input[name="draft_token"]').value);

                fetch("{{ route('video.upload-tinymce') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(json => success(json.location))
                    .catch(error => failure('Upload échoué : ' + error.message));
            }
        });



        // Vérification de la taille de l'image avant l'envoi en javascript
        // document.getElementById('imageInput').addEventListener('change', function(e) {
        //     const file = e.target.files[0];
        //     const error = document.getElementById('sizeError');

        //     if (file && file.size > 1024 * 1024) {
        //         error.style.display = 'block';
        //         e.target.value = ''; // Réinitialise le champ
        //     } else {
        //         error.style.display = 'none';
        //     }
        // });


        // Vérification de la taille de l'image avant l'envoi en jQuery
        // $('#imageInputUne').on('change', function() {
        //     var file = this.files[0];
        //     var maxSize = 1 * 1024 * 1024; // 1 Mo en octets

        //     if (file && file.size > maxSize) {
        //         $('#sizeError').show();
        //         $(this).val(''); // Réinitialise le champ fichier
        //     } else {
        //         $('#sizeError').hide();
        //     }
        // });






        /// Ajout de l'image dans la galerie
        let addedImages = [];

        function showAlert(message, type = 'danger') {
            const alert = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
            $('#alertContainer').html(alert);
        }

        $('#imageInput').on('change', function(e) {
            const files = e.target.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                if (file.size > 1048576) { // 1 Mo
                    showAlert(`L'image "${file.name}" dépasse la taille maximale de 1 Mo.`);
                    continue;
                } else {
                    $('#alertContainer').html('');
                }


                const reader = new FileReader();
                reader.onload = function(event) {
                    const base64Data = event.target.result;

                    if (addedImages.includes(base64Data)) {
                        showAlert(`L'image "${file.name}" a déjà été ajoutée.`);
                        return;
                    } else {
                        $('#alertContainer').html('');
                    }

                    addedImages.push(base64Data);

                    const image = `
                    <div class="col-12 col-md-6">
                        <div class="image-wrapper border border-secondary rounded">
                            <img src="${base64Data}" alt="Image">
                            <button type="button" class="remove-image">&times;</button>
                        </div>
                    </div>
                `;
                    $('#imageTableBody').append(image);
                };

                reader.readAsDataURL(file);
            }
        });

        $(document).on('click', '.remove-image', function() {
            const src = $(this).siblings('img').attr('src');
            addedImages = addedImages.filter(img => img !== src);
            $(this).closest('.col-12').remove();
        });



        // Envoyer les données au backend
        $('#videoForm').submit(function(e) {
            e.preventDefault();

            // 🔥 Met à jour le textarea avec le contenu de TinyMCE
            tinymce.triggerSave();

            const formData = new FormData(this);
            addedImages.forEach((image, index) => {
                formData.append(`galerie[]`, image);
            });


            $.ajax({
                url: "{{ route('video.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.success === true) {
                        $('#imageTableBody').empty(); // Effacer le contenu de la galerie
                        Swal.fire({
                            title: 'Good job!',
                            text: 'You clicked the button!',
                            icon: 'success',
                            showCancelButton: true,
                            customClass: {
                                confirmButton: 'btn btn-primary w-xs me-2 mt-2',
                                cancelButton: 'btn btn-danger w-xs mt-2',
                            },
                            buttonsStyling: false,
                            showCloseButton: true
                        })

                        window.location.href = "{{ route('video.index') }}";
                        // location.reload()
                    }
                },
                error: function(xhr, status, error) {
                    // Gérer les erreurs
                    console.error(error);
                }

            });
        })
    </script>
@endsection
@endsection
