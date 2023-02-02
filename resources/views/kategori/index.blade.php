@section('title', '| Kategori')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Kategori') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('kategoris.index') }}">{{ __('Kategori') }}</a></li>
                            </ol>
                        </nav>
                    </div>
                    @can('kategori-create')
                        <div class="col-lg-6 col-5 text-right">
                            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal"
                                data-target=".bd-create-kategori">{{ __('Add Kategori') }}</button>
                            @include('kategori.modal.create')
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Kategori') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Kategori Name</th>
                                    <th>Prority</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Kategori Name</th>
                                    <th>Prority</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($kategoris as $k)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $k->nama }}</td>
                                        <td style="vertical-align: middle">{{ $k->prioritas }}</td>
                                        <td style="vertical-align: middle" align="center">
                                            <a href="#" class="btn btn-sm btn-icon btn-default btn-icon-only rounded-circle"
                                                data-toggle="modal" data-target="#kategori-show-{{ $k->id }}">
                                                <span class="btn-inner--icon" data-toggle="tooltip" data-placement="top"
                                                    title="Show"><i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                            @can('kategori-edit')
                                                <a href="{{ route('kategoris.edit', $k->id) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen-square"></i>
                                                    </span>
                                                </a>
                                            @endcan
                                            @can('kategori-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $k->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endcan
                                            @include('kategori.modal.show')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>
    @include('kategori.remove_script')
@endsection
