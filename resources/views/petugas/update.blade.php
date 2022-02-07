@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Updata Data</div>

                <div class="card-body">
                <form class="form-sample" method="POST" action="/petugas/update/{{$petugas->id_petugas}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$petugas->username}}{{old('username')}}" name="username" class="form-control form-control-sm @error('username') is-invalid @enderror" required />
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" value="{{$petugas->password}}{{old('password')}}" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" required />
                                    @error('password')
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
                                    <input type="text" value="{{$petugas->nama_petugas}}{{old('nama_petugas')}}" name="nama_petugas" class="form-control form-control-sm @error('nama_petugas') is-invalid @enderror" required />
                                    @error('nama_petugas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" value="{{$petugas->email}}{{old('email')}}" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" required />
                                    @error('email')
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
                                <label class="col-sm-3 col-form-label">Level</label>
                                <div class="col-sm-9">
                                    <select name="level" class="form-control form-control-sm @error('level') is-invalid @enderror" required>
                                        <option></option>
                                        <option value="1">X-A</option>
                                        <option value="2">X-B</option>
                                        <option value="3">X-C</option>
                                        <option value="4">XI-A</option>
                                        <option value="5">XI-B</option>
                                        <option value="6">XII-A</option>
                                        <option value="7">XII-B</option>
                                    </select>
                                    @error('level')
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
@endsection