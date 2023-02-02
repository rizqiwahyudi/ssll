@extends('trash.main')
@section('breadcrumb', 'Users Trash')
@section('list_trash')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-0">{{__('Users')}}</h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button onclick="restoreItem(this)" data-id="" data-url="users/restore/" class="btn btn-sm btn-success"><Span>{{__('Restore All')}}</Span></button>
                        <button onclick="deleteItem(this)" data-id="" data-url="users/delete/" class="btn btn-sm btn-youtube"><Span>{{__('Delete All')}}</Span></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive py-2">
                <table class="table table-flush" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>Users</th>
                            <th>Created at</th>
                            <th>Instansi Name</th>
                            <th style="text-align: center">Gender</th>
                            <th style="text-align: center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>Users</th>
                            <th>Created at</th>
                            <th>Instansi Name</th>
                            <th style="text-align: center">Gender</th>
                            <th style="text-align: center">{{ __('Action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle">{{ $user->fullname }}</td>
                                <td style="vertical-align: middle">{{ $user->created_at }}</td>
                                <td style="vertical-align: middle">
                                    <a href="#" class="font-weight-bold">{{ $user->departement->name }}</a>
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
                                    <button onclick="restoreItem(this)" data-id="{{$user->id}}" data-url="users/restore/" class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo"></i></button>
                                    <button onclick="deleteItem(this)" data-id="{{$user->id}}" data-url="users/delete/" class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Delete Permanent"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
