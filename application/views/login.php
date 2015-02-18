
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<title>Logowanie</title>
    <link href="/stronka/assets/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<style>#center {
   width: 300px;
   margin-left: -150px; /* połowa szerokości */
   position: absolute;
   left: 50%;
}
}</style>
	 </br>
     <center><a href="/stronka/site/index"> <img src="/stronka/images/logo.jpg"  ></a></center></br>

   <center> <a href="/stronka/site/aktualnosci" class="btn btn-default btn-lg active" role="button">Aktualności</a>
<a href="/stronka/site/promocje" class="btn btn-default btn-lg active" role="button" >Promocje</a>
<a href="/stronka/site/filie" class="btn btn-default btn-lg active" role="button">Filie</a>
<a href="/stronka/site/kontakt" class="btn btn-default btn-lg active" role="button">Kontakt</a></center></br>
	<div id="container"></div>
	<center><h1>Login</h1></center></br>
	<center>
<div class="col-xs-2"  id="center">
	<?= $this->form_builder->open_form(array('action' => 'site/login_validation')); ?>
	<?php echo validation_errors(); ?>
<?php
echo $this->form_builder->build_form_horizontal(
        array(
        
 array(
        'id' => 'email',
        'type' => 'email',
        'autocomplete' =>  ' email',
        'placeholder' => 'Wpisz e-mail',
        'label' => 'Email',
      
        'value' => $this->input->post('email')
    ),
     array(
        'id' => 'password',
        'type' => 'password',
        'autocomplete' =>  ' Password',
        'placeholder' => 'Wpisz hasło',
        'label' => 'Hasło',
        
        'value' => $this->input->post('password')
    ),
    array(
        'id' => 'Zaloguj',
        'type' => 'submit'
    )
        ));
?>
	
	<?= $this->form_builder->close_form(); ?>
</div></center></br></br></br></br></br></br></br></br></br>
	<center>
	<a href='<?php echo base_url(). "site/forgot"; ?>'>Zapomniałeś hasła?</a></center>
	
	<?php
/*	FACEBOOK LOGIN BASIC - PHP SDK V4.0
 *	file 			- index.php
 * 	Developer 		- Krishna Teja G S
 *	Website			- http://packetcode.com/apps/fblogin-basic/
 *	Date 			- 27th Sept 2014
 *	license			- GNU General Public License version 2 or later
*/
/* INCLUSION OF LIBRARY FILEs*/
	require_once( 'application/libraries/FacebookSession.php');
	require_once( 'application/libraries/FacebookRequest.php' );
	require_once( 'application/libraries/FacebookResponse.php' );
	require_once( 'application/libraries/FacebookSDKException.php' );
	require_once( 'application/libraries/FacebookRequestException.php' );
	require_once( 'application/libraries/FacebookRedirectLoginHelper.php');
	require_once( 'application/libraries/FacebookAuthorizationException.php' );
	require_once( 'application/libraries/GraphObject.php' );
	require_once( 'application/libraries/GraphUser.php' );
	require_once( 'application/libraries/GraphSessionInfo.php' );
	require_once( 'application/libraries/Entities/AccessToken.php');
	require_once( 'application/libraries/HttpClients/FacebookCurl.php' );
	require_once( 'application/libraries/HttpClients/FacebookHttpable.php');
	require_once( 'application/libraries/HttpClients/FacebookCurlHttpClient.php');
/* USE NAMESPACES */
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;
/*PROCESS*/
	
	//1.Stat Session
	 session_start();
	//2.Use app id,secret and redirect url
	 $app_id = '347531652093343';
	 $app_secret = '919f34d97826b430abdd56e4aabba1fd';
	 $redirect_url='http://localhost/stronka/site/login';
	 
	 //3.Initialize application, create helper object and get fb sess
	 FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);
	 $sess = $helper->getSessionFromRedirect();
	//4. if fb sess exists echo name 
	 	if(isset($sess)){
	 		//create request object,execute and capture response
		$request = new FacebookRequest($sess, 'GET', '/me');
		// from response get graph object
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());
		// use graph object methods to get user details
		$name= $graph->getName();
		echo '<center><b> Witaj, '.$name.' </b></center>';
	}else{
		//else echo login
		echo '<center><a href='.$helper->getLoginUrl().'>Login with facebook</a></center>';
	}
?>
</br></br></br></br></br>
<footer class="bottom">

<div class="container hidden-xs">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-1">
<a href="http://facebook.com/tetristologo" ><img src="http://www.mrmrssandman.pl/wp-content/themes/sandman/images/icn-facebook.png"></a>
<a href="http://twitter.com/tetristologo" ><img src="http://inno101.com/wp-content/themes/Inno101/images/icn-twitter.png"></a>
</div>
<div class="col-md-2"></div>
<div class="col-md-4">
<center><a href="/stronka/site/login" class="btn btn-default btn-lg active" role="button">Zaloguj się</a>
<a href="/stronka/site/signup" class="btn btn-default btn-lg active" role="button">Zarejestruj się</a></center>
</div>
<div class="col-md-4">
  
<p class="navbar-text pull-right">M.S. IS gr.6 Copyright 2014 All Rights Reserved.</p>

  </div>

  </div>

  <div class="container visible-xs">

</div>
  </div>

</footer>
</body>
</html>
