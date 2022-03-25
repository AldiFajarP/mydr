@extends('backend.index')

@section('content')
<section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-3" style="padding-top: 25%;">
                    <div class="login-form"><!--login form-->
                        <h2 align="center">Tambah User Backend</h2>
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
                        <form action="{{ route('backenduser.store') }}" method="POST">
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
                            <div class="form-group">
                            <input class="form-control" name="Username" placeholder="Username" type="text" required>
                            </div>
                            <div class="form-group">
                            <input class="form-control" name="fullname" placeholder="Nama Lengkap" type="text" required>
                            </div>
                            <div class="form-group">
                            <input class="form-control" name="nik" placeholder="NIK" type="text" onkeypress="validate(event)" required>
                            </div>
                            <div class="form-group">
                            <input class="form-control" name="password" placeholder="Password" type="password" required>
                            </div>
                            <div class="form-group">
                            <input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password" id="password-confirm" required autocomplete="new-password">
                            </div>
                            <div align="center">
                            <button type="submit" class="btn btn-default">Tambahkan</button>
                        </div>
                        </form>

                    </div><!--/login form-->
                </div>
                
            </div>
        </div>
    </section><!--/form-->
@endsection
