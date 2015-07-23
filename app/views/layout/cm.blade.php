<!DOCTYPE html>
<html lang="pt-PT">

<head>

	<link rel="shortcut icon" type="image/png" href="{{ URL::to('/resources/images/website/favicon.png') }}"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Os Melhores Servidores Tugas Num Unico Sitio">
	<meta name="keywords" content="minecraft, minecraft server list, serverlist, minecraft servers, minecraft server info, minecraft serverlist, minecraft top list, minecraft toplist, best minecraft servers, serverlist.pt, serverlist pt, serverlist portugal, servidores em portugal, servidores de portugal, lista de servidores, lista de servidores de portugal, servidores de minecraft, servidores de csgo, servidores de cs, csgo server list, csgo serverlist, svl, svl pt, svlpt">
	<meta name="language" content="pt-PT">
	
	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="index,follow">
	<meta property="fb:app_id" content="643780505722155" />
	
	<meta property="og:title" content="{{$title}}">
	<meta property="og:type" content="server">
	<meta property="og:image" content="{{ URL::to('/resources/images/website/serverlist.jpg') }}">
	<meta property="og:site_name" content="Serverlist.pt">
	<meta property="og:description" content="Os Melhores Servidores Tugas Num Unico Sitio">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:image:src" content="{{ URL::to('/resources/images/website/serverlist.jpg') }}">
	<meta property="twitter:site" content="@serverlistpt">
	<meta property="twitter:title" content="{{$title}}">
	<meta property="twitter:description" content="Os Melhores Servidores Tugas Num Unico Sitio">

	<title>{{$title}}</title>
	
	<!-- Bootstrap Core CSS -->
	{{ HTML::style(URL::to('/resources/bootstrap/css/bootstrap-cm.css')) }}

	<!-- Custom CSS -->
	{{ HTML::style(URL::to('/resources/css/custom.css')) }}
	{{ HTML::script(URL::to('/resources/js/custom.js')) }}

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
				<a class="navbar-brand" href="{{ URL::to('/') }}">
					<img src="#" alt="Logo">
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="{{ URL::to('/login') }}"><i class="fa fa-home"></i> Início</a>
					</li>
					<li>
						<a href="{{ URL::to('/login') }}"><i class="fa fa-user"></i> Blog</a>
					</li>
					<li>
						<a href="{{ URL::to('/login') }}"><i class="fa fa-server"></i> Servidores</a>
					</li>
					<li>
						<a href="{{ URL::to('/login') }}"><i class="fa fa-users"></i> Forum</a>
					</li>
					@if(Auth::guest())
					<li>
						<a href="{{ URL::to('/login') }}"><i class="fa fa-sign-in"></i> Login/Registar</a>
					</li>
					@else
					<li class="dropdown">
						<a style="cursor:pointer;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{ URL::to('/user') }}"><i class="fa fa-user"></i> Editar Conta</a>
							</li>
							<li>
								<a href="{{ URL::to('/panel') }}"><i class="fa fa-wrench"></i> Painel De Controlo</a>
							</li>
							<li role="presentation" class="divider"></li>
							<li>
								<a href="{{ URL::to('/logout') }}"><i class="fa fa-sign-out"></i> Terminar Sessão</a>
							</li>
						</ul>
					</li>
					@endif
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

		@yield('header')
	
	<!-- Page Content -->
	<div class="container background-cm">

		<!-- Marketing Icons Section -->
		<br>
		
		<!-- Infos -->
        <noscript>
		<div class="alert alert-dismissible alert-warning">
		  <p>Para Poder Navegar Livremente Pelo Site, Têm De Ativar O JavaScript</p>
		</div>
		</noscript>
        <!-- /Infos -->
	
		@yield('body')


	</div>
	<!-- /.container -->
	
</body>
	
	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; <a href="{{ URL::to('/') }}">{{ $cm->cm_name }}</a> 2015</p>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-home"></i> Início</a>
                        </li>
                        <li class="footer-menu-divider">-</li>
                        <li>
                            <a href="#"><i class="fa fa-user"></i> Blog</a>
                        </li>
                        <li class="footer-menu-divider">-</li>
                        <li>
                            <a href="#"><i class="fa fa-server"></i> Servidores</a>
                        </li>
                        <li class="footer-menu-divider">-</li>
                        <li>
                            <a href="#"><i class="fa fa-users"></i> Forum</a>
                        </li>
                        <li class="footer-menu-divider">-</li>
                        <li>
                            <a href="#"><i class="fa fa-life-ring"></i> Contactar</a>
                        </li>
                    </ul>
				</div>
			</div>
		</div>
	</footer>
	
	<!-- SweetAlert -->
	{{ HTML::script(URL::to('/resources/sweetalert/sweet-alert.js')) }}
	{{ HTML::style(URL::to('/resources/sweetalert/sweet-alert.css')) }}
		
	<!-- Infos -->
    @if(Session::has('success'))
		<script>sweetAlert("Sucesso!", "{{ Session::get('success') }}", "success");</script>
    @endif
    @if(isset($test))
		<script>sweetAlert("Sucesso!", "{{ $test }}", "success");</script>
    @endif
    @if($errors->any())
		<script>
			var str = "{{implode('', $errors->all(':message '))}}";
			var res = str.replace("validation.required", "Não preencheste o recaptcha");
			sweetAlert("Oops...", res, "error");
		</script>
    @endif
    <!-- /Infos -->

	<!-- jQuery -->
	{{ HTML::script(URL::to('/resources/js/jquery.js')) }}

	<!-- Bootstrap Core JavaScript -->
	{{ HTML::script(URL::to('/resources/bootstrap/js/bootstrap.min.js')) }}
	{{ HTML::script(URL::to('/resources/js/jqBootstrapValidation.js')) }}

</html>