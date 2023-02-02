<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('School Name') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-font"></i></span>
                    </div>
                    <input class="form-control" value="{{ $sekolah->nama }}" placeholder="School Name" type="text" name="nama"
                        required>
                </div>
                <br>
                <div class="input-group input-group-merge">
                    <input type="file" value="{{ $sekolah->photo }}" class="form-control" name="photo">
                    @error('photo')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                    @if (strlen($sekolah->photo) > 0)
                        <br>
                        <img src="{{ asset('img/profile/' . $sekolah->photo) }}" width="80px" class="mt-1"
                            style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                    @endif
                </div>
                @error('nama')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Address') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group input-group-merge">
                    <textarea class="form-control" value="{{ $sekolah->alamat }}" placeholder="Adress" type="text" name="alamat"
                    rows="5" required>{{ $sekolah->alamat }}</textarea>
                </div>
                @error('alamat')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<a href="{{ route('sekolahs.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
