@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="form-group" >
                        <input type="text" name="keyword" class="form-control" placeholder="search nama kelas">
                    </div>
                    <div id="success-message" style="color: white; background-color: green"></div>

                    <div class="table-responsive">
                        <table class="table table">
                            <thead>
                                <tr>
                                    <th>Kelas</th>
                                    <th>Kompetensi Keahlian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="kelas-table">

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="card-body">
                    <div id="error-message" style="color: white; background-color: red"></div>
                    <form class="forms-sample kelas-form" id="kelas-form" name="kelas-form">
                        @csrf
                        <input type="hidden" name="id_kelas" value="">
                        <div class="form-group" >
                            <label for="exampleInputName1">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Kompetensi Keahlian</label>
                            <input type="text" name="kompetensi_keahlian" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        getAllData()
    });

    function getDataById(id) {
            $.ajax({
                type:"GET",
                url:"/api/example/edit/" + id,
                dataType: "json",
                success: function (response) {
                    if(response.code === "00"){
                        $("input[name='id_kelas']").val(response.data.id_kelas);
                        $("input[name='nama_kelas']").val(response.data.nama_kelas);
                        $("input[name='kompetensi_keahlian']").val(response.data.kompetensi_keahlian);
                    }
                    
                }
            })
    }


    $("input[name='keyword']").on("keyup",function(){
        getAllData();
    });
    
    $("form[name='kelas-form']").submit(function() {
        var idKelas = $("input[name='id_kelas']").val();
        var conFirm = confirm("Yakin akan" + (idKelas !== "" ? " update " : " tambah ") + "data?");
        if (conFirm) {

            var error = [];

            var namaKelas = $("input[name='nama_kelas']").val();
            var kompentxensiKeahlian = $("input[name='kompetensi_keahlian']").val();

            if (namaKelas === "") {
                error.push("Nama tidak boleh kosong!");
            }

            if (kompentensiKeahlian === "") {
                error.push("Kompentensi tidak boleh kosong");
            }

            if (error.length !== 0) {
                $("#error-message").html("Error!" + error.join("<br/>"));
            } else {    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN' : "{{ csrf_token() }}",
                    }
                });

                $.ajax({
                type:"POST",
                url:"/api/example/create/",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.code == "00") {
                        alert("Data berhasil" + (idKelas !== "" ? "update" : "simpan" ));
                    } else {
                        alert("Data gagal" + (idKelas !== "" ? "update" : "simpan" ))
                    }

                    $("form[name='kelas-form']").get(0).reset();
                    getAllData();
                }
            });
            }
        }

        return false;
    })

    function deleteById(id) {
        var conFirm = confirm("Yakin akan dihapus?");

        if (conFirm) {
            $.ajax({
                type:"GET",
                url:"/api/example/delete/" + id,
                dataType: "json",
                success: function (response) {
                    if (response.code == "00") {
                        alert("Id " + response.data + " berhasil dihapus!");
                    } else {
                        alert("Id " + id + " gagal dihapus!");
                    }

                    getAllData();
                }
            })
            // alert("deleted");
        }
    }

    function getAllData() {
        $.ajax({
            type:"GET",
            url:"/api/example?keyword=" + $("input[name='keyword']").val(),
            dataType: "json",
            success: function (response) {
                if(response.code === "00") {
                    content = "";
                    response.data.forEach(dt => {
                        content += "<tr>";
                            content += "<td>" + dt.nama_kelas + "</td>";
                            content += "<td>" + dt.kompetensi_keahlian + "</td>";
                            content += "<td><button class='btn btn-danger' onClick='deleteById("+dt.id_kelas+")'>Delete</button><button class='btn btn-primary' onClick='getDataById("+dt.id_kelas+")'>Update</button></td>"
                        content += "</tr>";
                        
                    });
                    $("#kelas-table").html(content);
                }
            },
        });
    }

</script>
@endsection
