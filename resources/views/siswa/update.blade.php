@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Updata Data</div>

                <div class="card-body">
                <form class="form-sample" method="POST" action="/siswa/update/{{$siswa->id_siswa}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NISN</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$siswa->nisn}}{{old('nisn')}}" name="nisn" class="form-control form-control-sm @error('nisn') is-invalid @enderror" required />
                                    @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIS</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$siswa->nis}}{{old('nis')}}" name="nis" class="form-control form-control-sm" required />
                                    @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$siswa->nama}}{{old('nama')}}" name="nama" class="form-control form-control-sm" required />
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$siswa->no_telp}}{{old('no_telp')}}" name="no_telp" class="form-control form-control-sm" required />
                                    @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kelas</label>
                                <div class="col-sm-9">
                                    <select name="id_kelas" class="form-control form-control-sm" required>
                                        <option></option>
                                        <option value="1">X-A</option>
                                        <option value="2">X-B</option>
                                        <option value="3">X-C</option>
                                        <option value="4">XI-A</option>
                                        <option value="5">XI-B</option>
                                        <option value="6">XII-A</option>
                                        <option value="7">XII-B</option>
                                    </select>
                                    @error('id_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" class="form-control" id="exampleTextarea1" rows="2" required></textarea>
                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit 
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection