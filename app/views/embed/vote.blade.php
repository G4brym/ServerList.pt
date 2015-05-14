<?php
if(!isset($_GET['gm'])){
	$gm = "mc";
} else if($_GET['gm'] != "mc" && $_GET['gm'] != "csgo"){
	$gm = "mc";
} else {
	$gm = $_GET['gm'];
}

if(!isset($_GET['sid'])){
	$sid = 1;
} else {
	$sid = $_GET['sid'];
}

if($gm == "mc"){
	$server = DB::table('mcservers')->where('mcs_id', '=', $sid)->first();
	if(!count($server)){
		$server = DB::table('mcservers')->where('mcs_id', '=', 1)->first();
	}	
}

?>
<html lang="en"><head>
	<title>Vota Pelo {{ $server->mcs_name }}</title>
	<link rel="shortcut icon" type="image/png" href="{{ URL::to('/resources/images/website/favicon.png') }}"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Os Melhores Servidores Tugas Num Unico Sitio">
	<meta name="author" content="G4brym">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
	{{ HTML::style(URL::to('/resources/font-awesome/css/font-awesome.min.css')) }}
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	{{ HTML::script(URL::to('/resources/js/jquery.js')) }}
	<script>var $j = jQuery.noConflict();</script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	
	<style type="text/css">

	body, html { margin: 0; padding: 0; }

		.popover-content { padding: 2px 4px; }
	.popover.right { margin-left: 6px; }
	
	.popover .arrow { border-width: 5px; }
	.popover .arrow:after { border-width: 4px; content: ""; }
	.popover.right .arrow {
		top: 50%;
		left: -5px;
		margin-top: -5px;
		border-right-color: #999;
		border-right-color: rgba(0, 0, 0, 0.25);
		border-left-width: 0;
	}

	.popover.right .arrow:after {
		bottom: -4px;
		left: 1px;
		border-right-color: #ffffff;
		border-left-width: 0;
	}

	#popvotes {
		position: relative;
		top: 1px;
	}
	
	</style>
</head>

<body style="background-color:transparent">
<div title="" data-original-title="" class="btn-group" id="popvotes" data-toggle="popover" data-trigger="manual" data-placement="right" data-content="0">
<a href="<?php if($gm == "mc"){ echo URL::to('/minecraft/'.$server->mcs_id.'/vote'); } ?>" class="btn btn-inverse btn-small" style="background: #4caf50;" target="_blank">Vota Em <strong>ServerList.pt</strong></a>
</div><div style="top: 0.366669px; left: 143px; display: block;" class="popover fade right in"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content">{{ $server->mcs_mvotes }}</div></div>
<script type="text/javascript">
<!--
$j(window).load(function () {
	$j('#popvotes').popover('show');
});
//-->
</script>
</body>
</html>