$(function () {
  getCopyright();
});

function loginUser(user, pass){
  var $message = $("#message");
  var $userDetails = $("#userDetails");
  var loginData ={
    username: user,
    password: pass
  };

  $.ajax({
    method:'POST',
    contentType: 'application/json',
    url:'http://localhost:8080/api/user/userLogin.php',
    data: JSON.stringify(loginData),
    dataType:'JSON',
    success: function(result){
      if(result.login_message.message.indexOf("Login successful") >= 0){
        window.location.replace('/app/index.php');  
        console.log(result);
      }else{
        $message.html("");
        $message.addClass("alert alert-danger alert-dismissable");
        $message.append('<h4><i class="icon fa fa-warning"></i> Info!</h4>'+result.login_message.message);
      }
    },
    error: function(result){
        $message.html("");
        $message.addClass("alert alert-danger alert-dismissable");
        $message.append('<h4><i class="icon fa fa-warning"></i> Info!</h4> Random error occured');
    }, complete: function(result){
      getCustomNavbarMenu(username, loggedOn)
    }
  });
}

function getCopyright(){
  var $copyright = $("#copyright");
  var year = new Date().getFullYear();
  $copyright.html("Copyright &copy; "+ year +" <a href=\"#\">METRO SYSTEMS</a>.");
  console.log($copyright.val());
}

function getCustomNavbarMenu(username, loggedOn, nume, prenume, userRights){
  var $navbarCustomMenu= $('#navbar-custom-menu');
  var $signedOn = '<li class="dropdown user user-menu">'+
                '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                  '<img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">'+
                  '<span class="hidden-xs">'+username+'</span>'+
               ' </a>'+
               '<ul class="dropdown-menu">'+
                  '<li class="user-header">'+
                    '<p>'+prenume +' '+ nume+'</p>'+
                    '<small>'+ userRights +'</small>'+
                  '</li>'+
                  '<li class="user-body">'+
                    '<div class="col-xs-12 text-center">'+
                      '<a href="#">Edit user details</a>'+
                    '</div>'+
                  '</li>'+
                  '<!-- Menu Footer-->'+
                  '<li class="user-footer">'+
                    '<div class="pull-right">'+
                      '<a href="#" class="btn btn-default btn-flat">Sign out</a>'+
                    '</div>'+
                  '</li>'+
                '</ul>';

              '</li>';
  var $signIn = '<li class="dropdown user user-menu">'+
                    '<a href="/app/login.php">Sign In</a>'+
                '</li>';

  if(username != '' && loggedOn == true){
    console.log($signedOn);
    $navbarCustomMenu.html($signedOn);
  }else{
    $navbarCustomMenu.html($signIn);
  }
}