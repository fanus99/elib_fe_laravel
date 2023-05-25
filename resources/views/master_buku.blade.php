@extends('content')
@section('content') 
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Master Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > Master > Buku</li>
                        </ol>
                        <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-book"></i>
                                Data Buku 
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Pengarang</th>
                                        <th scope="col">Edisi</th>
                                        <th scope="col">ISBN</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Tahun Terbit</th>
                                        <th scope="col">Tempat Terbit</th>
                                        <th scope="col">Abstrak</th>
                                        <th scope="col">Diskripsi Fisik</th>
                                        <th scope="col">Jumlah Exemplar</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Cover Buku</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td>aisya</td>
                                        <td><button type="button" class="btn btn-dangger btn-sm">123 hari</button></td>
                                        <td>
                                            <a href="{{route('update_buku')}}" class="btn btn-success btn-sm">update</a>
                                            <a href="{{route('siswa')}}" class="btn btn-danger btn-sm">delete</a>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <a class="btn btn-success btn-sm btn-kiri" href="{{route('create_buku')}}" role="button"><h3>+</h3></i></a>
                    </div>
                    @endsection