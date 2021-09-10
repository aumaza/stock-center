<?php   session_start();
        include "core/connection/connection.php";
        include "../core/lib_core/lib_core.php";
        include "lib_core_testing/lib_core_testing.php";

?>

<html style="height: 100%">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../img/img-favicon32x32.png" />
	<title>Stock-Center Espacio de Prueba</title>
	<?php skeleton(); ?>

	<style>
	.row_1{padding-left: 400px;}
	</style>
	
</head>
<body background="img/testing-background.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover; height: 100%">

	
	<div class="container-fluid"> 
        <div class="row">
            <div class="col-md-12 text-center">
	<nav class="navbar navbar-inverse">
  
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"><img src="../img/stock.png" height="45px" weight="50px" class="img-rounded"></a>
      <a href="../#" class="navbar-brand">Página Principal</a>
      
    </div>
    
    
    <ul class="nav navbar-nav navbar-right">
      <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-success btn-lg animate__animated animate__fadeInLeftBig" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-log-in"></span> Ingresar</button>
    </ul>
  
  </div>
</nav>

<!-- Start login -->

<?php 
if($conn){

if(isset($_POST['A'])){

    $user = mysqli_real_escape_string($conn,$_POST["user"]);
    $pass = mysqli_real_escape_string($conn,$_POST["pass"]);
    session_start();
    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $pass;
    validEnter($user,$pass,$conn);
}
}else{

    echo 'Connection Error...' .mysqli_error($conn);
}

?>
<!-- End login -->

<?php card(); ?>






<div class="container-fluid">
     <!-- Modal -->
<?php modalLoginTesting(); ?>
     <!-- End Modal -->
</div>

</div>
</div>



</body>
</html>
