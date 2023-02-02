@foreach ($pertanyaans as $p)
    <div class="modal fade ModalShow" id="pertanyaan-show-{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h5 class="modal-title" style="text-align: start">{{ __('Show Pertanyaan') }}</h5>
                        <button type="button" href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="card-body pt-0">
                            <div class="row mb-2">
                                <div class="col-md-6" style="text-align: right">
                                    <span class="heading">{{ __('Nama Pertanyaan') }}</span>
                                    <br>
                                    <span class="description">{{ $p->nama }}</span>
                                </div>
                                <div class="col-md-6" style="text-align: left">
                                    <span class="heading">{{ __('Kategori') }}</span>
                                    <br>
                                    <span class="description">{{ $p->kat->nama }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
