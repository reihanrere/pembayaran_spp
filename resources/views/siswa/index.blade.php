@extends('layouts.app')

@section('content')
<div class="content-wrapper index-siswa">
    <div class="page-header">
        <h3 class="page-title"> Siswa Tables     </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Siswa</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-success rounded-button-plus" data-toggle="modal" data-target="#exampleModal">
                            <i class="mdi mdi-library-plus icon-plus"></i>
                        </button>
                        <p class=""></p>
                    </div>
                </div>    
                        

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $siswa)
                                <tr>
                                    <td>{{$siswa->nisn}}</td>
                                    <td>{{$siswa->nis}}</td>
                                    <td>{{$siswa->nama}}</td>
                                    <td>{{$siswa->alamat}}</td>
                                    <td>{{$siswa->no_telp}}</td>
                                    <td>
                                    <a class="dropdown-item" href="/siswa/delete/{{$siswa->id_siswa}}">Delete</a>
                                    <a class="dropdown-item" href="/siswa/edit">Update</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="forms-sample" method="POST" action="/siswa/create">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">NISN</label>
                    <input type="text" name="nisn" value="{{old('nisn')}}" class="form-control form-control-sm" id="exampleInputUsername1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">NIS</label>
                    <input type="text" name="nis" value="{{old('nis')}}" class="form-control form-control-sm" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" name="nama" value="{{old('nama')}}" class="form-control form-control-sm" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control" name="alamat" value="{{old('alamat')}}" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">No Telp</label>
                    <input type="text" name="no_telp" value="{{old('no_telp')}}" class="form-control form-control-sm" id="exampleInputConfirmPassword1">
                </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection