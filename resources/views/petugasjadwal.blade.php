@extends('layout.navlengkap')
@section('content')
@parent

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">List Penjemputan Sampah</h4>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Berat Sampah</th>
                                <th>Tanggal Jemput</th>
                                <th>TPS</th>
                                <th colspan="2">Status</th>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                @foreach ($user as $data)
                                <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->berat_sampah}} kg</td>
                                    <td>{{$data->tanggal_jemput}}</td>
                                    <td>{{$data->nama_tps}}</td>
                                    @if ($data->status == 'sedang diproses')
                                    <td ><p id="demo{{$data->id_user}}"><i onclick="No({{$data->id_user}})" class="bi bi-x-square-fill" style="color:red"></i></p></td>
                                    <td><p id="oke{{$data->id_user}}"><i onclick="Yes({{$data->id_user}})" class="bi bi-check-square-fill" style="color:green"></a></td>
                                    @elseif ($data->status == 'selesai')
                                    <td><span class="label label-success">Selesai</span></td><td><span></span></td>
                                    @else
                                    <td><span class="label label-danger">Ditolak</span></td><td><span></span></td>
                                    @endif
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

<script>

    function No(no) {
        var x = document.getElementById("oke"+no);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
            x.style.display = "none";
    }
      document.getElementById("demo"+no).innerHTML = "<span class='label label-danger'>Ditolak</span>";
      // Create a request variable and assign a new XMLHttpRequest object to it.
        var request = new XMLHttpRequest()

        // Open a new connection, using the GET request on the URL endpoint
        request.open('GET', 'http://127.0.0.1:8000/konfirm-no/'+no, true) //127.0.0.1 menyesuaikan url masing-masing server
        request.send()
    }

    function Yes(no) {
        var x = document.getElementById("oke"+no);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
            x.style.display = "none";
    }
      document.getElementById("demo"+no).innerHTML = "<span class='label label-success'>Selesai</span>";
        // Create a request variable and assign a new XMLHttpRequest object to it.
        var request = new XMLHttpRequest()

        // Open a new connection, using the GET request on the URL endpoint
        request.open('GET', 'http://127.0.0.1:8000/konfirm-yes/'+no, true) //127.0.0.1 menyesuaikan url masing-masing server
        request.send()
    }

</script>

@endsection


