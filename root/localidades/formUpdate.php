<?php include "../../connection/connection.php";

session_start();
	$varsession = $_SESSION['user'];
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}

      if($conn){
      $id = $_GET['id'];
      $sql = "SELECT * FROM localidades WHERE id = '$id'";
      mysql_select_db('stock_center');
      $resultado = mysql_query($sql,$conn);
      $fila = mysql_fetch_assoc($resultado);
      }else{
	echo '<div class="alert alert-danger" role="alert">';
	echo 'Could not Connect: ' . mysql_error();
	echo "</div>";
      }

?>


<html><head>
	<meta charset="utf-8">
	<title>Localidad Actualizada</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../img/img-favicon32x32.png" />
	<link rel="stylesheet" href="/stock-center/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/stock-center/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/stock-center/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/stock-center/css/fontawesome.css">
	<link rel="stylesheet" href="/stock-center/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/stock-center/css/jquery.dataTables.min.css" >

	<script src="/stock-center/js/jquery-3.4.1.min.js"></script>
	<script src="/stock-center/js/bootstrap.min.js"></script>
		
	<script src="/stock-center/js/jquery.dataTables.min.js"></script>
	<script src="/stock-center/js/dataTables.editor.min.js"></script>
	<script src="/stock-center/js/dataTables.select.min.js"></script>
	<script src="/stock-center/js/dataTables.buttons.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
	
	
</head>
<body>

    <div class="container-fluid">
    <div class="main">
    <h2>Edición Localidad</h2>
    
    <?php
    
    if($conn){
      
		$id = mysql_real_escape_string($_POST["id"], $conn);
		$descripcion = mysql_real_escape_string($_POST["descripcion"], $conn);
		    					
    						
	
		$sqlInsert = "UPDATE localidades SET descripcion='$descripcion' WHERE id = '$id'";
		
  			
mysql_select_db('stock_center');
$q = mysql_query($sqlInsert,$conn);

if(!$q)
{
	 echo '<div class="alert alert-danger" role="alert">';
   echo 'Could not enter data: ' . mysql_error();
   echo "</div>";
}

else
  {
    echo '<div class="alert alert-success" role="alert">';
    echo "Registro Actualizado Exitosamente!!";
    echo "</div>";
    echo '<hr> <a href="localidades.php"><input type="button" value="Volver a Localidades" class="btn btn-primary"></a>';
}
}

else 
	//cerramos la conexion
	
	mysql_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div




</body>
</html>
