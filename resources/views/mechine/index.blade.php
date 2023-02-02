@section('title', '| Setting Mechine')
@extends('layouts.main')
@push('css')
    <link href="{{ asset('vendor/DataTables/DataTables-1.10.25/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js') }}"></script>
@endpush
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-left py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Attendance') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Setting Mechine') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Index') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#mechine-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    'url': "{{ route('get.datatables.mechine') }}",
                    'type': 'GET'
                },
                columns: [{
                        data: 'mechine_id',
                        name: 'mechine_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'ip',
                        name: 'ip'
                    },
                    {
                        data: 'port',
                        name: 'port'
                    },
                    {
                        data: 'is_default',
                        name: 'is_default'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        class: 'text-left',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $('#mechine-table').on('draw.dt', function() {
                $('.destroyData').click(function() {
                    var id = $(this).data('id');
                    alertify.confirm('Are you sure to delete data ?').set('onok', function(
                        closeEvent) {
                        $('#formDestroy' + id).submit();
                    }).setHeader('Please Confirm').set('labels', {
                        ok: 'Yes',
                        cancel: 'No'
                    });
                });
            });
        });
    </script>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card card-default">
                    <div class="card-header">
                        Mechine
                        <a href="{{ route('mechine.create') }}" class="btn btn-primary btn-sm float-right">Add </a>
                    </div>
                    <div class="card-body">
                        <table id="mechine-table" class="table table-condensed dataTable no-footer" role="grid">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-left">IP</th>
                                    <th class="text-left">Port</th>
                                    <th class="text-left">Status</th>
                                    <th class="text-left">Created At</th>
                                    <th class="text-left">Updated At</th>
                                    <th class="text-left">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
