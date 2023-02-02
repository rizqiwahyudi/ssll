@section('title', '| Task')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Task') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{ __('Task') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Task') }}</li>
                            </ol>
                        </nav>
                    </div>
                    @can('task-create')
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-neutral">{{ __('Add Task') }}</a>
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
                        <h3 class="mb-0">{{ __('Task Management') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable" style="white-space: nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Task Name') }}</th>
                                    @hasanyrole('admin|supervisor')
                                    <th>{{ __('Assigned to') }}</th>
                                    @endhasanyrole
                                    <th>{{ __('Start Date') }}</th>
                                    <th>{{ __('Deadline') }}</th>
                                    <th style="text-align: center">{{ __('Status') }}</th>
                                    <th>{{ __('Assigned by') }}</th>
                                    <th>{{ __('Your Work') }}</th>
                                    <th>{{ __('Submit Status') }}</th>
                                    <th>{{ __('Note') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ '#' }}</th>
                                    <th>{{ __('Task Name') }}</th>
                                    @hasanyrole('admin|supervisor')
                                    <th>{{ __('Assigned to') }}</th>
                                    @endhasanyrole
                                    <th>{{ __('Start Date') }}</th>
                                    <th>{{ __('Deadline') }}</th>
                                    <th style="text-align: center">{{ __('Status') }}</th>
                                    <th>{{ __('Assigned by') }}</th>
                                    <th>{{ __('Your Work') }}</th>
                                    <th>{{ __('Submit Status') }}</th>
                                    <th>{{ __('Note') }}</th>
                                    <th style="text-align: center">{{ __('Action') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle;">{{ $task->task_name }}</td>
                                        @hasanyrole('admin|supervisor')
                                        <td style="vertical-align: middle;">{{ $task->user->fullname }}</td>
                                        @endhasanyrole
                                        <td style="vertical-align: middle;">{{ $task->start_date }}</td>
                                        <td style="vertical-align: middle;">
                                            @if ($task->deadline < Carbon\Carbon::now()->toDateString())
                                                <button data-toggle="modal"
                                                    data-target="#late-notification-{{ $task->id }}"
                                                    class="btn btn-sm btn-outline-danger rounded-pill">{{ $task->deadline }}</button>
                                            @elseif ($task->deadline == Carbon\Carbon::now()->toDateString())
                                                <button data-toggle="modal"
                                                    data-target="#due-today-notification-{{ $task->id }}"
                                                    class="btn btn-sm btn-outline-warning rounded-pill">{{ $task->deadline }}</button>
                                            @else
                                                <button data-toggle="modal"
                                                    data-target="#future-notification-{{ $task->id }}"
                                                    class="btn btn-sm btn-outline-primary rounded-pill">{{ $task->deadline }}</button>
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if ($task->task_status_id == 1)
                                                <div class="progress-wrapper mt--4">
                                                    <div class="progress-info">
                                                        <div class="progress-label">
                                                            <span
                                                                class="text-danger">{{ $task->taskStatus->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 10%;"></div>
                                                    </div>
                                                </div>
                                            @elseif ($task->task_status_id == 2)
                                                <div class="progress-wrapper mt--4">
                                                    <div class="progress-info">
                                                        <div class="progress-label">
                                                            <span>{{ $task->taskStatus->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 80%;"></div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="progress-wrapper mt--4">
                                                    <div class="progress-info">
                                                        <div class="progress-label">
                                                            <span
                                                                class="text-success">{{ $task->taskStatus->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">{{ $task->assignor->fullname }}</td>
                                        <td style="vertical-align: middle;" align="center">
                                            @if (strlen($task->file) > 0)
                                                <a data-toggle="tooltip" data-placement="top"
                                                    title="Attachment is available"
                                                    href="{{ asset('file/task/' . $task->file) }}" target="_blank"><img
                                                        src="{{ asset('file/task/default.png') }}" width="30px"></a>
                                            @else
                                                <img src="{{ asset('file/task/default-null.png') }}" width="30px"
                                                    data-toggle="tooltip" data-placement="top" title="No attachments yet">
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;" align="center">
                                            @if ($task->submitted_at == '')
                                                <div class="progress-label">
                                                    <span class="text-info">{{ __('--') }}</span>
                                                </div>
                                            @elseif ($task->submitted_at < $task->deadline)
                                                    <div class="progress-label">
                                                        <span class="text-success">{{ __('On time') }}</span>
                                                    </div>
                                                @else
                                                    <div class="progress-label">
                                                        <span class="text-danger">{{ __('Late') }}</span>
                                                    </div>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">{{ $task->description }}</td>
                                        <td style="vertical-align: middle;">
                                            {{-- <a href="{{ route('tasks.show', $task) }}"
                                                class="btn btn-sm btn-icon btn-default btn-icon-only rounded-circle"><span
                                                    class="btn-inner--icon"><i class="fas fa-eye"></i></span></a> --}}
                                            @hasanyrole('admin|supervisor')
                                            <a href="{{ route('tasks.edit', $task) }}"
                                                class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <span class="btn-inner--icon"><i class="fas fa-pen-square"></i>
                                                </span>
                                            </a>
                                            @endhasanyrole

                                            @can('task-delete')
                                                <button onclick="deleteItem(this)" data-id="{{ $task->id }}"
                                                    class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            @endcan

                                            @role('user')
                                            @if ($task->task_status_id == 1)
                                                <a href="{{ route('tasks.edit', $task) }}"
                                                    class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                    data-toggle="tooltip" data-placement="top" title="Upload Your Work">
                                                    <span class="btn-inner--icon"><i class="fas fa-upload"></i>
                                                    </span>
                                                </a>
                                            @elseif ($task->task_status_id == 2)
                                                <p class="text-info mb-0">{{ __('Waiting...') }}</p>
                                            @elseif ($task->task_status_id == 3)
                                                <p class="text-success mb-0">{{ __('Accepted') }}</p>
                                            @endif
                                            @endrole
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
    @include('task.alert')
    @include('task.remove_script')
@endsection
