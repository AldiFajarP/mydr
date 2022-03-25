@extends('frontend.layouts.index')
@section('content')
<body>
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
                                <li><a href="/" class="active">Beranda</a></li>
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
                            <li class="pull-right"><a href="/changepassword">Ubah Password</a></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
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
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel" style="background-color:#b4aea4">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <br></br>
                                    <h1 style="color:white;"><span>MY</span>-DataRecord</h1>
                                    <h2>Rekam Jejak Keseharianmu</h2>
                                    <p style="color:black">Menyediakan berbagai fitur untuk merekam jejak keseharianmu . </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/avatar5.png" style="width:100%; height:100%;" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="row">                                
                <div class="col-sm-12 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center" style="color:#523000;">Catat Berbagai macam kegiatanmu</h2>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper" style="background-color:#fcad00;">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/1.png" alt="" />
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">                 
                                            </div>
                                        </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper" style="background-color:#fcad00;">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/2.png" alt="" /> 
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">         
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper" style="background-color:#fcad00;">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/3.png" alt="" />
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">  
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper" style="background-color:#fcad00;">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/4.png" alt="" />
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </section>
    
@endsection