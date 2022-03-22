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
                <button class="btn btn-success" id="btn1">User Biasa</button>
                <button class="btn btn-info" id="btn2">User Backend</button>
                <br></br>
                <table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
                    <thead style="background-color:#262626; color:white;">
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Aksi</th>                                                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user1 as $users1)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $users1->Username}}</td>
                            <td>{{ $users1->fullname}}</td>
                            <td>{{ $users1->nik}}</td>
                            <td>
                                <a href="{{ url('/admin/manajemenuser/destroy/'.$users1->id)}}" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true" style="color:white;"> Hapus</i>
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
