<?php
$mcserver = DB::table('mcservers')->where('mcs_uid', '=', Auth::User()->id)->first();
if($mcserver->mcs_maxplayers == 0){
	$percent = 100;
} else {
	$percent = $mcserver->mcs_players * 100 / $mcserver->mcs_maxplayers;	
}
?>
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
	
	<meta property="og:title" content="{{$title}}">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{ URL::to('/resources/images/website/logo-square.png') }}">
	<meta property="og:site_name" content="Serverlist.pt">
	<meta property="og:description" content="Os Melhores Servidores Tugas Num Unico Sitio">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:image:src" content="{{ URL::to('/resources/images/website/logo-medium.png') }}">
	<meta property="twitter:site" content="@serverlistpt">
	<meta property="twitter:title" content="{{$title}}">
	<meta property="twitter:description" content="Os Melhores Servidores Tugas Num Unico Sitio">

	<title>{{$title}}</title>

	<!-- SweetAlert -->
	{{ HTML::script(URL::to('/resources/sweetalert/sweet-alert.js')) }}
	{{ HTML::style(URL::to('/resources/sweetalert/sweet-alert.css')) }}
	
	<!-- Bootstrap Core CSS -->
	{{ HTML::style(URL::to('/resources/bootstrap/css/bootstrap.css')) }}
	
	{{ HTML::style(URL::to('/resources/css/metisMenu.css')) }}

	<!-- Custom CSS -->
	{{ HTML::style(URL::to('/resources/css/panel.css')) }}

	<!-- Custom Fonts -->
	{{ HTML::style(URL::to('/resources/font-awesome/css/font-awesome.min.css')) }}
	
	{{ HTML::script(URL::to('/resources/js/custom.js')) }}
	
	@yield('css')
	
	@yield('head')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="{{ URL::to('/') }}">
					<img src="{{ URL::to('/resources/images/website/logo-small.png') }}" alt="Logo">
				</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
						@if(!count($mcserver))
                        <li>
                            <a class="text-center" href="{{ URL::to('/panel/servers') }}">
                                <strong>Ainda Não Tens Nenhum Servidor</strong>
                            </a>
                        </li>
						@else
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>{{ $mcserver->mcs_name }}</strong>
                                        <span class="pull-right text-muted">{{ $mcserver->mcs_players }}/{{ $mcserver->mcs_maxplayers }}</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $percent }}%"></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="{{ URL::to('/panel/servers') }}">
                                <strong>Ver Todos Os Servidores</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
						@endif
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
							<a href="{{ URL::to('/user') }}"><i class="fa fa-user fa-fw"></i> Editar Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
							<a href="{{ URL::to('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Terminar Sessão</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<li class="divider"></li>
						<li class="divider"></li>
                        <li class="active">
                            <a href="{{ URL::to('/') }}"><i class="fa fa-arrow-circle-o-left"></i> Voltar Ao Site</a>
                        </li>
						<li class="divider"></li>
						<li class="divider"></li>
                        <li>
                            <a href="{{ URL::to('/panel') }}"><i class="fa fa-dashboard fa-fw"></i> Início</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/panel/servers') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Gerir Servidores</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plus fa-fw"></i> Adicionar Servidor<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('/panel/minecraft/new') }}">Minecraft</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
				
		<!-- Infos -->
        <noscript>
		<br>
		<div class="alert alert-dismissible alert-warning">
		  <p>Para Poder Navegar Livremente Pelo Site, Têm De Ativar O JavaScript</p>
		</div>
		</noscript>
        @if(Session::has('success'))
		<br>
		<div class="alert alert-dismissible alert-success">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <p>{{ Session::get('success') }}</p>
		</div>
        @endif
        @if($errors->any())
		<br>
		<div class="alert alert-dismissible alert-danger">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <p>{{implode('', $errors->all(':message '))}}</p>
		</div>
        @endif
        <!-- /Infos -->
				
				@yield('body')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<!-- jQuery -->
	{{ HTML::script(URL::to('/resources/js/jquery.js')) }}

	<!-- Bootstrap Core JavaScript -->
	{{ HTML::script(URL::to('/resources/bootstrap/js/bootstrap.min.js')) }}
	{{ HTML::script(URL::to('/resources/js/jqBootstrapValidation.js')) }}
	
	{{ HTML::script(URL::to('/resources/js/metisMenu.js')) }}
	
	{{ HTML::script(URL::to('/resources/js/panel.js')) }}
	
	@yield('js')

</body>

</html>