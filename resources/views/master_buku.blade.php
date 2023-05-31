@extends('content')
@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<script src="{{ asset('js/master.js') }}"></script>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Master Buku</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard > Buku</li>
        </ol>
        <div class="card">
            <div class="card-header">
            <i class="fa-solid fa-book"></i>
                Data Buku
            </div>
            <div class="card-body" style="overflow-x:auto">
                <table class="table" id="TableData">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Juduk Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Edisi</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Tempat Terbit</th>
                            <th scope="col">Abstrak</th>
                            <th scope="col">Deskripsi Fisik</th>
                            <th scope="col">Jumlah Exemplar</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Cover Buku</th>
                            <th scope="col">Tipe Koleksi</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Bahasa</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody id="TableDataBody">
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <a class="btn btn-success btn-sm btn-kiri" href="#" id="buttonCreate" role="button"><h3>+</h3></i></a>
    </div>



    <script type="module">
        var $baseroute = "/master/buku/api/";
        var updateModal = new bootstrap.Modal(document.getElementById('updateModal'), {});
        var createModal = new bootstrap.Modal(document.getElementById('createModal'), {});

        function getData(){
            var data = AjaxGet($baseroute + 'get-all');
            var renderData = ``;
            var no = 1;
            $.each(data.data, function( index, value ) {
                renderData += `<tr>
                                    <td>`+ no +`</td>
                                    <td>`+ value.JudulBuku +`</td>
                                    <td>`+ value.Pengarang +`</td>
                                    <td>`+ value.Edisi +`</td>
                                    <td>`+ value.ISBN +`</td>
                                    <td>`+ value.Penerbit +`</td>
                                    <td>`+ value.TahunTerbit +`</td>
                                    <td>`+ value.TempatTerbit +`</td>
                                    <td>`+ value.Abstrak +`</td>
                                    <td>`+ value.DeskripsiFisik +`</td>
                                    <td>`+ value.JumlahEksemplar +`</td>
                                    <td>`+ value.TanggalMasuk +`</td>
                                    <td><img href="https://` + value.CoverBuku +`" style="width:100px; height:100px;"/></td>
                                    <td>`+ value.TipeKoleksi +`</td>
                                    <td>`+ value.Lokasi +`</td>
                                    <td>`+ value.Bahasa +`</td>

                                    <td>
                                        <button  data-id="`+ value.IdBuku +`" class="btn btn-success btn-sm buttonUpdate">update</button>
                                        <button  data-id="`+ value.IdBuku +`" class="btn btn-danger btn-sm buttonDelete">delete</button>
                                    </td>
                                </tr>`;

                no++;
            });

            $('#TableData').DataTable().destroy();
            $('#TableDataBody').empty();
            $('#TableDataBody').html(renderData);
            $('#TableData').DataTable({
                processing: true,
                serverSide: false
            });
            refreshUpdateListener();
        }

        function getDataById($id){
            return AjaxGet($baseroute + 'get-by-id/' + $id);
        }

        $(function() {
            getData();
        });

        function refreshUpdateListener(){
            const buttonUpdate = document.querySelectorAll('.buttonUpdate');
            const buttonDelete = document.querySelectorAll('.buttonDelete');

            buttonUpdate.forEach(box => {
                box.addEventListener('click', function handleClick(event) {
                    var idData = this.getAttribute("data-id");
                    $("#idUpdateForm").val(idData);
                    openModalUpdate("Update Siswa", idData);
                });
            });


            buttonDelete.forEach(box => {
                box.addEventListener('click', function handleClick(event) {
                    var idData = this.getAttribute("data-id");
                    deleteData(idData);
                });
            });
        }

        $("#buttonCreate").click(function (event) {
            openModalCreate("Create Siswa");
        });

        function openModalCreate(model){
            $("#createModalTitle").html(model);
            createForm();
            var myDropzone = new Dropzone("div#DropzoneCreate", {
                maxFiles: 1,
                url: "/master/file/api/upload",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictRemoveFile: "Delete",
                addRemoveLinks: true,
                success:function(file, response)
                {
                    $("#CoverBukuCreate").val(response.data);
                }
            });

            createModal.show();
        }

        function createForm(){
            var formHtml = "";
            // addInputField(name, label, type, isRequired, icon, value)
            formHtml += addInputField("JudulBuku", "Judul Buku", "text", true, 'bi-person-fill', '');
            formHtml += addInputField("Pengarang", "Pengarang", "text", true, 'bi-person-vcard', '');
            formHtml += addInputField("Edisi", "Edisi", "text", true, 'bi-person-vcard', '');
            formHtml += addInputField("ISBN", "ISBN", "text", true, 'bi-person-vcard', '');
            formHtml += addInputField("Penerbit", "Penerbit", "text", true, 'bi-person-vcard', '');
            formHtml += addInputField("TahunTerbit", "Tahun Terbit", "text", true, 'bi-person-vcard', '');
            formHtml += addInputField("TempatTerbit", "Tempat Terbit", "text", true, 'bi bi-geo-alt', '');
            formHtml += addInputField("Abstrak", "Abstrak", "text", true, 'bi-person-vcard', '');
            formHtml += addInputField("DeskripsiFisik", "Deskripsi Fisik", "text", true, 'bi-person-vcard', '');
            formHtml += addInputField("JumlahEksemplar", "Jumlah Eksemplar", "number", true, 'bi bi-archive', '');
            formHtml += addInputField("TanggalMasuk", "Tanggal Masuk", "date", true, 'bi bi-calendar-event', '');
            formHtml += `<div class="form-group" >
                            <label>Cover Buku<span class="text-danger">*</span></label>
                            <div id="DropzoneCreate" class="fallback dropzone">
                                <input name="CoverBuku" type="hidden" id="CoverBukuCreate"/>
                            </div>
                        </div>
                        `;
            formHtml += addInputField("TipeKoleksi", "Tipe Koleksi", "text", true, 'bi bi-collection-fill', '');
            formHtml += addInputField("Lokasi", "Lokasi", "text", true, 'bi bi-geo', '');
            formHtml += addInputField("Bahasa", "Bahasa", "text", true, 'bi bi-translate', '');

            $("#formModalCreate").html(formHtml);
        }

        function openModalUpdate(model, id){
            $("#updateModalTitle").html(model);
            updateFrom(id);
            var myDropzone = new Dropzone("div#DropzoneUpdate", {
                maxFiles: 1,
                url: "/master/file/api/upload",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success:function(file, response)
                {
                    $("#CoverBukuUpdate").val(response.data);
                }
            });

            updateModal.show();
        }

        function updateFrom(id){
            var data = getDataById(id);
            var formHtml = "";
            //addInputField(name, label, type, isRequired, icon, value)
            formHtml += addInputField("JudulBuku", "Judul Buku", "text", true, 'bi-person-fill', data.data.JudulBuku);
            formHtml += addInputField("Pengarang", "Pengarang", "text", true, 'bi-person-vcard', data.data.Pengarang);
            formHtml += addInputField("Edisi", "Edisi", "text", true, 'bi-person-vcard', data.data.Edisi);
            formHtml += addInputField("ISBN", "ISBN", "text", true, 'bi-person-vcard', data.data.ISBN);
            formHtml += addInputField("Penerbit", "Penerbit", "text", true, 'bi-person-vcard', data.data.Penerbit);
            formHtml += addInputField("TahunTerbit", "Tahun Terbit", "text", true, 'bi-person-vcard', data.data.TahunTerbit);
            formHtml += addInputField("TempatTerbit", "Tempat Terbit", "text", true, 'bi bi-geo-alt', data.data.TempatTerbit);
            formHtml += addInputField("Abstrak", "Abstrak", "text", true, 'bi-person-vcard', data.data.Abstrak);
            formHtml += addInputField("DeskripsiFisik", "Deskripsi Fisik", "text", true, 'bi-person-vcard', data.data.DeskripsiFisik);
            formHtml += addInputField("JumlahEksemplar", "Jumlah Eksemplar", "number", true, 'bi bi-archive', data.data.JumlahEksemplar);
            formHtml += addInputField("TanggalMasuk", "Tanggal Masuk", "text", true, 'bi bi-calendar-event', data.data.TanggalMasuk);
            formHtml += `<div class="form-group" >
                            <label>Cover Buku<span class="text-danger">*</span></label>
                            <div id="DropzoneUpdate" class="fallback dropzone">
                                <input name="CoverBuku" type="hidden" id="CoverBukuUpdate"/>
                            </div>
                        </div>
                        `;

            formHtml += addInputField("TipeKoleksi", "Tipe Koleksi", "text", true, 'bi bi-collection-fill', data.data.TipeKoleksi);
            formHtml += addInputField("Lokasi", "Lokasi", "text", true, 'bi bi-geo', data.data.Lokasi);
            formHtml += addInputField("Bahasa", "Bahasa", "text", true, 'bi bi-translate', data.data.Bahasa);


            $("#formModalUpdate").html(formHtml);
            $("#CoverBukuUpdate").val(data.data.CoverBuku);
        }

        $("#formCreate").submit(function (event) {
            event.preventDefault();
            var postdata = AjaxPost($baseroute + "create", $("#formCreate").serialize());

            if(postdata.metadata.message == "Data Created"){
                Swal.fire('Sukses', postdata.metadata.message,'success');
                createModal.hide();
                getData();
                return true;
            }

            Swal.fire('Error', postdata.metadata.message,'warning');
        });

        $("#formUpdate").submit(function (event) {
            event.preventDefault();
            var idData = $("#idUpdateForm").val();
            var postdata = AjaxPost($baseroute + "update/" + idData + "", $("#formUpdate").serialize());

            if(postdata.metadata.message == "Data Updated"){
                Swal.fire('Sukses', postdata.metadata.message,'success');
                updateModal.hide();
                getData();
                return true;
            }

            Swal.fire('Error', postdata.metadata.message,'warning');
        });

        function deleteData(id){
            Swal.fire({
                title: 'Sure to delete data??',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                }).then((result) => {
                if (result.isConfirmed) {
                    var deleteData = AjaxDelete($baseroute + "delete/" + id + "", {"_token": "{{ csrf_token() }}"});
                    getData();
                    Swal.fire('Sukses', "Data deleted",'success');
                }
            });
        }

    </script>
@endsection
