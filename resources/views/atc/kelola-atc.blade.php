@extends('layout.master')

@section('page', 'Kelola ATC')

@section('title','ATC')

@section('konten')
<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">ATC - Log Book</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('atc-update')}}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$atc->id}}">
            <h6 class="heading-small text-muted mb-4">Morning</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="morning_ctr">CTR</label>
                            <input type="number" name="morning_ctr" id="morning_ctr" class="form-control form-control-alternative" value="{{ old('morning_ctr', $atc->morning_ctr) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="morning_ass">ASS</label>
                            <input type="number" name="morning_ass" id="morning_ass" class="form-control form-control-alternative" value="{{ old('morning_ass', $atc->morning_ass) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="morning_rest">REST</label>
                            <input type="number" name="morning_rest" id="morning_rest" class="form-control form-control-alternative" value="{{ old('morning_rest', $atc->morning_rest) }}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <h6 class="heading-small text-muted mb-4">AFTERNOON</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="afternoon_ctr">CTR</label>
                            <input type="number" name="afternoon_ctr" id="afternoon_ctr" class="form-control form-control-alternative" value="{{ old('afternoon_ctr', $atc->afternoon_ctr) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="afternoon_ass">ASS</label>
                            <input type="number" name="afternoon_ass" id="afternoon_ass" class="form-control form-control-alternative" value="{{ old('afternoon_ass', $atc->afternoon_ass) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="afternoon_rest">REST</label>
                            <input type="number" name="afternoon_rest" id="afternoon_rest" class="form-control form-control-alternative" value="{{ old('afternoon_rest', $atc->afternoon_rest) }}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <h6 class="heading-small text-muted mb-4">NIGHT</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="night_ctr">CTR</label>
                            <input type="number" name="night_ctr" id="night_ctr" class="form-control form-control-alternative" value="{{ old('night_ctr', $atc->night_ctr) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="night_ass">ASS</label>
                            <input type="number" name="night_ass" id="night_ass" class="form-control form-control-alternative" value="{{ old('night_ass', $atc->night_ass) }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="night_rest">REST</label>
                            <input type="number" name="night_rest" id="night_rest" class="form-control form-control-alternative" value="{{ old('night_rest', $atc->night_rest) }}">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <!-- Description -->
            <div class="form-group">
                <label class="form-control-label" for="unit">UNIT</label>
                <select class="form-control form-control-alternative" name="unit" id="unit">
                    <option value="">Pilih</option>
                    <option value="adc" {{ $atc->unit == 'adc' ? 'selected' : '' }}>ADC</option>
                    <option value="app" {{ $atc->unit == 'app' ? 'selected' : '' }}>APP</option>
                    <option value="app surv" {{ $atc->unit == 'app surv' ? 'selected' : '' }}>APP SURV</option>
                    <option value="combine adc/app" {{ $atc->unit == 'combine adc/app' ? 'selected' : '' }}>COMBINE ADC/APP</option>
                    <option value="acc" {{ $atc->unit == 'acc' ? 'selected' : '' }}>ACC</option>
                    <option value="acc surv" {{ $atc->unit == 'acc surv' ? 'selected' : '' }}>ACC SURV</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="remark">REMARK</label>
                <input type="text" name="remark" id="remark" class="form-control form-control-alternative" value="{{ old('remark', $atc->remark) }}">
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection