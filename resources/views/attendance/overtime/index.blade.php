@section('title', '| Overtime')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Overtime') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Attendance') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Overtime') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        @hasanyrole('admin|supervisor')
                        <a href="{{ route('overtime.history') }}" class="btn btn-sm btn-neutral mt-1">
                            {{ __('Submission history') }}
                        </a>
                        @endhasanyrole
                        <button type="button" class="btn btn-sm btn-neutral mt-1" data-toggle="modal"
                            data-target=".bd-create-overtime">{{ __('Make a submission') }}</button>
                        @include('attendance.overtime.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Overtime') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Employee') }}</th>
                                    <th style="text-align: center">{{ __('Status') }}</th>
                                    <th style="text-align: center">{{ __('Authorized by') }}</th>
                                    @can('overtime-edit')
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
                                    @can('overtime-edit')
                                        <th style="text-align: center">{{ __('Action') }}</th>
                                    @endcan
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($overtimes as $overtime)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $overtime->user->fullname }}</td>
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
                                        @can('overtime-edit')
                                            <td style="vertical-align: middle" align="center">
                                                <a href="{{ route('overtime.edit', $overtime->id) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Review">
                                                    <span class="btn-inner--icon"><i class="fas fa-clipboard-check"></i>
                                                    </span>
                                                </a>
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
@endsection
