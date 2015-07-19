@extends('layout.cm')
@section('body')
<div style="padding: 10px;">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
		<div class="item active" style="height: 200px;">
		  <img src="https://dummyimage.com/1200x220/000/fff" alt="Chania">
		</div>

		<div class="item" style="height: 200px;">
		  <img src="https://dummyimage.com/1200x220/000/fff" alt="Chania">
		</div>

		<div class="item" style="height: 200px;">
		  <img src="https://dummyimage.com/1200x220/000/fff" alt="Flower">
		</div>

		<div class="item" style="height: 200px;">
		  <img src="https://dummyimage.com/1200x220/000/fff" alt="Flower">
		</div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
</div>
<br>
    <div class="col-sm-6">
		<div class="fw-place-within-col">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">ergreg rfggerf ref ref</h3>
			  </div>
			  <div class="panel-body">
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
			  </div>
			</div>
		</div>
    </div>
    <div class="col-sm-6">
		<div class="fw-place-within-col">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">ergreg rfggerf ref ref</h3>
			  </div>
			  <div class="panel-body">
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.</p>
			  </div>
			</div>
		</div>
    </div>
@stop