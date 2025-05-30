@extends('frontend.layouts.app')

@section('title')
    Devenir membre
@endsection

@section('content')
    <style>
        .form-parrainage {
            box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
            color: #ffffff;
            padding: 30px;
            border-radius: 8px;
        }

        .form-parrainage label {
            color: #0f3460;
            font-weight: 500;
        }

        .form-parrainage input , .form-parrainage select {
            border-radius: 5px;
            border-color: #0f3460;
            box-shadow: rgba(255, 255, 255, 0.15) 0px 48px 100px 0px;
        }

        .form-parrainage .form-control::placeholder {
            color: #ccc;
        }

        .form-parrainage .btn-primary {
            background-color: #0f3460;
            border-color: #0f3460;
        }
    </style>

    <!-- ======= Breadcrumbs ======= -->
    @include('frontend.components.breadcrumb')
    <!-- End Breadcrumbs -->



    <section>
        <div class="spacing">
            <div class="container">
                <div class="volunteer-form-wrap text-center">
                    <h4 itemprop="headline" class="my-4">Formulaire d'adhesion</h4>


                    <div class="container my-5">
                        <!-- ========== Start message succes and error ========== -->

                        <!-- ========== End message succes and error ========== -->

                        <!-- Formulaire HTML -->
                        <form id="myForm" class="form-horizontal form-parrainage" method="POST" action="{{ route('site.adhesion.store') }}">
                            @csrf
                            {{-- <h4 class="text-center my-4">Formulaire d'adhesion</h4> --}}
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="nom">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nom" name="nom" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="prenoms">Prénoms <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="prenoms" name="prenoms" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nom_epouse">Genre</label>
                                    <select class="form-control" name="genre" required>
                                        <option value="" disabled selected>Choisir un genre</option>
                                        <option value="monsieur">Monsieur</option>
                                        <option value="madame">Madame</option>
                                        <option value="Mademoiselle">Mademoiselle</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="form-group col-md-3">
                                    <label for="email">Email </label>
                                    <input type="email" class="form-control" name="email" />
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="contact">Contact <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="contact" name="contact"
                                        placeholder="Ex: 0700000000" required />
                                </div>

                                <div class="form-group col-md-3">
                                    @php
                                        $pays = config('pays');
                                        $defaut = 'Côte d\'Ivoire';
                                        if (!array_key_exists($defaut, $pays)) {
                                            $pays = array_merge([$defaut => $defaut], $pays);
                                        }
                                    @endphp

                                    <label for="pays">Pays <span class="text-danger">*</span></label>
                                    <select class="form-control" name="pays" required>
                                        @foreach ($pays as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="commune">Commune </label>
                                    <input type="text" class="form-control" name="commune" required />
                                </div>
                            </div>


                            <div class="form-group col-md-3 m-auto py-3">
                                <label class="mb-2" id="captcha-question">Combien font ?</label>
                                <input type="number" id="captcha-answer" class="form-control" required>
                                <small id="captcha-error" class="text-danger" style="display: none;">Mauvaise réponse.
                                    Réessayez.</small>
                            </div>

                            <button type="submit" class="btn__primary w-50">
                                <span>Soumettre</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

   @include('frontend.components.recaptcha')
@endsection
