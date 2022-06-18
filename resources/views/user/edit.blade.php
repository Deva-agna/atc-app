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
        <form action="{{ route('user-update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="imgOld" value="{{ $user->biodata->image }}">
            <h6 class="heading-small text-muted mb-4">I. Type of License</h6>
            <div class="pl-lg-4">
                <h6 class="heading-small text-muted">1. Junior Air Traffic Controller License</h6>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="license_number_one">License Number</label>
                            <input type="number" id="license_number_one" name="license_number_one" class="form-control form-control-alternative" value="{{ old('license_number_one', $user->license_number_one) }}">
                            @error('license_number_one')
                            <div class="invalid-feedback" style="display: inline;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="effected_since_one">Effected since</label>
                            <input type="text" id="effected_since_one" name="effected_since_one" class="form-control form-control-alternative" value="{{old('effected_since_one', $user->effected_since_one)}}">
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
                <label for="birth" class="form-control-label text-muted">III. Place and Date of Birth <span class="text-danger">*</span></label>
                <input class="form-control form-control-alternative" name="birth" type="date" value="{{old('birth', $user->biodata->birth)}}" id="birth">
                @error('birth')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label text-muted" for="nationality">IV. Nationality <span class="text-danger">*</span></label>
                <input type="text" id="nationality" name="nationality" class="form-control form-control-alternative" placeholder="Indonesia" value="{{old('nationality', $user->biodata->nationality)}}">
                @error('nationality')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sex" class="form-control-label text-muted">V. Sex <span class="text-danger">*</span></label>
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
                <label for="address" class="form-control-label text-muted">VI. Address <span class="text-danger">*</span></label>
                <input class="form-control form-control-alternative" name="address" type="text" value="{{old('address', $user->biodata->address)}}" id="address">
                @error('address')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <h6 class="heading-small text-muted mb-4">VII. Rating</h6>
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
            <div class="form-group">
                <label for="role" class="form-control-label text-muted">VIII. Level User <span class="text-danger">*</span></label>
                <select class="form-control form-control-alternative" name="role" id="role">
                    <option value="">Pilih</option>
                    <option value="examiner" {{$user->role == 'examiner' ? 'selected' : ''}}>Examiner</option>
                    <option value="senior" {{$user->role == 'senior' ? 'selected' : ''}}>Senior</option>
                </select>
                @error('role')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label text-muted" for="image">IX. Select Image</label>
                @if($user->biodata->image)
                <img src="{{ asset('img/'. $user->biodata->image) }}" class="img-fluid img-preview mb-3 col-sm-5 d-block">
                @else
                <img src="" class="img-fluid img-preview mb-3 col-sm-5 d-block">
                @endif
                <input type="file" name="image" class="form-control form-control-alternative" id="image" accept="image/*" onchange="previewImage()">
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="{{route('user')}}" class="btn btn-default" type="submit">Kembali</a>
        </form>
    </div>
</div>
@endsection

@section('script')

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection