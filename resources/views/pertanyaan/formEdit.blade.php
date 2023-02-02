<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('pertanyaan Name') }}</label>
            <div class="input-group input-group-merge">
                <textarea class="form-control" placeholder="Pertanyaan" type="text" name="nama"
                rows="5" value="{{ $pertanyaan->nama }}" required>{{ $pertanyaan->nama }}</textarea>
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
            <div class="input-group input-group-merge">
                <label class="form-control-label" for="exampleFormControlTextarea1">Kategori</label>
                <select class="form-control" data-toggle="select" name="kategori" required>
                    <option value="{{ $pertanyaan->kategori }}" selected style="align-items: center">{{ $pertanyaan->kategori }}</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                </select>
                @error('prioritas')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<a href="{{ route('pertanyaans.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
