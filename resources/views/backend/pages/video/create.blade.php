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

                    <form id="videoForm" class="row g-3 needs-validation" method="POST" action="{{ route('video.store') }}"
                        novalidate enctype="multipart/form-data">
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
                                    <label for="validationCustom01" class="form-label">Lien de la video </label>
                                    <br><span>NB: Dans lien vous devez mettre uniquement l'ID de la vidéo YouTube.
                                        Par exemple, si le lien est https://www.youtube.com/watch?v=abcd1234, vous devez
                                        mettre <span><span class="text-danger"> "abcd1234"</span> dans le champ lien.
                                        </span>
                                        <span class="text-danger">Attention: Si vous mettez un lien complet, la vidéo ne
                                            s'affichera pas correctement.</span>

                                    </span>
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
    </script>
@endsection
@endsection
