<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>Buscador OCWs</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="shortcut icon" href="images/icono.png">
<link href="templatemo_style.css" type="text/css" rel="stylesheet" />
<link href="estilo_buscador.css" type="text/css" rel="stylesheet" /> 
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
<style>
  table, th, td {
      border: 1px solid #FFFFFF;
      border-collapse: collapse;
  }
  th, td {
      padding: 5px;
      text-align: left;    
  }
  h4, h5{
    vertical-align: middle;
    text-align: justify;
  }
  h6{
    color: #90CB4D;
    text-decoration: underline;
  }
</style> 
</head>
<body>
  
  <?php if (isset($_SESSION['FBID'])): ?>      <!--  After user login  -->
  <div id="logeo">
      <ul>
        <li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
        <li class="nav-header">Usuario: <?php echo $_SESSION['FULLNAME']; ?></li>        
        <li class="nav-header">E-mail: <?php echo $_SESSION['EMAIL']; ?></li>
        <div id="cerrar_sesion">
        <a href="logout.php">Cerrar Sesión</a>  
        </div>      
      </ul>
  </div>
  <div id="header">
    <ul class="nav1">
      <li><a href="">Actualizar Página</a></li>
      <li><a href="p.php">Busqueda por facetas</a></li>
      <li><a href="">Busqueda por Similares</a></li>
      <li><a href="">Historial</a>
        <ul>
          <li><a href="">Ver historial</a></li>
        </ul>
      </li>
      <li><a href="">Favoritos</a>
        <ul>
          <li><a href="">Ver Favoritos</a></li>
        </ul>
      </li>
    </ul>
  </div><br><br>    
  <div id="templatemo_header_wrapper">
      <div id="templatemo_header">
        <div id="site_title"><a href="#">Buscar OCWs</a></div>
      </div>
  </div>

  <div id="alinear">
    <input type="button" id="buscar" value="Buscar">
    <input type="text" id="ingreso" placeholder="Buscar OCW por materias">    
  </div>
  <div id="json">   
    <div id="imagenes"></div>

    <script src="jquery-1.11.2.min.js"></script>

    <script >
      $(document).on("ready", main);
      function main(){
        $("#buscar").on("click", function(){
          var texto = "";
          var ingreso = $("#ingreso").val();
          $("#imagenes").text("Cargando....");
          $.getJSON("http://carbono.utpl.edu.ec:8080/WSSearcher/webresources/serendipityrest?q="+ ingreso +"&callback=?", function(datos){          
                        $.each(datos.results.ocw,function(i, item){
                            texto += "<br><br>";
              texto += "<div class='cuadro' id='globo'>";
              texto += "<table>"
              texto += "<tr>"
              texto += "<th><h4>Título</h4></th>"
              texto += "<td><h5>"+ item.title +"</h5></td>"
              texto += "</tr>"
              texto += "<tr>"
              texto += "<th><h4>Descripción</h4></th>"
              texto += "<td><h5>"+ item.description +"</h5></td>"
              texto += "</tr>"
              texto += "<tr>"
              texto += "<th><h4>Idioma</h4></th>"
              texto += "<td><h5>"+ item.language +"</h5></td>"
              texto += "</tr>"
              texto += "<tr>"
              texto += "<th><h4>Url</h4></th>"
              texto += "<td><h5>"+ item.url +"</h5></td>"
              texto += "</tr>"
              texto += "<tr>"
              texto += "<th><h4>Agregar a Favoritos?</h4></th>"
              texto += "<td><a href='a'><h6>Añadir a Favoritos</h6></a></td>"
              texto += "</tr>"
              texto += "</table>"
              texto += "</div>";  
            });
            $("#imagenes").html(texto);   
          });
        });       
      }
    </script>
  </div>  
    <!-- Antes del login-->
    <?php else: ?>      
      <div id="logeo">
          <form action="registro.html" method="POST">
          <input type="submit" id="registro" value="Registrarme"/>
          </form>
        <div>
        <br>  
        <a href="fbconfig.php"><img src="images/fb.png"></a></div>
      </div>
    </div>
    <div id="header">
    <ul class="nav">
      <li><a href="">Actualizar Página</a></li>
      <li><a href="p.php">Busqueda por Facetas</a>
      </li>
      <li><a href="">Busqueda Similares</a>
      </li>
    </ul>
  </div><br><br>    
  <div id="templatemo_header_wrapper">
      <div id="templatemo_header">
        <div id="site_title"><a href="#">Buscar OCWs</a></div>
      </div>
  </div>

  <div id="alinear">
    <input type="button" id="buscar" value="Buscar">
    <input type="text" id="ingreso" placeholder="Buscar OCW por materias">    
  </div>
  <div id="json">   
    <div id="imagenes"></div>

    <script src="jquery-1.11.2.min.js"></script>

    <script >
      $(document).on("ready", main);
      function main(){
        $("#buscar").on("click", function(){
          var texto = "";
          var ingreso = $("#ingreso").val();
          $("#imagenes").text("Cargando....");
          $.getJSON("http://carbono.utpl.edu.ec:8080/WSSearcher/webresources/serendipityrest?q="+ ingreso +"&callback=?", function(datos){          
                        $.each(datos.results.ocw,function(i, item){
                            texto += "<br><br>";
              texto += "<div class='cuadro' id='globo'>";
              texto += "<table>"
              texto += "<tr>"
              texto += "<th><h4>Título</h4></th>"
              texto += "<td><h5>"+ item.title +"</h5></td>"
              texto += "</tr>"
              texto += "<tr>"
              texto += "<th><h4>Descripción</h4></th>"
              texto += "<td><h5>"+ item.description +"</h5></td>"
              texto += "</tr>"
              texto += "<tr>"
              texto += "<th><h4>Idioma</h4></th>"
              texto += "<td><h5>"+ item.language +"</h5></td>"
              texto += "</tr>"
              texto += "<tr>"
              texto += "<th><h4>Url</h4></th>"
              texto += "<td><h5>"+ item.url +"</h5></td>"
              texto += "</tr>"
              texto += "<tr>"
              texto += "<th><h4>Agregar a Favoritos?</h4></th>"
              texto += "<td><a href='a'><h6>Añadir a Favoritos</h6></a></td>"
              texto += "</tr>"
              texto += "</table>"
              texto += "</div>";  
            });
            $("#imagenes").html(texto);   
          });
        });       
      }
    </script>
  </div>
  <?php endif ?>
  <!-- EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEe -->
</body>
</html>
