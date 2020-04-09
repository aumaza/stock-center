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

$sql = "CREATE TABLE rubros(".
      "id INT AUTO_INCREMENT,".
      "categoría VARCHAR(50),".
      "PRIMARY KEY (id)); ";

	mysql_select_db('stock_center');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		mysql_error(); 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
	 }
					
		$name = mysql_real_escape_string($_POST["categoria"], $conn);
		    
	
	
$sqlInsert = "INSERT INTO rubros ".
"(categoria)".
"VALUES ".
"('$name')";


$q = mysql_query($sqlInsert,$conn);
}

else{
 echo '<div class="alert alert-danger" role="alert">';
  echo 'Could not Connect to Database: ' . mysql_error();
  echo "</div>";
}

?>

<html><head>
	<meta charset="utf-8">
	<title>Rubro Guardado</title>
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

<div class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 class="panel-title text-center" contenteditable="true">Rubros</h1>
                            </div>
                            <div class="panel-body">
                                <p><strong>Nuevo Rubro</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php



if(!$q)
{
  echo '<div class="alert alert-danger" role="alert">';
  echo 'Could not enter data: ' . mysql_error();
  echo "</div>";
}

else
{
    echo '<div class="alert alert-success" role="alert">';
    echo "Registro Guardado Exitosamente!!";
    echo "</div>";
    echo "<br><br><br><br>";
    echo '<hr> <a href="rubros.php"><input type="button" value="Volver a Rubros" class="btn btn-primary"></a>';
}



	//cerramos la conexion
	
	mysql_close($conn);

    
?>



</body>
</html>

