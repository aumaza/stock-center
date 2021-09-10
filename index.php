<?php   include "core/connection/connection_base.php";
        include "core/connection/connection.php";
        include "core/lib_core/lib_core.php";

?>

<html style="height: 100%">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/img-favicon32x32.png" />
	<title>Stock-Center</title>
	<?php skeleton(); ?>

	
</head>
<body background="img/background.jpg" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

	
	<div class="container-fluid"> 
        <div class="row">
            <div class="col-md-12 text-center">
	<nav class="navbar navbar-inverse">
  
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"><img src="img/stock.png" height="45px" weight="50px" class="img-rounded"></a>
      <a href="testing/#"><button class="btn btn-primary navbar-btn animate__animated animate__fadeInDown">
        <img class="img-reponsive img-rounded" src="core/icons/actions/run-build-configure.png" /> Stock Center Testing</button></a>
    </div>
    
    <ul class="nav navbar-nav">
        <a href="rubros/#">
        <button class="btn btn-default navbar-btn animate__animated animate__fadeInUp"><img class="img-reponsive img-rounded" src="core/icons/categories/store.png" /> Rubros</button></a>
        <a href="planes/#">
        <button class="btn btn-default navbar-btn animate__animated animate__fadeInDown"><img class="img-reponsive img-rounded" src="core/icons/emblems/emblem-new.png" /> Planes</button></a>
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <a href="registro/#"><button class="btn btn-warning navbar-btn animate__animated animate__fadeInUp">
        <img class="img-reponsive img-rounded" src="core/icons/actions/contact-new.png" /> Registrarse</button></a>
      <!-- Trigger the modal with a button -->
        <button class="btn btn-success navbar-btn animate__animated animate__fadeInDown" data-toggle="modal" data-target="#myModal">
        <img class="img-reponsive img-rounded" src="core/icons/actions/document-decrypt.png" /> Ingresar</button>
    </ul>
  
  </div>
</nav>

<!-- Start login control -->


<!-- End login control -->



<div class="container-fluid">
     <!-- Modal -->
<?php modalLogin(); ?>
     <!-- End Modal -->
</div>

</div>
</div>



</body>
</html>
