<?php

function searchTicket($conn){

    $sql = "select estado_ticket, max(nro_ticket) as ultimo_ticket from sct_ventas where estado_ticket = 'Cerrado'";
       mysqli_select_db($conn,'stock_center_testing');
       $qry = mysqli_query($conn,$sql);
       while($row = mysqli_fetch_array($qry)){
            $ultimo_ticket = $row['ultimo_ticket'];
            $estado_ticket = $row['estado_ticket'];
       }
       
       if(($estado_ticket == 'Cerrado') || ($estado_ticket == '') || ($estado_ticket == 'NULL')){
       
            $nro_ticket = $ultimo_ticket + 1;
        
       }
       if($estado_ticket == 'Abierto'){
       
            $nro_ticket = $ultimo_ticket;
       
       }

       return $nro_ticket;
}


// ========================================================================================= //
// FORMULARIOS //


/*
** funcion que muestra el formulario de carga de proveedores
*/
function formNuevaVenta($conn,$nombre){

    $nro_ticket = searchTicket($conn);
    $count = 0;
    
    $sql = "select * from sct_ventas where nro_ticket = '$nro_ticket' and estado_ticket = 'Abierto'";
    mysqli_select_db($conn,'stock_center_testing');
    $resultado = mysqli_query($conn,$sql);
    
     
    echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Nueva Venta
                </div>
                <div class="panel-body">
                
                    <form id="consultar_importe_parcial_ajax" method="POST">
                    <div class="container" style="margin-left:100px">
                        <div class="row">
                              <div class="col-sm-3">
                    <input type="hidden" class="form-control" name="nro_ticket" value="'.$nro_ticket.'">
                    <div class="form-group">
                    <label for="importe_parcial">Importe Parcial:</label>
                    <input type="text" class="form-control" id="importe_parcial" required readonly>
                    </div>
                    <button type="submit" class="btn btn-default btn-sm" id="consultar_importe" data-toggle="tooltip" data-placement="right"        title="Consulta de importe parcial en ticket actual">Consultar Importe Parcial</button>
                    </div></div></div><hr>
                    
                    </form>';
                    
                    echo '<div class="panel panel-default" >
                            <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/view-task.png"  class="img-reponsive img-rounded"> Productos en Ticket: '.$nro_ticket.'';
                        echo '</div><br>';

                                echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
                                echo "<thead>
                                <th class='text-nowrap text-center'>Producto</th>
                                <th class='text-nowrap text-center'>Cantidad</th>
                                <th class='text-nowrap text-center'>Empleado</th>
                                <th class='text-nowrap text-center'>Tipo Pago</th>
                                <th class='text-nowrap text-center'>Fecha</th>
                                <th class='text-nowrap text-center'>Importe</th>
                                <th>&nbsp;</th>
                                </thead>";


                        while($fila = mysqli_fetch_array($resultado)){
                                // Listado normal
                                echo "<tr>";
                                echo "<td align=center>".$fila['descripcion']."</td>";
                                echo "<td align=center>".$fila['cantidad']."</td>";
                                echo "<td align=center>".$fila['empleado']."</td>";
                                echo "<td align=center>".$fila['tipo_pago']."</td>";
                                echo "<td align=center>".$fila['fecha_venta']."</td>";
                                echo "<td align=center>$".$fila['importe']."</td>";
                                echo "<td class='text-nowrap'>";
                                echo '<form <action="#" method="POST">';
                                        echo '<button type="submit" class="btn btn-danger btn-sm" name="del_producto"><img src="../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>';
                                    echo '</form>';
                                echo "</td>";
                                $count++;
                            }

                            echo "</table>";
                            echo "<br>";
                            echo '<button type="button" class="btn btn-primary">Cantidad de Productos en Ticket Actual:  '.$count.' </button>';
                            echo '</div><hr>
                    
                    <h2>Ingreso de Productos</h2><hr>
                
                     <form id="fr_venta_ajax"  method="POST">
                     
                    <div class="container" style="margin-left:100px">
                    
                    
                        <div class="row">
                              <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cod_prod">Nro Ticket:</label>
                                    <input type="text" class="form-control" id="nro_ticket" name="nro_ticket" value="'.$nro_ticket.'" required readonly data-toggle="tooltip" data-placement="right" title="Esta campo esta deshabilitado al ingreso de datos">
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Producto:</label>
                                    <select class="form-control" name="producto" id="producto" data-toggle="tooltip" data-placement="right" title="Despliegue el listado y seleccione la opción deseada">
                                    <option value="" disabled selected>Seleccionar</option>';
                                        
                                        if($conn){
                                        $query = "SELECT * FROM sct_productos order by descripcion ASC";
                                        mysqli_select_db($conn,'stock_center_testing');
                                        $res = mysqli_query($conn,$query);

                                        if($res){
                                            while($valores = mysqli_fetch_array($res)){
                                        echo '<option value="'.$valores[descripcion].'" >'.$valores[descripcion].'</option>';
                                            }
                                            }
                                        }
                                        
                                    echo '</select>
                                    </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="1">
                                </div>
                                <div class="form-group">
                                    <label for="empleado">Empleado:</label>
                                    <input type="text" class="form-control" id="empleado" name="empleado" value="'.$nombre.'" readonly data-placement="right" title="Esta campo esta deshabilitado al ingreso de datos">
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                <label for="sel1">Tipo de Pago:</label>
                                <select class="form-control" name="modo_pago" id="modo_pago" data-toggle="tooltip" data-placement="right" title="Despliegue el listado y seleccione la opción deseada">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="Tarjeta Credito">Tarjeta Crédito</option>
                                    <option value="Tarjeta Debito">Tarjeta Débito</option>
                                    <option value="Efectivo">Efectivo</option>
                                    </select>
                                </div><br>
                                
                                <div class="row">
                                <div class="col-sm-3">
                                <button type="button" class="btn btn-success btn-xs" name="add_producto" id="add_producto">
                                    <img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok.png"> Agregar Producto</button><br><br>
                                
                                <button type="submit" class="btn btn-danger btn-xs" name="cerrar_ticket" data-toggle="tooltip" data-placement="right" title="Presione aquí para cerrar venta e imprimir el ticket">
                                <img src="../icons/devices/printer.png"  class="img-reponsive img-rounded"> Cerrar Ticket e Imprimir</button>
                                </div>
                                </div>
                                 </form>
                                
                            </div>                                 
                        </div>
                        
                        
                        
                    </div>
                        
                </div>
            </div>
          </div>';


}

