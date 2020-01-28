@extends('auth.login')

@section('banner')
<div class="overlay overlay-bg"></div>
<div class="container">				
    <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
            <h1 class="text-white">
                Extraviado				
            </h1>	
            <p class="text-white link-nav"><a href="index.html">Inicio </a>  <span class="lnr lnr-arrow-right"></span>  <a href="cats.html"> Se busca</a></p>
        </div>	
    </div>
</div>
@endsection

@section('contenido')
<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
									<img class="img-fluid" src="{{url($mascota->imagen)}}" alt="">
									</div>									
								</div>
								<div class="col-lg-3  col-md-3 meta-details">
		
									<div class="user-details row">
									<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Telefono: {{$mascota->telefono}}</a> <span class="lnr lnr-phone"></span></p>
										<p class="view col-lg-12 col-md-12 col-6"><a href="#">Desaparecido en: {{$mascota->lugar}}</a> <span class="lnr lnr-eye"></span></p>																			
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<a class="posts-title" href="#"><h3>{{$mascota->nombre}}</h3></a>
									<p class="excert">
										{{$mascota->descripcion}}
									</p>

								</div>

							</div>
							@foreach($telefonos as $telefono)
							<div class="comments-area">
								<h4>Comentarios</h4>
								<div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c1.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">{{$telefono->nombre}}</a></h5>
                                                <p class="comment">
                                                    {{$telefono->descripcion}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
									                                             				
							</div>
							@endforeach
							<div class="comment-form">
								<h4>Dejar un comentario</h4>
								
								<form  method="post" action="{{route('postear',$mascota->id)}}" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="form-group form-inline">
									  <div class="form-group col-lg-6 col-md-12 name">
									    <input type="text" class="form-control" id="name" name="nombre" placeholder="Ingresar Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" required="true">
									  </div>
									  <div class="form-group col-lg-6 col-md-12 email">
									    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresar Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required="true">
									  </div>										
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" required="true">
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="descripcion" placeholder="Mensaje" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required="true"></textarea>
									</div>
									<button type="submit" class="btn btn-primary">Enviar Comentario</button>	
								</form>
							
							</div>
						</div>
						
						@foreach ($duenio as $dueni)
						<div class="col-lg-4 sidebar-widgets">
								<div class="widget-wrap">
									<div class="single-sidebar-widget user-info-widget">
										<img src="img/blog/user-info.png" alt="">
										<a href="#"><h4>Nombre: {{$dueni->nombre}}</h4></a>
										<p>
											Email: {{$dueni->email}}
										</p>
	
									</div>
																	
								</div>
							</div>
						@endforeach
						
						
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
@endsection