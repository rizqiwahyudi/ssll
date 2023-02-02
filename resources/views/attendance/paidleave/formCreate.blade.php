<div class="row input-daterange datepicker align-items-center">
    <div class="col">
        <div class="form-group">
            <label class="form-control-label">{{ __('Start date') }}</label>
            <input class="form-control" name="start_date" placeholder="Start date" value="{{ old('start_date') }}"
                type="text" autocomplete="off" required>
            @error('start_date')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label class="form-control-label">{{ __('End date') }}</label>
            <input class="form-control" name="end_date" placeholder="End date" value="{{ old('end_date') }}"
                type="text" autocomplete="off" required>
            @error('end_date')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label">{{ __('Description') }}</label>
    <div class="input-group input-group-merge">
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"
            placeholder="Reason for Paid Leave"></textarea>
    </div>
    @error('description')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Back') }}</button>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
