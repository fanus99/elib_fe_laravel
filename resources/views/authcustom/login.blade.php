@extends('layouts.auth')

@section('content')
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
    </script>

@endsection
