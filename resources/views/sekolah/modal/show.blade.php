@foreach ($sekolahs as $s)
    <div class="modal fade ModalShow" id="sekolah-show-{{ $s->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h5 class="modal-title" style="text-align: start">{{ __('Show sekolah') }}</h5>
                        <button type="button" href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <img src="{{ asset('img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                            class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    @if (isset($s->photo))
                                        <a href="#">
                                            <img src="{{ asset('img/profile/' . $s->photo) }}"
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
                                            <span class="heading">{{ $s->nama }}</span>
                                            <span class="description">{{ $s->alamat }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
