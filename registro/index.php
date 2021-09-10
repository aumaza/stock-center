<?php   include "../core/connection/connection_base.php";
        include "../core/lib_core/lib_core.php";
        include "lib_registro.php";



?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Proceso de Registro en Stock-Center</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>
  
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      
      <?php registrationGuide(); ?>
      
    </div>
    <br>
    <div class="col-sm-9">
      <div class="alert alert-info">
      <h3 align="center">
        <img class="img-reponsive img-rounded" src="../core/icons/actions/view-calendar-tasks.png" /> Stock-Center / Proceso de Registro
      </h3>
      <form action="#" method="POST">
      <button type="submit" class="btn btn-primary" name="home">
        <img class="img-reponsive img-rounded" src="../core/icons/actions/go-home.png" /> Inicio</button>
      <button type="submit" class="btn btn-success" name="iniciar_registro">
        <img class="img-reponsive img-rounded" src="../core/icons/actions/code-function.png" /> Comenzar</button>
      </form>
      </div>
      <hr>
        <!--  Area de formulacio de registro   -->
        
        <?php 
        
        if($conn){
        
        if(isset($_POST['home'])){
            echo '<meta http-equiv="refresh" content="1;URL=../index.php "/>';
        }
        if(isset($_POST['iniciar_registro'])){
          formRegistro($conn);
        }
        
        }else{
          error_connection($conn);
        }
        
        ?>
    
        <!--  fin área fomulario de registro  -->
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Powered By <img class="img-reponsive img-rounded" src="../img/devel-slack-logo2-32x32.png" /><a href="https://deps.slackzone.com.ar/slackzone-devel" target="_blank"> Slackzone Development</a></p>
</footer>

</body>
</html>
