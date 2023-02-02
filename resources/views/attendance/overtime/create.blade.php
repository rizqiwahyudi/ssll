<div class="modal fade bd-create-overtime" id="bd-create-overtime" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="modal-title" style="text-align: center">
                        {{ __('Make a submission') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('overtime.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Input groups with icon -->
                        <div class="row input-daterange datepicker">
                            <div class="col-md-12" style="text-align: start">
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Date') }}</label>
                                    <input class="form-control" name="date" placeholder="overtime date" value="{{ old('date') }}"
                                        type="text" autocomplete="off" required>
                                    @error('date')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: start">
                                <label class="form-control-label">Description</label>
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <textarea maxlength="255" class="form-control" type="text" id="exampleFormControlTextarea1"
                                            placeholder="reason for overtime" rows="3" name="description" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="text-align: start">
                            <button type="button" href="{{ route('overtime.index') }}"
                                class="btn btn-secondary"
                                data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                    <!--form end-->
                </div>
            </div>
        </div>
    </div>
</div>
