@extends('trash.main')
@section('breadcrumb', 'School Trash')
@section('list_trash')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="mb-0">{{__('School')}}</h3>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button onclick="restoreItem(this)" data-id="" data-url="sekolah/restore/" class="btn btn-sm btn-success"><Span>{{__('Restore All')}}</Span></button>
                            <button onclick="deleteItem(this)" data-id="" data-url="sekolah/delete/" class="btn btn-sm btn-youtube"><Span>{{__('Delete All')}}</Span></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table  class="table table-flush" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>{{__('#')}}</th>
                                <th>{{__('School Name')}}</th>
                                <th>{{__('School Address')}}</th>
                                @role('admin')
                                <th style="text-align: center">{{__('Action')}}</th>
                                @endrole
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>{{__('#')}}</th>
                                <th>{{__('School Name')}}</th>
                                <th>{{__('School Address')}}</th>
                                @role('admin')
                                <th style="text-align: center">{{__('Action')}}</th>
                                @endrole
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($sekolah as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama }}</td>
                                    <td>{{ $k->alamat }}</td>
                                    @role('admin')
                                    <td style="vertical-align: middle;" align="center">
                                        <button onclick="restoreItem(this)" data-id="{{$k->id}}" data-url="sekolah/restore/" class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo"></i></button>
                                        <button onclick="deleteItem(this)" data-id="{{$k->id}}" data-url="sekolah/delete/" class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Delete Permanent"><i class="fa fa-trash"></i></button>
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
@endsection
