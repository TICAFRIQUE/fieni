@extends('backend.layouts.master')

@section('content')

    @component('backend.components.breadcrumb')
        @slot('li_1')
            Programme
        @endslot
        @slot('title')
            Créer un programme
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <!-- ========== Start generer un code uuid pour attribuer a limage temporaire ========== -->

                    @php
                        $draft_token = \Str::uuid()->toString();
                    @endphp
                    <!-- ========== End generer un code uuid pour attribuer a limage temporaire ========== -->

                    <form class="row g-3 needs-validation" method="post" action="{{ route('programme.store') }}" novalidate
                        enctype="multipart/form-data">
                        @csrf

                    

                        <div class="col-md-10">
                            <label for="validationCustom01" class="form-label">Image (1024x680) </label>
                            <input type="file" name="image" class="form-control" id="imageInput" accept="image/*">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>



                        <div class="col-md-2">
                            <label for="validationCustom01" class="form-label">Statut</label>
                            <select name="status" class="form-control">
                                <option value="active">Activé</option>
                                <option value="desactive">Desactivé</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <!-- ========== Start recuperer le token draft_token ========== -->
                            <input type="hidden" name="draft_token" value="{{ $draft_token }}">
                            <!-- ========== End recuperer le token draft_token ========== -->

                            <label for="validationCustom01" class="form-label">Description</label>
                            <textarea name="description" class="tinymce-editor" required> </textarea><!-- End TinyMCE Editor -->
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary w-100 ">Valider</button>
                    </form>


                </div>
            </div><!-- end row -->
        </div><!-- end col -->
    </div><!-- end col -->

    <!--end row-->

@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('build/js/pages/modal.init.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script> --}}
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

                fetch("{{ route('programme.upload-tinymce') }}", {
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
