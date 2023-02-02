@foreach($data as $user)
<div class="modal fade bd-edit-user" id="bd-edit-user-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h5 class="modal-title" style="text-align: start">{{ __('Update User') }}</h5>
              <button type="button" href="{{ route('users.index') }}" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!-- Card body -->
          <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
              {{ method_field('patch') }}
              {{ csrf_field() }}
              <!-- Input groups with icon -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->username }}" placeholder="Username" type="text" name="username" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input class="form-control" value="" placeholder="Password" id="create_password" type="password" name="password" required>
                      <div class="input-group-append">
                        <span class="input-group-text" id="eyeSlash" onclick="visibility3()"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                        <span class="input-group-text" id="eyeShow" style="display: none;" onclick="visibility3()"><i class="fa fa-eye" aria-hidden="true"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->fullname }}" placeholder="Fullname" type="text" name="fullname" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->email }}" placeholder="Email address" type="email" name="email" required>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                      </div>
                        {{-- <select name="roles[]" class="form-control" aria-label="Default select example" required>
                        <option selected disabled>Select Role</option>
                        @foreach($roles as $role)
                        <option value="{{$role->name}}" {{($role->name === $userRole->name) ? 'Selected' : ''}}>{{$role->name}}</option>
                        @endforeach
                        </select> --}}
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                      </div>
                      <select class="form-control" data-toggle="select" name="departement_id" required>
                        <option selected disabled>Select Departement</option>
                        @foreach($depart as $d)
                        @if ($d->id == $user->departement_id)
                            @php ($selected = 'selected')
                        @else
                            @php ($selected = 'selected')
                        @endif
                        <option {{ $selected }} value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->place_of_birth }}" placeholder="Place of birth" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input class="form-control datepicker" value="{{ $user->date_of_birth }}" placeholder="Date of birth" type="text">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                      </div>
                      <form>
                        <select class="form-control" data-toggle="select" name="gender">   
                                <option value="{{ $user->gender }}" selected disabled>{{ $user->gender }}</option>
                                @if($user->gender == "Male")
                                  <option value="Female">Female</option>
                                @elseif($user->gender == null)
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option> 
                                @elseif($user->gender == "Female")
                                  <option value="Male">Male</option>   
                                @endif
                          {{-- @foreach( $data as $user)
                          @if ($user->gender == 'Male')
                            @php ($selected = 'selected')
                        @else
                            @php ($selected = 'selected')
                        @endif
                          <option {{ $selected }} value="{{ $user->gender }}">{{ $user->gender }}</option>
                          @endforeach --}}
                        </select>
                      </form>
                      <div class="input-group-append">
                        <span class="input-group-text"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-map"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->address }}" placeholder="Address" type="text">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                      </div>
                        <select class="form-control" data-toggle="select" name="last_education">
                          <option value="{{ $user->last_education }}" selected disabled>{{ $user->last_education }}</option>
                          @if($user->last_education == $datas->last_education)
                          <option value="SMA Sederajat">SMA Sederajat</option>
                          <option value="D2">D2</option>
                          <option value="D3">D3</option>
                          <option value="D4/S1">D4/S1</option>
                          <option value="S2">S2</option>
                          @else
                          <option value="SMA Sederajat">SMA Sederajat</option>
                          <option value="D2">D2</option>
                          <option value="D3">D3</option>
                          <option value="D4/S1">D4/S1</option>
                          <option value="S2">S2</option>
                          @endif
                        </select>
                      <div class="input-group-append">
                        <span class="input-group-text"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input class="form-control datepicker" value="{{ $user->date_of_entry }}" placeholder="Date of entry" type="text" name="date_of_entry">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-registered"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->registration_number }}" placeholder="Registration number" type="number" name="registration_number">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->nik }}" placeholder="NIK" type="number" name="nik">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-building"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->npwp }}" placeholder="NPWP" type="number" name="npwp">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                      </div>
                      <input class="form-control" value="{{ $user->phone }}" placeholder="Phone" type="number" name="phone">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" href="{{ route('users.index') }}" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </form>
            <!--form end-->
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach