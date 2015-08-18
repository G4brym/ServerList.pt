@extends('layout.cm')
@section('body')
<?php
$posts = DB::table('bposts')->where('bp_cmid', '=', $cm->cm_id)->count();

//todo
$normalPosts = DB::table('bposts')->where('bp_cmid', '=', $cm->cm_id)->where('bp_hl', '=', 0)->get();
$highlightedPosts = DB::table('bposts')->where('bp_cmid', '=', $cm->cm_id)->where('bp_hl', '=', 1)->get();

$sum = count($normalPosts) + count($highlightedPosts);
?>
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
		@foreach($highlightedPosts as $post)
		<div class="fw-place-within-col">
			<div class="panel panel-warning">
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-comment"></i> {{ $post->bp_title }}
					<div class ="pull-right">
					{{ time::ago($post->bp_date) }}
					</div>
				</h3>
			  </div>
			  <div class="panel-body">
			    <img style="float:left; width:100px; height:100px; margin-right:10px;" src="https://dummyimage.com/100x100/000/fff" />
				<p>
					<script>document.write(shortText("{{ $post->bp_text }}", 1000));</script>
				</p>
			  </div>
			  <div class="panel-footer">
				<?php $pcreator = User::find($post->bp_creator); ?>
				Por <a href="{{ URL::to('/users/'.$pcreator->id) }}">{{ User::find($pcreator->id)->name }}</a>
				<div class="pull-right">{{ utilities::getTags($post->bp_tags) }} <a href="{{ URL::to('/blog/'.$post->bp_id) }}" class="btn btn-xs"><i class="fa fa-plus-square"></i> Continuar a ler</a></div>
			  </div>
			</div>
		</div>
		@endforeach
		@foreach($normalPosts as $post)
		<div class="fw-place-within-col">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-comment"></i> {{ $post->bp_title }}
					<div class ="pull-right">
					{{ time::ago($post->bp_date) }}
					</div>
				</h3>
			  </div>
			  <div class="panel-body">
			    <img style="float:left; width:100px; height:100px; margin-right:10px;" src="https://dummyimage.com/100x100/000/fff" />
				<p>
					<script>document.write(shortText("{{ $post->bp_text }}", 1000));</script>
				</p>
			  </div>
			  <div class="panel-footer">
				<?php $pcreator = User::find($post->bp_creator); ?>
				Por <a href="{{ URL::to('/users/'.$pcreator->id) }}">{{ User::find($pcreator->id)->name }}</a>
				<div class="pull-right">{{ utilities::getTags($post->bp_tags) }} <a href="{{ URL::to('/blog/'.$post->bp_id) }}" class="btn btn-xs"><i class="fa fa-plus-square"></i> Continuar a ler</a></div>
			  </div>
			</div>
		</div>
		@endforeach
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