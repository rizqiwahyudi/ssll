<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{ __('Task Name') }}</label>
    <div class="input-group input-group-merge">
        <input class="form-control form-control" name="task_name" placeholder="Task Name" type="text"
            value="{{ old('task_name') }}" required>
    </div>
    @error('task_name')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{ __('Asiggnee') }}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="user_id" required>
            <option value="" selected>Assigned to ..</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->fullname }}</option>
            @endforeach
        </select>
    </div>
    @error('user_id')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group" hidden>
    <label class="form-control-label">{{ __('Your Work') }}</label>
    <div class="dropzone dropzone-single mb-3" data-toggle="dropzone" data-dropzone-url="http://">
        <div class="fallback">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="file_description" id="projectCoverUploads">
                <label class="custom-file-label" for="projectCoverUploads">{{ __('Choose file') }}</label>
            </div>
        </div>
        <div class="dz-preview dz-preview-single">
            <div class="dz-preview-cover">
                <img class="dz-preview-img" src="..." alt="..." data-dz-thumbnail>
            </div>
        </div>
    </div>
    <label class="form-control-label">{{ __('Description') }}</label>
    <div class="input-group input-group-merge">
        <input class="form-control" name="description" placeholder="Description of your work ..." type="text"
            value="{{ old('description') }}">
    </div>
</div>

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
            <label class="form-control-label">{{ __('Deadline') }}</label>
            <input class="form-control" name="deadline" placeholder="Deadline" value="{{ old('deadline') }}"
                type="text" autocomplete="off" required>
            @error('deadline')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
</div>

{{-- <div class="form-group">
    <label class="form-control-label">Status</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="task_status_id">
            <option value="" selected>Task Status</option>
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
        </select>
    </div>
    @error('status')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div> --}}

<div class="form-group" hidden>
    <label class="form-control-label">{{ __('Status') }}</label>
    <div class="input-group input-group-merge">
        <input class="form-control" name="task_status_id" placeholder="Status" type="text" value="1">
    </div>
    @error('task_status_id')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group" hidden>
    <label class="form-control-label">{{ __('Assignor') }}</label>
    <div class="input-group input-group-merge">
        <input class="form-control" name="created_by" placeholder="Assignor" type="text"
            value="{{ auth()->user()->id }}">
    </div>
    @error('created_by')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<a href="{{ route('tasks.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
