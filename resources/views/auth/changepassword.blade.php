@extends('frontend.layouts.index')

@section('content')
<header id="header"><!--header-->
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/">Beranda</a></li>
                                <li class="dropdown"><a href="/rekamdata">Rekam Data</a></li>
                            </ul>
                        </div>
                        @if(Auth::user())
                        <div class="mainmenu pull-right">
                            @if(Auth::user()->roleid != '1')
                            <ul class="nav navbar-nav collapse navbar-collapse">
                            <li class="pull-right"><a href="/admin/panel">Admin Panel</a></li>
                            </ul>
                            @endif
                            <ul class="nav navbar-nav collapse navbar-collapse">
                            <li class="pull-right"><a href="/changepassword" class="active">Ubah Password</a></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
<section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="login-form"><!--login form-->
                        <h2 align="center">Ubah Password</h2>
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
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session()->get('deleted') }}
                        </div>
                        @endif
                        <form action="{{ url('/user/change') }}" method="get">
                            @csrf

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @method('GET')
                            @foreach($users as $user)
                            <input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
                            <input type="hidden" name="name" value="{{ $user->Username }}" class="form-control">
                            @endforeach
                            <div class="form-group">
                                <label>Password Lama: </label>
                                <input type="password" required="required" name="password" placeholder="Password Lama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password Baru: </label>
                                <input type="password" required="required" name="newpassword" placeholder="Password Baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password Baru: </label>
                                <input type="password" required="required" name="newpassword_confirmation" placeholder="Password Baru" class="form-control">
                            </div>
                            <div align="center">
                            <button class="btn btn-success text-center" onclick="return confirm('Konfirmasi ubah password?')">Simpan</button>
                        </div>
                        </form>

                    </div><!--/login form-->
                </div>
                
            </div>
        </div>
    </section><!--/form-->
@endsection
