@section('title', '| Salary')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Salary') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Salary') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        @can('salary-create')
                            <a href="/salaries/create" class="btn btn-sm btn-neutral">{{ __('Add salary') }}</a>
                        @endcan
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
                        <h3 class="mb-0">{{ __('Salaries') }}</h3>
                        <p class="text-sm mb-0">
                            {{ __('This page for Admin') }}
                        </p>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Nominal') }}</th>
                                    @role('admin')
                                    <th>{{ __('Action') }}</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Nominal') }}</th>
                                    @role('admin')
                                    <th>{{ __('Action') }}</th>
                                    @endrole
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    function idr($salary)
                                    {
                                        $result = 'Rp. ' . number_format($salary, 2, ',', '.');
                                        return $result;
                                    }
                                @endphp
                                @foreach ($salaries as $salary)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $salary->user->username }}</td>
                                        <td>{{ $salary->date }}</td>
                                        <td>{{ $salary->type->name }}</td>
                                        <td>{{ idr($salary->nominal) }}</td>
                                        @role('admin')
                                        <td style="vertical-align: middle;">
                                            {{-- <a href="{{ route('salaries.show', $salary) }}"
                                                class="btn btn-sm btn-icon btn-default btn-icon-only rounded-circle"><span
                                                    class="btn-inner--icon"><i class="fas fa-eye"></i></span></a> --}}
                                            @can('salary-edit')
                                                <a href="{{ route('salaries.edit', $salary) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><span
                                                        class="btn-inner--icon"><i class="fas fa-pen-square"></i></span></a>
                                            @endcan
                                            @can('salary-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $salary->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endcan
                                        </td>
                                        @endrole
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
        @include('salary.remove_script')
    </div>
    </div>

@endsection
