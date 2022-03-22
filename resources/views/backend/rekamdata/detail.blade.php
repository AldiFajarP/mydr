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
                <h5 align="center" style="color:white;">Data User</h5>
            </div>
            <div class="card-body">
                <button class="btn btn-success" id="btn1">Lihat Semua Data</button>
                <button class="btn btn-info" id="btn2">Lihat Data Aktif</button>
                <button class="btn btn-danger" id="btn3">Lihat Data Terhapus</button>
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
                            <th>Aksi</th>                                                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekamdata1 as $rd1)
                        @if($rd1->Status == 'OPN')
                        <tr class="success">
                        @elseif($rd1->Status == 'DEL')
                        <tr class="danger">
                        @endif
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $rd1->Tanggal}}</td>
                            <td>{{ $rd1->Waktu}}</td>
                            <td>{{ $rd1->Lokasi}}</td>
                            <td>{{ $rd1->NamaTempat}}</td>
                            <td>{{ $rd1->JenisTempat}}</td>
                            <td>{{ $rd1->SuhuTubuh}}</td>
                            <td>{{ $rd1->Keterangan}}</td>
                            <td>
                                @if($rd1->Status == 'OPN')
                                <a href="{{ url('/admin/rekamdata/destroy/'.$users->id.'/'. $rd1->KodeRD)}}" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true" style="color:white;"> Hapus</i>
                                </a> 
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered table-hover" id="table2" name="table2" style="text-align:center; display:none;">
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
                            <th>Aksi</th>                                                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekamdata2 as $rd2)
                        <tr class="success">
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $rd2->Tanggal}}</td>
                            <td>{{ $rd2->Waktu}}</td>
                            <td>{{ $rd2->Lokasi}}</td>
                            <td>{{ $rd2->NamaTempat}}</td>
                            <td>{{ $rd2->JenisTempat}}</td>
                            <td>{{ $rd2->SuhuTubuh}}</td>
                            <td>{{ $rd2->Keterangan}}</td>
                            <td>
                                <a href="{{ url('/admin/rekamdata/destroy/'.$users->id.'/'. $rd2->KodeRD)}}" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true" style="color:white;"> Hapus</i>
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered table-hover" id="table3" name="table3" style="text-align:center; display:none;">
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
                        @foreach ($rekamdata3 as $rd3)
                        <tr class="danger">
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $rd3->Tanggal}}</td>
                            <td>{{ $rd3->Waktu}}</td>
                            <td>{{ $rd3->Lokasi}}</td>
                            <td>{{ $rd3->NamaTempat}}</td>
                            <td>{{ $rd3->JenisTempat}}</td>
                            <td>{{ $rd3->SuhuTubuh}}</td>
                            <td>{{ $rd3->Keterangan}}</td>
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

$(document).ready(function(){
  $("#btn1").click(function(){
    $("#table1").show();
    $("#table2").hide();
    $("#table3").hide();
  });
  $("#btn2").click(function(){
    $("#table1").hide();
    $("#table2").show();
    $("#table3").hide();
  });
  $("#btn3").click(function(){
    $("#table1").hide();
    $("#table2").hide();
    $("#table3").show();
  });
});
    
</script>
@endpush
@endsection
