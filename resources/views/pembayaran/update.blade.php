@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Updata Data</div>

                <div class="card-body">
                <form class="form-sample" method="POST" action="/pembayaran/update/{{$pembayaran->id_pembayaran}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{auth()->user()->role == 'admin' ? 2 : 1}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Siswa</label>
                                <div class="col-sm-9">
                                    <select name="id_siswa" class="form-control form-control-sm  @error('id_siswa') is-invalid @enderror" required>
                                        <option value="{{$pembayaran->siswa->id_siswa}}">{{$pembayaran->siswa->nama}}</option>
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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nominal</label>
                                <div class="col-sm-9">
                                    <select name="jumlah_bayar" class="form-control form-control-sm  @error('jumlah_bayar') is-invalid @enderror" required>
                                        <option value="{{$pembayaran->jumlah_bayar}}">Rp. {{number_format($pembayaran->jumlah_bayar)}}</option>
                                        @foreach ($spp as $spp)
                                            <option value="{{$spp->nominal}}">Rp. {{number_format($spp->nominal)}}</option>
                                        @endforeach
                                    </select>
                                    @error('jumlah_bayar')
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
                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <select name="tgl_bayar" class="form-control form-control-sm  @error('tgl_bayar') is-invalid @enderror" required>
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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Siswa</label>
                                <div class="col-sm-9">
                                    <select name="bln_bayar" class="form-control form-control-sm  @error('bln_bayar') is-invalid @enderror" required>
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <select name="thn_bayar" class="form-control form-control-sm  @error('thn_bayar') is-invalid @enderror" required>
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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm btn-icon-text">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit 
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>



</script>
@endsection