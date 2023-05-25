@extends('content')
@section('content') 
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">jumlah judul buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center">
                                        <h2>1</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">jumlah eksemplar</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center">
                                        <h2>1</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">jumlah tipe koleksi</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center">
                                        <h2>2</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">transaksi peminjaman</div>
                                    <div class="card-footer d-flex align-items-center justify-content-center">
                                        <h2>2</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Transaksi peminjaman Buku
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="text-center"><h3>9 Buku</h3></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Keterlambatan Pengembalian
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Kembali</th>
                                                    <th>status</th>
                                                    <th>Denda Keterlambatan</th>
                                                    <th>detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Nasy</td>
                                                    <td>30 hari</td>
                                                    <td>2A</td>
                                                    <td><a class="btn btn-primary btn-sm" href="#" role="button"><i class="fa-solid fa-book"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                            <i class="fa-solid fa-book"></i>
                                Data Buku Di Pinjam
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Batas pengembalian</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>aiya</td>
                                        <td>1A</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm">Update</button>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    @endsection