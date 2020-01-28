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
										<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
									</div>									
								</div>
								<div class="col-lg-3  col-md-3 meta-details">
		
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Dueño: Oscar Montaño</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">Fecha de desaparicion: 11/11/11</a> <span class="lnr lnr-calendar-full"></span></p>
										<p class="view col-lg-12 col-md-12 col-6"><a href="#">Desaparecido en: *******</a> <span class="lnr lnr-eye"></span></p>																			
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<a class="posts-title" href="#"><h3>Nombre del Perro</h3></a>
									<p class="excert">
										Descripcion
									</p>

								</div>

							</div>
							<div class="comments-area">
								<h4>01 Comentarios</h4>
								<div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c1.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Emilly Blunt</a></h5>
                                                <p class="comment">
                                                    Tu perrito esta muerto :'v
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
									                                             				
							</div>
							<div class="comment-form">
								<h4>Dejar un comentario</h4>
								<form>
									<div class="form-group form-inline">
									  <div class="form-group col-lg-6 col-md-12 name">
									    <input type="text" class="form-control" id="name" placeholder="Ingresar Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
									  </div>
									  <div class="form-group col-lg-6 col-md-12 email">
									    <input type="email" class="form-control" id="email" placeholder="Ingresar Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
									  </div>										
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="subject" placeholder="Asunto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="message" placeholder="Mensaje" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
									</div>
									<a href="#" class="primary-btn text-uppercase">Postear Comentario</a>	
								</form>
							</div>
						</div>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget user-info-widget">
									<img src="img/blog/user-info.png" alt="">
									<a href="#"><h4>Nombre: Oscar Montaño</h4></a>
									<p>
										Telefono: 7********
									</p>

								</div>
																
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
@endsection