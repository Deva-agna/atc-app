<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Print
    </title>
    <!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet" />
</head>

<body class="">
    <div class="main-content p-3">
        <div class="row p-3 d-print-none">
            <form action="{{ route('print-all-atc') }}" class="row ml-1">
                <div class="form-group mr-3" style="margin-bottom: 0;">
                    <input type="month" name="cari" class="form-control form-control-alternative" value="{{ request('cari') }}">
                </div>
                <button class="btn btn-icon btn-primary" type="submit">
                    <span class="btn-inner--icon"><i class="fas fa-solid fa-search"></i></span>
                </button>
            </form>
            <button class="btn btn-icon btn-primary ml-auto" type="button" onclick="window.print();">
                <span class="btn-inner--icon"><i class="fas fa-solid fa-print"></i></span>
                <span class="btn-inner--text">print</span>
            </button>
        </div>
        <h2 class="text-center">ATC LOG BOOK</h2>
        <div class="row">
            <div class="col">
                <div class="card shadow mt-2">
                    <div class="">
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
                </div>
            </div>
        </div>
    </div>
    <!--   Core   -->
    <script src="{{ asset('assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--   Argon JS   -->
    <script src="{{ asset('assets/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
</body>

</html>