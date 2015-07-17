<?php
require 'dbconfig.php';
function checkuser($fbid,$ffname,$femail){
    	$check = mysql_query("select * from usuario where id_facebook='$fbid'");
	$check = mysql_num_rows($check);
	if (empty($check)) { // if new user . Insert a new record		
	$query = "INSERT INTO usuario (id_facebook,nombre,correo) VALUES ('$fbid','$ffname','$femail')";
	mysql_query($query);	
	} else {   // If Returned user . update the user record		
	$query = "UPDATE usuario SET nombre='$ffname', correo='$femail' where id_facebook='$fbsid'";
	mysql_query($query);
	}
}?>
