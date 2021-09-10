<?php

function card(){

    echo '<div class="container-fluid animate__animated animate__slideInLeft">
                <div class="col-sm-2">
            
            <div class="well">
            
            <img class="img-reponsive img-rounded" src="../core/icons/categories/applications-engineering.png" /><hr>
            <p align="justify"> Bienvenido!! está es la app para pruebas de Stock-Center
                desde aquí podrá probar la app antes de contratar el servicio.
                De modo que usted podrá saber de ante mano con que se encontrará en
                el día a día en su trabajo.</p>
            <p align="justify">Tenga en cuenta que al ingresar en la app se encontrará con un panel
                genérico, que intenta abarcar la generalidades de los rubros con que contamos.
                Por lo que si no encuentra funcionalidades que usted considera necesarias, no se preocupe, este sólo es un entorno de prueba.</p><hr>
            <p align="left">El Usuario y la contraseña para ingresar al entorno de prueba son:</p>
            <ul>
            <li>Usuario: test_dummy</li>
            <li>Contraseña: test_dummy</li>
            </ul><br>
            <p align="left">Tipee los datos tal cual están aquí</p><hr>
            <p align="justify">Gracias por acercarse a Stock-Center!!</p>
            
            
            </div>
            
            </div>
            </div>';

}

function buttonGroup($nombre){

    echo '<nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                <ul class="nav navbar-nav">
                <div class="btn-group">
                    <button type="button" class="btn btn-success navbar-btn dropdown-toggle" data-toggle="dropdown">
                    <img class="img-reponsive img-rounded" src="../icons/actions/view-media-artist.png" />'. $nombre.' <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                    <form action="#" method="POST">
                        <li><button type="submit" class="btn btn-default btn-xs btn-block">
                            <img class="img-reponsive img-rounded" src="../icons/actions/view-refresh.png" /> Cambiar Password</button></li>
                        
                        <li><button type="submit" class="btn btn-default btn-xs btn-block">
                            <img class="img-reponsive img-rounded" src="../icons/actions/view-ldap-resource.png" /> Datos Personales</button></li>
                        
                        <li><button type="submit" class="btn btn-default btn-xs btn-block" name="logout">
                            <img class="img-reponsive img-rounded" src="../icons/actions/system-shutdown.png" /> Salir</button></li>
                    </form>
                    </ul>
                </div>
                </ul>
                </div>
                
                <ul class="nav navbar-nav">
                
                <div class="btn-group">
                    <button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown">
                        <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Altas <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                    <form action="#" method="POST">
                        <li><button type="submit" class="btn btn-default btn-xs btn-block" name="productos">
                            <img class="img-reponsive img-rounded" src="../icons/actions/feed-subscribe.png" /> Productos</button></li>
                            
                    <li><button type="submit" class="btn btn-default btn-xs btn-block" name="usuarios">
                            <img class="img-reponsive img-rounded" src="../icons/actions/user-group-new.png" /> Usuarios</button></li>
                    
                     <li><button type="submit" class="btn btn-default btn-xs btn-block" name="proveedores">
                            <img class="img-reponsive img-rounded" src="../icons/actions/list-resource-add.png" /> Proveedores</button></li>
                    
                    </form>
                    </ul>
                </div>
                
                
                <div class="btn-group">
                    <button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown">
                        <img class="img-reponsive img-rounded" src="../icons/actions/view-list-text.png" /> Listados <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                    <form action="#" method="POST">
                        <li><button type="submit" class="btn btn-default btn-xs btn-block" name="listar_productos">
                            <img class="img-reponsive img-rounded" src="../icons/actions/documentation.png" /> Productos</button></li>
                            
                    <li><button type="submit" class="btn btn-default btn-xs btn-block" name="listar_usuarios">
                            <img class="img-reponsive img-rounded" src="../icons/actions/meeting-attending.png" /> Usuarios</button></li>
                    
                    <li><button type="submit" class="btn btn-default btn-xs btn-block" name="listar_proveedores">
                            <img class="img-reponsive img-rounded" src="../icons/actions/view-choose.png" /> Proveedores</button></li>
                    
                    </form>
                    </ul>
                </div>
                    
                </ul>
            </div>
            </nav>';

}

