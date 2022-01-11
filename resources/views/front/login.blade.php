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
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('loginpost')}}" method="post">
							@csrf
							<input type="text" placeholder="Name" name="logname"/>
							<input type="email" placeholder="Email Address" name="logemail" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>



				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>


				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('regispost')}}" method="post">
							@csrf
							<input type="text" placeholder="Name" name="name"/>
							<input type="email" placeholder="Email Address" email="email"/>
							<input type="password" placeholder="Password" name="password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
</section>
@include('front/includes/footer')
@include('front/includes/foot')
</body>
</html>