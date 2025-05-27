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


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Liste des parrainages</h5>
                    <a class="btn btn-primary" href="{{ route('site.parrainage') }}" target="_blank">
                        <i class="ri ri-add-fill"></i>
                        Ajouter un parrainage</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prénoms</th>
                                    <th>Nom d'épouse</th>
                                    <th>Date de naissance</th>
                                    <th>Lieu de naissance</th>
                                    <th>Contact</th>
                                    <th>Numéro CNI</th>
                                    <th>Carte d'électeur</th>
                                    <th>Lieu d'enrôlement</th>
                                    <th>Date d'enregistrement</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data_parrainage as $key => $item)
                                    <tr id="row_{{ $item['id'] }}">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item['nom'] }}</td>
                                        <td>{{ $item['prenoms'] }}</td>
                                        <td>{{ $item['nom_epouse'] ?? '-' }}</td>
                                        <td>{{ $item['date_naissance'] }}</td>
                                        <td>{{ $item['lieu_naissance'] }}</td>
                                        <td>{{ $item['contact'] }}</td>
                                        <td>{{ $item['numero_cni'] ?? '-' }}</td>
                                        <td>{{ $item['carte_electeur'] ?? '-' }}</td>
                                        <td>{{ $item['lieu_enrolement'] }}</td>
                                        <td>{{ $item['created_at'] }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li class="d-none">
                                                        <a href="{{ route('parrainage.edit', $item->id) }}"
                                                            class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item remove-item-btn delete"
                                                            data-id="{{ $item['id'] }}">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Supprimer
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
            var route = "parrainage"
            delete_row(route);
        })
    </script>
@endsection
