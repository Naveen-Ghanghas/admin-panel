<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    @include('front/includes/head')
</head>
<body>
@include('front/includes/nav')
@include('front/includes/slider')
<section>
		<div class="container">
			<div class="row">
            @include('front/includes/sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($prodata as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('public/uploads/'.$pro->image)}}" alt="" />
											<h2>Rs.{{$pro->price}}</h2>
											<p>{{$pro->pname}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
	</section>
@include('front/includes/footer')
@include('front/includes/foot')
</body>
</html>