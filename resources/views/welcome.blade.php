@extends('auth.login')




@section('banner')
<div class="container">
    <div class="overlay overlay-bg"></div>
    <div class="row fullscreen d-flex align-items-center justify-content-start">
        <div class="banner-content col-lg-8 col-md-12">
            <h1 class="text-uppercase">
                <br>Mision</br>	
            </h1>
            <p class="text-white sub-head">
                Somos una empresa dedicada a la creacion de software que mejor se adapte a sus necesidades
				brindando la mejor atencion y asesoramiento.
            </p>
            <h1 class="text-uppercase">
            <br>Vision</br>
            </h1>
			<p class="text-white sub-head">
                Ser una empresa de renombre a nivel nacional y internacion, siendo referente local sobre desarrollo 
				de software .
            </p>
        </div>											
    </div>
</div>
@endsection

@section('contenido')
<!--<section class="image-carusel-area">
			<div class="container">
				

				<div class="row">
					<div class="active-image-carusel">
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c1.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c2.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c3.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c4.jpg" alt="">
						</div>	
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c1.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c2.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c3.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c4.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c1.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c2.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c3.jpg" alt="">
						</div>
						<div class="single-image-carusel">
							<img class="img-fluid" src="img/c4.jpg" alt="">
						</div>															
					</div>
				</div>
			</div>	
		</section> -->
<!-- <section class="home-about-area">
				<div class="container-fluid">
					<div class="row align-items-center">	
						<div class="col-lg-6 home-about-left no-padding">
							<img src="img/about-img.jpg" alt=""> 
						</div>
						<div class="col-lg-6 home-about-right no-padding">
							<h1>
                Ayudanos a ayudar
							</h1>
							<h5>Estamos para ayudar a todos los que no necesitan</h5>
							<p>
              Siempre lo decimos y lo recordamos y no nos cansaremos de seguir haciéndolo y diciéndolo, cuando se pierde un perro u otra mascota es muy importante que os mováis todo lo posible, que publiquéis los anuncios en varias webs, que los compartáis en redes sociales, que peguéis carteles en la zona dónde se perdió, que preguntéis por las calles a la gente, a los veterinarios, en perreras y protectoras... todo lo que pongáis de vuestro lado nunca va a estar de más y hay mucha gente, muchísima más de la que a priori ouedan pensar, dispuesta a ayudar.
							</p>
							<a href="{{ url('contacto') }}" class="primary-btn text-uppercase">Contactanos</a>
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End home-about Area -->
			

			<!-- Start video Area -->
		<!--	<section class="video-area section-gap">
				<div class="container">
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-8">
							<div class="about-video-right justify-content-center align-items-center d-flex relative">
								<div class="overlay overlay-bg"></div>
								<a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img class="img-fluid mx-auto" src="img/play-btn.png" alt=""></a>
							</div>
							<div class="description">
								<h4>Watch this video how they live here</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
								</p>								
							</div>
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End video Area -->
			

			<!-- Start process Area -->
		<!--	<section class="process-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">
								
								</p>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-process">
								<span class="lnr lnr-thumbs-up"></span>
								<a href="#">
									<h4>
										Registrate
									</h4>
								</a>
								<p>
									Envia tus datos para poder registrarte en la plataforma.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-process">
								<span class="lnr lnr-user"></span>
								<a href="#">
									<h4>
										Ingresa
									</h4>
								</a>
								<p>
									Ingresa a tu cuenta en la pagina con las credenciales que se enviaran a tu correo electronico.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-process">
								<span class="lnr lnr-license"></span>
								<a href="#">
									<h4>
                    Postea tu mascota
									</h4>
								</a>
								<p>
                Una que se te habilite la cuenta puedes subir todos los datos necesarios para poder registrar el extravio de tu mascota.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-process">
								<span class="lnr lnr-magic-wand"></span>
								<a href="#">
									<h4>
										Revisa tu post
									</h4>
								</a>
								<p>
									Las personas pueden ingresar en el post de tu mascota desaparecida y comentar si tienen alguna información, asi que debes estar atento. 
								</p>
							</div>
						</div>															
					</div>
				</div>	
			</section> -->
			<!-- End process Area -->
			

			<!-- Start testomial Area 
			<section class="testomial-area section-gap" id="testimonail">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Testimonials from our guardians</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-testimonial-carusel">
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t1.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t2.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t3.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>	
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t1.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t2.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t3.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>															
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t1.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t2.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="img/t3.png" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>														
						</div>
					</div>
				</div>	
			</section>-->
			<!-- End testomial Area -->						

			<!-- Start calltoaction Area 
			<section class="calltoaction-area section-gap relative">
				<div class="container">
					<div class="overlay overlay-bg"></div>						
					<div class="row align-items-center justify-content-center">
						<h1 class="text-white">Want to help? Become a Volunteer</h1>
						<p class="text-white">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
						</p>
						<div class="buttons d-flex flex-row">
							<a href="#" class="primary-btn text-uppercase">View pdf details</a>
							<a href="#" class="primary-btn text-uppercase">Register now</a>
						</div>
					</div>
				</div>	
			</section>
			End calltoaction Area -->
@endsection