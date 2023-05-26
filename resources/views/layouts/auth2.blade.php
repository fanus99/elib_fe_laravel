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
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    @if ($message = Session::get('message'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-12 pe-0">
                                <main>
                                @yield('content')
                                </main>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
