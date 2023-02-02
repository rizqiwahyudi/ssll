<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('Salary to')}}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="user_id" required>
            <option value="" selected>{{__('Salary to')}} ..</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->fullname }}</option>
            @endforeach
        </select>
    </div>
    @error('type_id')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Date')}}</label>
        <input class="form-control datepicker" name="date" placeholder="Select date" type="text" autocomplete="off">
        @error('date')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Salary Type')}}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="salary_type_id" required>
            <option value="" selected>Salary Type</option>
            @foreach ($salarytypes as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    @error('type')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Nominal')}}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="nominal" placeholder="Ex : 15000000" type="text"
            value="{{ old('nominal') }}" required>
    </div>
    @error('nominal')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
