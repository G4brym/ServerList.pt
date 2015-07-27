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
$normalPosts = array();
$highlightedPosts = array();

$sum = $normalPosts + $highlightedPosts;


?>

	<div class="col-sm-3 pull-right">
		@include('cm/sidebar')
    </div>
    <div class="col-sm-9 pull-left">
	@if($sum === 0)
		@foreach($highlightedPosts as $post)
		<div class="fw-place-within-col">
			<div class="panel panel-warning">
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-comment"></i> post em destaque
					<div class ="pull-right">
						3 horas atrás
					</div>
				</h3>
			  </div>
			  <div class="panel-body">
				<p>
					<script>document.write(shortText("TODO", 1000));</script>
				</p>
			  </div>
			  <div class="panel-footer">
				Por <a href="#">G4brym</a>
				<div class="pull-right">
					<span class="label label-strong">Minijogos</span> <span class="label label-strong">Servidor</span>
				</div>
			  </div>
			</div>
		</div>
		@endforeach
		@foreach($normalPosts as $post)
		<div class="fw-place-within-col">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-comment"></i> titulo do post do blog
					<div class ="pull-right">
						3 horas atrás
					</div>
				</h3>
			  </div>
			  <div class="panel-body">
				<p id="blogtext">
				  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.<br>
				  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.<br>
				  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				  incididunt ut labore et dolore magna aliqua.
				</p>
			  </div>
			  <div class="panel-footer">
				Por <a href="#">G4brym</a>
				<div class="pull-right">
					<span class="label label-strong">Minijogos</span> <span class="label label-strong">Servidor</span>
				</div>
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
@stop
@section('js')
<script>
var longText = $('#blogtext1');
longText.text(longText.text().substr(0, 30));
</script>
@stop