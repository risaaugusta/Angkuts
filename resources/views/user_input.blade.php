@extends('layout.navlengkap')
@section('content')
@parent
        <div class="content" style="margin-top:-20px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Atur Jadwal Penjemputan</h4>
                            </div>
                            <div class="content">
                                <form action="{{ route('proses-validasi') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama"placeholder="Risa Augusta Murti">
                                                @error('nama')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control"id="alamat" name="alamat" placeholder="Jl. Mastrip Gg. Srikoyo 20, Kel. Jrebeng Wetan, Kec. Kedopok, RT 04 RW 04">
                                                @error('alamat')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Berat Sampah</label>
                                                <input type="text" class="form-control" id="berat_sampah" name="berat_sampah" placeholder="3 (dalam kg)">
                                                @error('berat_sampah')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Jemput</label>
                                                <input type="date" class="form-control"  id="tanggal_jemput" name="tanggal_jemput">
                                                @error('tanggal_jemput')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tps">TPS</label>
                                                <select class="form-control" id="id_petugas" name="id_petugas">
                                                  <option>-- Pilih TPS terdekat --</option>
                                                  @foreach ($petugas as $item)
                                                  <option value="<?= $item->id_petugas ?>"><?= $item->nama_tps ?></option>
                                                 @endforeach
                                                </select>
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

