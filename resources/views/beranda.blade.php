{{-- @extends('user')
@section('content')

@endsection --}}
@extends('layout.navlengkap')
@section('content')
@parent

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <b><h2 style="text-align:center">SELAMAT DATANG DI WEB ANGKUTS</h2></b>
                        <br>
                        <img style="margin-left:35%" src="{{asset('img/1.jpg')}}" class="img-fluid" width="315px" alt="ini gambar login">
                        <br>
                        <h4 style="text-align:center; font-family:Helvetica Neue">Hai <small class="text-muted">{{auth()->user()->name}} !</small></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


