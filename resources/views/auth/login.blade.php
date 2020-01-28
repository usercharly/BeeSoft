<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon  Logo de la pagina en el navegador-->
	<link rel="shortcut icon" href="{{asset ('img/LogoEmpresaOfiweb2.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="DemoName">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>BeeSoft</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">							
		<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	</head>
	<body>
			<header id="header" id="home">
			<div class="container main-menu">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
					<a href=""><img src="img/LogoEmpresaOfiweb1-1-1-2.png" alt="" title="BeeSoft"/></a>
					</div>
					<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="/">Home</a></li>
					<!--<li><a href="{{ url('gatos') }}">Info</a></li> 
						<li><a href="{{ url('perros') }}">Fotos</a></li>-->
						<li><a href="{{ url('contacto') }}">Contac</a></li>
						<li>
						@if (Route::has('login'))
								@auth
									<a href="{{ url('/main') }}">Home</a>
								@else
									<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">login</a></li>
								@endauth

						@endif
						</li>
									              
					</ul>
					</nav><!-- #nav-menu-container -->		    		
				</div>
			</div>
			</header><!-- #header -->

		<!-- start banner Area -->
		<section class="banner-area relative" id="home">
			@yield('banner')	
		</section>
		<!-- End banner Area -->
		<div class="modal fade" id="popUpWindow">
			<div class="modal-dialog">
				<div class="modal-content">
				<!-- header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Ingresar</h3>
				</div>
				<!-- body -->
				<div class="modal-header">
		
					<form  method="POST" action="{{ route('login')}}">
						{{ csrf_field() }}
					<div class="form-group">
					<div class="form-group mb-3{{$errors->has('usuario' ? 'is-invalid' : '')}}">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						<input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
						{!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
					</div>
					<div class="form-group mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
						<span class="input-group-addon"><i class="icon-lock"></i></span>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						{!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
					</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-block">Log In</button>
					</div>
					</form>
				</div>
				<!-- footer -->
				
				
				</div>
			</div>
		</div>


		<!-- Start image-carusel Area -->
		<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Ingresa</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form  method="POST" action="{{ route('login')}}">
						{{ csrf_field() }}
					<div class="modal-body mx-3">
						<div class="md-form mb-5 {{$errors->has('usuario' ? 'is-invalid' : '')}}">
							<i class="lnr lnr-user"></i>

							<input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control validate" placeholder="Ingrese su Usuario">
							<label data-error="wrong" data-success="right" for="defaultForm-email">Usuario</label>
							{!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
						</div>

						<div class="md-form mb-4">
							<i class="lnr lnr-lock "></i>
							<input type="password" name="password" id="password" class="form-control validate" placeholder="Ingrese su Contraseña">
							<label data-error="wrong" data-success="right" for="defaultForm-pass">Contraseña</label>
							{!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
						</div>

					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button class="primary-btn text-uppercase"  type="submit">Login</button>
					</div>
					</form>
				</div>
			</div>
		</div>

		
		<!-- End image-carusel Area -->
		@yield('contenido')			
		<!-- start footer Area -->		
		<footer class="footer-area">
			<div class="container">
				<div class="row pt-120 pb-80">
					<div class="col-lg-6 col-md-6">
						<div class="single-footer-widget">
							<h6>Nosotros</h6>
							<p>
		"Estamos firmemente comprometidos con brindar los servicios que mejor se adapten a nuestros clientes.
		 Nosotros invertiremos en implementar las tecnologias que mejor
		  se adapten aplicando las investigaciones de mercado para su empresa".
							</p>
						</div>
		</div>
		<!--
					<div class="col-lg-4 col-md-6">
						<div class="single-footer-widget">
							<h6>Useful Links</h6>
							<div class="row">
								<ul class="col footer-nav">
									<li><a href="#">Home</a></li>
									<li><a href="#">Service</a></li>
									<li><a href="#">About</a></li>
									<li><a href="#">Case Study</a></li>
								</ul>
								<ul class="col footer-nav">
									<li><a href="#">Pricing</a></li>
									<li><a href="#">Team</a></li>
									<li><a href="#">Blog</a></li>
								</ul>									
							</div>
						</div>
					</div>-->						
					<div class="col-lg-6  col-md-6">
						<div class="single-footer-widget mail-chimp">
							<h6 class="mb-20">Contanos</h6>
							<ul class="list-contact">
								<li class="flex-row d-flex">
									<div class="icon">
										<span class="lnr lnr-home"></span>
									</div>
									<div class="detail">
										<h4>BeeSoft, Tecnology</h4>
										<p>
											Entre 16 de julio y Antezana
										</p>
									</div>	
								</li>
								<li class="flex-row d-flex">
									<div class="icon">
										<span class="lnr lnr-phone-handset"></span>
									</div>
									<div class="detail">
										<h4>(+591) 707 12345</h4>
										<p>
											Lun a Vie 9:00 a 18:00
										</p>
									</div>	
								</li>
								<li class="flex-row d-flex">
									<div class="icon">
										<span class="lnr lnr-envelope"></span>
									</div>
									<div class="detail">
										<h4>beesoft@gmail.com</h4>
										<p>
											Envianos un mensaje a nuestro correo
										</p>
									</div>	
								</li>																		
							</ul>
						</div>
					</div>						
				</div>
			</div>-->
			<div class="copyright-text">
				<div class="container">
					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-6 footer-text m-0 text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos Reservados <i class="fa fa-heart-o" aria-hidden="true"></i> por la empresa <a href="#" target="_blank"> Beesoft Tecnology</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-4 col-sm-6 footer-social">
							<!--<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>-->
						</div>
					</div>						
				</div>
			</div>
		</footer>
		<!-- End footer Area -->	

		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>			
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="js/easing.min.js"></script>			
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.min.js"></script>	
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>	
		<script src="js/owl.carousel.min.js"></script>						
		<script src="js/jquery.nice-select.min.js"></script>							
		<script src="js/mail-script.js"></script>	
		<script src="js/main.js"></script>	
		<script src="js/parsley.min.js"></script>
	</body>
</html>