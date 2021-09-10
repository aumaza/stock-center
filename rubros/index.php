<?php include "../core/lib_core/lib_core.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Rubros</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="rubros.css">  
  <?php skeleton(); ?>
  
  
</head>
<body>
<br>
<div class="container">
<div class="row">
  <div class="col-sm-8">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        
        <div class="item active">
          <img src="../img/kiosko.jpg" style="width:100%" alt="Kiosko">
          <div class="carousel-caption">
            <h3>Kioskos</h3>
           </div>      
        </div>

        <div class="item">
          <img src="../img/jugueteria.jpg" style="width:100%" alt="Jugueteria">
          <div class="carousel-caption">
            <h3>Jugueterias</h3>
          </div>      
        </div>
      
      
      <div class="item">
          <img src="../img/ferreteria.jpg" style="width:100%" alt="Ferreteria">
          <div class="carousel-caption">
          <h3>Ferreterías</h3>
          </div>
          </div>
          
      <div class="item">
          <img src="../img/productos-alimenticios.jpg" style="width:100%" alt="Productos Alimenticios">
          <div class="carousel-caption">
          <h3>Productos Alimenticios</h3>
          </div> 
        </div>
      

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
  </div>
  </div>
  
  <div class="col-sm-4">
    
    <div class="well animate__animated animate__rollIn">
      <p><img class="img-reponsive img-rounded" src="../core/icons/actions/dialog-ok.png" />
        Conozca el estado de su stock</p>
    </div>
    
    <div class="well animate__animated animate__rollIn">
       <p><img class="img-reponsive img-rounded" src="../core/icons/actions/dialog-ok.png" /> Prevea con antelación</p>
    </div>
    
    <div class="well animate__animated animate__rollIn">
       <p><img class="img-reponsive img-rounded" src="../core/icons/actions/dialog-ok.png" /> Todo en una aplicación</p>
    </div>
    
    <div class="well animate__animated animate__rollIn">
       <p><img class="img-reponsive img-rounded" src="../core/icons/actions/dialog-ok.png" /> Tiempos mejor organizados</p>
    </div>
    
    <div class="well animate__animated animate__rollIn">
       <p><img class="img-reponsive img-rounded" src="../core/icons/actions/dialog-ok.png" /> Olvídese de los papeles</p>
    </div><hr>
    <a href="../#"><button type="button" class="btn btn-warning btn-block animate__animated animate__shakeY">
        <img class="img-reponsive img-rounded" src="../core/icons/actions/go-home.png" /> Página Principal</button></a>
    
  </div>
</div>
<hr>
</div>


<div class="container text-center">    
  <div class="alert alert-warning">
  <h3><img class="img-reponsive img-rounded" src="../core/icons/categories/store.png" /> Rubros</h3>
  </div>
  <br>
  <div class="row">
    
    <div class="col-sm-3">
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/status/media-playlist-shuffle.png" /> Juguetería</p>
      </div>
    </div>
    
    <div class="col-sm-3"> 
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/apps/preferences-web-browser-cookies.png" /> Kiosko</p>
      </div> 
    </div>
    
    <div class="col-sm-3">
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/categories/preferences-system.png" /> Ferretería</p>
      </div>
    </div>
    
    <div class="col-sm-3"> 
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/categories/sneakers.png" /> Calzados</p>
      </div> 
    </div>
    
    <div class="col-sm-3">
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/apps/wine.png" /> Vinerías</p>
      </div>
      
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/categories/food.png" /> Productos Alimenticios</p>
      </div>
      
    </div>
    
    <div class="col-sm-3">
      
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/devices/smartphone.png" /> Accesorios telefonía Móvil</p>
      </div>
      
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/status/dialog-password.png" /> Cerrajerías</p>
      </div>
     </div>
     
     <div class="col-sm-3">
      
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/devices/media-flash.png" /> Artículos de Electrónica</p>
      </div>
      
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/devices/audio-card.png" /> Artículos de Informática</p>
      </div>
     </div>
     
     <div class="col-sm-3">
      
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/categories/applications-education-school.png" /> Artículos Escolares</p>
      </div>
      
      <div class="well animate__animated animate__flipInX">
       <p><img class="img-reponsive img-rounded" src="../core/icons/categories/shirts.png" /> Indumentaria</p>
      </div>
     </div>
     
  </div>
  <hr>
</div>


<footer class="container-fluid text-center">
 <p>Powered By <img class="img-reponsive img-rounded" src="../img/devel-slack-logo2-32x32.png" /><a href="https://deps.slackzone.com.ar/slackzone-devel" target="_blank"> Slackzone Development</a></p>
</footer>

</body>
</html>
