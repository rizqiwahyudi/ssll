@section('title', '| Overtime')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-8 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Submission History') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('overtime.index') }}">{{ __('Overtime') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Submission History') }}</li>
                            </ol>
                        </nav>
                    </div>
                    {{-- @can('user-create') --}}
                    <div class="col-lg-4 col-5 text-right">
                        <a href="{{ route('overtime.index') }}" class="btn btn-sm btn-neutral">
                            {{ __('Back') }}
                        </a>
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
                        <h3 class="mb-0">{{ __('Overtime Submission - History') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Employee') }}</th>
                                    <th style="text-align: center">{{ __('Date') }}</th>
                                    <th style="text-align: center">{{ __('Status') }}</th>
                                    <th style="text-align: center">{{ __('Authorized by') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Employee') }}</th>
                                    <th style="text-align: center">{{ __('Date') }}</th>
                                    <th style="text-align: center">{{ __('Status') }}</th>
                                    <th style="text-align: center">{{ __('Authorized by') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($historyOvertimes as $overtime)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $overtime->user->fullname }}</td>
                                        <td style="vertical-align: middle" align="center">
                                            <b>{{ $overtime->date }}</b>
                                        </td>
                                        <td style="vertical-align: middle" align="center">
                                            @if ($overtime->status == 'unprocessed')
                                                <div class="progress-label">
                                                    <span class="text-default">{{ $overtime->status }}</span>
                                                </div>
                                            @elseif ($overtime->status == 'authorized')
                                                <div class="progress-label">
                                                    <span class="text-success">{{ $overtime->status }}</span>
                                                </div>
                                            @else
                                                <div class="progress-label">
                                                    <span class="text-danger">{{ $overtime->status }}</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle" align="center">
                                            @if ($overtime->authorized_by != 0)
                                                {{ $overtime->authorizer->fullname }}
                                            @else
                                                <div class="progress-label">
                                                    <span class="text-danger">{{ __('--') }}</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle" align="center">
                                            <a href="{{ route('overtime.export', $overtime->id) }}"
                                                class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Print" target="_blank">
                                                <span class="btn-inner--icon"><i class="fas fa-print"></i>
                                                </span>
                                            </a>
                                            @can('overtime-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $overtime->id }}"
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
    @include('attendance.overtime.remove_script')
@endsection
