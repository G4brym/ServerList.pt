<!DOCTYPE html>
<html lang="pt-PT">

<head>

	<link rel="shortcut icon" type="image/png" href="{{ URL::to('/resources/images/website/favicon.png') }}"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Os Melhores Servidores Tugas Num Unico Sitio">
	<meta name="author" content="G4brym">
	<meta name="keywords" content="minecraft, minecraft server list, serverlist, minecraft servers, minecraft server info, minecraft serverlist, minecraft top list, minecraft toplist, best minecraft servers, serverlist.pt, serverlist pt, serverlist portugal, servidores em portugal, servidores de portugal, lista de servidores, lista de servidores de portugal, servidores de minecraft, servidores de csgo, servidores de cs, csgo server list, csgo serverlist, svl, svl pt, svlpt">
	<meta name="language" content="pt-PT">
	
	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="index,follow">
	<meta property="fb:app_id" content="643780505722155" />
	
	<meta property="og:title" content="{{$title}}">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{ URL::to('/resources/images/website/serverlist.jpg') }}">
	<meta property="og:site_name" content="Serverlist.pt">
	<meta property="og:description" content="Os Melhores Servidores Tugas Num Unico Sitio">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:image:src" content="{{ URL::to('/resources/images/website/serverlist.jpg') }}">
	<meta property="twitter:site" content="@serverlistpt">
	<meta property="twitter:title" content="{{$title}}">
	<meta property="twitter:description" content="Os Melhores Servidores Tugas Num Unico Sitio">

	<title>{{$title}}</title>

	<!-- SweetAlert -->
	{{ HTML::script(URL::to('/resources/sweetalert/sweet-alert.js')) }}
	{{ HTML::style(URL::to('/resources/sweetalert/sweet-alert.css')) }}
	
	<!-- Bootstrap Core CSS -->
	{{ HTML::style(URL::to('/resources/bootstrap/css/bootstrap.css')) }}

	<!-- Custom CSS -->
	{{ HTML::style(URL::to('/resources/css/panel.css')) }}

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

<body style="background: #fff url({{ URL::to('/resources/images/website/brick-background.png') }}) repeat;">

	<div class="container">
		<div class="row">
			@yield('body')
		</div>
	</div>

	<!-- jQuery -->
	{{ HTML::script(URL::to('/resources/js/jquery.js')) }}

	<!-- Bootstrap Core JavaScript -->
	{{ HTML::script(URL::to('/resources/bootstrap/js/bootstrap.min.js')) }}
	{{ HTML::script(URL::to('/resources/js/jqBootstrapValidation.js')) }}
	
	{{ HTML::script(URL::to('/resources/js/panel.js')) }}

</body>

</html>