// ========================================================================================= //
// PERSISTENCIA //
function addVenta($nro_ticket,$producto,$cantidad,$empleado,$modo_pago,$conn){

    $sql = "select precio from sct_productos where descripcion = '$producto'";
    mysqli_select_db($conn,'stock_center_testing');
    $query = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($query)){
        $importe = $rows['precio'];
    }
    
    if($cantidad == 1){
    
        $importe_final = $importe;
    }
    else if($cantidad > 1){
    
        $importe_final = $importe * $cantidad;
    }
    
    $estado_ticket = 'Abierto';
    $hora_actual =  date("H:i:s");
    $fecha_actual = date("Y-m-d");
    
    $consulta = "INSERT INTO sct_ventas".
              "(descripcion,cantidad,empleado,tipo_pago,fecha_venta,hora_venta,importe,nro_ticket,estado_ticket)".
            "VALUES ".
        "('$producto','$cantidad','$empleado','$modo_pago','$fecha_actual','$hora_actual','$importe_final','$nro_ticket','$estado_ticket')";
        
        mysqli_select_db($conn,'stock_center_testing');
        $query = mysqli_query($conn,$consulta);
        
        return $query;

}



/*
** funcion que busca el producto vendido y lo resta de la tabla productos
*/
function restarProducto($producto,$cantidad,$conn){

    $sql = "update sct_productos set cantidad = (cantidad - '$cantidad') where descripcion = '$producto'";
    mysqli_select_db($conn,'stock_center_testing');
    $query = mysqli_query($conn,$sql);


}


/*
** funcion para cerrar ticket
*/
function closeTicket($nro_ticket,$conn){

    $sql = "select sum(importe) as total from sct_ventas where nro_ticket = '$nro_ticket' and estado_ticket = 'Abierto'";
    mysqli_select_db($conn,'stock_center_testing');
    $query = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($query)){
        $total_ticket = $rows['total'];
    }
    
    $sql_1 = "update sct_ventas set estado_ticket = 'Cerrado' where nro_ticket = '$nro_ticket' and estado_ticket = 'Abierto'";
    mysqli_select_db($conn,'stock_center_testing');
    $query_1 = mysqli_query($conn,$sql_1);
    
    if($query_1){
    
        echo  '<div class="alert alert-success alert-dismissible" style="margin-top:70px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <img class="img-reponsive img-rounded" src="../icons/actions/mail-mark-notjunk.png" /> Ticket: '.$nro_ticket.' con un total de: $'.$total_ticket.' cerrado Exitosamente!!.
               </div>';
           
           }else{
           
              echo  '<div class="alert alert-danger alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al intentar Cerrar el Ticket: '.$nro_ticket.'!!' . mysqli_error($conn);
                    echo '</div>';
                    exit;
           }
    
}
?>
