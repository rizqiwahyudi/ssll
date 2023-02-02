<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered">
            <tr style="vertical-align: middle">
                <td style="width: 10%">
                    Employee
                </td>
                <td style="width: 5%;">
                    :
                </td>
                <td>
                    <b>{{ $paidLeave->user->fullname }}</b>
                </td>
            </tr>
            <tr style="vertical-align: middle">
                <td>
                    Leave Date
                </td>
                <td>
                    :
                </td>
                <td>
                    <b>{{ $paidLeave->start_date }}</b> {{ __('to') }} <b>{{ $paidLeave->end_date }}</b>
                    &nbsp;
                    ( <span class="text-danger">{{ $interval }} Day</span> )
                </td>
            </tr>
            <tr style="vertical-align: middle">
                <td style="vertical-align: middle">
                    Description
                </td>
                <td style="vertical-align: middle">
                    :
                </td>
                <td>
                    {{ $paidLeave->description }}
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="row mt-1">
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label">{{ __('Process') }}</label>
            <div class="row">
                <div class="col-4">
                    <div class="custom-control custom-radio mb-3">
                        <input name="status" class="custom-control-input" value="authorized" id="customRadio5"
                            type="radio">
                        <label class="custom-control-label" for="customRadio5">Authorized</label>
                    </div>
                </div>
                <div class="col-8">
                    <div class="custom-control custom-radio mb-3">
                        <input name="status" class="custom-control-input" value="rejected" id="customRadio6"
                            type="radio">
                        <label class="custom-control-label" for="customRadio6">Rejected</label>
                    </div>
                </div>
            </div>
            {{-- <div class="input-group input-group-merge">
                <select class="form-control" data-toggle="select" name="status">
                    <option value="">{{ __('Process this submission') }}</option>
                    <option value="authorized">{{ __('Authorized') }}</option>
                    <option value="rejected">{{ __('Rejected') }}</option>
                </select>
            </div> --}}
            @error('status')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-1">
    <div class="col-lg-12 mb-1">
        <a href="{{ route('paidleave.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
        <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
    </div>
</div>
