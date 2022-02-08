@extends('layouts.app')

@section('content')
<div class="content-wrapper index-siswa">
    <div class="page-header">
        <h3 class="page-title">Siswa Tables</h3>
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
                                    <th>Kelas</th>
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
                                    <td>{{$siswa->kelas->nama_kelas}}</td>
                                    <td>{{$siswa->alamat}}</td>
                                    <td>{{$siswa->no_telp}}</td>
                                    <td>
                                        <a class="btn btn-inverse-primary btn-sm" href="/siswa/edit/{{$siswa->id_siswa}}">Update</a>
                                        <a class="btn btn-inverse-danger btn-sm" href="/siswa/delete/{{$siswa->id_siswa}}">Delete</a>
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
                    <input type="text" name="nisn" value="{{old('nisn')}}" class="form-control form-control-sm @error('nisn') is-invalid @enderror" id="exampleInputUsername1" required>
                    @error('nisn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">NIS</label>
                    <input type="text" name="nis" value="{{old('nis')}}" class="form-control form-control-sm @error('nis') is-invalid @enderror" id="exampleInputEmail1" required>
                    @error('nis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" name="nama" value="{{old('nama')}}" class="form-control form-control-sm @error('nama') is-invalid @enderror" id="exampleInputPassword1" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <select class="form-control form-control-sm @error('id_kelas') is-invalid @enderror" name="id_kelas" id="exampleSelectGender">
                        @foreach ($kelas as $kelas)
                            <option value="{{$kelas->id_kelas}}">{{$kelas->nama_kelas}}</option>
                            @var_dump($kelas)
                        @endforeach
                    </select>
                    @error('id_kelas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('alamat')}}" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">No Telp</label>
                    <input type="text" name="no_telp" value="{{old('no_telp')}}" class="form-control form-control-sm @error('no_telp') is-invalid @enderror" id="exampleInputConfirmPassword1">
                    @error('no_telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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