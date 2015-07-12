<?php

class PanelController extends BaseController {

	public function showIndex()
	{
		$title=settings::get("siteName") . " - Painel";
		return View::make('panel.index')->with('title', $title);
	}
	
	public function showServers()
	{
		$title=settings::get("siteName") . " - Servidores";
		return View::make('panel.servers')->with('title', $title);
	}
	
	public function showNewMCServer()
	{
		$title=settings::get("siteName") . " - Adicionar Servidor";
		return View::make('panel.newMCServer')->with('title', $title);
	}
	
	public function showMCServer($id)
	{
		if(count(DB::table('mcservers')->where('mcs_id', '=', $id)->where('mcs_uid', '=', Auth::User()->id)->first())){
			$title=settings::get("siteName") . " - Servidor De Minecraft";
			return View::make('panel.MCServer')->with('title', $title)->with('id', $id);
		} else {
			return Redirect::to(URL::to('/panel/servers'));
		}
	}
	
	public function postNewMCServer()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('serverName' => 'required|max:100', 'serverDesc' => 'required|max:255', 'serverIp' => 'max:35', 'serverPort' => 'max:6', 'serverAliase' => 'max:100', 'serverVersion' => 'required', 'banner' => 'image|image_size:=468,=60', 'g-recaptcha-response' => 'required|recaptcha');
		
