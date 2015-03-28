<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="G4brym">

	<title>{{$title}}</title>

	<!-- SweetAlert -->
	{{ HTML::script(URL::to('/resources/sweetalert/sweet-alert.js')) }}
	{{ HTML::style(URL::to('/resources/sweetalert/sweet-alert.css')) }}
	
	<!-- Bootstrap Core CSS -->
	{{ HTML::style(URL::to('/resources/bootstrap/css/bootstrap-theme.css')) }}

	<!-- Custom CSS -->
	{{ HTML::style(URL::to('/resources/css/custom.css')) }}

	<!-- Custom Fonts -->
	{{ HTML::style(URL::to('/resources/font-awesome/css/font-awesome.min.css')) }}
	
	@yield('head')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ URL::to('/') }}">{{ settings::get("siteName") }}</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="about.html">About</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jogos <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu">
							<li>
								<a href="blog-home-1.html">Minecraft</a>
							</li>
							<li>
								<a href="blog-home-2.html">CSGO</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu">
							<li>
								<a href="blog-home-1.html">Blog Home 1</a>
							</li>
							<li>
								<a href="blog-home-2.html">Blog Home 2</a>
							</li>
							<li>
								<a href="blog-post.html">Blog Post</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

		@yield('header')
	
	<!-- Page Content -->
	<div class="container">

		<!-- Marketing Icons Section -->
		<br>
		
		<!-- Infos -->
        <noscript>
		<div class="alert alert-dismissible alert-warning">
		  <p>Para Poder Navegar Livremente Pelo Site, Têm De Ativar O JavaScript</p>
		</div>
		</noscript>
        @if(Session::has('success'))
		<div class="alert alert-dismissible alert-success">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <p>{{ Session::get('success') }}</p>
		</div>
        @endif
        @if($errors->any())
		<div class="alert alert-dismissible alert-danger">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <p>{{implode('', $errors->all(':message '))}}</p>
		</div>
        @endif
        <!-- /Infos -->
	
		@yield('body')

		<hr>

		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; <a href="{{ URL::to('/') }}">ServerList.pt</a> 2015</p>
					<p><a href="{{ URL::to('/') }}"><strong>ServerList.pt</strong></a> is not affiliated with Minecraft and Mojang AB.</p>
				</div>
			</div>
		</footer>

	</div>
	<!-- /.container -->

	<!-- jQuery -->
	{{ HTML::script(URL::to('/resources/js/jquery.js')) }}

	<!-- Bootstrap Core JavaScript -->
	{{ HTML::script(URL::to('/resources/bootstrap/js/bootstrap.min.js')) }}
	{{ HTML::script(URL::to('/resources/js/jqBootstrapValidation.js')) }}

</body>

</html>