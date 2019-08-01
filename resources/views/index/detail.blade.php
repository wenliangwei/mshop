	@extends('layout.common')
	@section('title','商品详情')
	@section('content')

	<!-- 详情 -->
	<div class="wishlist section">
		<meta name="csrf-token" content="{{csrf_token()}}">
		<div class="container">
			<div class="pages-head">
				<h3>WISHLIST</h3>
			</div>
			<div class="content">
				@foreach($data as $v)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>Image</h5>
						</div>
						<div class="col s7">
							<img src="{{$v->goods_file}}" alt="" width="100px">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Name</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$v->goods_name}}</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Stock Status</h5>
						</div>
						<div class="col s7">
							<div>
								<input type="hidden" name="goods_id" value="{{$v->goods_id}}">
								<input type="hidden" name="goods_number" value="{{$v->goods_number}}" id="goods_number">
								<input type="button" value="－" class="car_btn_1" style="width:40px;height:40px;" id="less" />
								<input type="text" value="1" class="car_ipt" style='padding:10px 10px;width:40px;' id="buy_num" />  
								<input type="button" value="＋"  class="car_btn_2" style="width:40px;height:40px;" id="add"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Price</h5>
						</div>
						<div class="col s7">
							<h5>￥{{$v->goods_price}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Total price</h5>
						</div>
						<div class="col s7">
							￥<b style="font-size:20px; color:#ff4e00;" id="goods_price">&nbsp;{{$v->goods_price}}</b>
						</div>
					</div>
					<div class="row">
						<div class="col 12">
							<button class="btn button-default">
								<a href="{{url('/cart_mix')}}?goods_id={{$v->goods_id}}" style="color:red;" id="to">SEND TO CART</a>
							</button>
						</div>
					</div>
				</div>
				@endforeach
				<div class="divider"></div>
			</div>
		</div>
	</div>
	<!--  详情 -->

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	@endsection
	<script src='/js/jquery-3.3.1.min.js'></script>
	<script>
	$.ajaxSetup({
		headers:
				{
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
	});
	$(function(){
		//获取库存
		var goods_number = $('#goods_number').val();
		// console.log(goods_number);
		//加号
		$('#add').click(function(){
			var buy_num=parseInt($('#buy_num').val());
			var goods_number=$('#goods_number').val();
			if(buy_num>=goods_number){
				$(this).prop('disabled',true);
			}else{
				buy_num += 1;
				 $('#buy_num').val(buy_num);
				$('#less').prop('disabled',false);
			}
			//总价
			total();
		});
		//减号
		$('#less').click(function(){
			var buy_num=parseInt($('#buy_num').val());
			var goods_number=$('#goods_number').val();
			if(buy_num<=1){
				$(this).prop('disabled',true);
			}else{
				buy_num -=1;
				$('#buy_num').val(buy_num);	
				$('#add').prop('disabled',false);
			}
			total();
		});
		//失去焦点
		$('#buy_num').blur(function(){
			var _this=$(this);
			var goods_number=$('#goods_number').val();
			var buy_num=_this.val();
			var reg=/^\d{1,}$/;
			//不是数字|| 为空|| 不能<=1
			if(!reg.test(buy_num)||buy_num==''||buy_num<=1)
			{
					_this.val(1);
			}else if(parseInt(goods_number)<=parseInt(buy_num)){
				_this.val(goods_number);
			}else{
				buy_num=parseInt(buy_num);
				_this.val(buy_num);
			}
			total();
		});
		//获取总价
		function total(){
			var goods_id=$('input[name=goods_id]').val();
			// console.log(goods_id);
			var buy_num=$('#buy_num').val();
			$.get(
					"price",
					{goods_id:goods_id,buy_num:buy_num},
					function(res){
						$('#goods_price').text(res);
					}
			)
		}
		//
		$("#to").click(function(){
			//获取商品id  购买数量
			var goods_id=$('input[name=goods_id]').val();
			var buy_number = $("#buy_num").val();
			{{--//传到控制器--}}
			{{--$.post(--}}
			{{--		"{{url('detail_mix')}}",--}}
			{{--		{goods_id:goods_id,buy_number:buy_number},--}}
			{{--		function(res){--}}
			{{--			if(res.code==1){--}}
			{{--				alert('加入购物车成功');--}}
			{{--				location.href="/cart_list"--}}
			{{--			}else{--}}
			{{--				alert('此商品已存在');--}}
			{{--			}--}}
			{{--		}--}}
			{{--);--}}
		});
	});
</script>
