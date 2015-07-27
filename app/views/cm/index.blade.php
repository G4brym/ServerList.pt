@extends('layout.cm')
@section('body')
<div style="padding: 10px;">
	<div id="myCarousel" class="carousel slide carousel-image" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators carousel-image">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner carousel-image" role="listbox">
		<div class="item active carousel-item carousel-image">
		  <img src="https://dummyimage.com/1200x220/000/fff" class="carousel-image" alt="Chania">
		</div>

		<div class="item carousel-item carousel-image">
		  <img src="https://dummyimage.com/1200x220/000/fff" class="carousel-image" alt="Chania">
		</div>

		<div class="item carousel-item carousel-image">
		  <img src="https://dummyimage.com/1200x220/000/fff" class="carousel-image" alt="Flower">
		</div>

		<div class="item carousel-item carousel-image">
		  <img src="https://dummyimage.com/1200x220/000/fff" class="carousel-image" alt="Flower">
		</div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control carousel-image" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control carousel-image" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
</div>
<br>
    <div class="col-sm-3 pull-right">
		@include('cm/sidebar')
    </div>
    <div class="col-sm-9 pull-left">
		<div class="fw-place-within-col">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">titulo do post do blog
					<div class ="pull-right">
						3 horas atrás
					</div>
				</h3>
			  </div>
			  <div class="panel-body">
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
			  </div>
			  <div class="panel-footer">
				Por <a href="#">G4brym</a>
				<div class="pull-right">
					<span class="label label-strong">Minijogos</span> <span class="label label-strong">Servidor</span>
				</div>
			  </div>
			</div>
		</div>
		<div class="fw-place-within-col">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">titulo do post do blog
					<div class ="pull-right">
						3 horas atrás
					</div>
				</h3>
			  </div>
			  <div class="panel-body">
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
			  </div>
			  <div class="panel-footer">
				Por <a href="#">G4brym</a>
				<div class="pull-right">
					<span class="label label-strong">Minijogos</span> <span class="label label-strong">Servidor</span>
				</div>
			  </div>
			</div>
		</div>
		<div class="fw-place-within-col">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">titulo do post do blog
					<div class ="pull-right">
						3 horas atrás
					</div>
				</h3>
			  </div>
			  <div class="panel-body">
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
			  </div>
			  <div class="panel-footer">
				Por <a href="#">G4brym</a>
				<div class="pull-right">
					<span class="label label-strong">Minijogos</span> <span class="label label-strong">Servidor</span>
				</div>
			  </div>
			</div>
		</div>
		<center><a href="{{ URL::to('/blog') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Ver Mais Posts</a></center>
		<br>
	</div>
@stop
@section('js')
	<script language="JavaScript" type="text/javascript">
	  $(document).ready(function(){
		$('.carousel').carousel({
		  interval: 4000
		})
	  });    
	</script>
@stop