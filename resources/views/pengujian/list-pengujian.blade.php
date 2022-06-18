@extends('layout.master')

@section('page', 'Pengujian')

@section('title','Pengujian')

@section('konten')
@if(session()->has('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>Success!</strong> {{session('sukses')}}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
    <span class="alert-text"><strong>Error!</strong> {{session('error')}}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card bg-secondary shadow">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Rating</th>
                                <th scope="col" class="text-center">Theory</th>
                                <th scope="col" class="text-center">Renewed Unit</th>
                                <th scope="col" class="text-center">Examiner</th>
                                <th scope="col" class="text-center">Score</th>
                                <th scope="col" class="text-center">Practical</th>
                                <th scope="col" class="text-center">Renewed Unit</th>
                                <th scope="col" class="text-center">Examiner</th>
                                <th scope="col" class="text-center">Score</th>
                                <th scope="col" class="text-center">Signature and stamp</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengujian_s as $pengujian)
                            @if($pengujian->user_id != auth()->user()->id)
                            <tr>
                                <th>
                                    <p class="text-xs font-weight-bold mb-0">{{$pengujian->user->name}}</p>
                                </th>
                                <th class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">TWR</p>
                                    <p class="text-xs font-weight-bold mb-0">APP</p>
                                </th>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->twrTheory->theory) ? $pengujian->twrTheory->theory : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->appTheory->theory) ? $pengujian->appTheory->theory : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->twrTheory->renewed_until) ? $pengujian->twrTheory->renewed_until : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->appTheory->renewed_until) ? $pengujian->appTheory->renewed_until : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->twrTheory->user->name) ? $pengujian->twrTheory->user->name : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->appTheory->user->name) ? $pengujian->appTheory->user->name : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->twrTheory->score) ? $pengujian->twrTheory->score : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->appTheory->score) ? $pengujian->appTheory->score : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->twrPractical->practical) ? $pengujian->twrPractical->practical : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->appPractical->practical) ? $pengujian->appPractical->practical : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->twrPractical->renewed_until) ? $pengujian->twrPractical->renewed_until : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->appPractical->renewed_until) ? $pengujian->appPractical->renewed_until : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->twrPractical->user->name) ? $pengujian->twrPractical->user->name : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->appPractical->user->name) ? $pengujian->appPractical->user->name : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->twrPractical->score) ? $pengujian->twrPractical->score : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->appPractical->score) ? $pengujian->appPractical->score : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    @if(auth()->user()->id == $pengujian->twrTheory->user_id || auth()->user()->id == $pengujian->appTheory->user_id || auth()->user()->id == $pengujian->twrPractical->user_id || auth()->user()->id == $pengujian->appPractical->user_id)
                                    <a href="/pengujian/{{$pengujian->slug}}/verifikasi" class="badge badge-warning">verifikasi</i></a>
                                    @else
                                    <span>No Access</span>
                                    @endif
                                </td>
                                <td>
                                    @if(auth()->user()->id == $pengujian->twrTheory->user_id || auth()->user()->id == $pengujian->appTheory->user_id || auth()->user()->id == $pengujian->twrPractical->user_id || auth()->user()->id == $pengujian->appPractical->user_id)
                                    <a href="/pengujian/{{$pengujian->slug}}/edit" class="badge badge-success"><i class="fas fa-solid fa-pen"></i></a>
                                    @else
                                    <span>No Access</span>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection