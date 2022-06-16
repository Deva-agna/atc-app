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
            <button class="btn btn-icon btn-primary ml-auto" type="button" onclick="window.print();">
                <span class="btn-inner--icon"><i class="fas fa-solid fa-print"></i></span>
                <span class="btn-inner--text">print</span>
            </button>
        </div>
        <h2 class="text-center">ATC | Performance Cek</h2>
        <table>
            <tr>
                <td>Nama</td>
                <td></td>
                <td>:</td>
                <td></td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>License Number</td>
                <td></td>
                <td>:</td>
                <td></td>
                <td>{{ ($user->biodata->licens_number_one) ? $user->biodata->license_number_one : '-' }}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">Rating</th>
                                <th scope="col" class="text-center">Theory</th>
                                <th scope="col" class="text-center">Renewed Unit</th>
                                <th scope="col" class="text-center">Examiner</th>
                                <th scope="col" class="text-center">Score</th>
                                <th scope="col" class="text-center">Practical</th>
                                <th scope="col" class="text-center">Renewed Unit</th>
                                <th scope="col" class="text-center">Examiner</th>
                                <th scope="col" class="text-center">Score</th>
                                <th scope="col" class="text-center">Signature and stamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengujian_s as $pengujian)
                            <tr>
                                <th class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">TWR</p>
                                    <p class="text-xs font-weight-bold mb-0">APP</p>
                                </th>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->theory_twr }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->theory_app }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->renewed_unit_theory_twr }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->renewed_unit_theory_app }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->examiner_theory_twr }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->examiner_theory_app }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->score_theory_twr }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->score_theory_app }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->practical_twr }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->practical_app }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->renewed_unit_practical_twr }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->renewed_unit_practical_app }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->examiner_practical_twr }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->examiner_practical_app }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->score_practical_twr }}</p>
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->score_practical_app }}</p>
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/verifikasi.png') }}" height="50">
                                    <p class="text-xs font-weight-bold mb-0">{{ $pengujian->signature_and_stamp }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--   Core   -->
        <script src="{{ asset('assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!--   Argon JS   -->
        <script src="{{ asset('assets/js/argon-dashboard.min.js?v=1.1.2') }}"></script>
        <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
        <script>
            window.TrackJS &&
                TrackJS.install({
                    token: "ee6fab19c5a04ac1a32a645abde4613a",
                    application: "argon-dashboard-free"
                });
            window.print();
        </script>
</body>

</html>