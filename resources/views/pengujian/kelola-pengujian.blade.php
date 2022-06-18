@extends('layout.master')

@section('page', 'Kelola Pengujian')

@section('title','Pekola Pengujian')

@section('konten')
<div class="card bg-secondary shadow">
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
            @if(auth()->user()->id == $twrTheory->user_id)
            <h6 class="heading-small text-muted mb-4">RATING TWR | THEORY</h6>
            <div class="pl-lg-4">
                <input type="hidden" name="key_twr_theory" value="true">
                <input type="hidden" name="twr_theory" value="{{$twrTheory->id}}">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="theory_twr">Theory</label>
                            <input type="date" name="theory_twr" id="theory_twr" class="form-control form-control-alternative" value="{{$twrTheory->theory}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="renewed_until_theory_twr">Renewed Until</label>
                            <input type="date" name="renewed_until_theory_twr" id="renewed_until_theory_twr" class="form-control form-control-alternative" value="{{$twrTheory->renewed_until}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="score_theory_twr">Score</label>
                            <input type="number" name="score_theory_twr" id="score_theory_twr" class="form-control form-control-alternative" value="{{$twrTheory->score}}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            @else
            <input type="hidden" name="key_twr_theory" value="">
            @endif
            @if(auth()->user()->id == $twrPractical->user_id)
            <h6 class="heading-small text-muted mb-4">RATING TWR | PRACTICAL</h6>
            <div class="pl-lg-4">
                <input type="hidden" name="key_twr_practical" value="true">
                <input type="hidden" name="twr_practical" value="{{$twrPractical->id}}">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="practical_twr">Practical</label>
                            <input type="date" name="practical_twr" id="practical_twr" class="form-control form-control-alternative" value="{{$twrPractical->practical}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="renewed_until_practical_twr">Renewed Until</label>
                            <input type="date" name="renewed_until_practical_twr" id="renewed_until_practical_twr" class="form-control form-control-alternative" value="{{$twrPractical->renewed_until}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="score_practical_twr">Score</label>
                            <input type="number" name="score_practical_twr" id="score_practical_twr" class="form-control form-control-alternative" value="{{$twrPractical->score}}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            @else
            <input type="hidden" name="key_twr_practical" value="">
            @endif
            @if(auth()->user()->id == $appTheory->user_id)
            <h6 class="heading-small text-muted mb-4">RATING APP | THEORY</h6>
            <div class="pl-lg-4">
                <input type="hidden" name="key_app_theory" value="true">
                <input type="hidden" name="app_theory" value="{{$appTheory->id}}">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="theory_app">Theory</label>
                            <input type="date" name="theory_app" id="theory_app" class="form-control form-control-alternative" value="{{$appTheory->theory}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="renewed_until_theory_app">Renewed Until</label>
                            <input type="date" name="renewed_until_theory_app" id="renewed_until_theory_app" class="form-control form-control-alternative" value="{{$appTheory->renewed_until}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="score_theory_app">Score</label>
                            <input type="number" name="score_theory_app" id="score_theory_app" class="form-control form-control-alternative" value="{{$appTheory->score}}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            @else
            <input type="hidden" name="key_app_theory" value="">
            @endif
            @if(auth()->user()->id == $appPractical->user_id)
            <h6 class="heading-small text-muted mb-4">RATING APP | PRACTICAL</h6>
            <div class="pl-lg-4">
                <input type="hidden" name="key_app_practical" value="true">
                <input type="hidden" name="app_practical" value="{{$appPractical->id}}">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="practical_app">Practical</label>
                            <input type="date" name="practical_app" id="practical_app" class="form-control form-control-alternative" value="{{$appPractical->practical}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="renewed_until_practical_app">Renewed Until</label>
                            <input type="date" name="renewed_until_practical_app" id="renewed_until_practical_app" class="form-control form-control-alternative" value="{{$appPractical->renewed_until}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="score_practical_app">Score</label>
                            <input type="number" name="score_practical_app" id="score_practical_app" class="form-control form-control-alternative" value="{{$appPractical->score}}">
                        </div>
                    </div>
                </div>
            </div>
            @else
            <input type="hidden" name="key_app_practical" value="">
            @endif
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn btn-default" href="{{route('pengujian-list')}}">Kembali</a>
        </form>
    </div>
</div>
@endsection