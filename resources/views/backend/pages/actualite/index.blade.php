@extends('backend.layouts.master')
@section('title')
    actualite
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
            Liste des actualites
        @endslot
        @slot('title')
            actualite
        @endslot
    @endcomponent


    <div class="row">
        <div class="text-end mb-4">
            <a href="{{ route('actualite.create') }}" class="btn btn-primary"> <i class="ri ri-add-fill"></i> Ajouter une
                actualite</a>
        </div>

        @forelse ($data_actualite as $item)
            <div class="col-sm-6 col-xl-4" id="row_{{ $item['id'] }}">
                <div class="card">
                    <img style="height: 400px; width: 100%; object-fit: cover;" class="card-img-top img-fluid"
                        src="{{ URL::asset($item->getFirstMediaUrl('image')) }}" alt="Card image cap">

                    <div class="card-body">
                        <h4 class="card-title mb-2 fw-bold text-capitalize text-center"> {{ $item['titre'] }} </h4>
                        <p class="card-text mb-0">
                            {!! substr(strip_tags($item['description']), 0, 100) !!}....

                        </p>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-0">
                            Statut: <span class="badge {{ $item['status'] == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ $item['status'] }} </span>
                        </p>
                        <p class="card-text mb-0">
                            Vedette: <span class="badge bg-warning"> {{ $item['vedette'] }} </span>
                        </p>
                        <p class="card-text mb-0">
                            date de publication: <span class="badge bg-info"> {{ $item['date_publication'] }} </span>
                        </p>

                        <div class="card-footer">
                            <a href="/" target="_blank" class="card-link link-secondary"><i
                                    class="ri ri-eye-2-fill "></i> voir</a>
                            <a href=" {{ route('actualite.edit', $item['id']) }}"
                                class="card-link link-secondary text-success "><i class="ri ri-edit-2-fill "></i>
                                Modifier</a>
                            <a href="#" data-id="{{ $item['id'] }}"
                                class="card-link link-secondary text-danger delete"><i class="ri ri-delete-bin-2-fill "></i>
                                Supprimer</a>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end col -->
        @empty
            <h4 class="text-center">Aucune actualité disponible</h4>
        @endforelse


    </div><!-- end row -->
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
            var route = "actualite"
            delete_row(route);
        })
    </script>
@endsection
