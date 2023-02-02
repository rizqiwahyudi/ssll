@section('title', '| Paid Leave')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Paid Leave') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Attendance') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Paid Leave') }}</li>
                            </ol>
                        </nav>
                    </div>
                    {{-- @can('user-create') --}}
                    <div class="col-lg-6 col-5 text-right">
                        @hasanyrole('admin|supervisor')
                        <a href="{{ route('paidleave.history') }}" class="btn btn-sm btn-neutral mt-1">
                            {{ __('Submission history') }}
                        </a>
                        @endhasanyrole
                        <button type="button" class="btn btn-sm btn-neutral mt-1" data-toggle="modal"
                            data-target=".bd-create-paidleave">{{ __('Make a submission') }}</button>
                        @include('attendance.paidleave.create')
                    </div>
                    {{-- @endcan --}}
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
                        <h3 class="mb-0">{{ __('Paid Leave') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Employee') }}</th>
                                    <th style="text-align: center">{{ __('Status') }}</th>
                                    <th style="text-align: center">{{ __('Authorized by') }}</th>
                                    @can('paidleave-edit')
                                        <th style="text-align: center">{{ __('Action') }}</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Employee') }}</th>
                                    <th style="text-align: center">{{ __('Status') }}</th>
                                    <th style="text-align: center">{{ __('Authorized by') }}</th>
                                    @can('paidleave-edit')
                                        <th style="text-align: center">{{ __('Action') }}</th>
                                    @endcan
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($paidLeaves as $paidLeave)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $paidLeave->user->fullname }}</td>
                                        <td style="vertical-align: middle" align="center">
                                            @if ($paidLeave->status == 'unprocessed')
                                                <div class="progress-label">
                                                    <span class="text-default">{{ $paidLeave->status }}</span>
                                                </div>
                                            @elseif ($paidLeave->status == 'authorized')
                                                <div class="progress-label">
                                                    <span class="text-success">{{ $paidLeave->status }}</span>
                                                </div>
                                            @else
                                                <div class="progress-label">
                                                    <span class="text-danger">{{ $paidLeave->status }}</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle" align="center">
                                            @if ($paidLeave->authorized_by != 0)
                                                {{ $paidLeave->authorizer->fullname }}
                                            @else
                                                <div class="progress-label">
                                                    <span class="text-danger">{{ __('--') }}</span>
                                                </div>
                                            @endif
                                        </td>
                                        @can('paidleave-edit')
                                            <td style="vertical-align: middle" align="center">
                                                <a href="{{ route('paidleave.edit', $paidLeave->id) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Review">
                                                    <span class="btn-inner--icon"><i class="fas fa-clipboard-check"></i>
                                                    </span>
                                                </a>
                                                {{-- @can('user-edit') --}}
                                                {{-- <a href="{{ route('paidLeave.edit', $paidLeave->id) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <span class="btn-inner--icon"><i class="fas fa-pen-square"></i>
                                                    </span>
                                                </a> --}}
                                                {{-- @endcan --}}
                                                {{-- @can('user-delete') --}}
                                                {{-- <button onclick="deleteItem(this)" data-id="{{ $paidLeave->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i>
                                                </button> --}}
                                                {{-- @endcan --}}
                                            </td>
                                        @endcan
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
    @include('attendance.paidleave.remove_script')
@endsection
