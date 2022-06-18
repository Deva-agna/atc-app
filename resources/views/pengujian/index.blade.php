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
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>Error!</strong> {{session('error')}}</span>
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
                    @if($user->role != 'admin')
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                    @endforeach
                </select>
                @error('id')
                <div class="invalid-feedback" style="display: inline;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <ul>
                <li class="text-success">Harap pilih penguji yang berbeda dengan user yang diuji!</li>
            </ul>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="penguji_satu">Penguji 1 (TWR | Theory)</label>
                        <select class="form-control form-control-alternative" name="penguji_satu" id="penguji_satu">
                            <option value="">Pilih</option>
                            @foreach($users as $user)
                            @if($user->role == 'examiner')
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('penguji_satu')
                        <div class="invalid-feedback" style="display: inline;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="penguji_dua">Penguji 2 (TWR | Practical)</label>
                        <select class="form-control form-control-alternative" name="penguji_dua" id="penguji_dua">
                            <option value="">Pilih</option>
                            @foreach($users as $user)
                            @if($user->role == 'examiner')
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('penguji_dua')
                        <div class="invalid-feedback" style="display: inline;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="penguji_tiga">Penguji 3 (APP | Theory)</label>
                        <select class="form-control form-control-alternative" name="penguji_tiga" id="penguji_tiga">
                            <option value="">Pilih</option>
                            @foreach($users as $user)
                            @if($user->role == 'examiner')
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('penguji_tiga')
                        <div class="invalid-feedback" style="display: inline;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="penguji_empat">Penguji 4 (APP | Practical)</label>
                        <select class="form-control form-control-alternative" name="penguji_empat" id="penguji_empat">
                            <option value="">Pilih</option>
                            @foreach($users as $user)
                            @if($user->role == 'examiner')
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('penguji_empat')
                        <div class="invalid-feedback" style="display: inline;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>

<div class="row mb-5">
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
                                <span class="badge badge-dot">
                                    @if($pengujian->status == 'false')
                                    <i class="bg-warning"></i> pending
                                    @else
                                    <i class="bg-success"></i> completed
                                    @endif
                                </span>
                            </td>
                            <td>
                                <button style="border: 0;" class="btn-hapus badge badge-danger" data-id="{{$pengujian->id}}"><i class="fas fa-solid fa-trash"></i></button>
                                <form action="/pengujian/{{$pengujian->slug}}/destroy" class="d-inline" id="form-delete{{$pengujian->id}}" method="post">
                                    @csrf
                                    @method('delete')
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
<script>
    $(document).on('click', '.btn-hapus', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
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
                console.log(id);
                $(`#form-delete${id}`).submit();
            }
        })
    });
</script>

@endsection