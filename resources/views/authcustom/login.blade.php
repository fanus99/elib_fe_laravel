<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"></meta>
    <meta name="author" content="Kelompok 1 PPL PENS LJ D4 IT 2023"></meta>
    <meta name="description" content="Aplikasi elib"></meta>
    <title>Aplikasi ELib | Login Page</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-page bg-light">
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
                                <div class="form-left h-100 py-5 px-5">
                                    <form method="POST" id="formLogin" class="row g-4">
                                        @csrf
                                        <div class="col-12">
                                            <h1 class="h4">Login Page ELIB</h1>
                                        </div>
                                        <div class="col-12">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" name="Username" class="form-control" placeholder="Enter Username" required>
                                            </div>
                                            <span id="alert-username" class="text-danger"></span>
                                        </div>

                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" name="Password" class="form-control" placeholder="Enter Password" required>
                                            </div>
                                            <span id="alert-password" class="text-danger"></span>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <a href="{{ route('registerview') }}" class="float-end text-primary">Register</a>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" id="loginButton" class="btn btn-primary px-4 float-end mt-4">login</button>
                                        </div>
                                    </form>
                                </div>
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

    <script type="module">
        $("#formLogin").submit(function (event) {
            event.preventDefault();
            var postdata = AjaxPostWithoutAuth("/login", $("#formLogin").serialize());

            if(postdata.metadata == undefined){
                $("#alert-username").html(postdata.Username);
                $("#alert-password").html(postdata.Password);

                return false;
            }

            if(postdata.data.status == true){
                window.location.href = postdata.data.redirect;
            }

            Swal.fire('Error', postdata.metadata.message,'warning');
        });

        function AjaxPostWithoutAuth(endpoint, data){
            return $.ajax({
                type: "POST",
                url: endpoint,
                data: data,
                dataType: "json",
                encode: true,
                async:false,
            }).responseJSON;
        }
    </script>
</body>

</html>
