<?php

class LoginController extends BaseController {

	public function showLogin()
	{
		$title=settings::get("siteName") . " - login";
		return View::make('login.login')-> with('title', $title);
	}

	public function showForgot()
	{
		$title=settings::get("siteName") . " - Esqueci-me Da Password";
		return View::make('login.forgot')->with('title', $title);
	}

	public function showActivate()
	{
		$title=settings::get("siteName") . " - Ativar Conta";
		return View::make('login.activate')->with('title', $title);
	}

	public function showRecovery()
	{
		$title=settings::get("siteName") . " - Recuperar Conta";
		return View::make('login.recovery')->with('title', $title);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to(URL::to('/'))->With('success', 'Sessão Terminada!');
	}

	public function postLogin()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('email' => 'required|email', 'password' => 'required');
		$v = Validator::make($input, $rules);
		if($v->passes())
		{

			$credentials = array('email' => $input['email'], 'password' => $input['password']);

			if(Auth::attempt($credentials))
			{
				if(Auth::user()->activated==0)
				{
					Auth::logout();
					return Redirect::to(URL::to("/"))->withErrors('Conta não ativada! Entra no link que te foi enviado para o email.');
				}

				if(Auth::user()->disabled==1)
				{
					Auth::logout();
					return Redirect::to(URL::to("/"))->withErrors('Esta conta foi desativada, entra em contacto com o suporte através do email support@cutenetwork.com');
				}

				DB::table('logs')->insert(
				    array('logs_action' => 'Login', 'logs_userId' => Auth::user()->id, 'logs_ip' => "inserir mais tarde ip da cloudflare")
				);

				return Redirect::to(URL::to("/"));

			} else {

				return Redirect::to(URL::to("/"))->withErrors('Login invalido');

			}
		} else {
			return Redirect::to(URL::to("/"))->withErrors($v);
		}
	}

	public function postRegister()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('regFirstName' => 'required|max:20', 'regLastName' => 'required|max:20', 'regEmail' => 'required|email|max:40', 'regPassword' => 'required|min:6|max:20', 'regSex' => 'required');
		
		$v = Validator::make($input, $rules);
		if ($v->passes())
		{
			
			if($input['regSex'] != 1 && $input['regSex'] != 2){
				return Redirect::to(URL::to("/"))->withInput()->WithErrors("Ocorreu Um Erro Com A Validação Do Sexo");
			}
			
			if(count(DB::table('users')->where('email', '=', $input['regEmail'])->first())){
				return Redirect::to(URL::to("/"))->withInput()->WithErrors("Este Email Já Está Em Uso");
			}
				
			$password = $input['regPassword'];
			$password = Hash::make($password);

			$data = array('email' => $input['regEmail'], 'firstName' => $input['regFirstName'], 'lastName' => $input['regLastName']);

			//Mail::send('emails.welcome', array('username' => $data['username'], 'code' => $code), function($message) use ($data)
			//{
			//    $message->to($data['email'])->subject('Bem vindo!');
			//});

			$user = new User();
			$user->email = $input['regEmail'];
			$user->firstname = $input['regFirstName'];
			$user->lastname = $input['regLastName'];
			$user->password = $password;
			$user->sex = $input['regSex'];
			$user->activated = 0;
			$user->activation_token = str_random(30);
			$user->token = str_random(30);
			$user->remember_token = null;
			$user->rank = 10;
			$user->disabled = 0;
			$user->save();

			$id = DB::table('users')->where('email', '=', $input['regEmail'])->first();
			DB::table('logs')->insert(
			    array('logs_action' => 'Register', 'logs_userId' => $id->id, 'logs_ip' => "inserir mais tarde ip da cloudflare")
			);

			return Redirect::to(URL::to("/"))->With('success', 'Conta criada, Verifica a tua conta com um codigo que foi enviado por Email.');

		} else {

			return Redirect::to(URL::to("/"))->withInput()->WithErrors($v);

		}
	}

	public function postActivate()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('email' => 'required|email', 'code' => 'required');
		$v = Validator::make($input, $rules);
		if($v->passes())
		{
			//procura conta com o email introduzido
			$user = User::where('email', '=', $input['email'])->where('activated', '=', '0')->first();
			if (count($user))
			{
				if($user->activation_token==$input['code']) {
				$user->activation_token = '';
				$user->activated = 1;
				$user->save();
				return Redirect::to(URL::to('/'))->With('success', 'Conta Ativada, Podes agora fazer Login.');
					
				} else {
					
					//codigo errado
					return Redirect::to(URL::to('/activate'))->withInput()->withErrors('Email ou Codigo Errados.');
				}

			} else {

					//email nao foi encontrado
					return Redirect::to(URL::to('/activate'))->withInput()->withErrors('Email ou Codigo Errados.');

			}
		} else {
			return Redirect::to(URL::to('/activate'))->withErrors($v);
		}
	}

	public function postForgot()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('email' => 'required|email|max:40');
		$v = Validator::make($input, $rules);
		if($v->passes())
		{
			//procura conta com o email introduzido
			$user = User::where('email', '=', $input['email'])->first();
			if (count($user))
			{
				$user->forgot_token = str_random(30);
				$user->save();
				
				//TODO enviar email
				
				return Redirect::to(URL::to('/forgot'))->With('success', 'Um Email Foi Enviado Com Um Codigo De Recuperação.');

			} else {

					//email nao foi encontrado
					return Redirect::to(URL::to('/forgot'))->withInput()->withErrors('Email Não Encontrado.');

			}
		} else {
			return Redirect::to(URL::to('/forgot'))->withErrors($v);
		}
	}
	
	public function postRecovery()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('email' => 'required|email|max:40', 'password' => 'required|min:6|max:20', 'code' => 'required');
		$v = Validator::make($input, $rules);
		if($v->passes())
		{
			//procura conta com o email introduzido
			$user = User::where('email', '=', $input['email'])->first();
			if (count($user))
			{
				if($user->forgot_token==$input['code']) {
					
				$password = $input['password'];
				$password = Hash::make($password);
					
				$user->forgot_token = '';
				$user->password = $password;
				$user->save();
				return Redirect::to(URL::to('/'))->With('success', 'Conta Recuperada, Podes agora fazer Login.');
					
				} else {
					
					//codigo errado
					return Redirect::to(URL::to('/recovery'))->withInput()->withErrors('Email ou Codigo Errados.');
				}

			} else {

					//email nao foi encontrado
					return Redirect::to(URL::to('/recovery'))->withInput()->withErrors('Email ou Codigo Errados.');

			}
		} else {
			return Redirect::to(URL::to('/recovery'))->withErrors($v);
		}
	}
}