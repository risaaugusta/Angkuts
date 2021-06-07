@extends('layout.navlengkap')
@section('content')
@parent
        <div class="content" style="margin-top:-20px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Data TPS</h4>
                            </div>
                            <div class="content">
                                <form action="{{route('admin-update',['petugas'=>$petugas->id_petugas])}}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama TPS</label>
                                                <input type="text" class="form-control" id="nama_tps" name="nama_tps" value="{{ old('nama_tps') ?? $petugas->nama_tps }}">
                                                @error('nama_tps')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control"id="alamat_tps" name="alamat_tps" value="{{ old('alamat_tps') ?? $petugas->alamat_tps }}">
                                                @error('alamat_tps')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                        @error('id_petugas')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success btn-fill pull-right">Ubah</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
@endsection

