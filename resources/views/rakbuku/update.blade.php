@extends('content')
@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Master Rak Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > Master > Rak Buku > Update</li>
                        </ol>
                        <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-book"></i>
                                Edit Rak Buku
                            </div>
                            <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Lokasi</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                            @endsection