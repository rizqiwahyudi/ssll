<div class="modal fade bd-create-sekolah" id="bd-create-sekolah" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
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
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="modal-title" style="text-align: start">{{ __('Create New Sekolah') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('sekolahs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Input groups with icon -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="School Name" type="text" name="nama"
                                            required>
                                    </div>
                                    <br>
                                    <div class="input-group input-group-merge">
                                        <input type="file" class="form-control" name="photo">
                                        @error('photo')
                                            <small class="text-danger" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    @error('nama')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <textarea class="form-control" placeholder="Adress" type="text" name="alamat"
                                        rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" href="{{ route('sekolahs.index') }}" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                    <!--form end-->
                </div>
            </div>
        </div>
    </div>
</div>
