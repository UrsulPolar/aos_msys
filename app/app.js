function getAllUsers(){
	var $app = $('#app');
	$app.append("<table><tr><td>Nume</td><td>Prenume</td></tr>");
	
	$.ajax({
		type: 'GET',
		url: 'http://localhost:8080/api/user/readAll.php',
		success: function(data){
		$.each(data.records, function(property, value){
			console.log(data);
			$app.append('<tr><td>'+ value.nume +'</td><td>'+ value.prenume +'</td></tr>');
		});
		$app.append("</table>");
		}
	});
	
	
}

function loginUser(user, pass){
	var $message = $("#message");
	var loginData ={
		username: user,
		password: pass
	};

	$.ajax({
		type:"POST",
		url:"http://localhost:8080/api/user/userLogin.php",
		data: loginData,
		success: function(data){
			console.log(data);
		}
	})
}

//$(document).ready(function() {
//    $.ajax({
//        url: "http://localhost:8080/api/user/readAll.php"
//    }).then(function(data) {
//       $('#app').append(data.name);
//    });
//});
    
//    function test(){
//    
//    $.ajax({
//    	  type: "POST",
////    	  beforeSend: function(request) {
////    	    request.setRequestHeader("Authority", authorizationToken);
////    	  },
//    	  url: "http://localhost:8080/api/user/readAll.php",
//    	  data: "json=" + escape(JSON.stringify(createRequestObject)),
//    	  processData: false,
//    	  success: function(msg) {
//    	    $("#app").append("The result =" + StringifyPretty(msg));
//    	  }
//    	});
//    }
    
//    function test2(){
//    $.ajax({
//        url: 'http://localhost:8080/api/user/readAll.php',
////        headers: {
////            'Authorization':'Basic xxxxxxxxxxxxx',
////            'X_CSRF_TOKEN':'xxxxxxxxxxxxxxxxxxxx',
////            'Content-Type':'application/json'
////        },
//        method: 'POST',
//        dataType: 'json',
//        data: YourData,
//        success: function(data){
//          console.log('succes: '+data);
//        }
//      });
//    }