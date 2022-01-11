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
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
                        @if($message=Session::get('succMsg'))
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                        @endif
	    				<div class="status alert alert-success" style="display: none"></div>

				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{url('postcontact')}}">
                            @csrf
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control"  placeholder="Name">
								@error('email')
								<div class="alert alert-danger">
									{{$errors->first('name')}}
								</div>
								@enderror
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" placeholder="Email">
								@error('email')
								<div class="alert alert-danger">
									{{$errors->first('email')}}
								</div>
								@enderror
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control"  placeholder="Subject">
								@error('email')
								<div class="alert alert-danger">
									{{$errors->first('subject')}}
								</div>
								@enderror
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message"  class="form-control" rows="8" placeholder="Your Message Here"></textarea>
								@error('email')
								<div class="alert alert-danger">
									{{$errors->first('message')}}
								</div>
								@enderror
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
</div>
@include('front/includes/footer')
@include('front/includes/foot')
</body>
</html>