		$v = Validator::make($input, $rules);
		if ($v->passes())
		{
			
			if(count(DB::table('mcservers')->where('mcs_ip', '=', $input['serverIp'])->where('mcs_port', '=', $input['serverPort'])->first())){
				return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("O IP deste servidor já está registado, entra em contacto com a staff se achas que isto é um erro");
			}
			
			if(mcservers::getVersion($input['serverVersion']) == false) {
				return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Ocorreu um erro com a validação da versão");
			}
			
			if(isset($input['serverV'])){
				$input['serverV'] = 1;
				if($input['serverVPort'] == null){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a porta");
				}
				if($input['serverVPKey'] == null){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a Public Key");
				}
			} else {
				$input['serverV'] = 0;
			}
			
			if(Input::hasFile('banner')){
				$image = Input::file('banner');

				if($image->getClientOriginalExtension() != "jpg" && $image->getClientOriginalExtension() != "png" && $image->getClientOriginalExtension() != "gif"){
					return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("As extenções permitidas para os banners são .jpg, .png e .gif");
				}
				
			}
			
			if(!mcservers::isOnline($input['serverIp'], $input['serverPort'])) {
				return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors("O servidor precisa de estar online para poder ser registado");
			}

			DB::table('mcservers')->insert(
				array('mcs_uid' => Auth::user()->id,
					  'mcs_name' => $input['serverName'],
					  'mcs_desc' => $input['serverDesc'],
					  'mcs_website' => $input['serverSite'],
					  'mcs_msg' => $input['serverMsg'],
					  'mcs_ip' => $input['serverIp'],
					  'mcs_port' => $input['serverPort'],
					  'mcs_aliase' => $input['serverAliase'],
					  'mcs_version' => $input['serverVersion'],
					  'mcs_votifier' => $input['serverV'],
					  'mcs_vport' => $input['serverVPort'],
					  'mcs_votifierkey' => $input['serverVPKey'])
			);

			$id = DB::table('mcservers')->where('mcs_ip', '=', $input['serverIp'])->where('mcs_port', '=', $input['serverPort'])->first();
			utilities::log("New Minecraft Server " . $id->mcs_id);

			if(Input::hasFile('banner')){
				$filename  = $id->mcs_id . '.' . $image->getClientOriginalExtension();
				$publicpath = public_path() . '/resources/images/minecraft/banners/' . $filename;
				
				if($image->getClientOriginalExtension() == "jpg"){
					$newImage = imagecreatefromjpeg(Input::file('banner'));
					imagejpeg($newImage, public_path() . "/resources/images/minecraft/banners/" . $id->mcs_id . ".jpg", 100);
				} elseif($image->getClientOriginalExtension() == "png"){
					$newImage = imagecreatefrompng(Input::file('banner'));
					imagejpeg($newImage, public_path() . "/resources/images/minecraft/banners/" . $id->mcs_id . ".png", 100);
				} elseif($image->getClientOriginalExtension() == "gif"){
					$newImage = imagecreatefromgif(Input::file('banner'));
					imagejpeg($newImage, public_path() . "/resources/images/minecraft/banners/" . $id->mcs_id . ".gif", 100);
				}
			}

			return Redirect::to(URL::to("/panel/servers"))->With('success', 'Servidor Adicionado.');

		} else {

			return Redirect::to(URL::to("/panel/minecraft/new"))->withInput()->WithErrors($v);

		}
	}
	
	public function postUpdateMCServer()
	{
		Input::merge(array_map('trim', Input::all()));
		$input = Input::all();
		$rules = array('serverName' => 'required|max:100', 'serverDesc' => 'required|max:255', 'serverIp' => 'max:35', 'serverPort' => 'max:6', 'serverAliase' => 'max:100', 'serverVersion' => 'required', 'banner' => 'image|image_size:=468,=60', 'background' => 'image|image_size:>999,>349', 'serverType' => 'required', 'g-recaptcha-response' => 'required|recaptcha');
		
		$id = DB::table('mcservers')->where('mcs_id', '=', $input['sid'])->where('mcs_uid', '=', Auth::user()->id)->first();
		
		if(!count($id)){
			return Redirect::to(URL::to("/panel/servers"))->withInput()->WithErrors("Ocorreu um erro com a validação do servidor");
		}
		
		$v = Validator::make($input, $rules);
		if ($v->passes())
		{
			
			if(mcservers::getVersion($input['serverVersion']) == false) {
				return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors("Ocorreu um erro com a validação da versão");
			}
			
			if(!mcservers::serverTypeExist($input['serverType'])){
				return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors("Ocorreu um erro com a validação do tipo de Servidor");
			}
			
			if(isset($input['serverV'])){
				$input['serverV'] = 1;
				if($input['serverVPort'] == null){
					return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a porta");
				}
				if($input['serverVPKey'] == null){
					return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors("Para ativar o Votifier tens de preencher a Public Key");
				}
			} else {
				$input['serverV'] = 0;
				$input['serverVPort'] = null;
				$input['serverVPKey'] = null;
			}
			
			if(Input::hasFile('banner')){
				$image = Input::file('banner');

				if($image->getClientOriginalExtension() != "jpg" && $image->getClientOriginalExtension() != "png" && $image->getClientOriginalExtension() != "gif"){
					return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors("As extenções permitidas para os banners são .jpg, .png e .gif");
				}
				if($image->getSize() > "1000024"){
					return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors("O tamanho maximo do banner é de 1MB");
				}
				
			}
			
			if(Input::hasFile('background') && $id->mcs_premium == 1){
				$background = Input::file('background');

				if($background->getClientOriginalExtension() != "jpg"){
					return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors("A única extenção permitida para os Backgrounds é .jpg");
				}
				if($background->getSize() > "2000024"){
					return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors("O tamanho maximo do background é de 2MB");
				}
				
				if(file_exists(public_path()."/resources/images/minecraft/backgrounds/".$input['sid'].".jpg")){
					unlink(public_path()."/resources/images/minecraft/backgrounds/".$input['sid'].".jpg");
				}
				$newImage = imagecreatefromjpeg($background);
				imagejpeg($newImage, public_path() . "/resources/images/minecraft/backgrounds/" . $id->mcs_id . ".jpg", 100);
				
				utilities::clearCloudflareImageBackground($id->mcs_id, "minecraft");
				
			}
			
			if($id->mcs_premium == 1 && isset($input['header'])){
				$header = 1;
			} else {
				$header = 0;
			}
			
			$tags = array();
			
			if(isset($input['tagAdventure'])){
				$tags['Adventure'] = 1;
			} else {
				$tags['Adventure'] = 0;
			}
			if(isset($input['tagCreative'])){
				$tags['Creative'] = 1;
			} else {
				$tags['Creative'] = 0;
			}
			if(isset($input['tagMinigames'])){
				$tags['Minigames'] = 1;
			} else {
				$tags['Minigames'] = 0;
			}
			if(isset($input['tagPrison'])){
				$tags['Prison'] = 1;
			} else {
				$tags['Prison'] = 0;
			}
			if(isset($input['tagSurvival'])){
				$tags['Survival'] = 1;
			} else {
				$tags['Survival'] = 0;
			}
			if(isset($input['tagWhitelist'])){
				$tags['Whitelist'] = 1;
			} else {
				$tags['Whitelist'] = 0;
			}
			

			DB::table('mcservers')->where('mcs_id', '=', $id->mcs_id)->update(
				array('mcs_name' => $input['serverName'],
					  'mcs_desc' => $input['serverDesc'],
					  'mcs_website' => $input['serverSite'],
					  'mcs_header' => $header,
					  'mcs_msg' => $input['serverMsg'],
					  'mcs_aliase' => $input['serverAliase'],
					  'mcs_version' => $input['serverVersion'],
					  'mcs_votifier' => $input['serverV'],
					  'mcs_vport' => $input['serverVPort'],
					  'mcs_votifierkey' => $input['serverVPKey'],
					  'mcs_serverType' => $input['serverType'],
					  'mcs_tagAdventure' => $tags['Adventure'],
					  'mcs_tagCreative' => $tags['Creative'],
					  'mcs_tagMinigames' => $tags['Minigames'],
					  'mcs_tagPrison' => $tags['Prison'],
					  'mcs_tagSurvival' => $tags['Survival'],
					  'mcs_tagWhitelist' => $tags['Whitelist'])
			);

			utilities::log("Updated Minecraft Server " . $id->mcs_id);

			if(Input::hasFile('banner')){
				
							
				if(file_exists(public_path() . "/resources/images/minecraft/banners/". $input['sid'] . ".jpg")){
					unlink(public_path() . "/resources/images/minecraft/banners/". $input['sid'] . ".jpg");
				}
				if(file_exists(public_path() . "/resources/images/minecraft/banners/". $input['sid'] . ".png")){
					unlink(public_path() . "/resources/images/minecraft/banners/". $input['sid'] . ".png");
				}
				if(file_exists(public_path() . "/resources/images/minecraft/banners/". $input['sid'] . ".gif")){
					unlink(public_path() . "/resources/images/minecraft/banners/". $input['sid'] . ".gif");
				}
			
				$filename  = $id->mcs_id . '.' . $image->getClientOriginalExtension();
				$publicpath = public_path() . '/resources/images/minecraft/banners/' . $filename;
				
				if($image->getClientOriginalExtension() == "jpg"){
					$newImage = imagecreatefromjpeg(Input::file('banner'));
					imagejpeg($newImage, public_path() . "/resources/images/minecraft/banners/" . $id->mcs_id . ".jpg", 100);
				} elseif($image->getClientOriginalExtension() == "png"){
					$newImage = imagecreatefrompng(Input::file('banner'));
					imagejpeg($newImage, public_path() . "/resources/images/minecraft/banners/" . $id->mcs_id . ".png", 100);
				} elseif($image->getClientOriginalExtension() == "gif"){
					$newImage = imagecreatefromgif(Input::file('banner'));
					imagejpeg($newImage, public_path() . "/resources/images/minecraft/banners/" . $id->mcs_id . ".gif", 100);
				}
				
			}

			return Redirect::to(URL::to("/panel/servers"))->With('success', 'Servidor Atualizado.');

		} else {

			return Redirect::to(URL::to("/panel/minecraft/" . $id->mcs_id))->withInput()->WithErrors($v);

		}
	}
	
	public function postChangePW()
	{
		$input = Input::all();
		$rules = array('oldpassword' => 'required|min:6|max:20', 'newpassword' => 'required|min:6|max:20', 'g-recaptcha-response' => 'required|recaptcha');
		$v = Validator::make($input, $rules);
		if ($v->passes())
		{

			$oldpassword = $input['oldpassword'];
			$oldpasswordsql = Auth::user()->password;

			if($oldpassword && !Hash::check($oldpassword, $oldpasswordsql))
			{

			return Redirect::to('user')->WithErrors('Password Antiga Errada');

			} else {

			$newpassword = $input['newpassword'];
			$newpassword = Hash::make($newpassword);

			DB::table('users')->where('id', '=', Auth::user()->id)->update(
				array('password' => $newpassword)
			);

			utilities::log("Password Changed");

			return Redirect::to(URL::to("/user"))->With('success', 'Password Atualizada');
			
			}
		} else {

			return Redirect::to(URL::to("/user"))->WithErrors($v);

		}
	}
}