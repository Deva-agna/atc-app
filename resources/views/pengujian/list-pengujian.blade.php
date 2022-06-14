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
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->theory_twr) ? $pengujian->theory_twr : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->theory_app) ? $pengujian->theory_app : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->renewed_unit_theory_twr) ? $pengujian->renewed_unit_theory_twr : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->renewed_unit_theory_app) ? $pengujian->renewed_unit_theory_app : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->examiner_theory_twr) ? $pengujian->examiner_theory_twr : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->examiner_theory_app) ? $pengujian->examiner_theory_app : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->score_theory_twr) ? $pengujian->score_theory_twr : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->score_theory_app) ? $pengujian->score_theory_app : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->practical_twr) ? $pengujian->practical_twr : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->practical_app) ? $pengujian->practical_app : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->renewed_unit_practical_twr) ? $pengujian->renewed_unit_practical_twr : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->renewed_unit_practical_app) ? $pengujian->renewed_unit_practical_app : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->examiner_practical_twr) ? $pengujian->examiner_practical_twr : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->examiner_practical_app) ? $pengujian->examiner_practical_app : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->score_practical_twr) ? $pengujian->score_practical_twr : '-' }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ ($pengujian->score_practical_app) ? $pengujian->score_practical_app : '-' }}</p>
                                </td>
                                <td class="text-center">
                                    <a href="/pengujian/{{$pengujian->slug}}/verifikasi" class="badge badge-warning">verifikasi</i></a>
                                </td>
                                <td>
                                    <a href="/pengujian/{{$pengujian->slug}}/edit" class="badge badge-success"><i class="fas fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- <div class="card-footer py-4">
                <a href="{{route('print-atc')}}" target="_blank" class="btn btn-icon btn-primary">
                    <span class="btn-inner--icon"><i class="fas fa-solid fa-print"></i></span>
                    <span class="btn-inner--text">print</span>
                </a>
            </div> -->
            </div>
        </div>
    </div>
    @endsection

    @section('script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on('click', '.btn-hapus', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data user akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-delete').submit()
                }
            })
        });
    </script>

    @endsection