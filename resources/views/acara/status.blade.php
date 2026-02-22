<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name', 'Laravel') }}n</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="text-center mt-4"><img src="{{ asset('assets/img/logo-pdtag.png') }}" height="100" alt="Logo"/></div>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <div class="text-center mt-4"><img src="{{ asset('assets/img/success.png') }}" height="100" alt="Success"/></div>
                                        <h3 class="text-center font-weight-light my-4">PENDAFTARAN KEHADIRAN BERJAYA</h3>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-center">Status kehadiran anda telah disimpan.</p>
                                        <p class="text-center">PROGRAM: {{ $kehadiran->acara->tajuk }}</p>
                                        <div class="text-center"><strong> {{ strtoupper($kehadiran->nama) }}</strong></div>
                                        <div class="text-center">{{ $kehadiran->nokp }}</div>
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-md-8">
                                                <table class="table">   
                                                    <tbody>
                                                        <tr style="background-color: #ffebcd !important;">
                                                            <td><img src="{{ asset('assets/img/mobile.png') }}" width="20" height="20" alt="Mobile"/> <strong>Mobile:</strong></td>
                                                            <td>{{ $kehadiran->notel }}</td>
                                                        </tr>
                                                        <tr style="background-color: #ffebcd !important;">
                                                            <td><img src="{{ asset('assets/img/email.png') }}" width="20" height="20" alt="Email"/> <strong>Email:</strong></td>
                                                            <td>{{ $kehadiran->email }}</td>
                                                        </tr>
                                                        <tr style="background-color: #ffebcd !important;">
                                                            <td><img src="{{ asset('assets/img/calendar.png') }}" width="20" height="20" alt="Calendar"/> <strong>Tarikh/ Masa Daftar:</strong></td>
                                                            <td>{{ $kehadiran->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/Y g:i A') }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Pejabat Daerah dan Tanah Alor Gajah</div>
                            {{-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> --}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
