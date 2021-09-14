<?php

// ========================================================================================= //
// LISTADOS //
/*
** funcion que carga la tabla de todos los provvedores
*/


function listarProveedores($conn){

if($conn)
{
	$sql = "SELECT * FROM sct_proveedores";
    	mysqli_select_db($conn,'stock_center_testing');
    	$resultado = mysqli_query($conn,$sql);
	//mostramos fila x fila
	$count = 0;
	echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default" >
	      <div class="panel-heading"><span class="pull-center "><img src="../icons/actions/view-task.png"  class="img-reponsive img-rounded"> Listado de Proveedores';
	echo '</div><br>';

            echo "<table class='table table-condensed table-hover' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Proveedor</th>
            <th class='text-nowrap text-center'>Empresa</th>
            <th class='text-nowrap text-center'>Tipo Productos</th>
            <th class='text-nowrap text-center'>Email</th>
            <th class='text-nowrap text-center'>Móvil</th>
            <th class='text-nowrap text-center'>Teléfono</th>
            <th>&nbsp;</th>
            </thead>";


	while($fila = mysqli_fetch_array($resultado)){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['nombre_proveedor']."</td>";
			 echo "<td align=center>".$fila['empresa']."</td>";
			 echo "<td align=center>".$fila['tipo_productos']."</td>";
			 echo "<td align=center>".$fila['email']."</td>";
			 echo "<td align=center>".$fila['movil']."</td>";
			 echo "<td align=center>".$fila['telefono']."</td>";
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
		echo '<button type="button" class="btn btn-primary">Cantidad de Proveedores:  '.$count.' </button>';
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...' .mysqli_error($conn);
		}

    mysqli_close($conn);

}



// ========================================================================================= //
// FORMULARIOS //


/*
** funcion que muestra el formulario de carga de proveedores
*/
function formAltaProveedor(){

    echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Carga de Proveedor
                </div>
                <div class="panel-body">
                     <form action="#" method="POST">
                    <div class="container" style="margin-left:100px">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cod_prod">Nombre Proveedor:</label>
                                    <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Empresa:</label>
                                    <input type="text" class="form-control" id="empresa" name="empresa" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="marca">Tipo de Producto:</label>
                                    <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" placeholder="Ej.: Lacteos, Pastas, Carnes" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="fabricante">Móvil:</label>
                                    <input type="text" class="form-control" id="movil" maxlength="10" name="movil" required>
                                </div>
                                <div class="form-group">
                                    <label for="lote_nro">Telefono:</label>
                                    <input type="text" class="form-control" id="telefono" maxlength="10" name="telefono" required>
                                </div>
                                
                                
                            </div>                                 
                        </div>
                        
                        <div class="row">
                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-success" name="guardar_proveedor">
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
** funcion que muestra el formulario de carga de proveedores
*/
function formEditProveedor($id,$conn){

    $sql = "select * from sct_proveedores where id = '$id'";
    mysqli_select_db($conn,'stock_center_testing');
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        $nombre_proveedor = $row['nombre_proveedor'];
        $empresa = $row['empresa'];
        $tipo_producto = $row['tipo_productos'];
        $email = $row['email'];
        $movil = $row['movil'];
        $telefono = $row['telefono'];
    }

    echo '<div class="container" style="margin-top:70px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar Proveedor
                </div>
                <div class="panel-body">
                     <form action="#" method="POST">
                     <input type="hidden" name="id" value="'.$id.'">
                    <div class="container" style="margin-left:100px">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cod_prod">Nombre Proveedor:</label>
                                    <input type="text" class="form-control" id="edit_nombre_proveedor" name="nombre_proveedor" value="'.$nombre_proveedor.'" readonly required><br>
                                    <button type="button" class="btn btn-warning" onclick=callEditProv("edit_nombre_proveedor")>
                                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                                </div><hr>
                                <div class="form-group">
                                    <label for="descripcion">Empresa:</label>
                                    <input type="text" class="form-control" id="edit_empresa" name="empresa" value="'.$empresa.'" readonly required><br>
                                    <button type="button" class="btn btn-warning" onclick=callEditProv("edit_empresa")>
                                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="marca">Tipo de Producto:</label>
                                    <input type="text" class="form-control" id="edit_tipo_producto" name="tipo_producto" value="'.$tipo_producto.'"  readonly required><br>
                                    <button type="button" class="btn btn-warning" onclick=callEditProv("edit_tipo_producto")>
                                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                                </div><hr>
                                <div class="form-group">
                                    <label for="cantidad">Email:</label>
                                    <input type="email" class="form-control" id="edit_email" name="email" value="'.$email.'" readonly required><br>
                                    <button type="button" class="btn btn-warning" onclick=callEditProv("edit_email")>
                                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="fabricante">Móvil:</label>
                                    <input type="text" class="form-control" id="edit_movil" maxlength="10" name="movil" value="'.$movil.'" readonly required><br>
                                    <button type="button" class="btn btn-warning" onclick=callEditProv("edit_movil")>
                                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                                </div><hr>
                                <div class="form-group">
                                    <label for="lote_nro">Telefono:</label>
                                    <input type="text" class="form-control" id="edit_telefono" maxlength="10" name="telefono" value="'.$telefono.'" readonly  required><br>
                                    <button type="button" class="btn btn-warning" onclick=callEditProv("edit_telefono")>
                                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                                </div>
                                
                                
                            </div>                                 
                        </div>
                        
                        <div class="row">
                        <div class="col-sm-9"><hr>
                        <button type="submit" class="btn btn-success btn-block" name="update_proveedor">
                            <img class="img-reponsive img-rounded" src="../icons/devices/media-floppy.png" /> Guardar</button>
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
/*
** agregar proveedor a la base de datos
*/
function addProveedor($nombre_proveedor,$empresa,$tipo_producto,$email,$movil,$telefono,$conn){
   
   $val_1 = charValidator($nombre_proveedor);
   $val_2 = charValidator($empresa);
   $val_3 = charValidator($tipo_producto);
   $val_4 = emailValidator($email);
   $val_5 = intValidator($movil);
   $val_6 = intValidator($telefono);
      
   mysqli_select_db($conn,'stock_center_testing'); 
   $sql = "INSERT INTO sct_proveedores ".
            "(nombre_proveedor,empresa,tipo_productos,email,movil,telefono)".
                "VALUES ".
                    "('$nombre_proveedor','$empresa','$tipo_producto','$email','$movil','$telefono')";

    if(($val_1 == 1) && ($val_2 == 1) && ($val_3 == 1) && ($val_4 == 1) && ($val_5 == 1) && ($val_6 == 1 )){
    
           $query = mysqli_query($conn,$sql);
           
           if($query){
           
              echo  '<div class="alert alert-success alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/actions/mail-mark-notjunk.png" /> Proveedor Guardado Exitosamente!!.
                    </div>';
           
           }else{
           
              echo  '<div class="alert alert-danger alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al intentar guardar Proveedor!!' . mysqli_error($conn);
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
** actualizar proveedor en la base de datos
*/
function updateProveedor($id,$nombre_proveedor,$empresa,$tipo_producto,$email,$movil,$telefono,$conn){
   
   $val_1 = charValidator($nombre_proveedor);
   $val_2 = charValidator($empresa);
   $val_3 = charValidator($tipo_producto);
   $val_4 = emailValidator($email);
   $val_5 = intValidator($movil);
   $val_6 = intValidator($telefono);
      
   mysqli_select_db($conn,'stock_center_testing'); 
   $sql = "update sct_proveedores set nombre_proveedor = '$nombre_proveedor', empresa = '$empresa', tipo_productos = '$tipo_producto', email = '$email', movil = '$movil', telefono = '$telefono' where id = '$id'";

    if(($val_1 == 1) && ($val_2 == 1) && ($val_3 == 1) && ($val_4 == 1) && ($val_5 == 1) && ($val_6 == 1 )){
    
           $query = mysqli_query($conn,$sql);
           
           if($query){
           
              echo  '<div class="alert alert-success alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/actions/mail-mark-notjunk.png" /> Proveedor Actualizado Exitosamente!!.
                    </div>';
           
           }else{
           
              echo  '<div class="alert alert-danger alert-dismissible" style="margin-top:70px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al intentar actualizar Proveedor!!' . mysqli_error($conn);
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



?>
