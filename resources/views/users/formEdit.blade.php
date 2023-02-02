<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Username') }}</label>
            <div class="input-group input-group-merge">
                <input type="text" value="{{ $user->username }}" class="form-control" name="username"
                    placeholder="Username" required>
                @error('username')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Full Name') }}</label>
            <div class="input-group input-group-merge">
                <input type="text" value="{{ $user->fullname }}" class="form-control" name="fullname"
                    placeholder="Full Name" required>
                @error('fullname')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <label class="form-control-label">{{ __('Email') }}</label>
            <div class="input-group input-group-merge">
                <input type="email" value="{{ $user->email }}" class="form-control" name="email" placeholder="Email"
                    required>
                @error('email')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Place of Birth') }}</label>
            <div class="input-group input-group-merge">
                <input type="text" value="{{ $user->place_of_birth }}" class="form-control" name="place_of_birth"
                    placeholder="Place of Birth" required>
                @error('place_of_birth')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Date of Birth') }}</label>
            <div class="input-group input-group-merge">
                <input type="date" value="{{ $user->date_of_birth }}" class="form-control" name="date_of_birth"
                    placeholder="Date of Birth" required>
                @error('date_of_birth')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <label class="form-control-label">{{ __('Address') }}</label>
            <div class="input-group input-group-merge">
                <input type="text" value="{{ $user->address }}" class="form-control" name="address"
                    placeholder="Address" required>
                @error('address')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Gender') }}</label>
            <div class="input-group input-group-merge">
                <select class="form-control" data-toggle="select" name="gender">
                    <option value="" selected>{{ __('Select gender') }}</option>
                    @php
                        $male = '';
                        $female = '';
                    @endphp
                    @if ($user->gender == 'Male')
                        @php
                            $male = 'selected';
                        @endphp
                    @elseif($user->gender == 'Female')
                        @php
                            $female = 'selected';
                        @endphp
                    @else
                        @php
                            $male = '';
                            $female = '';
                        @endphp
                    @endif
                    <option value="Male" {{ $male }}>{{ __('Male') }}</option>
                    <option value="Female" {{ $female }}>{{ __('Female') }}</option>
                </select>
                @error('gender')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Last Education') }}</label>
            <div class="input-group input-group-merge">
                <select class="form-control" data-toggle="select" name="last_education">
                    <option value="" selected>{{ __('Select last education') }}</option>
                    @php
                        $sma = '';
                        $d2 = '';
                        $d3 = '';
                        $d4_s1 = '';
                        $s2 = '';
                    @endphp
                    @if ($user->last_education == 'SMA/Sederajat')
                        @php
                            $sma = 'selected';
                        @endphp
                    @elseif($user->last_education == 'D2')
                        @php
                            $d2 = 'selected';
                        @endphp
                    @elseif($user->last_education == 'D3')
                        @php
                            $d3 = 'selected';
                        @endphp
                    @elseif($user->last_education == 'D4/S1')
                        @php
                            $d4_s1 = 'selected';
                        @endphp
                    @elseif($user->last_education == 'S2')
                        @php
                            $s2 = 'selected';
                        @endphp
                    @endif
                    <option value="SMA/Sederajat" {{ $sma }}>{{ __('SMA/Sederajat') }}</option>
                    <option value="D2" {{ $d2 }}>{{ __('D2') }}</option>
                    <option value="D3" {{ $d3 }}>{{ __('D3') }}</option>
                    <option value="D4/S1" {{ $d4_s1 }}>{{ __('D4/S1') }}</option>
                    <option value="S2" {{ $s2 }}>{{ __('S2') }}</option>
                </select>
                @error('last_edication')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Phone') }}</label>
            <div class="input-group input-group-merge">
                <input type="text" value="{{ $user->phone }}" class="form-control" name="phone" placeholder="Phone"
                    maxlength="15" required>
                @error('phone')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Photo') }}</label>
            <div class="input-group input-group-merge">
                <input type="file" value="{{ $user->photo }}" class="form-control" name="photo">
                @error('photo')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            @if (strlen($user->photo) > 0)
                <img src="{{ asset('img/profile/' . $user->photo) }}" width="80px" class="mt-1" style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Departement') }}</label>
            <div class="input-group input-group-merge">
                <select name="departement_id" data-toggle="select" class="form-control" required>
                    <option value="" selected>Select Departement</option>
                    @foreach ($depart as $departement)
                        <option value="{{ $departement->id }}"
                            {{ $departement->id == $user->departement_id ? 'selected' : '' }}>
                            {{ $departement->name }}
                        </option>
                    @endforeach
                </select>
                @error('departement_id')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Role') }}</label>
            <div class="input-group input-group-merge">
                <select name="roles[]" data-toggle="select" class="form-control" required>
                    <option value="" selected>Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $role->name === $userRole->name ? 'Selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('roles')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>

<a href="{{ route('users.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
