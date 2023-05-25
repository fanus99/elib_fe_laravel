@extends('content')
@section('content') 
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Master Semester</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > Master > Semester</li>
                        </ol>
                        <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-book"></i>
                                Data Buku Di Pinjam
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Tahun Ajaran</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Is Active</th>
                                        <th scope="col">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td><button type="button" class="btn btn-dangger btn-sm">123 hari</button></td>
                                        <td>
                                            <a href="{{route('update_semester')}}" class="btn btn-success btn-sm">update</a>
                                            <a href="{{route('siswa')}}" class="btn btn-danger btn-sm">delete</a>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <a class="btn btn-success btn-sm btn-kiri" href="{{route('create_semester')}}" role="button"><h3>+</h3></i></a>
                    </div>
                    @endsection