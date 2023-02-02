@section('title', '| Profile')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-profile">
                    <img src="{{ asset('img/profile/background-default.png') }}" alt="Image placeholder"
                        class="card-img-top" style="width: 100%; background-position:center;">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    @if ($user->photo != null)
                                        <img src="img/profile/{{ $user->photo }}" class="rounded-circle">
                                    @elseif($user->photo == null)
                                        <img src="{{ asset('img/profile/user-default.png') }}" class="rounded-circle">
                                    @endif

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    {{-- <div>
                                        <span class="heading">{{ $count }}</span>
                                        <span class="description">Task</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ $countO }}</span>
                                        <span class="description">Overtime</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ $countP }}</span>
                                        <span class="description">PaidLeave</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="h3">
                                {{ auth()->user()->fullname }}<span class="font-weight-light">,
                                    {{ \Carbon\Carbon::parse(auth()->user()->date_of_birth)->age }} tahun</span>
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin"></i>{{ auth()->user()->place_of_birth }},
                                {{ auth()->user()->date_of_birth }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Edit User') }} : <b>{{ auth()->user()->fullname }}</b>
                        </h3>
                    </div>
                    <!-- Reset Password -->
                    <div class="card-body">
                        <form action="{{ route('users.reset', auth()->user()->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            @include('formReset')
                        </form>
                    </div>
                    <!-- Card body -->
                </div>
            </div>
            <div class="col-lg-12" style="margin: 0 auto">
                <div class="card">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('profileupdate', auth()->user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                @include('formEdit')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>

@endsection
