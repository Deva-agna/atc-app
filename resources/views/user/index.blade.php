@extends('layout.master')

@section('page', 'User')

@section('title','ATC - User')

@section('konten')
<div class="row">
    <div class="col">
        @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Sukses!</strong> {{session('sukses')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card shadow">
            <div class="card-header border-0">
                <button class="btn btn-icon btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <a href="{{ route('user-create') }}" style="color: #fff;">Tambah User</a>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">{{ $user->name }}</span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <a href="/user/{{$user->slug}}/edit" class="badge badge-success">Edit</a>
                                <form action="/user/{{$user->slug}}/destroy" class="d-inline" id="form-delete{{$user->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button style="border: 0;" class="btn-hapus badge badge-danger" data-id="{{$user->id}}">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
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
        const id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Semua Data yang terkait dengan user ini akan dihapus!",
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