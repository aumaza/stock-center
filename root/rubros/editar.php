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

      $id = $_GET['id'];
      $sql = "SELECT * FROM rubros WHERE id = '$id'";
      mysql_select_db('stock_center');
      $resultado = mysql_query($sql,$conn);
      $fila = mysql_fetch_assoc($resultado);

?>

<html><head>
	<meta charset="utf-8">
	<title>Editar Rubro</title>
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

	
</head>
<body>

<div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title text-center" contenteditable="true">Rubros</h1>
                            </div>
                            <div class="panel-body">
                                <p><strong>Editar Rubro</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"><img src="/stock-center/img/img-loc.png" class="center-block img-responsive img-thumbnail"></div>
                    <div class="col-md-8">
                        <form action="../rubros/formUpdate.php" method="POST" class="form-horizontal" role="form">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $fila['id']; ?>" />
                            
                            <div class="form-group">
                             <div class="col-sm-2">
                                    <label for="localidad" class="control-label">Categoría</label>
				</div>

			<div class="col-sm-10">
				<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Rubro" value="<?php echo $fila['categoria']; ?>">
			</div>
				</div>
									

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>  Editar</button>
							<hr> <a href="../rubros/rubros.php"><input type="button" value="Volver" class="btn btn-primary"></a>

					
          			</div>
        				</div>
      						</div>
    							</div>
							
						</div>
							</div>
								</form>
									</div>
										</div>
											</div>
												</div>





</body>
</html>