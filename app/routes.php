<?php
//CloudFlare Proxys
Request::setTrustedProxies(array(
    '199.27.128.0/21',
    '173.245.48.0/20',
    '103.21.244.0/22',
    '103.22.200.0/22',
    '103.31.4.0/22',
    '141.101.64.0/18',
    '108.162.192.0/18',
    '190.93.240.0/20',
    '188.114.96.0/20',
    '197.234.240.0/22',
    '198.41.128.0/17',
    '162.158.0.0/15',
    '104.16.0.0/12',
));

//Pagina De Erro
App::missing(function($exception)
{
	$title=settings::get("siteName") . " - 404";
	return View::make('login.404')->with('title', $title);
});
App::error(function(\Illuminate\Session\TokenMismatchException $exception)
{
    return Redirect::route('login')->withErrors('A tua sessão expirou, faz login outra vez para continuar.');
});

//index
Route::group(array('domain' => 'www.serverlist.pt'), function()
{

	//Paginas Publicas
	Route::get('/', 'BaseController@showIndex');
	Route::get('/minecraft', 'BaseController@showMinecraftList');
	Route::get('/csgo', 'BaseController@showCSGOList');
	Route::get('/cron', 'BaseController@cron');
	Route::get('/dcron', 'BaseController@dcron');
	Route::get('/embed/vote', 'EmbedController@showVote');

	Route::get('/user/{id}', 'IndexController@showUser')->where(array('id' => '[0-9]+'));
	Route::get('/minecraft/{id}', 'IndexController@showMCServer')->where(array('id' => '[0-9]+'));
	Route::get('/communities', 'IndexController@showCommunitiesList');

	//posts publicos
	Route::post('vote', array('before'=>'csrf', 'as' => 'vote', 'uses'=>'BaseController@postVote'));

	//não se pode estar logado para poder ver 
	Route::group(array('before' => 'guest'), function()
	{
		//Paginas
		Route::get('/login', 'LoginController@showLogin');
		Route::get('/activate', 'LoginController@showActivate');
		Route::get('/forgot', 'LoginController@showForgot');
		Route::get('/recovery', 'LoginController@showRecovery');
		
		
		//Metodos Post
		Route::post('login', array('before'=>'csrf', 'as' => 'login', 'uses'=>'LoginController@postLogin'));
		Route::post('register', array('before'=>'csrf', 'as' => 'register', 'uses'=>'LoginController@postRegister'));
		Route::post('forgot', array('before'=>'csrf', 'as' => 'forgot', 'uses'=>'LoginController@postForgot'));
		Route::post('activate', array('before'=>'csrf', 'as' => 'activate', 'uses'=>'LoginController@postActivate'));
		Route::post('recovery', array('before'=>'csrf', 'as' => 'recovery', 'uses'=>'LoginController@postRecovery'));
		
	});

	//interface, têm de fazer login antes de entrar
	Route::group(array('before' => 'auth'), function()
	{
		
		//Paginas
		
		//panel
		Route::get('/panel', 'PanelController@showIndex');
		Route::get('/panel/servers', 'PanelController@showServers');
		Route::get('/panel/minecraft/new', 'PanelController@showNewMCServer');
		Route::get('/panel/minecraft/{id}', 'PanelController@showMCServer')->where(array('id' => '[0-9]+'));


		//Utilizador
		Route::get('/user', 'IndexController@showOwnUser');
		Route::get('/logout', 'LoginController@logout');

		//Metodos Post
		Route::post('newmcserver', array('before'=>'csrf', 'as' => 'newmcserver', 'uses'=>'PanelController@postNewMCServer'));
		Route::post('updatemcserver', array('before'=>'csrf', 'as' => 'updatemcserver', 'uses'=>'PanelController@postUpdateMCServer'));
		Route::post('changePW', array('before'=>'csrf', 'as' => 'changePW', 'uses'=>'PanelController@postChangePW'));
	});
	
});

//comunidades
Route::group(array('domain' => '{name}.serverlist.pt'), function()
{
	
	Route::get('/', 'CommunitieController@showIndex');
	Route::get('/blog', 'CommunitieController@showBlog');
	Route::get('/blog/{pid}', 'CommunitieController@showBlogPost');
	Route::get('/servers', 'CommunitieController@showServers');
	Route::get('/forum', 'CommunitieController@showForum');
	Route::get('/forum/c/{cid}', 'CommunitieController@showForumCategory');
	Route::get('/forum/t/{tid}', 'CommunitieController@showForumTopic');
	Route::get('/contact', 'CommunitieController@showContact');

	//não se pode estar logado para poder ver 
	Route::group(array('before' => 'guest'), function()
	{
		//Paginas
		Route::get('/login', 'LoginController@showLogin');
		Route::get('/activate', 'LoginController@showActivate');
		Route::get('/forgot', 'LoginController@showForgot');
		Route::get('/recovery', 'LoginController@showRecovery');
		
		
		//Metodos Post
		Route::post('login', array('before'=>'csrf', 'as' => 'login', 'uses'=>'LoginController@postLogin'));
		Route::post('register', array('before'=>'csrf', 'as' => 'register', 'uses'=>'LoginController@postRegister'));
		Route::post('forgot', array('before'=>'csrf', 'as' => 'forgot', 'uses'=>'LoginController@postForgot'));
		Route::post('activate', array('before'=>'csrf', 'as' => 'activate', 'uses'=>'LoginController@postActivate'));
		Route::post('recovery', array('before'=>'csrf', 'as' => 'recovery', 'uses'=>'LoginController@postRecovery'));
		
	});
});


//Tem de ser admin para poder executar
Route::group(array('before' => 'admin'), function()
{

});