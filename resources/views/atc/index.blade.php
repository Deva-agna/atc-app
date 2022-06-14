@extends('layout.master')

@section('page', 'ATC Log Book')

@section('title','ATC')

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
<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">New ATC Log</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('atc-store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="tanggal" class="form-control-label">Tanggal</label>
                <input class="form-control form-control-alternative" name="tgl" type="date" value="{{old('tgl')}}" id="tanggal">
                @error('tgl')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
                @if(session()->has('error'))
                <div class="invalid-feedback" style="display: inline;">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card shadow mt-4">
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" rowspan="2">Tanggal</th>
                            <th scope="col" colspan="3" class="text-center">Morning</th>
                            <th scope="col" colspan="3" class="text-center">Afternoon</th>
                            <th scope="col" colspan="3" class="text-center">Night</th>
                            <th scope="col" rowspan="2" class="text-center">Unit</th>
                            <th scope="col" rowspan="2" class="text-center">remark</th>
                            <th scope="col" rowspan="2"></th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-center">CTR</th>
                            <th scope="col" class="text-center">ASS</th>
                            <th scope="col" class="text-center">REST</th>
                            <th scope="col" class="text-center">CTR</th>
                            <th scope="col" class="text-center">ASS</th>
                            <th scope="col" class="text-center">REST</th>
                            <th scope="col" class="text-center">CTR</th>
                            <th scope="col" class="text-center">ASS</th>
                            <th scope="col" class="text-center">REST</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($atcs as $atc)
                        <tr>
                            <th>
                                <span class="mb-0 text-sm">{{$atc->tgl}}</span>
                            </th>
                            <td class="text-center">
                                {{$atc->morning_ctr}}
                            </td>
                            <td class="text-center">
                                {{$atc->morning_ass}}
                            </td>
                            <td class="text-center">
                                {{$atc->morning_rest}}
                            </td>
                            <td class="text-center">
                                {{$atc->afternoon_ctr}}
                            </td>
                            <td class="text-center">
                                {{$atc->afternoon_ass}}
                            </td>
                            <td class="text-center">
                                {{$atc->afternoon_rest}}
                            </td>
                            <td class="text-center">
                                {{$atc->night_ctr}}
                            </td>
                            <td class="text-center">
                                {{$atc->night_ass}}
                            </td>
                            <td class="text-center">
                                {{$atc->night_rest}}
                            </td>
                            <td class="text-center text-uppercase">
                                {{$atc->unit}}
                            </td>
                            <td class="text-center">
                                {{$atc->remark}}
                            </td>
                            <td>
                                <a href="/atc/{{$atc->slug}}/edit" class="badge badge-success"><i class="fas fa-solid fa-pen"></i></a>
                                <form action="/atc/{{$atc->slug}}/destroy" class="d-inline" id="form-delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button style="border: 0;" class="btn-hapus badge badge-danger"><i class="fas fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <a href="{{route('print-atc')}}" target="_blank" class="btn btn-icon btn-primary">
                    <span class="btn-inner--icon"><i class="fas fa-solid fa-print"></i></span>
                    <span class="btn-inner--text">print</span>
                </a>
            </div>
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