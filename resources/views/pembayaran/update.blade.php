@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Updata Data</div>

                <div class="card-body">
                <form class="form-sample" method="POST" action="/spp/update/{{$spp->id_spp}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$spp->tahun}}{{old('tahun')}}" name="tahun" class="form-control form-control-sm @error('tahun') is-invalid @enderror" required />
                                    @error('tahun')
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
                                    <input type="text" value="{{$spp->nominal}}{{old('nominal')}}" name="nominal" class="form-control form-control-sm" required />
                                    @error('nominal')
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