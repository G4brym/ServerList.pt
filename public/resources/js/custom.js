function uptime(uptime){
	if (uptime >= 80){
		return '<span class="badge" style="background-color: #388e3c;">'+ uptime + '%</span>';
	} else if(uptime > 20) {
		return '<span class="badge" style="background-color: #fbc02d;">'+ uptime + '%</span>';
	} else{
		return '<span class="badge" style="background-color: #c62828;">'+ uptime + '%</span>';
	}
}

function status(status){
	if (status == 1){
		return '<span class="label label-success">Online</span>';
	} else{
		return '<span class="label label-danger">Offline</span>';
	}
}

function tags(tagsignal, tagname){
	if (tagsignal == 1){
		return '<span class="label label-primary">' + tagname + '</span>';
	} else{
		return;
	}
}
function shortText(text, caracters){
	if (text.length > caracters){
		return text.substring(0, caracters) + '...';
	} else {
		return text;
	}
}