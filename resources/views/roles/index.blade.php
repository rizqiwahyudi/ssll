@section('title', '| Role')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Role & Permission') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('User') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Role & Permission') }}</li>
                            </ol>
                        </nav>
                    </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-neutral">{{ __('Add Role') }}</a>
                        </div>
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
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Role & Permission') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td style="vertical-align: middle" align="center">
                                            <a href="{{ route('roles.show', $role->id) }}"
                                                class="btn btn-sm btn-icon btn-default btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Show">
                                                <span class="btn-inner--icon"><i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                            @can('role-edit')
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen-square"></i>
                                                    </span>
                                                </a>
                                            @endcan
                                            @can('role-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $role->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endcan
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
    @include('roles.remove_script')
@endsection
