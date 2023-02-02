{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}
</div>
</div>
</div>
</div>
</div>
@endsection--}}
@section('title','| Cleaner')
@extends('layouts.main')
@section('content')
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">{{ __('Setting') }}</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Cleaner') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Default</li>
                            <li class="breadcrumb-item"><a href="{{ route('clearall') }}"class="btn btn-sm btn-icon btn-warning" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                <span class="btn-inner--text">Clear All</span></a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">View Clear</h5>
                            <span class="h2 font-weight-bold mb-0">Clear view cache</span>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('viewclear') }}" type="button" class="btn btn-facebook btn-icon-only rounded-circle">
                                <span class="btn-inner--icon"><i class="fas fa-chalkboard"></i></span>
                            </a>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Route Clear</h5>
                            <span class="h2 font-weight-bold mb-0">Clear Route cache</span>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('routeclear') }}" type="button" class="btn btn-facebook btn-icon-only rounded-circle">
                                <span class="btn-inner--icon"><i class="fas fa-route"></i></span>
                            </a>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Config Clear</h5>
                            <span class="h2 font-weight-bold mb-0">Clear config cache</span>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('configclear') }}" type="button" class="btn btn-facebook btn-icon-only rounded-circle">
                                <span class="btn-inner--icon"><i class="fas fa-cog"></i></span>
                            </a>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Cache Clear</h5>
                            <span class="h2 font-weight-bold mb-0">Clear cache recent</span>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('cacheclear') }}" type="button" class="btn btn-facebook btn-icon-only rounded-circle">
                                <span class="btn-inner--icon"><i class="fas fa-history"></i></span>
                            </a>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('nav.footer')
</div>

@endsection