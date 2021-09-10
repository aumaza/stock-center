<?php

// ========================================================================================= //
// LISTADOS //
/*
** funcion que carga la tabla de todas las ventas de heladeria
*/


function listarProductos($conn){

if($conn)
{
	$sql = "SELECT * FROM sct_productos";
    	mysqli_select_db($conn,'stock_center_testing');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/view-task.png"  class="img-reponsive img-rounded"> Listado de Productos';
	echo '</div><br>';

            echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Cod. Producto</th>
            <th class='text-nowrap text-center'>Producto</th>
            <th class='text-nowrap text-center'>Marca</th>
            <th class='text-nowrap text-center'>Cantidad</th>
            <th class='text-nowrap text-center'>Fabricante</th>
            <th class='text-nowrap text-center'>Nro. Lote</th>
            <th class='text-nowrap text-center'>Precio</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['cod_producto']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td align=center>".$fila['marca']."</td>";
			 echo "<td align=center>".$fila['cantidad']."</td>";
			 echo "<td align=center>".$fila['fabricante']."</td>";
			 echo "<td align=center>".$fila['nro_lote']."</td>";
			 echo "<td align=center>$".$fila['precio']."</td>";
			 echo "<td class='text-nowrap'>";
             echo '<form <action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">';
                   echo '<button type="submit" class="btn btn-primary btn-sm" name="edit_producto"><img src="../icons/actions/document-edit.png"  class="img-reponsive img-rounded"> Editar</button>';
                   echo '<button type="submit" class="btn btn-danger btn-sm" name="del_producto"><img src="../icons/actions/trash-empty.png"  class="img-reponsive img-rounded"> Eliminar</button>';
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




// ========================================================================================= //
// FORMULARIOS //


/*
** funcion que muestra el formulario de carga de productos
*/
function formAltaProductos(){

    echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Carga de Productos</div>
                <div class="panel-body">
                     <form action="#" method="POST">
                    <div class="container" style="margin-left:100px">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cod_prod">Código Producto:</label>
                                    <input type="text" class="form-control" id="cod_prod" name="cod_producto" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="marca">Marca:</label>
                                    <input type="text" class="form-control" id="marca" name="marca" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="number" class="form-control" id="cantidad" min="1" name="cantidad" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="fabricante">Fabricante / Productor:</label>
                                    <input type="text" class="form-control" id="fabricante" name="fabricante" required>
                                </div>
                                <div class="form-group">
                                    <label for="lote_nro">Lote Nro.:</label>
                                    <input type="text" class="form-control" id="lote_nro" name="lote_nro" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="precio">Valor:</label>
                                    <input type="text" class="form-control" id="precio" name="precio" required>
                                </div>
                            </div>                                 
                        </div>
                        
                        <div class="row">
                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-success" name="guardar_producto">
                            <img class="img-reponsive img-rounded" src="../icons/devices/media-floppy.png" /> Guardar</button>
                        </div>
                        </div>
                        
                    </div>
                        </form> 
                </div>
            </div>
          </div>';


}


/*
** funcion que muestra el formulario de edición de productos
*/
function formEditProductos($id,$conn){

    $sql = "select * from sct_productos where id = '$id'";
    mysqli_select_db($conn,'stock_center_testing');
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        $cod_producto = $row['cod_producto'];
        $descripcion = $row['descripcion'];
        $marca = $row['marca'];
        $cantidad = $row['cantidad'];
        $fabricante = $row['fabricante'];
        $nro_lote = $row['nro_lote'];
        $precio = $row['precio'];    
    }


    echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Carga de Productos</div>
                <div class="panel-body">
                     <form action="#" method="POST">
                     <input type="hidden" name="id" value="'.$id.'">
                    <div class="container" style="margin-left:100px">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cod_prod">Código Producto:</label>
                                    <input type="text" class="form-control" id="cod_prod" name="cod_producto" value="'.$cod_producto.'" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="'.$descripcion.'" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="marca">Marca:</label>
                                    <input type="text" class="form-control" id="marca" name="marca" value="'.$marca.'" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="number" class="form-control" id="cantidad" min="1" name="cantidad" value="'.$cantidad.'" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="fabricante">Fabricante / Productor:</label>
                                    <input type="text" class="form-control" id="fabricante" name="fabricante" value="'.$fabricante.'" required>
                                </div>
                                <div class="form-group">
                                    <label for="lote_nro">Lote Nro.:</label>
                                    <input type="text" class="form-control" id="lote_nro" name="lote_nro" value="'.$nro_lote.'" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="precio">Valor:</label>
                                    <input type="text" class="form-control" id="precio" name="precio" value="'.$precio.'" required>
                                </div>
                            </div>                                 
                        </div>
                        
                        <div class="row">
                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-success" name="update_producto">
                            <img class="img-reponsive img-rounded" src="../icons/devices/media-floppy.png" /> Guardar</button>
                        </div>
                        </div>
                        
                    </div>
                        </form> 
                </div>
            </div>
          </div>';


}


/*
** funcion para eliminar un registro de equipo
*/
function formEliminarProducto($id,$conn){

        $sql = "select * from sct_productos where id = '$id'";
        mysqli_select_db($conn,'smb_bienestar');
        $query = mysqli_query($conn,$sql);
        while($fila = mysqli_fetch_array($query)){
                $descripcion = $fila['descripcion'];
            }
            
            echo '<div class="container" style="margin-top:70px">
            <div class="row">
            <div class="col-sm-8">
            
            <div class="panel panel-danger">
            <div class="panel-heading"><img class="img-reponsive img-rounded" src="../icons/status/security-low.png" /> Productos - Eliminar Registro</div>
            <div class="panel-body">
            <form action="main.php" method="POST">
            <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
                <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
                <p>Está por eliminar el Producto: <strong>'.$descripcion.'</strong></p>
                <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_producto">Aceptar</button><br>
            </form>
            <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}



/*
** agregar producto a la base de datos
*/
function addProduct($cod_producto,$descripcion,$marca,$cantidad,$fabricante,$nro_lote,$precio,$conn){
   
   $val_1 = charValidator($cod_producto);
   $val_2 = charValidator($descripcion);
   $val_3 = charValidator($marca);
   $val_4 = intValidator($cantidad);
   $val_5 = charValidator($fabricante);
   $val_6 = charValidator($nro_lote);
   $val_7 = intValidator($precio);
      
   mysqli_select_db($conn,'stock_center_testing'); 
   $sql = "INSERT INTO sct_productos ".
            "(cod_producto,descripcion,marca,cantidad,fabricante,nro_lote,precio)".
                "VALUES ".
                    "('$cod_producto','$descripcion','$marca','$cantidad','$fabricante','$nro_lote','$precio')";

    if(($val_1 == 1) && ($val_2 == 1) && ($val_3 == 1) && ($val_4 == 1) && ($val_5 == 1) && ($val_6 == 1 ) && ($val_7 == 1 )){
    
           $query = mysqli_query($conn,$sql);
           
           if($query){
           
              echo  '<div class="alert alert-success alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/actions/mail-mark-notjunk.png" /> Producto Guardado Exitosamente!!.
                    </div>';
           
           }else{
           
              echo  '<div class="alert alert-danger alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al intentar guardar Producto!!' . mysqli_error($conn);
                    echo '</div>';
                    exit;
           }
    
    }else{
    
        echo  '<div class="alert alert-danger alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Algunos de los Campos contienen caracteres inválidos.
               </div>';
               exit;
    
    }

}


/*
** actualizar producto en la base de datos
*/
function updateProduct($id,$cod_producto,$descripcion,$marca,$cantidad,$fabricante,$nro_lote,$precio,$conn){
   
   $val_1 = charValidator($cod_producto);
   $val_2 = charValidator($descripcion);
   $val_3 = charValidator($marca);
   $val_4 = intValidator($cantidad);
   $val_5 = charValidator($fabricante);
   $val_6 = charValidator($nro_lote);
   $val_7 = intValidator($precio);
      
   mysqli_select_db($conn,'stock_center_testing'); 
   $sql = "update sct_productos set cod_producto = '$cod_producto', descripcion = '$descripcion', marca = '$marca', cantidad = '$cantidad', fabricante = '$fabricante', nro_lote = '$nro_lote', precio = '$precio' where id = '$id'";

    if(($val_1 == 1) && ($val_2 == 1) && ($val_3 == 1) && ($val_4 == 1) && ($val_5 == 1) && ($val_6 == 1 ) && ($val_7 == 1 )){
    
           $query = mysqli_query($conn,$sql);
           
           if($query){
           
              echo  '<div class="alert alert-success alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/actions/mail-mark-notjunk.png" /> Producto Actualizado Exitosamente!!.
                    </div>';
           
           }else{
           
              echo  '<div class="alert alert-danger alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al intentar actualizar Producto!!' . mysqli_error($conn);
                    echo '</div>';
                    exit;
           }
    
    }else{
    
        echo  '<div class="alert alert-danger alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Algunos de los Campos contienen caracteres inválidos.
               </div>';
               exit;
    
    }



}


/*
** actualizar producto en la base de datos
*/
function deleteProduct($id,$conn){
   
         
   mysqli_select_db($conn,'stock_center_testing'); 
   $sql = "delete from sct_productos where id = '$id'";
   $query = mysqli_query($conn,$sql);
           
           if($query){
           
              echo  '<div class="alert alert-success alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/actions/mail-mark-notjunk.png" /> Producto Eliminado Exitosamente!!.
                    </div>';
           
           }else{
           
              echo  '<div class="alert alert-danger alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al intentar eliminar Producto!!' . mysqli_error($conn);
                    echo '</div>';
                    exit;
           }
     
}


?>
