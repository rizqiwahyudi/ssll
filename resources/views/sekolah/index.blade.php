@section('title', '| sekolah')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Sekolah') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('sekolahs.index') }}">{{ __('Sekolah') }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    @can('sekolah-create')
                        <div class="col-lg-6 col-5 text-right">
                            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal"
                                data-target=".bd-create-sekolah">{{ __('Add Sekolah') }}</button>
                            @include('sekolah.modal.create')
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
                        <h3 class="mb-0">{{ __('Sekolah') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>School Name</th>
                                    <th>Address</th>
                                    <th>Photo</th>
                                    <th>Result</th>
                                    <th style="text-align: center; width: 150px">{{ __('Action') }}</th>
                                    <th style="text-align: center">{{ __('Survey') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>School Name</th>
                                    <th>Address</th>
                                    <th>Photo</th>
                                    <th>Result</th>
                                    <th style="text-align: center; width: 150px">{{ __('Action') }}</th>
                                    <th style="text-align: center">{{ __('Survey') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($sekolahs as $s)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $s->nama }}</td>
                                        <td style="vertical-align: middle">{{ $s->alamat }}</td>
                                        <td style="vertical-align: middle">
                                            @if (strlen($s->photo) > 0)
                                                <img src="{{ asset('img/profile/' . $s->photo) }}" width="80px"
                                                    class="mt-1" style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                                            @elseif($s->photo == null)
                                                <img src="{{ asset('img/profile/user-default.png') }}" width="80px"
                                                    class="mt-1" style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle">
                                            @if ($s->hasil == 'sekolah sadar lalu lintas')
                                                <span class="badge badge-pill badge-success">{{ $s->hasil }}</span>
                                            @elseif($s->hasil == 'sekolah tidak sadar lalu lintas')
                                                <span class="badge badge-pill badge-danger">{{ $s->hasil }}</span>
                                            @elseif($s->hasil == '')
                                                <span
                                                    class="badge badge-pill badge-primary">{{ __('Belum Melakukan Survei') }}</span>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle" align="center">
                                            <a href="#"
                                                class="btn btn-sm btn-icon btn-default btn-icon-only rounded-circle"
                                                data-toggle="modal" data-target="#sekolah-show-{{ $s->id }}">
                                                <span class="btn-inner--icon" data-toggle="tooltip" data-placement="top"
                                                    title="Show"><i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                            @can('sekolah-edit')
                                                <a href="{{ route('sekolahs.edit', $s->id) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen-square"></i>
                                                    </span>
                                                </a>
                                            @endcan
                                            @can('sekolah-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $s->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endcan
                                            @include('sekolah.modal.show')
                                        </td>
                                        <td style="vertical-align: middle" align="center">
                                            @if ($s->hasil == '')
                                                <a href="{{ route('survey.create') }}"
                                                    class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Create Survey">
                                                    <span class="btn-inner--icon"><i class="fa fa-plus"></i>
                                                    </span>
                                                </a>
                                            @elseif($s->hasil != '')
                                                <a href="{{ route('survey.edit', $s->id) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit Survey">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen-square"></i>
                                                    </span>
                                                </a>
                                            @endif
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
    @include('sekolah.remove_script')
@endsection
