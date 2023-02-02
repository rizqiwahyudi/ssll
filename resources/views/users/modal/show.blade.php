@foreach ($users as $user)
    <div class="modal fade ModalShow" id="user-show-{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h5 class="modal-title" style="text-align: start">{{ __('Show User') }}</h5>
                        <button type="button" href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Profile card -->
                        <img src="{{ asset('img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                            class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    @if (isset($user->photo))
                                        <a href="#">
                                            <img src="{{ asset('img/profile/' . $user->photo) }}"
                                                class="rounded-circle">
                                        </a>
                                    @else
                                        <a href="#">
                                            <img src="{{ asset('img/profile/team-1.jpg') }}" class="rounded-circle">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row mb--4">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center">
                                        <div>
                                            <span class="heading">{{ $user->fullname }}</span>
                                            <span class="description">{{ $user->registration_number }}</span>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $role)
                                                    @if ($role == 'admin')
                                                        <div class="progress-info mt-1">
                                                            <div class="progress-label">
                                                                <span class="text-success">{{ $role }}</span>
                                                            </div>
                                                        </div>
                                                    @elseif ($role == 'supervisor')
                                                        <div class="progress-info mt-1">
                                                            <div class="progress-label">
                                                                <span class="text-info">{{ $role }}</span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="progress-info mt-1">
                                                            <div class="progress-label">
                                                                <span class="text-warning">{{ $role }}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6" style="text-align: right">
                                    <span class="heading">{{ __('Email') }}</span>
                                    <br>
                                    <span class="description">{{ $user->email }}</span>
                                </div>
                                <div class="col-md-6" style="text-align: left">
                                    <span class="heading">{{ __('Departement') }}</span>
                                    <br>
                                    @if ($user->departement_id != null)
                                        <span class="description">{{ $user->departement->name }}</span>
                                    @else
                                        <span class="description">{{ __('--') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6" style="text-align: right">
                                    <span class="heading">{{ __('Place of Birth') }}</span>
                                    <br>
                                    @if ($user->place_of_birth != null)
                                        <span class="description">{{ $user->place_of_birth }}</span>
                                    @else
                                        <span class="description">{{ __('--') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6" style="text-align: left">
                                    <span class="heading">{{ __('Date of Birth') }}</span>
                                    <br>
                                    @if ($user->date_of_birth != null)
                                        <span class="description">{{ $user->date_of_birth }}</span>
                                    @else
                                        <span class="description">{{ __('--') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6" style="text-align: right">
                                    <span class="heading">{{ __('Gender') }}</span>
                                    <br>
                                    @if ($user->gender != null)
                                        <span class="description">{{ $user->gender }}</span>
                                    @else
                                        <span class="description">{{ __('--') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6" style="text-align: left">
                                    <span class="heading">{{ __('Address') }}</span>
                                    <br>
                                    @if ($user->address)
                                        <span class="description">{{ $user->address }}</span>
                                    @else
                                        <span class="description">{{ __('--') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb--4">
                                <div class="col-md-6" style="text-align: right">
                                    <span class="heading">{{ __('Last Education') }}</span>
                                    <br>
                                    @if ($user->last_education != null)
                                        <span class="description">{{ $user->last_education }}</span>
                                    @else
                                        <span class="description">{{ __('--') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6" style="text-align: left">
                                    <span class="heading">{{ __('Phone') }}</span>
                                    <br>
                                    @if ($user->phone)
                                        <span class="description">{{ $user->phone }}</span>
                                    @else
                                        <span class="description">{{ __('--') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
