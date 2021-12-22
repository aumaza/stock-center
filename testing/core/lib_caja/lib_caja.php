<?php

// ========================================================================= //
// CONSULTA ESTADO DE CAJA
function queryEstadoCaja($conn){
  
  $fecha_actual = date("Y-m-d");

  $sql = "select estado_caja from sct_caja where fecha = '$fecha_actual'";
  mysqli_select_db($conn,'stock_center_testing');
  $query = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($query)){
  
    $estado = $row['estado_caja'];
  
  }
  
  if($estado == 'Abierta'){
  
      $flag = 1;
  }
  else if($estado == 'Cerrada' || $estado == ''){
    
      $flag = 0;
  
  }
  
  return $flag;
  
  
}

// ========================================================================================= //
// LISTADOS //
/*
** funcion que carga la tabla de estado de caja
*/


function cajaEstado($conn){

if($conn)
{
	$sql = "SELECT * FROM sct_caja";
    	mysqli_select_db($conn,'stock_center_testing');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/view-task.png"  class="img-reponsive img-rounded"> Estado de Caja';
	echo '</div><br>';

            echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Fecha</th>
            <th class='text-nowrap text-center'>Hora Apertura</th>
            <th class='text-nowrap text-center'>Hora Cierre</th>
            <th class='text-nowrap text-center'>Importe Apertura</th>
            <th class='text-nowrap text-center'>Importe Cierre</th>
            <th class='text-nowrap text-center'>Estado Caja</th>
            <th class='text-nowrap text-center'>Usuario Apertura</th>
            <th class='text-nowrap text-center'>Usuario Cierre</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['fecha']."</td>";
			 echo "<td align=center>".$fila['hora_apertura']."</td>";
			 echo "<td align=center>".$fila['hora_cierre']."</td>";
			 echo "<td align=center>$".$fila['importe_apertura']."</td>";
			 
			 if($fila['importe_cierre'] == ''){
			 echo "<td align=center>$".'0.00'."</td>";
			 }else{
			 echo "<td align=center>$".$fila['importe_cierre']."</td>";
			 }
			 
			 echo "<td align=center>".$fila['estado_caja']."</td>";
			 echo "<td align=center>".$fila['usuario_apertura']."</td>";
			 echo "<td align=center>".$fila['usuario_cierre']."</td>";
			 echo "<td class='text-nowrap'>";
             echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="print_check"><img src="../icons/devices/printer.png"  class="img-reponsive img-rounded"> Imprimir Comprobante</button>';
                   echo '</form>';
             echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<button type="button" class="btn btn-primary">Cantidad de Productos:  '.$count.' </button>';
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}



/*
** funcion que carga formulario de apertura de caja
*/
function formAperturaCaja($nombre){

    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");

    echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img class="img-reponsive img-rounded" src="../icons/status/object-unlocked.png" /> Apertura de Caja
                </div>
                <div class="panel-body">
                     <form id="fr_caja_ajax"  method="POST">
                    <div class="container" style="margin-left:100px">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="fecha_apertura">Fecha Apertura:</label>
                                    <input type="date" class="form-control" id="fecha_apertura" name="fecha_apertura" value="'.$fecha_actual.'" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="hora_apertura">Hora Apertura:</label>
                                    <input type="time" class="form-control" id="hora_apertura" name="hora_apertura" value="'.$hora_actual.'" readonly required>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="usuario_apertura">Usuario Apertura:</label>
                                    <input type="text" class="form-control" id="usuario_apertura" name="usuario_apertura" value="'.$nombre.'" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="importe_apertura">Importe Apertura:</label>
                                    <input type="text" class="form-control" id="importe_apertura" name="importe_apertura" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-4"><br>
                                <div class="well">
                                <p>Ingrese en el campo Importe Apertura, el monto con el cual realizará la apetura de caja.</p>
                                <p>El monto debe ser ingresado con el siguiente formato:</p>
                                <p>Ej.: 1500.00</p>
                                <p><strong>No utilice coma para separar los decimales, en su lugar use el punto</strong></p>
                                
                                </div>
                                
                                
                            </div>                                 
                        </div>
                        
                        <div class="row">
                        <div class="col-sm-3">
                        <button type="button" class="btn btn-success" name="apertura_caja" id="apertura_caja">
                            <img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok.png" /> Realizar Apertura</button>
                        </div>
                        </div>
                        
                    </div>
                        </form> 
                </div>
            </div>
          </div>';


}


// ========================================================================================= //
// PERSISTENCIA //
function openCaja($fecha_apertura,$hora_apertura,$usuario_apertura,$importe_apertura,$conn){

        
    $estado_caja = 'Abierta';
    
    $consulta = "INSERT INTO sct_caja".
              "(fecha,hora_apertura,importe_apertura,estado_caja,usuario_apertura)".
            "VALUES ".
        "('$fecha_apertura','$hora_apertura','$importe_apertura','$estado_caja','$usuario_apertura')";
        
        mysqli_select_db($conn,'stock_center_testing');
        $query = mysqli_query($conn,$consulta);
        
        echo $query;

}




/*
** funcion que carga modal de aviso de estado de caja
*/
function modalEstadoCaja(){

    echo '<div class="modal fade" id="modalCaja" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Atención</h4>
                </div>
                <div class="modal-body">
                <p>Debe realizar la apertura de Caja Antes de Comezar a operar!!.</p>
                </div>
                <div class="modal-footer">
                <form action="#" method="POST">
                <button type="submit" class="btn btn-default" name="abrir_caja">Realizar Apertura</button>
                </form>
                </div>
            </div>
            
            </div>
        </div>';


}


/*
** funcion que muestra mensaje que la caja ya está abierta
*/
function messageOpenCaje(){

    echo '<div class="alert alert-success">
            <p><img class="img-reponsive img-rounded" src="../icons/actions/flag-green.png" />
                La Caja ya se encuentra Abierta</p>
          </div>';

}

/*
** funcion que muestra mensaje de advertencia de caja aún no cerrada
*/
function warningClose(){

    echo '<div class="alert alert-warning">
            <p><img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" />
                Ha seleccionado salir del sistema, pero aún no ha cerrado la caja</p>
            <p>Desea cerrar Caja y salir?</p>
            <p>Desea salir del sistema sin cerrar caja?</p>
          </div>';

}
?>
