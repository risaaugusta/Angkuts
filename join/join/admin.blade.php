@extends('layout.navadmin')
@section('content')
@parent
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Data TPS</h4>
                                @if(session()->has('message'))
                                <div class="alert alert-info">
                                    {{session()->get('message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <a href="{{ route('admin-input') }}" type="submit" class="btn btn-success btn-fill pull-right">Tambah data</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                    	<th>Nama TPS</th>
                                    	<th>Alamat</th>
                                    	<th colspan="2" style="text-align: center">Aksi</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($petugas as $p)
                                        <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$p->nama_tps}}</td>
                                        <td>{{$p->alamat_tps}}</td>
                                        {{-- <td><a href="{{route('mahasiswas.show',['mahasiswa'=>$mahasiswa->id])}}" class="bi bi-arrow-up-right-square-fill" style="color:rgb(11, 185, 11)"></a></td> --}}
                                        {{-- <td><a href="{{route('admin-delete',['petugas' => $p->id])}}" class="bi bi-trash-fill" style="color:rgb(182, 12, 7)"></a></td> --}}
                                        <td>
                                            @csrf
                                            <a href="{{route('admin-delete',['petugas' => $p->id_petugas])}}" type="submit" class="btn btn-danger">Hapus</button>
                                        </td>
                                        <td>
                                            <a href="{{route('admin-edit',['petugas'=>$p->id_petugas])}}"
                                                class="btn btn-success">Edit</a>
                                        </td>
                                    </tr>
                                        @empty
                                        <td colspan="7" class="text-center">Tidak ada data...</td>
                                        @endforelse

                                        {{-- <tr>
                                        	<td>1</td>
                                        	<td>Testing</td>
                                        	<td>Sawojajar</td>
                                            <td><a href="" class="bi bi-trash-fill" style="color:rgb(182, 12, 7)"></a></td>
                                            <td><a href="" class="bi bi-arrow-up-right-square-fill" style="color:rgb(11, 185, 11)"></a></td>
                                        </tr> --}}

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

