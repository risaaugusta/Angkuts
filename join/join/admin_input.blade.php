@extends('layout.navadmin')
@section('content')
@parent
        <div class="content" style="margin-top:-20px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Data TPS</h4>
                            </div>
                            <div class="content">
                                <form action="{{url('/proses-validasi-admin')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama TPS</label>
                                                <input type="text" class="form-control" id="nama_tps" name="nama_tps"placeholder="TPS Sawojajar">
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
                                                <input type="text" class="form-control"id="alamat_tps" name="alamat_tps" placeholder="Jl. Danau Maninjau 13, Kel. Sawojajar, Kec. Kedungkandang, RT 04 RW 04">
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

                                    <button type="submit" class="btn btn-success btn-fill pull-right">Kirim</button>
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

