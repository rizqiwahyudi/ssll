@section('title','| Task - Edit')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        @hasanyrole('admin|supervisor')
                        <h6 class="h2 text-white d-inline-block mb-0">Edit Task</h6>
                        @endhasanyrole
                        @role('user')
                        <h6 class="h2 text-white d-inline-block mb-0">Upload Work</h6>
                        @endrole
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Task</a></li>
                                @hasanyrole('admin|supervisor')
                                <li class="breadcrumb-item active" aria-current="page">Edit Task</li>
                                @endhasanyrole
                                @role('user')
                                <li class="breadcrumb-item active" aria-current="page">Upload Work</li>
                                @endrole
                            </ol>
                        </nav>
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
                    @hasanyrole('admin|supervisor')
                    <div class="card-header">
                        <h3 class="mb-0">Edit Task : <b>{{ $task->task_name }}</b></h3>
                    </div>
                    @endhasanyrole

                    @role('user')
                    <div class="card-header">
                        <h3 class="mb-0">Upload Work : <b>{{ $task->task_name }}</b></h3>
                    </div>
                    @endrole
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @include('task.formEdit')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>

@endsection
