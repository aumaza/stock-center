<?php

// ========================================================================================= //
// LISTADOS //
/*
** funcion que carga la tabla de todos los pagos
*/


function listarPagos($conn){

if($conn)
{
	$sql = "SELECT * FROM sct_ppagos";
    	mysqli_select_db($conn,'stock_center_testing');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/view-task.png"  class="img-reponsive img-rounded"> Listado de Pagos';
	echo '</div><br>';

            echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Tipo de Pago</th>
            <th class='text-nowrap text-center'>Proveedor</th>
            <th class='text-nowrap text-center'>Servcio</th>
            <th class='text-nowrap text-center'>Fecha</th>
            <th class='text-nowrap text-center'>Importe</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['tipo_pago']."</td>";
			 echo "<td align=center>".$fila['proveedor']."</td>";
			 echo "<td align=center>".$fila['servicio']."</td>";
			 echo "<td align=center>".$fila['fecha']."</td>";
			 echo "<td align=center>".$fila['importe']."</td>";
			 echo "<td class='text-nowrap'>";
             echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_proveedor"><img src="../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '<button type="submit" class="btn btn-danger btn-sm" name="del_proveedor"><img src="../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>';
                   echo '</form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Pagos:  '.$count.' </button><br><br>';
		echo '<form action="#" method="POST">
                  <button type="submit" class="btn btn-default btn-sm" name="new_pago"><img src="../icons/actions/view-task-add.png"  class="img-reponsive img-rounded"> Cargar Pago</button>
              </form>';
                   
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}



?>
