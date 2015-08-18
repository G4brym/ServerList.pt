@extends('layout.cm')
@section('body')
<?php

$posts = DB::table('bposts')->where('bp_cmid', '=', $cm->cm_id)->count();

$pages = ceil($posts/20);

if(isset($_GET["page"])){
	if($_GET["page"] < 1 || $_GET["page"] > $pages){
		$page = 1;
	} else {
		$page = $_GET["page"];
	}
} else {
	$page = 1;
}

$skip = $page * 20 - 20;

//todo
$normalPosts = DB::table('bposts')->where('bp_cmid', '=', $cm->cm_id)->where('bp_hl', '=', 0)->get();
$highlightedPosts = DB::table('bposts')->where('bp_cmid', '=', $cm->cm_id)->where('bp_hl', '=', 1)->get();

$sum = count($normalPosts) + count($highlightedPosts);

?>

	<div class="col-sm-3 pull-right">
		@include('cm/sidebar')
    </div>
    <div class="col-sm-9 pull-left">
	@if($sum != 0)
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
	<?php
	echo '
	<center>
	<nav>
	  <ul class="pagination">';

	if($page == 1){
		echo '
		<li class="disabled">
		  <a aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>';
	} else {
		echo '
		<li>
		  <a href="#" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>';
	}

	//escreve as paginas anteriores
	for ($i = $page - 4; $i < $page; $i++){
		if($i > 0){
			echo '<li><a href="'.URL::to('/minecraft?page='.$i).'">'.$i.'</a></li>';
		}
	}

	//escreve a pagina atual
	echo '<li class="active"><a>'.$page.'</a></li>';

	//escreve as paginas seguintes
	for ($i = $page + 1; $i <= $page + 4; $i++){
		if($i <= $pages){
			echo '<li><a href="'.URL::to('/minecraft?page='.$i).'">'.$i.'</a></li>';
		}
	}

	if($page == $pages){
		echo '
		<li class="disabled">
		  <a aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>';
	} else {
		echo '
		<li>
		  <a href="#" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>';
	}

	echo '
	  </ul>
	</nav>
	</center>';
	?>
	@else
	<div class="alert alert-warning">
	  <h4>Aviso</h4>
	  <p>Ainda não temos nenhum post no blog, passa pelo nosso <a href="#" class="alert-link">Forum</a> e deixa uma mensagem aos outros membros da comunidade.</p>
	</div>
	@endif
</div>
<script data-cfasync="false">
function writeTags(element, tags){
	document.getElementById(element).innerHTML = getTags(tags);
}
</script>
@stop