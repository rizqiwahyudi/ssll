<!-- Input groups with icon -->
<div class="form-group">
    <label class="form-control-label">{{__('School')}}</label>
    <div class="input-group input-group-merge">
        <select id="sekolah" class="form-control" name="sekolah" required>
            <option selected disabled>Select School</option>
            @foreach ($school as $s)
                <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endforeach
        </select>
    </div>
    @error('sekolah')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <label class="form-control-label">{{__('Survey By')}}</label>
    <div class="input-group input-group-merge">
        <select id="by" class="form-control" name="by" required>
            <option selected disabled>Select User</option>
            @foreach ($users as $s)
                <option value="{{ $s->id }}">{{ $s->fullname }}</option>
            @endforeach
        </select>
    </div>
    @error('by')
        <small class="text-danger" role="alert">
            {{ $message }}
        </small>
    @enderror
</div>
@php
    $options = ['yes', 'no'];
    $temp_key = [];
@endphp
{{-- @foreach ($pertanyaan as $key => $p)
@php
    array_push($temp_key, $key);
@endphp
<div class="form-group">
    <label class="form-control-label soal">{{ $p->nama }}</label>
    @foreach ($options as $option)
        <div class="custom-control custom-radio mb-3">
            <input name="answer[{{$key}}]" class="custom-control-input" id="{{$option}}-{{$key}}" type="radio" value="{{ $option }}">
            <label class="custom-control-label" for="{{$option}}-{{$key}}">{{ $option }}</label>
        </div>
    @endforeach
</div>
@endforeach --}}

{{-- @php
    $count = 0;
@endphp --}}

@foreach ($kategoris as $key_kat => $kategori)
    <div class="section" id="section-{{$loop->iteration}}" style="display: none">
        @php
            $key_kat += 1;
        @endphp
        @foreach ($kategori->pertanyaans as $key => $p)
            <div class="form-group">
                <label class="form-control-label soal-{{$key_kat}}">{{ $p->nama }}</label>
                @foreach ($options as $option)
                    <div class="custom-control custom-radio mb-3">
                        <input name="answer[{{$p->id}}]" class="custom-control-input" id="{{$option}}-{{$p->id}}" type="radio" value="{{ $option }}">
                        <label class="custom-control-label" for="{{$option}}-{{$p->id}}">{{ $option }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endforeach

<button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
