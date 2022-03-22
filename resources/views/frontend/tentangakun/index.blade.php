@extends('frontend.layouts.index')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<br/><br/><br/><br/><br/><br/>
				<div class="col-sm-12 padding-right">
					<h1 class="text-center">Test</h1>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-9">
							<div class="product-information" style="background-color: #d1d1d1;"><!--/product-information-->
								<h2 class="text-left">Data Akun</h2>
								<h2>Anne Klein Sleeveless Colorblock Scuba</h2>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>US $59</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
						<div class="col-sm-3">
							<div class="product-information" style="background-color: #d1d1d1;"><!--/product-information-->
								<h2 class="text-right" style="padding-right:10%;">Pengaturan</h2>
								<h2>Anne Klein Sleeveless Colorblock Scuba</h2>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />

								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->					
				</div>
			</div>
		</div>
	</section>
@endsection