<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Kategori Name') }}</label>
            <div class="input-group input-group-merge">
                <input type="text" value="{{ $kategori->nama }}" class="form-control" name="nama"
                    placeholder="Nama" required>
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
            <label class="form-control-label">{{ __('Priority') }}</label>
            <div class="input-group input-group-merge">
                <input type="number" value="{{ $kategori->prioritas }}" class="form-control" name="prioritas"
                    placeholder="Prority" required>
                @error('prioritas')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<a href="{{ route('kategoris.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
