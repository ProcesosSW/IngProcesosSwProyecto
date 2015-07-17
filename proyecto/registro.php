<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscador</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" type="text/css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script> 
<script type="text/javascript" src="js/jquery.localscroll-min.js"></script> 
<script type="text/javascript" src="js/init.js"></script>  
<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<link rel="shortcut icon" href="images/icono.png">
</head>

<body>
<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    	<div id="site_title"><h2>Nuevos Usuarios</h2></div>
    </div>
</div>	
<div id="templatemo_main_wrapper">
	<div id="templatemo_main">
		<div id="content"> 
			<div class="section section_with_padding" id="about"> 
			    <br><br><br><br><br><br><br><br>
			    <h1 align="center">
			    	<?php
						require_once('dbconfig.php');
						conectar('localhost', 'root', '', 'buscador');

						//Recibir
						$user = strip_tags($_POST['user']);
						$pass = strip_tags(sha1($_POST['pass']));
						$mail = strip_tags($_POST['mail']);
						$ip = $_SERVER['REMOTE_ADDR'];

						$query = @mysql_query('SELECT * FROM usuario WHERE user="'.mysql_real_escape_string($user).'"');
						if($existe = @mysql_fetch_object($query))
						{
							echo 'El usuario '.$user.' ya existe.';	
						}else{
							$meter = @mysql_query('INSERT INTO usuario (nombre, contrasena, correo, keyfacebook) values ("'.mysql_real_escape_string($user).'", "'.mysql_real_escape_string($pass).'", "'.mysql_real_escape_string($mail).'", "'.$ip.'")');
							if($meter)
							{
								echo 'Usuario registrado con éxito';
							}else{
								echo 'Hubo un error en el registro.';	
							}
						}
					?>
			    </h1> 
                <a href="principal.php" class="home_btn">home</a> 	    
			</div> <!-- END of About -->
		</div>
	</div>
</div>
</body>
</html>
					