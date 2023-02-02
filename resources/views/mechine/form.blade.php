@push('css')
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('.select2').select2({
        placeholder : 'Please select',
        tags: true
    });
});
</script>
@endpush
<div class="row">
    <div class="col-md-6 mb-3">
        <label>Mechine Name *</label>
        {!! Form::text('name', null, array('placeholder' => 'Must be Filled', 'class' => 'form-control', 'required' => 'required')) !!}
        <small class="text-muted">I'll show as mechine option</small>
        <div class="invalid-feedback">
            Mechine name must be filled.
        </div>
        <br><br>
        <label>IP *</label>
        {!! Form::text('ip', null, array('placeholder' => 'Must be Filled', 'class' => 'form-control', 'required' => 'required')) !!}
        <small class="text-muted">Fill as IP Address</small>
        <div class="invalid-feedback">
            IP Address must be filled.
        </div>
        <br><br>
        <label>Password</label>
        {!! Form::text('password', null, array('class' => 'form-control')) !!}
        <small class="text-muted">Needed for connect to Fingerprint mechine</small>
        <div class="invalid-feedback"></div>
    </div>
    <div class="col-md-6 mb-3">
        <label>Port *</label>
        {!! Form::text('port', null, array('placeholder' => 'Must be Filled', 'class' => 'form-control', 'required' => 'required')) !!}
        <small class="text-muted">Needed for connect to Fingerprint mechine</small>
        <div class="invalid-feedback">
            Port must be filled
        </div>
        <br><br>
        <label>Set Default *</label>
        {!! Form::select('is_default', array('0' => 'TIDAK', '1' => 'YA'), null, ['class' => 'form-control select2', 'required' => 'required']) !!}
        <small class="text-muted">Identify Default Mechine.</small>
        <div class="invalid-feedback"></div>
    </div>
    <div class="col-md-12">
        <hr class="mb-4">
        <button class="btn btn-md btn-warning my-2" type="reset">Reset</button>
        <button class="btn btn-md btn-primary my-2 float-right" type="submit">Submit</button>
    </div>
</div>
