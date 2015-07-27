		<div class="fw-place-within-col">
			<div class="panel panel-primary">
			  @if(Auth::guest())
				  <div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-user"></i> Bem Vindo <username></h3>
				  </div>
				  <div class="panel-body">
					  <center>
						<p>Para poderes usufruir do nosso site completamente, tens de fazer login</p>
						<a href="#" class="btn btn-success btn-xs">Login</a>
						<a href="#" class="btn btn-info btn-xs">Registar</a>
					  </center>
				  </div>
			  @else
				  <div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-user"></i> Bem Vindo {{ Auth::User()->name }}</h3>
				  </div>
				  <div class="panel-body">
					  <center>
						<p>Menssagem da comunidade</p>
					  </center>
				  </div>
			  @endif
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-facebook-square"></i> Facebook</h3>
			  </div>
			  <div class="panel-body">
				<div class="fb-page" data-href="https://www.facebook.com/divinitycraft.net" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><center><h5><i class="fa fa-spinner fa-spin"></i> A Carregar</h5></center></div></div>
			  </div>
			</div>
		</div>
@section('js')
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.4&appId=605657772798698";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
@stop