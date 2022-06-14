@extends('layout.master')

@section('page', 'Tambah User')

@section('title','ATC - Tambah User')

@section('konten')
<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">New account</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('user-store') }}" method="post">
            @csrf
            <h6 class="heading-small text-muted mb-4">User Informasi</h6>
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control form-control-alternative" placeholder="Masukan Nama Lengkap" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback" style="display: inline;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-alternative" placeholder="name@example.com" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback" style="display: inline;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                    <input class="form-control form-control-alternative" name="tanggal_lahir" type="date" value="{{old('tanggal_lahir')}}" id="tanggal_lahir">
                    @error('tanggal_lahir')
                    <div class="invalid-feedback" style="display: inline;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <select class="form-control form-control-alternative" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">Pilih</option>
                        <option value="male">Laki - Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div class="invalid-feedback" style="display: inline;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-control-label">Alamat</label>
                    <input class="form-control form-control-alternative" name="alamat" type="text" value="{{old('alamat')}}" id="alamat">
                    @error('alamat')
                    <div class="invalid-feedback" style="display: inline;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection