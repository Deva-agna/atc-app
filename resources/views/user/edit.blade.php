@extends('layout.master')

@section('page', 'Edit User')

@section('title','ATC - Edit User')

@section('konten')
<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">Edit</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('user-update') }}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$user->id}}">
            <h6 class="heading-small text-muted mb-4">I. Type of License</h6>
            <div class="pl-lg-4">
                <h6 class="heading-small text-muted">1. Junior Air Traffic Controller License</h6>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="license_number_one">License Number</label>
                            <input type="number" id="license_number_one" name="license_number_one" class="form-control form-control-alternative" value="{{ old('license_number_one', $user->biodata->license_number_one) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="effected_since_one">Effected since</label>
                            <input type="text" id="effected_since_one" name="effected_since_one" class="form-control form-control-alternative" value="{{old('effected_since_one', $user->biodata->effected_since_one)}}">
                        </div>
                    </div>
                </div>
                <h6 class="heading-small text-muted">2. Junior Air Traffic Controller License</h6>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="license_number_two">License Number</label>
                            <input type="number" id="license_number_two" name="license_number_two" class="form-control form-control-alternative" value="{{old('license_number_two', $user->biodata->license_number_two)}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="effected_since_two">Effected since</label>
                            <input type="text" id="effected_since_two" name="effected_since_two" class="form-control form-control-alternative" value="{{old('effected_since_two', $user->biodata->effected_since_two)}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label text-muted" for="name">II. Name of Holder (In Full) <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control form-control-alternative" placeholder="Masukan Nama Lengkap" value="{{old('name', $user->name)}}">
                @error('name')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label text-muted" for="email">III. Email <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" class="form-control form-control-alternative" placeholder="name@example.com" value="{{old('email', $user->email)}}">
                @error('email')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="birth" class="form-control-label text-muted">IV. Place and Date of Birth <span class="text-danger">*</span></label>
                <input class="form-control form-control-alternative" name="birth" type="date" value="{{old('birth', $user->biodata->birth)}}" id="birth">
                @error('birth')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label text-muted" for="nationality">V. Nationality <span class="text-danger">*</span></label>
                <input type="text" id="nationality" name="nationality" class="form-control form-control-alternative" placeholder="Indonesia" value="{{old('nationality', $user->biodata->nationality)}}">
                @error('nationality')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sex" class="form-control-label text-muted">VI. Sex <span class="text-danger">*</span></label>
                <select class="form-control form-control-alternative" name="sex" id="sex">
                    <option value="">Pilih</option>
                    <option value="male" {{$user->biodata->sex == 'male' ? 'selected' : ''}}>Male</option>
                    <option value="female" {{$user->biodata->sex == 'female' ? 'selected' : ''}}>Female</option>
                </select>
                @error('sex')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address" class="form-control-label text-muted">VII. Address <span class="text-danger">*</span></label>
                <input class="form-control form-control-alternative" name="address" type="text" value="{{old('address', $user->biodata->address)}}" id="address">
                @error('address')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <h6 class="heading-small text-muted mb-4">VIII. Rating</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="rating_one">1</label>
                            <input type="text" id="rating_one" name="rating_one" class="form-control form-control-alternative" value="{{old('rating_one', $user->biodata->rating_one)}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="rating_two">2</label>
                            <input type="text" id="rating_two" name="rating_two" class="form-control form-control-alternative" value="{{old('rating_two', $user->biodata->rating_two)}}">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="{{route('user')}}" class="btn btn-default" type="submit">Kembali</a>
        </form>
    </div>
</div>
@endsection