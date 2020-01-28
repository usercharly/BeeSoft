@extends('auth.login')

@section('banner')
<div class="overlay overlay-bg"></div>
<div class="container">				
    <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
            <h1 class="text-white">
                Gatos				
            </h1>	
            <p class="text-white link-nav"><a href="index.html">Inicio </a>  <span class="lnr lnr-arrow-right"></span>  <a href="cats.html"> Gatos Extraviados</a></p>
        </div>	
    </div>
</div>
@endsection

@section('contenido')
<section class="cat-list-area section-gap">
    <div class="container">
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
        <div class="row">
			@foreach($mascotas as $mascota)
            <div class="col-lg-3 col-md-6">
                    
            <a href="/bloggato/{{$mascota->id}}">
                <div class="single-cat-list">
                     <img src="{{$mascota->imagen}}" alt="" class="img-fluid">
                    <div class="overlay">
                    <div class="text">{{$mascota->nombre}}</div>
                    </div>
                </div>
            </a>
            
			</div>	
			@endforeach											
        </div>
    </div>	
</section>
@endsection
