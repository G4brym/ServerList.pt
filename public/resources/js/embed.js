document.write('<iframe src="https://www.serverlist.pt/embed?gm=' + getGM() + '&sid=' + getSID() + '" scrolling="no" marginheight="0" marginwidth="0" allowtransparency="true" frameborder="0" height="35" width="200"></iframe>');;

function getParameter(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function getGM() {
	if(getParameter(gm) != "mc" && getParameter(gm) != "csgo"){
		return "mc";
	} else if(getParameter(gm) === null){
		return "mc";
	} else {
		return getParameter(gm);
	}
}

function getSID() {
	if(getParameter(sid) <= 0){
		return 1;
	} else if(getParameter(sid) === null){
		return 1;
	} else {
		return getParameter(sid);
	}
}