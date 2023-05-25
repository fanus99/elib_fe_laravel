<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Kelompok 1 PPL PENS LJ D4 IT 2023"></meta>
    <meta name="description" content="Aplikasi elib"></meta>
    <title>Aplikasi ELib | Login Page</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="{{ asset('js/master.js') }}"></script>
</head>
<body>
<div id="app" class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    @if ($message = Session::get('message'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <main>
                                @yield('content')
                                </main>

                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                    <i class="bi bi-bootstrap"></i>
                                    <h2 class="fs-1">Welcome Back!!!</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
