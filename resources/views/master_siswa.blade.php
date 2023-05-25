<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="{{ asset('js/master.js') }}"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">E-Lib</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
            <div id="layoutSidenav">
                @include('sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="modal" id="ModalCreate" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <script src="{{asset('js/scripts.js')}}"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="{{asset('assets/demo/chart-pie-demo.js')}}"></script> -->
        <!-- <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="{{asset('js/datatables-simple-demo.js')}}"></script> -->
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
            // $('#ModalCreate').modal('show');
            var exampleModal = document.getElementById('ModalCreate')
            exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = 'New message to ' + recipient
            modalBodyInput.value = recipient
            })
            $(function() {
                // $("ModalCreate").show()


                getData();
                // getDataById(4);
            });


        </script>

    </body>
</html>
