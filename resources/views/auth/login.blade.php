@extends('frontend.layouts.index')

@section('content')
<section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="login-form"><!--login form-->
                        <h2 align="center">Login</h2>
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
                        <form method="POST" action="{{url('/masuk')}}">
                        @csrf
                            <input id="login" type="text"
                                    class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="Username" value="{{ old('username') ?: old('email') }}" required autofocus placeholder="Username">

                                @if ($errors->has('username') || $errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                                @endif
                            <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            <div align="center">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                        </form>
                    </div><!--/login form-->
                </div>
                
            </div>
        </div>
    </section><!--/form-->
@endsection
