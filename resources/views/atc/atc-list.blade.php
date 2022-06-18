@extends('layout.master')

@section('page', 'ATC Log Book')

@section('title','ATC')

@section('konten')
<div class="row">
    <div class="col">
        <div class="card shadow mt-4">
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" rowspan="2">Date</th>
                            <th scope="col" rowspan="2">Name</th>
                            <th scope="col" colspan="3" class="text-center">Morning</th>
                            <th scope="col" colspan="3" class="text-center">Afternoon</th>
                            <th scope="col" colspan="3" class="text-center">Night</th>
                            <th scope="col" rowspan="2" class="text-center">Unit</th>
                            <th scope="col" rowspan="2" class="text-center">remark</th>
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
                            <th>
                                <span class="mb-0 text-sm">{{$atc->user->name}}</span>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <a href="{{route('print-all-atc')}}" target="_blank" class="btn btn-icon btn-primary">
                    <span class="btn-inner--icon"><i class="fas fa-solid fa-print"></i></span>
                    <span class="btn-inner--text">print</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection