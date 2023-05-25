@extends('content')
@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<script src="{{ asset('js/master.js') }}"></script>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Master Semester</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard > Master > Semester</li>
        </ol>
        <div class="card">
            <div class="card-header">
            <i class="fa-solid fa-book"></i>
                Data Semester
            </div>
            <div class="card-body">
                <table class="table" id="TableData">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col">Semester</th>
                            <th scope="col">IsActive</th>
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
        var $baseroute = "/master/semester/api/";
        var updateModal = new bootstrap.Modal(document.getElementById('updateModal'), {});
        var createModal = new bootstrap.Modal(document.getElementById('createModal'), {});

        function getData(){
            var data = AjaxGet($baseroute + 'get-all');
            var renderData = ``;
            var no = 1;
            $.each(data.data, function( index, value ) {
                renderData += `<tr>
                                    <td>`+ no +`</td>
                                    <td>`+ value.TahunAjaran +`</td>
                                    <td>`+ value.Semester +`</td>
                                    <td>`+ value.IsActive +`</td>
                                    <td>
                                        <button  data-id="`+ value.IdSemester +`" class="btn btn-success btn-sm buttonUpdate">update</button>
                                        <button  data-id="`+ value.IdSemester +`" class="btn btn-danger btn-sm buttonDelete">delete</button>
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
                    openModalUpdate("Update Semester", idData);
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
            openModalCreate("Create Semester");
        });

        function openModalCreate(model){
            $("#createModalTitle").html(model);
            createForm();
            createModal.show();
        }

        function createForm(){
            var formHtml = "";
            // addInputField(name, label, type, isRequired, icon, value)
            formHtml += addInputField("Tahun Ajaran", "TahunAjaran", "text", true, 'bi-person-fill', '');
            formHtml += addInputField("Semester", "Semester", "text", true, 'bi-person-vcard', '');
            formHtml += addInputField("IsActive", "IsActive", "text", true, 'bi-person-vcard', '');

            $("#formModalCreate").html(formHtml);
        }

        function openModalUpdate(model, id){
            $("#updateModalTitle").html(model);
            updateFrom(id);
            updateModal.show();
        }

        function updateFrom(id){
            var data = getDataById(id);
            var formHtml = "";
            //addInputField(name, label, type, isRequired, icon, value)
            formHtml += addInputField("Tahun Ajaran", "TahunAjaran", "text", true, 'bi-person-fill', data.data.TahunAjaran);
            formHtml += addInputField("Semester", "Semester", "text", true, 'bi-person-vcard', data.data.Semester);
            formHtml += addInputField("IsActive", "IsActive", "text", true, 'bi-person-vcard', data.data.IsActive);

            $("#formModalUpdate").html(formHtml);
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
