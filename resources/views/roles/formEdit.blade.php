<div class="form-group">
    <label class="form-control-label">{{ __('Name') }}</label>
    <div class="input-group input-group-merge">
        <input type="text" value="{{ $role->name }}" class="form-control" name="name" placeholder="Name" required>
    </div>
</div>

<div class="form-group">
    <label class="form-control-label">{{ __('Permission') }}</label>
    <div class="input-group input-group-merge">
        <div class="row">
            @foreach ($permission as $value)
                <div class="col-xl-3 col-md-6 mb--4">
                    <div class="card card-stats shadow-none">
                        <div class="card-body">
                            <div class="row justify-content-md-center">
                                <table class="table table-borderless table-active" style="border-radius: 25px">
                                    <tr>
                                        <td>
                                            <label class="custom-toggle">
                                                <input type="checkbox" value="{{ $value->id }}" name="permission[]"
                                                    type="checkbox" id="flexSwitchCheckDefault"
                                                    @if (in_array($value->id, $rolePermissions)) checked="1" @endif />
                                                <span class="custom-toggle-slider rounded-circle"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label mt-0"
                                                for="flexSwitchCheckDefault">{{ $value->name }}
                                            </label>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<a href="{{ route('roles.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
