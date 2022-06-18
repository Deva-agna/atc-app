@extends('layout.master')

@section('page', 'Dashboard')

@section('title', 'ATC - Dashboard')

@section('konten')
@if(auth()->user()->role == 'examiner' || auth()->user()->role == 'senior')
<div class="col-xl-6 mt-5 ml-auto mr-auto">
    <div class="card card-profile shadow">
        <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                    <a href="#">
                        @if($user->biodata->image)
                        <img src="{{ asset('img/'. $user->biodata->image) }}" class="rounded-circle" height="180" style="object-fit: cover; width: 180px;">
                        @else
                        <img src="{{ asset('assets/img/foto-default.png') }}" class="rounded-circle">
                        @endif
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body" style="margin-top: 130px;">
            <div>
                <h3 class="text-center">
                    {{auth()->user()->name}}
                </h3>
                <hr class="my-4">
                <table>
                    <tr>
                        <td>License Number(1)</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{$user->license_number_one}}</td>
                    </tr>
                    <tr>
                        <td>Effected Since(1)</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{($user->effected_since_one) ? $user->effected_since_one : '-'}}</td>
                    </tr>
                    <tr>
                        <td>License Number(2)</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{($user->biodata->license_number_two) ? $user->biodata->license_number_two : '-'}}</td>
                    </tr>
                    <tr>
                        <td>Effected Since(2)</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{($user->biodata->effected_since_two) ? $user->biodata->effected_since_two : '-'}}</td>
                    </tr>
                    <tr>
                        <td>Birth</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{Carbon\Carbon::parse($user->biodata->birth)->format('d, M Y')}}</td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{$user->biodata->nationality}}</td>
                    </tr>
                    <tr>
                        <td>Sex</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{$user->biodata->sex}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{$user->biodata->address}}</td>
                    </tr>
                    <tr>
                        <td>Rating (1)</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{($user->biodata->rating_one) ? $user->biodata->rating_one : '-'}}</td>
                    </tr>
                    <tr>
                        <td>Rating (2)</td>
                        <td><span class="ml-3">:</span></td>
                        <td>{{($user->biodata->rating_two) ? $user->biodata->rating_two : '-'}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection