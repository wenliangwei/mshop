	@extends('layout.common')
	@section('title','')
	@section('content')
	
	
	<!-- slider -->
	<div class="slider">
		
		<ul class="slides">
			<li>
				<img src="/index/img/slide1.jpg" alt="">
				<div class="caption slider-content  center-align">
					<h2>WELCOME TO MSTORE</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="/index/img/slide2.jpg" alt="">
				<div class="caption slider-content center-align">
					<h2>JACKETS BUSINESS</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="/index/img/slide3.jpg" alt="">
				<div class="caption slider-content center-align">
					<h2>FASHION SHOP</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
		</ul>

	</div>
	<!-- end slider -->

	<!-- features -->
	<div class="features section">
		<div class="container">
			<div class="row">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-car"></i>
						</div>
						<h6>Free Shipping</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-dollar"></i>
						</div>
						<h6>Money Back</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
			<div class="row margin-bottom-0">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-lock"></i>
						</div>
						<h6>Secure Payment</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-support"></i>
						</div>
						<h6>24/7 Support</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end features -->


	<!-- promo -->
	<div class="promo section">
		<div class="container">
			<div class="content">
				<h4>PRODUCT BUNDLE</h4>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
				<button class="btn button-default">SHOP NOW</button>
			</div>
		</div>
	</div>
	<!-- end promo -->

	<!-- product -->
	<div class="section product">
		<div class="container">
			<div class="section-head">
				<h4>TOP PRODUCT</h4>
				<div class="divider-top"></div>
				<div class="divider-bottom"></div>
			</div>
			<div class="row">
				@foreach($data as $v)
				<input type="hidden" name="goods_id" value="{{$v->goods_id}}">
				<div class="col s6">
					<div class="content">
						<a href="/detail?goods_id={{$v->goods_id}}">

						<img src="{{$v->goods_file}}" alt=""></a>
						<h6><a href="">{{$v->goods_name}}</a></h6>
						<div class="price">
							￥{{$v->goods_price}} <span>$28</span>
						</div>
						<button class="btn button-default">
							<a href="{{url('detail?goods_id=')}}{{$v->goods_id}}" style="color:red;">ADD TO CART</a>
						</button>
					</div>
				</div>
				@endforeach
			</div>
			<div class="pagination-product">{{$data->links()}}</div>
		</div>
	</div>
	<!-- end product -->
	
	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	@endsection