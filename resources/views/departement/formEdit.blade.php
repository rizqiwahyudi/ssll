<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Name')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="name" placeholder="Ex : FrontEnd " type="text"
            value="{{ $departement->name }}" required>
    </div>
    @error('name')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Description')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="description" placeholder="Ex : FrontEnd is .... " type="text"
            value="{{ $departement->description }}" required>
    </div>
    @error('description')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
