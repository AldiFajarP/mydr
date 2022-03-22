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
	                            <li><a href="/">Beranda</a></li>
	                            <li class="dropdown"><a href="/rekamdata" class="active">Rekam Data</a></li>
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
                            <li class="pull-right"><a href="/tentangakun">Tentang Akun</a></li>
                            </ul>
                        </div>
                        @endif
	                </div>
	            </div>
	        </div>
	    </div>
	</header>
	<section id="cart_items">
		<div class="container">
			<div class="step-one">
				<h2 class="heading">Rekam Data</h2>
			</div>
			<div class="checkout-options">
				<h3>{{Auth::user()->fullname}}</h3>
				<p>NIK : {{Auth::user()->nik}}</p>
<!-- 				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul> -->
			</div><!--/checkout-options-->
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
			<div class="register-req">				
				<p>Isilah data dengan benar. Pastikan waktu dan tanggal sesuai dengan kegiatan / perjalanan yang anda lakukan.</p>
			</div><!--/register-req-->
			<form action="{{route('rekamdata.store')}}">
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Tanggal</p>
								<div class="input-group date" id="inputDate1">
				                    <input type="text" required class="form-control" name="Tanggal" id="inputDate1">
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
			                    </div>								
						</div>
						<div class="shopper-info">
							<p>Waktu</p>
								<div class="input-group date" id="inputTime1">
				                    <input type="text" required class="form-control" name="Waktu" id="inputTime1">
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
			                    </div>								
						</div>
					</div>
					<div class="col-sm-6 clearfix">
						<div class="bill-to text-center">
							<p>Lokasi</p>
							<div class="shopper-info">
								<input type="text" required class="form-control" name="Lokasi" id="Lokasi">
							</div>
						</div>
						<div class="col-sm-6 bill-to text-center">
							<p>Nama Tempat</p>
							<div class="shopper-info">
								<input type="text" required class="form-control" name="NamaTempat" id="NamaTempat">
							</div>
						</div>
						<div class="col-sm-6 bill-to text-center">
							<p>JenisTempat</p>
							<div class="shopper-info">
								<select name="ViewJenisTempat" id="ViewJenisTempat" required class="form-control" onclick="jt()">
									<option value="">Pilih Jenis</option>
									<option value="Coffee Shop">Coffee Shop</option>
									<option value="Mall">Mall</option>
									<option value="Pariwisata">Pariwisata</option>
									<option value="Tempat Olahraga">Tempat Olahraga</option>
									<option value="Festival / Event">Festival / Event</option>
									<option value="Lainnya">Lainnya</option>
								</select>
								<input style="display:none;" type="text" class="form-control" name="JenisTempat" id="JenisTempat" value="">								
							</div>
						</div>
					</div>
					<div class="col-sm-3 clearfix">
						<div class="bill-to text-right">
							<p>Suhu Tubuh</p>
							<div class="shopper-info">
								<div class="input-group date">
									<input type="number" required class="form-control" name="SuhuTubuh" id="SuhuTubuh" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
									<span class="input-group-addon">
					                        <span>C</span>
					                </span>
				             	</div>
							</div>
							<p>Keterangan</p>
							<div class="shopper-info">
								<select name="Keterangan" required class="form-control">
									<option value="">Pilih Keterangan</option>
									<option value="Normal">Normal</option>
									<option value="Tidak Normal">Tidak Normal</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-3 clearfix"></div>
					<div class="col-sm-6 clearfix text-center">
						<div class="col-sm-12 bill-to text-center">
							<div class="shopper-info">
								<button type="submit" class="btn btn-primary" style="width:100%;">Rekam Data</button>
							</div>
						</div>
					</div>										
					<div class="col-sm-3 clearfix"></div>
				</div>
			</div>
			</form>
			<div class="review-payment">
				<h2>Data Rekam Jejak Harian</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table" id="table">
					<thead>
						<tr class="cart_menu">
							<td style="width:15%;">Kode Rekam Data</td>
							<td style="width:10%;">Tanggal</td>
							<td style="width:5%;">Waktu</td>
							<td>Lokasi</td>
							<td>Nama Tempat</td>
							<td>Jenis Tempat</td>
							<td>Suhu Tubuh</td>
							<td>Keterangan</td>
						</tr>
					</thead>
					<tbody>
						@foreach($rekamdata as $data)
						<tr>
							<td>{{$data->KodeRD}}</td>
							<td>{{$data->Tanggal}}</td>
							<td>{{$data->Waktu}}</td>
							<td>{{$data->Lokasi}}</td>
							<td>{{$data->NamaTempat}}</td>
							<td>{{$data->JenisTempat}}</td>
							<td>{{$data->SuhuTubuh}} C</td>
							<td>{{$data->Keterangan}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
@push('scripts')
<script>
	$(document).ready(function() {
		$('#table').DataTable({
		    "order": [],
		        "bPaginate": true,
		        "bLengthChange": true,
		        "bFilter": true,
		        "bInfo": true,
		        "bAutoWidth": true 
		});
	});

	$('#inputDate1').datetimepicker({
    	defaultDate: new Date(),
    	format: 'YYYY-M-DD'
	});

	$('#inputTime1').datetimepicker({
	    defaultDate: new Date(),
	    format: 'HH:mm:00'
	});

	$(document).ready(function(){

		$("#")

	});
	function jt() {
		$data = $("#ViewJenisTempat").val();

		if($data == 'Lainnya') {
			$("#JenisTempat").show();
			$("#JenisTempat").val(null); 
		} else {
			$("#JenisTempat").hide();
			$("#JenisTempat").val($data); 
		}
	}
</script>
@endpush
</body>
@endsection