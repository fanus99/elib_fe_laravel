@extends('layouts.auth')

@section('content')
<div class="form-left h-100 py-5 px-5">
<form method="POST" id="formRegister" class="row g-4">
        @csrf
        <div class="col-12">
            <h1 class="h4">Register Page ELIB</h1>
        </div>
        <div class="col-12">
            <label>Nama Institusi<span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                <input type="text" name="InstitutionName" class="form-control" placeholder="Enter Institution name" required>
            </div>
            <span id="alert-InstitutionName" class="text-danger"></span>
        </div>
        <div class="col-12">
            <label>Nama Lengkap<span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                <input type="text" name="FullName" class="form-control" placeholder="Enter Full Name" required>
            </div>
            <span id="alert-FullName" class="text-danger"></span>
        </div>
        <div class="col-12">
            <label>Email<span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                <input type="email" name="Email" class="form-control" placeholder="Enter Email" required>
            </div>
            <span id="alert-Email" class="text-danger"></span>
        </div>
        <div class="col-12">
            <label>Phonenumber<span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                <input type="text" name="Phonenumber" class="form-control" placeholder="Enter Phonenumber" required>
            </div>
            <span id="alert-Phonenumber" class="text-danger"></span>
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
            <label class="form-check-label" for="inlineFormCheck">Already have an account?</label>
        </div>

        <div class="col-sm-6">
        <a href="{{ route('loginview') }}" class="float-end text-primary">Login</a>
        </div>

        <div class="col-12">
            <button type="submit" id="loginButton" class="btn btn-primary px-4 float-end mt-4">login</button>
        </div>
    </form>
</div>


    <script type="module">
        $("#formRegister").submit(function (event) {
            event.preventDefault();
            var postdata = AjaxPost("/register", $("#formRegister").serialize());

            if(postdata.metadata == undefined){
                $("#alert-InstitutionName").html(postdata.InstitutionName)
                $("#alert-FullName").html(postdata.FullName)
                $("#alert-Email").html(postdata.Email)
                $("#alert-Phonenumber").html(postdata.Phonenumber)
                $("#alert-username").html(postdata.username)
                $("#alert-password").html(postdata.password)

                return false;
            }

            if(postdata.data.status == true){
                Swal.fire('Success', postdata.metadata.message,'success');
                window.location.href = postdata.data.redirect;
            }

            Swal.fire('Error', postdata.metadata.message,'warning');
        });
    </script>

@endsection
