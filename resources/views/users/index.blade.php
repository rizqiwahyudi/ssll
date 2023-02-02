@section('title', '| User Management')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('User Management') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('User') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('User Management') }}</li>
                            </ol>
                        </nav>
                    </div>
                    @can('user-create')
                        <div class="col-lg-6 col-5 text-right">
                            <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal"
                                data-target=".bd-create-user">{{ __('Add User') }}</button>
                            @include('users.modal.create')
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
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('User Management') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Users</th>
                                    <th>Created at</th>
                                    <th>Instansi</th>
                                    <th style="text-align: center">Gender</th>
                                    <th style="text-align: center; width: 200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Users</th>
                                    <th>Created at</th>
                                    <th>Instansi</th>
                                    <th style="text-align: center">Gender</th>
                                    <th style="text-align: center; width: 200px">{{ __('Action') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $user->fullname }}</td>
                                        <td style="vertical-align: middle">{{ $user->created_at }}</td>
                                        <td style="vertical-align: middle">
                                            <a href="{{ route('departements.index') }}" class="font-weight-bold">{{ $user->departement->name }}</a>
                                        </td>
                                        <td style="vertical-align: middle" align="center">

                                            @if ($user->gender == 'Male')
                                                <span href="" class="table-action-male" data-toggle="tooltip"
                                                    data-original-title="Male">
                                                    <i class="fas fa-male"></i>
                                                </span>
                                            @elseif($user->gender == "Female")
                                                <span href="" class="table-action-female" data-toggle="tooltip"
                                                    data-original-title="Female">
                                                    <i class="fas fa-female"></i>
                                                </span>
                                            @else
                                                {{ __('--') }}
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle" align="center">
                                            <a href="#" class="btn btn-sm btn-icon btn-default btn-icon-only rounded-circle"
                                                data-toggle="modal" data-target="#user-show-{{ $user->id }}">
                                                <span class="btn-inner--icon" data-toggle="tooltip" data-placement="top"
                                                    title="Show"><i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                            @can('user-edit')
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen-square"></i>
                                                    </span>
                                                </a>
                                            @endcan
                                            @can('user-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $user->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endcan
                                            {{-- <a href="#" class="table-action table-action-show" data-toggle="modal"
                                                data-original-title="Show User"
                                                data-target="#ModalShow{{ $user->id }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="table-action table-action-edit" data-toggle="tooltip"
                                                data-original-title="Edit User">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            <a href="#" class="table-action table-action-delete" data-toggle="modal"
                                                data-original-title="Delete User"
                                                data-target="#ModalDelete{{ $user->id }}">
                                                <i class="fas fa-trash"></i>
                                            </a> --}}
                                            @include('users.modal.show')
                                            {{-- @include('users.modal.delete') --}}
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
    @include('users.remove_script')
@endsection
