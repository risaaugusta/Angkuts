@extends('layout.navuser')
@section('content')
@parent
                <div class="row">
                    @foreach ($petugas as $item )
                    <div class="col-md-4" style="margin-left:30px; margin-top: 10px">
                        <div class="card ">
                            <div class="header">
                                <img src="{{asset('img/tps2.jpg')}}" height="210"width="300px">
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <div class="legend">
                                        {{-- <i class="fa fa-circle text-info"></i> --}}
                                        <h5>{{$item->nama_tps}}</h5>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        {{$item->alamat_tps}}
                                    </div>
                                    <div class="button" style="margin-top:30px;margin-left:190px">
                                        <a href="https://www.google.com/maps/dir/Malang,+Kota+Malang,+Jawa+Timur//@-7.9531543,112.622176,14z/data=!4m8!4m7!1m5!1m1!1s0x2dd62822063dc2fb:0x78879446481a4da2!2m2!1d112.6326321!2d-7.9666204!1m0" type="submit" class="btn btn-success btn-fill pull-right">Lihat lokasi</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

@endsection

