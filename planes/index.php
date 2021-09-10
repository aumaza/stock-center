<?php include "../core/lib_core/lib_core.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
  
  <title>Planes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="planes.css" >
  <?php skeleton(); ?>
  
  
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default" id="top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../#">
        <button type="button" class="btn btn-warning">
            <img class="img-reponsive img-rounded" src="../core/icons/actions/go-home.png" /> Página Principal</button></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#info">
            <button type="button" class="btn btn-default">
                 <img class="img-reponsive img-rounded" src="../core/icons/actions/help-about.png" /> Información</button></a></li>
        <li><a href="#planes">
            <button type="button" class="btn btn-default">
                 <img class="img-reponsive img-rounded" src="../core/icons/emblems/emblem-new.png" /> Planes</button></a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">No Sabes que plan elegir?</h3>
  <img src="../img/bulk-packaging.jpg" class="img-responsive img-thumbnail" style="display:inline" alt="Bulk Box" width="550" height="550">
  <h3>Te contamos un poco de cada uno y vos elegis el que más se adapta a tus necesidades y las de tu negocio...</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center" id="info">
  <h3 class="margin">
    <img class="img-reponsive img-rounded" src="../core/icons/actions/help-about.png" /> Información</h3>
  <p>Cada plan consta de funcionalidades propias del rubro que sea tu negocio. La aplicación cuenta con tres planes, Básico, Deluxe y Premium.
     Cada uno contiene funcionalidades respectivas al plan, con el plan Básico, podrá cargar, consultar y obtener listados de los productos propios del rubro seleccionado. El plan Deluxe presenta las mismas funcionalalidad que el anterior pero contará con más informes, estadísticos y de control de mercadería.
     Con el plan Premium, tendrá a su disposición muchas más funcionalalidades además de las existentes en los planes anteriores; como apertura y cierre de caja
     manejo de proveedores, pagos entrantes y salientes, etc..
     Por otro lado usted podrá cambiar de plan si considera que su negocio requiere de una administración más avanzada.</p>
 </div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center" id="planes">    
  <h2 class="margin">
     <img class="img-reponsive img-rounded" src="../core/icons/actions/tools-wizard.png" /> Planes</h2><br>
  <div class="row">
    <div class="col-sm-4">
      <div class="well">
      <div class="alert alert-warning">
      <img class="img-reponsive img-rounded" src="../core/icons/emblems/emblem-new.png" /><hr>
      <p>El plan Básico es el más económico y contará con carga de productos, listados e informes.</p>
      </div><br><br>
      <img src="../img/plan-basic.png" class="img-responsive margin" style="width:100%" alt="Image">
      </div>
      <h1><span class="label label-warning">$2500/mes</span></h1>
    </div>
    <div class="col-sm-4">
    <div class="well">
    <div class="alert alert-warning">
      <img class="img-reponsive img-rounded" src="../core/icons/emblems/emblem-new.png" /><hr>
      <p>El plan premium cuenta con lo mismo que el plan Básico, con agregados como, impresión de informes, búsquedas avanzadas, etc.</p>
      </div><br>
      <img src="../img/plan-premium.png" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
      <h1><span class="label label-warning">$4500/mes</span></h1>
    </div>
    <div class="col-sm-4"> 
    <div class="well">
    <div class="alert alert-warning">
      <img class="img-reponsive img-rounded" src="../core/icons/emblems/emblem-new.png" /><hr>
      <p>El plan Deluxe al igual que los otros, posee las mismas funcionalidades, pero con manejos de caja, entradas y salidas, administración de proveedores, estadísticas, etc.</p>
      </div><br>
      <img src="../img/plan-deluxe.png" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
      <h1><span class="label label-warning">$6500/mes</span></h1>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Powered By <img class="img-reponsive img-rounded" src="../img/devel-slack-logo2-32x32.png" /><a href="https://deps.slackzone.com.ar/slackzone-devel" target="_blank"> Slackzone Development</a></p>
  <a href="#top"><button type="button" class="btn" data-toggle="tooltip" data-placement="right" title="Ir Arriba">
    <img class="img-reponsive img-rounded" src="../core/icons/actions/draw-triangle3.png" /></button></a>
</footer>

</body>
</html>
