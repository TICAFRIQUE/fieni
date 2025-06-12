@extends('backend.layouts.master')
@section('title')
    parrainage
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            parrainage
        @endslot
        @slot('title')
            parrainage
        @endslot
    @endcomponent

    <style>
        table.parrainage {
            width: 100%;
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 14px;
        }

        table.parrainage th,
        table.parrainage td {
            border: 1px solid black;
            padding: 6px;
            vertical-align: top;
        }

        table.parrainage th {
            text-align: center;
            font-size: 18px;
        }

        table.parrainage td small {
            font-size: 11px;
            color: #333;
        }
    </style>

    <div class="row">
        <div class="col-lg-12 divPrint">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{-- <h5 class="card-title mb-0">Liste des parrainages</h5> --}}

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" cellpadding="6" cellspacing="0">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align:center; font-size:18px;">
                                        FICHE DE PARRAINAGE<br>
                                        N° __________
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Numéro d’électeur</td>
                                    <td> {{ $data_parrainage['carte_electeur'] ?? '______________' }}</td>
                                </tr>
                                <tr>
                                    <td>Numéro CNI ou<br>Pièce produite à l’enrôlement</td>
                                    <td>C {{ $data_parrainage['numero_cni'] ?? '______________' }}</td>
                                </tr>
                                <tr>
                                    <td>Région / District autonome</td>
                                    <td>{{ $data_parrainage['lieu_enrolement'] }}</td>
                                </tr>
                                <tr>
                                    <td>Nom / Nom jeune fille</td>
                                    <td>{{ $data_parrainage['nom'] }}</td>
                                </tr>
                                <tr>
                                    <td>Prénoms</td>
                                    <td>{{ $data_parrainage['prenoms'] }}</td>
                                </tr>
                                <tr>
                                    <td>Nom d’épouse<br><small>(si inscrit sur la carte d’électeur)</small></td>
                                    <td>{{ $data_parrainage['nom_epouse'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Date de naissance</td>
                                    <td>{{ \Carbon\Carbon::parse($data_parrainage['date_naissance'])->format('d/m/Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lieu de naissance</td>
                                    <td>{{ $data_parrainage['lieu_naissance'] }}</td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td>{{ $data_parrainage['contact'] }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <button id="btnImprimer" class="w-100 "><i class="ri ri-printer-fill"></i></button>

    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>





    <script>
        $(document).ready(function() {

            // imprimer la fiche
            function imprimerRapport() {
                // Sauvegarder le contenu original de la page
                var contenuOriginal = $('body').html();

                // Récupérer uniquement la section à imprimer
                var contenuImprimer = `
                <html>
                    <head>
                        <title>Fiche de parrainage</title>
                        <style>
                            body { font-family: Arial, sans-serif; }
                            table { width: 100%; border-collapse: collapse; }
                            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                            th { background-color: #f2f2f2; }
                        </style>
                    </head>
                    <body>
                      
                        ${$('.divPrint').html()}
                    </body>
                </html>
            `;

                // Remplacer le contenu de la page par celui à imprimer
                $('body').html(contenuImprimer);

                // Lancer l'impression
                window.print();

                // Recharger la page pour retrouver l'affichage original
                location.reload(); // ou $('body').html(contenuOriginal); si tu veux éviter le reload
            }

            $('#btnImprimer')
                .text('Imprimer le Rapport')
                .addClass('btn btn-primary mt-3')
                .on('click', imprimerRapport);

        });
    </script>
@endsection
