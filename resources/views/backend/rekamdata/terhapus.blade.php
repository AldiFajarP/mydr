@extends('backend.index')
@section('content')
<br></br>
<div class="row justify-content-center unselect">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: #0077ff; height:60px;">
                <h3 style="color:white;">User</h3>
            </div>  
            <div class="card-title" style="background-color:white;">
                @if(session()->get('created'))
                    <div class="alert alert-success alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('created') }}
                    </div>

                    @elseif(session()->get('edited'))
                    <div class="alert alert-info alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('edited') }}
                    </div>

                    @elseif(session()->get('deleted'))
                    <div class="alert alert-danger alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">   </button>
                        {{ session()->get('deleted') }}
                    </div>
                    @endif
                    <div style="padding-top:1%; padding-left:1%; padding-bottom:1%; padding-right:1%;" class="text-center">
                        @foreach($user as $users)
                        <div class="col-md-12">
                            <label>Username</label>
                            <input type="text" value="{{$users->Username}}" readonly class="form-control" style="text-align:center;">
                            <label>Nama Lengkap</label>
                            <input type="text" value="{{$users->fullname}}" readonly class="form-control" style="text-align:center;">
                            <label>NIK</label>
                            <input type="text" value="{{$users->nik}}" readonly class="form-control" style="text-align:center;">
                        </div>
                        @endforeach
                    </div>
            </div>            
        </div>    
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color:#0077ff; padding: 0.1% 0.1% 0.1% 0.1%;">
                <h5 align="center" style="color:white;">Rekam Data Terhapus</h5>
            </div>
            <div class="card-body">
                @if($aktif == '0')
                <a class="btn btn-success" disabled>Lihat Data Aktif ({{$aktif}})</a>
                @else
                <a href="{{ url('/admin/rekamdata/'. $users->id)}}" class="btn btn-success">Lihat Data Aktif ({{$aktif}})</a>
                @endif

                <br></br>
                <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                    <thead style="background-color:#262626; color:white;">
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>NamaTempat</th>
                            <th>JenisTempat</th>
                            <th>SuhuTubuh</th>
                            <th>Keterangan</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekamdata as $rd)
                        @if($rd->Status == 'OPN')
                        <tr class="success">
                        @elseif($rd->Status == 'DEL')
                        <tr class="danger">
                        @endif
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $rd->Tanggal}}</td>
                            <td>{{ $rd->Waktu}}</td>
                            <td>{{ $rd->Lokasi}}</td>
                            <td>{{ $rd->NamaTempat}}</td>
                            <td>{{ $rd->JenisTempat}}</td>
                            <td>{{ $rd->SuhuTubuh}}</td>
                            <td>{{ $rd->Keterangan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function() {

    $('#table1').DataTable({
        "order": [],
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true 
    });

});
</script>
@endpush
@endsection
