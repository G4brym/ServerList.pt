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
		<div class="item active carousel-item">
		  <img src="https://dummyimage.com/1200x220/000/fff" alt="Chania">
		</div>

		<div class="item carousel-item">
		  <img src="https://dummyimage.com/1200x220/000/fff" alt="Chania">
		</div>

		<div class="item carousel-item">
		  <img src="https://dummyimage.com/1200x220/000/fff" alt="Flower">
		</div>

		<div class="item carousel-item">
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
	
<table class="tborder" border="0" cellpadding="4" cellspacing="1">
<tbody><tr>
 
<td class="thead">
Welcome, Guest.
</td>
</tr>
<tr>
<td class="trow2">
Hello guest, we highly recommend you login to your account or register one, viewing as a guest will restrict you to what you can do. o register or login below.<br><br>
<center><a href="https://forum.divinitycraft.net/member.php?action=login" class="button">Login</a> or <a href="https://forum.divinitycraft.net/member.php?action=register" class="button">Register</a></center>
<br>
</td>
 
</tr>
<tr><td class="thead-nor">
Vota no Servidor
</td></tr>
<tr><td class="trow1">
<iframe src="https://www.serverlist.pt/embed/vote?gm=mc&amp;sid=1" scrolling="no" marginheight="0" marginwidth="0" allowtransparency="true" frameborder="0" height="30" width="185"></iframe>
</td></tr>
<tr>
</tr><tr>
<td class="thead-nor">
Procurar <span style="float:right;margin-right:10px;"><a href="https://forum.divinitycraft.net/search.php"><img src="images/MyCraft/gear.png" title="Advanced Search"></a></span>
</td></tr><tr><td class="trow1"><div class="searchbox">
<form method="post" action="https://forum.divinitycraft.net/search.php">
<input name="action" value="do_search" type="hidden">
<input name="postthread" value="1" type="hidden">
<input name="forums" value="all" type="hidden">
<input name="showresults" value="threads" type="hidden">
<input class="textbox" name="keywords" onfocus="if(this.value=='Enter Search Terms...'){this.value='';}" onblur="if(this.value==''){this.value='Enter Search Terms...';}" value="O Que quer Procurar?" type="text">
<input class="button" value="Ir" type="submit">
</form></div></td></tr>
<tr>
<td class="thead-nor">
Publicidade
</td></tr>
<tr><td class="trow1" align="center">

</td></tr>
<tr>
<td class="thead-nor">
Facebook
</td></tr>
<tr><td class="trow1" align="center">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fdivinitycraft.net&amp;width=270&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=605657772798698" scrolling="no" style="border:none; overflow:hidden; width:270px; height:290px;" allowtransparency="true" frameborder="0"></iframe>
</td></tr>
</tbody></table>
@stop