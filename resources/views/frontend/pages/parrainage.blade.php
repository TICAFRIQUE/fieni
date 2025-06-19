@extends('frontend.layouts.app')

@section('title')
    Parrainage
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
            font-weight: 500
        }

        .form-parrainage input {
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
                    <h4 itemprop="headline" class="my-4">Formulaire de Parrainage</h4>


                    <div class="container my-5">
                        <!-- ========== Start message succes and error ========== -->

                        <!-- ========== End message succes and error ========== -->

                        <!-- Formulaire HTML -->
                        <form id="myForm" class="form-horizontal form-parrainage" method="POST"
                            action="{{ route('site.parrainage.store') }}">
                            {{-- <h4 class="text-center my-4">Formulaire de Parrainage</h4> --}}
                            @csrf
                            <div class="row mt-2">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="carte_electeur">Numéro de carte d'électeur (facultatif)</label>
                                    <input type="text" class="form-control" id="carte_electeur" name="carte_electeur"
                                        placeholder="Ex: 123456789" />
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="numero_cni">Numéro de CNI ou Pièce produite à l'enrôlement</label>
                                    <input type="text" class="form-control" id="numero_cni" name="numero_cni"
                                        placeholder="Ex: CNI0012345" />
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="lieu_enrolement">Lieu d’enrôlement (Région) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lieu_enrolement" name="lieu_enrolement"
                                        placeholder="Ex: treichville" required />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="nom">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nom" name="nom"
                                        placeholder="Ex: Fieni" required />
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="prenoms">Prénoms <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="prenoms" name="prenoms"
                                        placeholder="Ex: Fieni" required />
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="nom_epouse">Nom d'épouse (si inscrit sur la carte d'électeur)</label>
                                    <input type="text" class="form-control" id="nom_epouse" name="nom_epouse"
                                        placeholder="Ex: Fieni" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="date_naissance">Date de naissance <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                                        required />
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="lieu_naissance">Lieu de naissance <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance"
                                        placeholder="Ex: Abidjan" required />
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="contact">Contact <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="contact" name="contact"
                                        placeholder="Ex: 0700000000" required />
                                </div>
                            </div>


                            <!-- ========== Start recaptcha ========== -->
                            <div class="form-group col-md-3 m-auto py-3">
                                <label class="mb-2" id="captcha-question">Combien font ?</label>
                                <input type="number" id="captcha-answer" class="form-control" required>
                                <small id="captcha-error" class="text-danger" style="display: none;">Mauvaise réponse.
                                    Réessayez.</small>
                            </div>
                            <!-- ========== End recaptcha ========== -->


                            <button type="submit" class="btn__primary-outline w-50">
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