/*
**funcion que válida los datos ingresados en el formulario de login y valida el usuario y contraseña
*/

function validEnter($user,$pass,$conn){
    
    mysqli_select_db($conn,'stock_center_testing');
    
    $sql = "SELECT * FROM sct_usuarios where user = '$user' and password = '$pass' and role = 1";
	$q = mysqli_query($conn,$sql);
	
	$query = "SELECT * FROM sct_usuarios where user = '$user' and password = '$pass' and role = 0";
	$retval = mysqli_query($conn,$query);
	
	if(!$q && !$retval){	
			
			echo '<div class="container">
                    <div class="col-sm-8">
                    <div class="alert alert-danger" role="alert">';
            echo "Error de Conexion..." .mysqli_error($conn);
			echo "</div></div></div>";
			exit;
			
			}
		
			if($user = mysqli_fetch_assoc($retval)){
				

				echo '<div class="container">
                        <div class="col-sm-8">
                        <div class="alert alert-danger" role="alert">';
				echo "<strong>Atención!  </strong>" .$_SESSION["user"];
				echo "<br>";
				echo '<span class="pull-center "><img src="core/icons/status/security-low.png"  class="img-reponsive img-rounded"><strong>
                        Usuario Bloqueado. Contacte al Administrador.</strong>';
				echo "</div></div></div>";
				exit;
			}

			else if($user = mysqli_fetch_assoc($q)){

				echo '<div class="container">
                        <div class="col-sm-8">
                        <div class="alert alert-success" role="alert">';
				echo '<span class="pull-center "><img src="img/tenor.gif" class="img-reponsive img-rounded"  weight="5%" height="5%">';
				echo "<strong> Bienvenido!  </strong>" .$_SESSION["user"];
				echo "<strong> Aguarde un Instante...</strong>";
				echo "<br>";
				echo "</div></div></div>";
  				echo '<meta http-equiv="refresh" content="5;URL=core/main/main.php "/>';
            }else{
				echo '<div class="container">
                        <div class="col-sm-8">
                        <div class="alert alert-danger" role="alert">';
				echo '<span class="pull-center "><img src="core/icons/status/dialog-warning.png"  class="img-reponsive img-rounded">
                        Usuario o Contraseña Incorrecta. Reintente Por Favor....';
				echo "</div></div></div>";
				echo '<meta http-equiv="refresh" content="5;URL=#"/>';
				}

}



/*
** funcion que carga el modal de ingreso al sistema
*/
function modalLoginTesting(){

    echo '<div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><strong>Ingrese sus Datos</strong></h4>
                    </div>
                    <div class="modal-body">
                    <div class="loginmodal-container">
                    
                    <form action="#" method="POST">
                    
                    <input type="text" name="user" style="text-align: center" placeholder="Usuario">
                    <input type="password" name="pass"  style="text-align: center" placeholder="Password">
                    
                    <br><br>
                    <button type="submit" class="btn btn-success" data-submit="modal" name="A"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
                    <button type="reset" class="btn btn-success" data-submit="modal"><span class="glyphicon glyphicon-erase"></span> Limpiar</button>
                </form>
                    </div>
                    </div>
                    <div class="modal-footer">
                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                    </div>
                </div>
                
                </div>
            </div>';
            

}

/*
** validacion de caracteres
*/
function charValidator($var){

$pattern_string = '/^[a-z0-9 ]+$/i';
$validate = -1;

if(preg_match($pattern_string,$var)){

    return $validate = 1;

}else{

    return $validate = 0;
}

}

/*
** validacion de caracteres numéricos
*/
function intValidator($var){

$pattern_string = '/^[0-9.-]+$/';

$validate = -1;

if(preg_match($pattern_string,$var)){

    return $validate = 1;

}else{

    return $validate = 0;
}

}

?>