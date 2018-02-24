/**
 * 
 */
function createApplicationTemplate(application, cluster, users, counter){
var $usersTable = "";
var $template = "";
if(Array.isArray(users)){
	$.each(users, function(i, item){
		$usersTable += '<tr><td>'+item.nume+'</td><td>'+item.prenume+'</td></tr>';
	});
}else{
	$usersTable += '<tr><td>N/A</td><td>N/A</td></tr>';
}
if(application != ""){
	if(counter == 0){
		$template = '<div class="row">'+
		'<div class="col-md-4">'+
		'<div class="panel panel-back noti-box">'+
			'<div class="row">'+
				'<div class="col-md-12">'+
					'<h2>'+application+'</h2>'+
				'</div>'+
			'</div>'+	
			'<div class="row">'+
				'<div class="col-md-6">'+
					'<table><tr><td>'+cluster+'</td></tr></table>'+
					'<hr/>'+
					'<table><tr><th>Nume</th><th>Prenume</th></tr>'+
					$usersTable+
					'</table>'+
				'</div>'+
			'</div>'+
		'</div>'+
	'</div>'+
'</div>';
	}else if(counter/3 == 0){
		$template = '</div><div class="row">'+
		'<div class="col-md-4">'+
		'<div class="panel panel-back noti-box">'+
			'<div class="row">'+
				'<div class="col-md-12">'+
					'<h2>'+application+'</h2>'+
				'</div>'+
			'</div>'+	
			'<div class="row">'+
				'<div class="col-md-6">'+
					'<table><tr><td>'+cluster+'</td></tr></table>'+
					'<hr/>'+
					'<table><tr><th>Nume</th><th>Prenume</th></tr>'+
					$usersTable+
					'</table>'+
				'</div>'+
			'</div>'+
		'</div>'+
	'</div>'+
'</div>';
	}
	return $template; 
}
}

function getAllApplications(){
	var $app = $('#app');
	$.ajax({
		type: 'GET',
		url: 'http://localhost:8080/api/applications/readAll.php',
		success: function(data){
		var counter = 0;
		$.each(data.records, function(i, item){
				$app.append(createApplicationTemplate(item.application, item.cluster, item.responsables, counter));
				counter++;
			}
		});
		}
	});
	
	
}