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
<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">New Form Pengujian</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('pengujian-store')}}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-control-label" for="user">User</label>
                <select class="form-control form-control-alternative" name="id" id="user">
                    <option value="">Pilih</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
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
                            <th scope="col" class="text-center">status</th>
                            <th scope="col"></th>
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
                                <span class="badge badge-dot">
                                    @if($pengujian->status == 'false')
                                    <i class="bg-warning"></i> pending
                                    @else
                                    <i class="bg-success"></i> completed
                                    @endif
                                </span>
                            </td>
                            <td>
                                <form action="/pengujian/{{$pengujian->slug}}/destroy" class="d-inline" id="form-delete{{$pengujian->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button style="border: 0;" class="btn-hapus badge badge-danger" data-id="{{$pengujian->id}}"><i class="fas fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        id = e.target.dataset.id;
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Jika form pengujian dihapus, maka semua data yang terkait akan hilang!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#form-delete${id}`).submit();
            }
        })
    });
</script>

@endsection