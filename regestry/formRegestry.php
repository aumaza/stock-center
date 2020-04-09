<?php include "../connection/connection.php";


if($conn){

$sql = "CREATE TABLE comercios(".
      "id INT AUTO_INCREMENT,".
      "razon_social VARCHAR(60),".
      "cuil VARCHAR(11),".
      "cuit VARCHAR(11),".
      "titular_com VARCHAR(60),".
      "nombre_comercio VARCHAR(60),".
      "rubro VARCHAR(40),".
      "direccion VARCHAR(40),".
      "pais VARCHAR(40),".
      "provincia VARCHAR(60),".
      "localidad VARCHAR(60),".
      "cod_postal VARCHAR(10),".
      "telefono VARCHAR(15),".
      "email VARCHAR(30),".
      "observaciones VARCHAR(255),".
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
		$razonSocial = mysql_real_escape_string($_POST["razonSocial"], $conn);
		$cuil = mysql_real_escape_string($_POST["cuil"], $conn);
		$cuit = mysql_real_escape_string($_POST["cuit"], $conn);
		$titular = mysql_real_escape_string($_POST["titular"], $conn);
		$comercio = mysql_real_escape_string($_POST["nombre_comercio"], $conn);
		$rubro = mysql_real_escape_string($_POST["rubro"], $conn);
		$direccion = mysql_real_escape_string($_POST["direccion"], $conn);
		$pais = mysql_real_escape_string($_POST["pais"], $conn);
		$provincia = mysql_real_escape_string($_POST["provincia"], $conn);
		$localidad = mysql_real_escape_string($_POST["localidad"], $conn);
		$codigo_postal = mysql_real_escape_string($_POST["codigo_postal"], $conn);
		$telefono = mysql_real_escape_string($_POST["telefono"], $conn);
		$email = mysql_real_escape_string($_POST["email"], $conn);
		$observaciones = mysql_real_escape_string($_POST["observaciones"], $conn);
	
$sqlInsert = "INSERT INTO comercios ".
"(razon_social,cuil,cuit,titular_com,nombre_comercio,rubro,direccion,pais,provincia,localidad,cod_postal,telefono,email,observaciones)".
"VALUES ".
"('$razonSocial','$cuil','$cuit','$titular','$comercio','$rubro','$direccion','$pais','$provincia','$localidad','$codigo_postal','$telefono','$email','$observaciones')";


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
                                <h1 class="panel-title text-center" contenteditable="true">Alta Comercios</h1>
                            </div>
                            <div class="panel-body">
                                <p><strong>Comercio Registrado</strong></p>
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
    echo "Comercio Registrado Exitosamente!!";
    echo "</div>";
    echo "<br><br><br><br>";
    echo '<hr> <a href="../index.html"><input type="button" value="Volver a la Página Principal" class="btn btn-primary"></a>';
}



	//cerramos la conexion
	
	mysql_close($conn);

    
?>



</body>
</html>

