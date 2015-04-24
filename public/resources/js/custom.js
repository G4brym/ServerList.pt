function uptime(uptime){
	if (uptime >= 80){
		return '<span class="badge" style="background-color: #388e3c;">90%</span>';
	} else if(uptime > 20) {
		return '<span class="badge" style="background-color: #fbc02d;">60%</span>';
	} else{
		return '<span class="badge" style="background-color: #c62828;">20%</span>';
	}
}

function status(status){
	if (status == 1){
		return '<span class="label label-success">Online</span>';
	} else{
		return '<span class="label label-danger">Offline</span>';
	}
}