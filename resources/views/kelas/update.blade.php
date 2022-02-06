@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Updata Data</div>

                <div class="card-body">
                <form class="form-sample" method="POST" action="/kelas/update/{{$kelas->id_kelas}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Kelas</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$kelas->nama_kelas}}{{old('nama_kelas')}}" name="nama_kelas" class="form-control form-control-sm @error('nama_kelas') is-invalid @enderror" required />
                                    @error('nama_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$kelas->kompetensi_keahlian}}{{old('kompetensi_keahlian')}}" name="kompetensi_keahlian" class="form-control form-control-sm" required />
                                    @error('kompetensi_keahlian')
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