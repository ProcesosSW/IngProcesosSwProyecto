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
<title>Buscador Ocw</title>
<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> 
<style type="text/css">
  h4{
    color: #FFFFFF;
  }
</style>
</head>
  <body>
<div id="templatemo_header_wrapper">
      <div id="templatemo_header">
        <div id="site_title"><a href="#">Buscar OCWs</a></div>
      </div>
  </div>    
<div id="alineardos">
    <input type="button" id="tag" value="Tags">
    <input type="button" id="Autores" value="Autores">
    <input type="button" id="Lengua" value="Lenguajes">
    <input type="button" id="Uni" value="Universidades">
    <input type="text" id="ingresofacetas" placeholder="Buscar OCWs">    
  </div>
  <div id="json">   
    <div id="imagenes"></div>

    <script src="jquery-1.11.2.min.js"></script>

    <script>
      $(document).on("ready", main);
      function main(){
        $("#tag").on("click", function(){
          var texto = "";
          var ingreso = $("#ingresofacetas").val();
          $("#imagenes").text("Cargando....");
          $.getJSON("http://carbono.utpl.edu.ec:8080/WSSearcher/webresources/serendipityrest/facets?q="+ ingreso +"&callback=?", function(datos){          
                        $.each(datos.results.tags,function(i, item){
                            if(i%2==0){
                            texto += "<br><br>";
                            texto += "<div class='cuadro' id='globofacetas'>";
                            texto += "<h4>"+ item +"</h4>"
                            texto += "<input type='button' id='vermas' value='Ver más'>" 
                            texto += "</div>";
                          }
            });
                        
            $("#imagenes").html(texto);   
          });
        });       
      }


    </script>



    <script >
      $(document).on("ready", main);
      function main(){
        $("#Autores").on("click", function(){
          var texto = "";
          var ingreso = $("#ingresofacetas").val();
          $("#imagenes").text("Cargando....");
          $.getJSON("http://carbono.utpl.edu.ec:8080/WSSearcher/webresources/serendipityrest/facets?q="+ ingreso +"&callback=?", function(datos){          
                        $.each(datos.results.authors,function(i, item){
                          if(i%2==0){
                            texto += "<br><br>";
                            texto += "<div class='cuadro' id='globofacetas'>";
                            texto += "<h4>"+ item +"</h4>";  
                            texto += "</div>";
                          }
                            
            });
                        
            $("#imagenes").html(texto);   
          });
        });       
      }
    </script>



    <script >
      $(document).on("ready", main);
      function main(){
        $("#Lengua").on("click", function(){
          var texto = "";
          var ingreso = $("#ingresofacetas").val();
          $("#imagenes").text("Cargando....");
          $.getJSON("http://carbono.utpl.edu.ec:8080/WSSearcher/webresources/serendipityrest/facets?q="+ ingreso +"&callback=?", function(datos){          
                        $.each(datos.results.languages,function(i, item){
                            if(i%2==0){
                            texto += "<br><br>";
                            texto += "<div class='cuadro' id='globofacetas'>";
                            texto += "<h4>"+ item +"</h4>";  
                            texto += "</div>";
                          }
            });
                        
            $("#imagenes").html(texto);   
          });
        });       
      }
    </script>


    <script >
      $(document).on("ready", main);
      function main(){
        $("#Uni").on("click", function(){
          var texto = "";
          var ingreso = $("#ingresofacetas").val();
          $("#imagenes").text("Cargando....");
          $.getJSON("http://carbono.utpl.edu.ec:8080/WSSearcher/webresources/serendipityrest/facets?q="+ ingreso +"&callback=?", function(datos){          
                        $.each(datos.results.universities,function(i, item){
                            if(i%2==0){
                            texto += "<br><br>";
                            texto += "<div class='cuadro' id='globofacetas'>";
                            texto += "<h4>"+ item +"</h4>";  
                            texto += "</div>";
                          }
                        });
            $("#imagenes").html(texto);   
          });
        });       
      }
    </script>
  </div>  
</body>
</html>
