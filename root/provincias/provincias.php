<?php include "../../connection/connection.php"; 

        session_start();
	$varsession = $_SESSION['user'];
	
	if($varsession == null || $varsession = ''){
	echo '<div class="alert alert-danger" role="alert">';
	echo "Usuario o Contrase a Incorrecta. Reintente Por Favor...";
	echo '<br>';
	echo "O no tiene permisos o no ha iniciado sesion...";
	echo "</div>";
	echo '<a href="../../index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	die();
	}

?>

<html><head>
	<meta charset="utf-8">
	<title>Provincias</title>
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

	
	<script>

      $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });

  </script>
	
</head>
<body>

<div class="container-fluid"><br>

<div class="panel panel-default" >
  <div class="panel-heading">
    <h2 class="panel-title text-center text-default "></h2>
  </div>
    <div class="panel-body">
    <br>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">

<!-- BRAND -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#alignment-example" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand"><strong>Provincias </strong><span class="glyphicon glyphicon-globe"></a>
</div>

<!-- COLLAPSIBLE NAVBAR -->
<div class="collapse navbar-collapse" id="alignment-example">
<!-- Links -->
    <ul class="nav navbar-nav navbar-right">
      <li class="active" ><a href="../provincias/nuevoRegistro.php">Nuevo Registro <span class="glyphicon glyphicon-plus"></span></a></li>
    </ul>
<!-- Search -->
</div>
</div>
</nav>

<?php


if($conn)
{
	$sql = "SELECT * FROM provincias";
    	mysql_select_db('stock_center');
    	$resultado = mysql_query($sql,$conn);
	//mostramos fila x fila

	echo '<br><br>';

   	$count = 0;
	$i=0;
            echo "<table class='display compact' id='myTable'>";
              echo "<thead>

                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Provincia</th>
                    <th>&nbsp;</th>
                    </thead>";


	while($fila = mysql_fetch_array($resultado))
	{


			 // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['id']."</td>";
			 echo "<td align=center>".$fila['name']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="editar.php?id='.$fila['id'].'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Editar</a>';
			 echo '<a href="#" data-href="eliminar.php?id='.$fila['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;

		}



		echo "</table>";
	    echo "<br><br><hr>";
	    echo '<button type="button" class="btn btn-primary">Cantidad de Registros:  ' .$count; echo '</button>';

	      echo '<hr> <a href="/stock-center/root/main.php"><input type="button" value="Volver al Men?? Principal" class="btn btn-primary"></a>';
		}



	 else
		{
			echo 'Connection Failure...';
		}

    mysql_close($conn);



?>

</div>
</div>
</div>
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>

					<div class="modal-body">
						 Desea eliminar este registro?
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
						<a class="btn btn-danger btn-ok"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
					</div>
				</div>
			</div>
		</div>

		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>

</body>
</html>

