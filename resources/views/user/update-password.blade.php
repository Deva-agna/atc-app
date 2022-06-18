@extends('layout.master')

@section('page', 'Update Password')

@section('title','ATC - Update Password')

@section('konten')
@if(session()->has('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>Sukses!</strong> {{session('sukses')}}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">Update Password</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('password-update') }}" method="post">
            @csrf
            <input type="text" name="id" value="{{ auth()->user()->id }}" hidden>
            <div class="form-group">
                <label class="form-control-label text-muted" for="password_lama">Password Lama <span class="text-danger">*</span></label>
                <input type="password" id="password_lama" name="password_lama" class="form-control form-control-alternative" placeholder="17-08-1975" required autofocus>
                @error('password_lama')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label text-muted" for="password">Password Baru <span class="text-danger">*</span></label>
                <input type="password" id="password" name="password" class="form-control form-control-alternative" required autofocus>
                @error('password')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label text-muted" for="password_confirmation">Konfirmasi Password<span class="text-danger">*</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-alternative" required autofocus>
                @error('password_confirmation')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection