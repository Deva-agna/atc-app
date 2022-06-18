@extends('layout.master')

@section('page', 'ATC - Performance Cek')

@section('title','ATC - Performance Cek')

@section('konten')
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengujian_s as $pengujian)
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
                                    <img src="{{ asset('assets/img/verifikasi.png') }}" height="50">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->signature_and_stamp }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <a href="{{route('pengujian-print-atc-performance-cek')}}" target="_blank" class="btn btn-icon btn-primary">
                        <span class="btn-inner--icon"><i class="fas fa-solid fa-print"></i></span>
                        <span class="btn-inner--text">print</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection