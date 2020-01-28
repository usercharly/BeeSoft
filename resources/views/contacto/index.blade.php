@extends('auth.login')

@section('banner')
<div class="overlay overlay-bg"></div>
<div class="container">				
    <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
            <h1 class="text-white">
                Contactanos	
							
            </h1>	
            <p>No dude en contactarnos</p>
        </div>	
    </div>
</div>
@endsection

@section('contenido')
<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<!--<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>-->
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>BeeSoft Tecnology</h5>
									<p>Entre 16 de julio y Antezana</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>(+591) 789-12345</h5>
									<p>Lun a Vie 9:00 a 18:00</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>BeeSoft@gmail.com</h5>
									<p>Envianos un mensaje a nuestro correo</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form  method="post" action="{{route('contactar')}}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="row">	
									<div class="col-lg-6 form-group"> 
										<input name="nombre" placeholder="Ingresa tu nombre completo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu nombre'" class="common-input mb-20 form-control" required="" type="text">
				
										<input name="email" placeholder="Ingresa tu email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu email'" class="common-input mb-20 form-control" required="" type="email">

										<input name="asunto" placeholder="Asunto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Asunto'" class="common-input mb-20 form-control" required="" type="text">

									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="descripcion" placeholder="Mensaje" onfocus="this.placeholder = 'Mensaje'" onblur="this.placeholder = 'Messege'" required=""></textarea>						
	
									</div>
									<div class="col-lg-12 d-flex justify-content-between" >
										<div class="alert-msg" style="text-align: left;"></div>
										<button type="submit" class="genric-btn primary circle" style="float: right;">Enviar su Solicitud</button>		
									</div>
								</div>
							</form>	
						</div>
					</div>
					<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
								<div class="contact-details">
									<p>Envianos un mensaje para poder contactarte y asesorarte en sus proyectos. Gracias por confiar en nosotros</p>
								</div>
							</div>
					</div>
				</div>	
			</section>
@endsection

