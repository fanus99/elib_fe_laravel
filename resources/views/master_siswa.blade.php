@extends('content')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Master Siswa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard > Master > Siswa</li>
        </ol>
        <div class="card">
            <div class="card-header">
            <i class="fa-solid fa-book"></i>
                Data Buku Di Pinjam
            </div>
            <div class="card-body">
                <table class="table" id="TableData">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIS</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody id="TableDataBody">
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <a class="btn btn-success btn-sm btn-kiri" href="{{route('create_siswa')}}" role="button"><h3>+</h3></i></a>
    </div>
    <script type="module">

            var $baseroute = "/master/siswa/api/";

            function getData(){
                var data = AjaxGet($baseroute + 'get-all');
                var renderData = ``;
                var no = 1;
                $.each(data.data, function( index, value ) {
                    renderData += `<tr>
                                        <td>`+ no +`</td>
                                        <td>`+ value.Nama +`</td>
                                        <td>`+ value.NIS +`</td>
                                        <td>
                                            <a href="{{route('update_siswa')}}" class="btn btn-success btn-sm">update</a>
                                            <a href="{{route('siswa')}}" class="btn btn-danger btn-sm">delete</a>
                                        </td>
                                    </tr>`;
                });
                $('#TableDataBody').html(renderData);
                $('#TableData').DataTable({
                    processing: true,
                    serverSide: false
                });
            }

            function getDataById($id){
                var data = AjaxGet($baseroute + 'get-by-id/' + $id);
                var renderData = ``;
                var no = 1;
                $.each(data.data, function( index, value ) {
                    renderData += `<tr>
                                        <td>`+ no +`</td>
                                        <td>`+ value.Nama +`</td>
                                        <td>`+ value.NIS +`</td>
                                        <td>
                                            <a href="{{route('update_siswa')}}" class="btn btn-success btn-sm">update</a>
                                            <a href="{{route('siswa')}}" class="btn btn-danger btn-sm">delete</a>
                                        </td>
                                    </tr>`;
                });
                $('#TableDataBody').html(renderData);
                $('#TableData').DataTable({
                    processing: true,
                    serverSide: false
                });
            }

            $(function() {
                getDataById(4);
            });


        </script>
@endsection
