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

?>
