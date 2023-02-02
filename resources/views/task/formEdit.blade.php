<!-- Input groups with icon -->
@hasanyrole('admin|supervisor')
<div class="form-group">
    <label class="form-control-label">{{ __('Task Name') }}</label>
    <div class="input-group input-group-merge">
        <input class="form-control" name="task_name" placeholder="Task Name" type="text"
            value="{{ $task->task_name }}" required>
    </div>
    @error('task_name')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
@endhasanyrole

{{-- <div class="form-group">
    <label class="form-control-label">Asiggnee</label>
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
</div> --}}

@role('user')
<div class="form-group">
    <label class="form-control-label">Your Work</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="file" id="customFileLang" lang="en">
        <label class="custom-file-label" for="customFileLang">Select file</label>
    </div>
    @error('file')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
@endrole
<div class="form-group">
    <label class="form-control-label">Description</label>
    <div class="input-group input-group-merge">
        <input class="form-control" name="description" placeholder="Description or note..." type="text"
            value="{{ $task->description }}">
    </div>
    @error('description')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

@hasanyrole('admin|supervisor')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Deadline') }}</label>
            <div class="input-group input-group-merge">
                <input class="form-control" name="deadline" type="date" value="{{ $task->deadline }}"
                    id="example-date-input">
            </div>
            @error('deadline')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
</div>
@endhasanyrole

{{-- <div class="row input-daterange datepicker align-items-center">
    <div class="col">
        <div class="form-group">
            <label class="form-control-label">Start date</label>
            <input class="form-control" name="start_date" placeholder="Start date" value="{{ $task->start_date }}"
                type="text" required>
            @error('start_date')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label class="form-control-label">Deadline</label>
            <input class="form-control" name="deadline" placeholder="Deadline" value="{{ $task->deadline }}"
                type="date" required>
            @error('deadline')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
</div> --}}

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

@hasanyrole('admin|supervisor')
<div class="form-group">
    <label class="form-control-label">{{ __('Status') }}</label>
    <div class="input-group input-group-merge">
        <select class="form-control" data-toggle="select" name="task_status_id" required>
            @foreach ($statuses as $status)
                @if ($status->id == $task->task_status_id)
                    @php($select = 'selected')
                @else
                    @php($select = '')
                @endif
                <option {{ $select }} value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
        </select>
    </div>
    @error('task_status_id')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
@endhasanyrole

{{-- <div class="form-group" hidden>
    <label class="form-control-label">Assignor</label>
    <div class="input-group input-group-merge">
        <input class="form-control" name="created_by" placeholder="Assignor" type="text"
            value="{{ auth()->user()->id }}">
    </div>
    @error('created_by')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div> --}}

<a href="{{ route('tasks.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
