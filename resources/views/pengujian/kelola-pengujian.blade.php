@extends('layout.master')

@section('page', 'Kelola Pengujian')

@section('title','Pekola Pengujian')

@section('konten')
<div class="card bg-secondary shadow">
    <div class="pt-3">
        <ul>
            <li class="text-success">Mohon tidak mengubah data yang telah di isi oleh user lainnya!</li>
            <li class="text-success">Isilah bidang yang sesuai dengan pengujian anda!</li>
        </ul>
    </div>
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0 text-uppercase">{{$pengujian->user->name}}</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('pengujian-update')}}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$pengujian->id}}">
            <h6 class="heading-small text-muted mb-4">RATING TWR | THEORY</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="theory_twr">Theory</label>
                            <input type="date" name="theory_twr" id="theory_twr" class="form-control form-control-alternative" value="{{$pengujian->theory_twr}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="renewed_unit_theory_twr">Renewed Until</label>
                            <input type="date" name="renewed_unit_theory_twr" id="renewed_unit_theory_twr" class="form-control form-control-alternative" value="{{$pengujian->renewed_unit_theory_twr}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="examiner_theory_twr">Examiner</label>
                            <select class="form-control form-control-alternative" name="examiner_theory_twr" id="examiner_theory_twr">
                                <option value="">Pilih</option>
                                @foreach($users as $user)
                                @if($user->id != $pengujian->user_id)
                                <option value="{{$user->name}}" {{$pengujian->examiner_theory_twr == $user->name ? 'selected' : ''}}>{{$user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="score_theory_twr">Score</label>
                            <input type="number" name="score_theory_twr" id="score_theory_twr" class="form-control form-control-alternative" value="{{$pengujian->score_theory_twr}}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <h6 class="heading-small text-muted mb-4">RATING TWR | PRACTICAL</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="practical_twr">Practical</label>
                            <input type="date" name="practical_twr" id="practical_twr" class="form-control form-control-alternative" value="{{$pengujian->practical_twr}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="renewed_unit_practical_twr">Renewed Until</label>
                            <input type="date" name="renewed_unit_practical_twr" id="renewed_unit_practical_twr" class="form-control form-control-alternative" value="{{$pengujian->renewed_unit_practical_twr}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="examiner_practical_twr">Examiner</label>
                            <select class="form-control form-control-alternative" name="examiner_practical_twr" id="examiner_practical_twr">
                                <option value="">Pilih</option>
                                @foreach($users as $user)
                                @if($user->id != $pengujian->user_id)
                                <option value="{{$user->name}}" {{$pengujian->examiner_practical_twr == $user->name ? 'selected' : ''}}>{{$user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="score_practical_twr">Score</label>
                            <input type="number" name="score_practical_twr" id="score_practical_twr" class="form-control form-control-alternative" value="{{$pengujian->score_practical_twr}}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <h6 class="heading-small text-muted mb-4">RATING APP | THEORY</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="theory_app">Theory</label>
                            <input type="date" name="theory_app" id="theory_app" class="form-control form-control-alternative" value="{{$pengujian->theory_app}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="renewed_unit_theory_app">Renewed Until</label>
                            <input type="date" name="renewed_unit_theory_app" id="renewed_unit_theory_app" class="form-control form-control-alternative" value="{{$pengujian->renewed_unit_theory_app}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="examiner_theory_app">Examiner</label>
                            <select class="form-control form-control-alternative" name="examiner_theory_app" id="examiner_theory_app">
                                <option value="">Pilih</option>
                                @foreach($users as $user)
                                @if($user->id != $pengujian->user_id)
                                <option value="{{$user->name}}" {{$pengujian->examiner_theory_app == $user->name ? 'selected' : ''}}>{{$user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="score_theory_app">Score</label>
                            <input type="number" name="score_theory_app" id="score_theory_app" class="form-control form-control-alternative" value="{{$pengujian->score_theory_app}}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <h6 class="heading-small text-muted mb-4">RATING APP | PRACTICAL</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="practical_app">Practical</label>
                            <input type="date" name="practical_app" id="practical_app" class="form-control form-control-alternative" value="{{$pengujian->practical_app}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="renewed_unit_practical_app">Renewed Until</label>
                            <input type="date" name="renewed_unit_practical_app" id="renewed_unit_practical_app" class="form-control form-control-alternative" value="{{$pengujian->renewed_unit_practical_app}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="examiner_practical_app">Examiner</label>
                            <select class="form-control form-control-alternative" name="examiner_practical_app" id="examiner_practical_app">
                                <option value="">Pilih</option>
                                @foreach($users as $user)
                                @if($user->id != $pengujian->user_id)
                                <option value="{{$user->name}}" {{$pengujian->examiner_practical_app == $user->name ? 'selected' : ''}}>{{$user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="score_practical_app">Score</label>
                            <input type="number" name="score_practical_app" id="score_practical_app" class="form-control form-control-alternative" value="{{$pengujian->score_practical_app}}">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn btn-default" href="{{route('pengujian-list')}}">Kembali</a>
        </form>
    </div>
</div>
@endsection