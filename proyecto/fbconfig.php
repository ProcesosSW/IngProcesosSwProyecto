<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '795970960482038','ab0595984f4b45fc7642254fe9714101' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://localhost/proyecto/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID



require_once('dbconfig.php');
conectar('localhost', 'root', '', 'buscador');
  $query = "INSERT INTO usuario (id_facebook,nombre,correo) VALUES ('$fbid','$fbfullname','$femail')";
  mysql_query($query);  
  //function checkuser($fbid,$fbfullname,$femail){
 //     $check = mysql_query("select * from usuario where id_facebook='$fbid'");
 // $check = mysql_num_rows($check);
 // if (empty($check)) { // if new user . Insert a new record   
 // $query = "INSERT INTO usuario (id_facebook,nombre,correo) VALUES ('$fbid','$fbfullname','$femail')";
  //mysql_query($query);  
 // } else {   // If Returned user . update the user record   
 // $query = "UPDATE usuario SET nombre='$fbfullname', correo='$femail' where id_facebook='$fbsid'";
 // mysql_query($query);
 // }
//}
  



//INSERTAR A LA BASE







	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
  header("Location: principal.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>