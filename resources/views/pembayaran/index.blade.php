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
                                    <td>Rp. {{number_format($pembayaran->jumlah_bayar)}}</td>
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
                <input type="hidden" name="id_petugas" value={{auth()->user()->role == "admin" ? 2 : 1}}>
                {{-- <div class="form-group">
                    <label for="exampleSelectPetugas">Petugas</label>
                    <select class="form-control form-control-sm @error('id_petugas') is-invalid @enderror" name="id_petugas" id="exampleSelectPetugas">
                        <option value=""></option>
                        @foreach ($petugas as $petugas)
                            <option value="{{$petugas->id_petugas}}">{{$petugas->nama_petugas}}</option>
                        @endforeach
                    </select>
                    @error('id_petugas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="exampleSelectSiswa">Siswa</label>
                    <select class="form-control form-control-sm @error('id_siswa') is-invalid @enderror" name="id_siswa" id="exampleSelectSiswa">
                        <option value=""></option>
                        @foreach ($siswa as $siswa)
                            <option value="{{$siswa->id_siswa}}">{{$siswa->nama}}</option>
                        @endforeach
                    </select>
                    @error('id_siswa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelectTanggal">Tanggal</label>
                    <select class="form-control form-control-sm @error('tgl_bayar') is-invalid @enderror" name="tgl_bayar" id="exampleSelectTanggal">
                        {{$hari = date("d")}}
                        <option value={{$hari}}>{{$hari}}</option>
                        @for ($tgl = 1; $tgl <= 31; $tgl++)
                            <option value={{$tgl}}>{{strlen($tgl) == 1 ? "0" . $tgl : $tgl}}</option>
                        @endfor
                    </select>
                    @error('tgl_bayar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelectBulan">Bulan</label>
                    <select class="form-control form-control-sm @error('bln_bayar') is-invalid @enderror" name="bln_bayar" id="exampleSelectBulan">
                        {{$bulan = date("M")}}
                        <option value={{$bulan}}>{{$bulan}}</option>
                        <option value="januari">Jan</option>
                        <option value="februari">Feb</option>
                        <option value="maret">Mar</option>
                        <option value="april">Apr</option>
                        <option value="mei">May</option>
                        <option value="juni">Jun</option>
                        <option value="juli">Jul</option>
                        <option value="agustus">Aug</option>
                        <option value="september">Sep</option>
                        <option value="oktober">Oct</option>
                        <option value="november">Nov</option>
                        <option value="desember">Des</option>
                    </select>
                    @error('bln_bayar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelectTahun">Tahun</label>
                    <select class="form-control form-control-sm @error('thn_bayar') is-invalid @enderror" name="thn_bayar" id="exampleSelectTahun">
                        {{$tahun = date("Y")}}
                        {{$previous = $tahun - 5}}
                        <option value={{$tahun}}>{{$tahun}}</option>
                        @for ($thn = 0; $thn < 10; $thn++)    
                            <option value={{$previous+$thn}}>{{$previous+$thn}}</option>
                        @endfor  
                    </select>
                    @error('thn_bayar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelectjumlah_bayar">Nominal</label>
                    <select class="form-control form-control-sm @error('jumlah_bayar') is-invalid @enderror" name="jumlah_bayar" id="exampleSelectjumlah_bayar">
                        <option value=""></option>
                        @foreach ($spp as $spp)
                            <option value="{{$spp->nominal}}">Rp.{{number_format($spp->nominal)}}</option>
                        @endforeach
                    </select>
                    @error('jumlah_bayar')
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