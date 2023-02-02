<div class="modal fade bd-config" id="bd-config" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card" style="text-align: start">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="modal-title">{{ __('Presence Config') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('config.update', $config) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Time in') }}</label>
                                    <input class="form-control" name="time_in" value="{{ $config->time_in }}"
                                        type="time" autocomplete="off" required>
                                    @error('time_in')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Time out') }}</label>
                                    <input class="form-control" name="time_out" value="{{ $config->time_out }}"
                                        type="time" autocomplete="off" required>
                                    @error('time_out')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">{!! __('Tolerance time in <sup class="text-danger">* minutes</sup>') !!}</label>
                                    <input class="form-control" name="tolerance_time_in"
                                        value="{{ $config->tolerance_time_in }}" type="number" autocomplete="off"
                                        required>
                                    @error('tolerance_time_in')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label">{!! __('Tolerance time out <sup class="text-danger">* minutes</sup>') !!}</label>
                                    <input class="form-control" name="tolerance_time_out"
                                        value="{{ $config->tolerance_time_out }}" type="number" autocomplete="off"
                                        required>
                                    @error('tolerance_time_out')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                        <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
