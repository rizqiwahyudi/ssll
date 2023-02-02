@section('title', '| Presence')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Presence') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Attendance') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Presence') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('overtime.history') }}" class="btn btn-sm btn-neutral mt-1" data-toggle="modal"
                            data-target=".bd-config">
                            {{ __('Setting Config') }}
                        </a>
                        @include('attendance.presence.config')
                        <div class="dropdown">
                            <a class="btn btn-sm btn-neutral mt-1" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="btn-inner--text">{{ __('Action') }}</span>
                                <span class="btn-inner--icon"><i class="ni ni-bold-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <form action="{{ route('sync') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">{{ __('Sync Log') }}</button>
                                </form>
                                <form action="{{ route('presences.store') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">{{ __('Refresh') }}</button>
                                </form>
                            </div>
                        </div>
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
                        <h3 class="mb-0">{{ __('Presence') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-borderless" style="width: 35%">
                            <tbody>
                                <tr>
                                    <td style="padding-bottom: 0px; padding-top:0px">
                                        <label class="form-control-label">Filter by date range :</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 0px; padding-top:0px">
                                        <div class="row input-daterange align-items-center">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm" id="min"
                                                        name="min" placeholder="Start date">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm" id="max"
                                                        name="max" placeholder="End date">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-flush dataTable" id="myTable" style="width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 7%">{{ __('#') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Time in') }}</th>
                                    <th>{{ __('Time out') }}</th>
                                    <th style="width: 14%">{{ __('Work hours') }}</th>
                                    <th style="width: 25%">{{ __('Name') }}</th>
                                    <th style="text-align: center">{{ __('Description') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Time in') }}</th>
                                    <th>{{ __('Time out') }}</th>
                                    <th>{{ __('Work hours') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th style="text-align: center">{{ __('Description') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($presences as $presence)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $presence->date }}</td>
                                        <td>{{ $presence->time_in }}</td>
                                        <td>{{ $presence->time_out }}</td>
                                        <td>
                                            @php
                                                $raw = gmdate('H:i:s', floor($presence->work_hours * 3600));
                                                $work_hours = explode(':', $raw);
                                            @endphp
                                            @if ($presence->work_hours == '0.00000')
                                                {!! '<span class="text-danger"><b>' . $work_hours[0] . '</b> <small>hours</small><b> ' . $work_hours[1] . '</b> <small>minutes</small></span>' !!}
                                            @else
                                                {!! '<span class="text-success"><b>' . $work_hours[0] . '</b> <small>hours</small><b> ' . $work_hours[1] . '</b> <small>minutes</small></span>' !!}
                                            @endif
                                        </td>
                                        <td>{{ $presence->user->fullname }}</td>
                                        <td align="center">
                                            @if ($presence->description == 'ontime')
                                                <div class="progress-label">
                                                    <span class="text-success">{{ __('On Time') }}</span>
                                                </div>
                                            @elseif($presence->description == 'late')
                                                <div class="progress-label">
                                                    <span class="text-danger">{{ __('Late') }}</span>
                                                </div>
                                            @elseif($presence->description == 'paidleave')
                                                <div class="progress-label">
                                                    <span class="text-danger">{{ __('Paid Leave') }}</span>
                                                </div>
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
@endsection
@section('date-filter')
    <script>
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[1]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );
    </script>
@endsection
