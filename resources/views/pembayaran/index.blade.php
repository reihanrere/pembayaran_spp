@extends('layouts.app')

@section('content')
<div class="content-wrapper index-pembayaran">
    <div class="page-header">
        <h3 class="page-title">Pembayaran Tables</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
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
                                    <th>Petugas</th>
                                    <th>Siswa</th>
                                    <th>Tgl</th>
                                    <th>Bln</th>
                                    <th>Thn</th>
                                    <th>Nominal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembayaran as $pembayaran)
                                <tr>
                                    <td>{{$pembayaran->petugas->nama_petugas}}</td>
                                    <td>{{$pembayaran->siswa->nama}}</td>
                                    <td>{{$pembayaran->tgl_bayar}}</td>
                                    <td>{{$pembayaran->bln_bayar}}</td>
                                    <td>{{$pembayaran->thn_bayar}}</td>
                                    <td>{{$pembayaran->jumlah_bayar}}</td>
                                    <td>
                                        <a class="btn btn-inverse-primary btn-sm" href="/pembayaran/edit/{{$pembayaran->id_pembayaran}}">Update</a>
                                        <a class="btn btn-inverse-danger btn-sm" href="/pembayaran/delete/{{$pembayaran->id_pembayaran}}">Delete</a>
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
            <form class="forms-sample" method="POST" action="/pembayaran/create">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Tahun</label>
                    <input type="text" name="tahun" value="{{old('tahun')}}" class="form-control form-control-sm @error('tahun') is-invalid @enderror" id="exampleInputUsername1" required>
                    @error('tahun')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nominal</label>
                    <input type="text" name="nominal" value="{{old('nominal')}}" class="form-control form-control-sm @error('nominal') is-invalid @enderror" id="exampleInputEmail1" required>
                    @error('nominal')
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