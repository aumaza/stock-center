<?php

/*
** error de connexion a base principal
*/
function error_connection($conn){

    echo '<div class="alert alert-danger">
            <strong>Ups!</strong> momentaneamente no se cuenta con conexion a la Base de Datos. Intente en un instante. ' .mysqli_error($conn);
    echo '</div>';

}


/*
** Breve guía de proceso de registro para el usuario
*/
function registrationGuide(){

    echo '<br>
          <div class="col-sm-12">
            <div class="alert alert-info">
                <h3 align="center">
                    <img class="img-reponsive img-rounded" src="../core/icons/actions/games-solve.png" /> Guía para Proceso de Registro
                </h3>
            </div>
            <hr>
          <p align="justify">
          Bienvenido, se le solicitarán algunos datos que serán volcados a la Base de Datos, la cuál contendrá toda la información de su negocio.
          Tanto de los usuarios que usted habilite para su uso una vez dentro de la aplicación, como toda la información de sus productos.
          Preste atención a cómo se irán solicitando los datos e ingréselos tal cual se piden, una vez finalizado el proceso de registro el sistema
          le irá informando los pasos que deberá seguir para poder ingresar por primera vez y comenzar a utilizar la aplicación Stock-Center.
          </p>
          <p align="justify">
          Gracias por elegirnos y comencemos con el proceso de registro!!          
          </p>
          
          <p align="center"><img class="img-reponsive img-rounded" src="../core/icons/actions/checkbox.png" /> 
                En los campos de nombre, respete las mayúsculas y las minúsculas. Ej.: Marcos Gutierrez.</p>
          <p align="center"><img class="img-reponsive img-rounded" src="../core/icons/actions/checkbox.png" />
                Recuerde que para los sistemas informáticos una letra A no es lo mismo que a.</p>
          <p align="center"><img class="img-reponsive img-rounded" src="../core/icons/actions/checkbox.png" />
                En el campo email, ingrese el email que utiliza a diario, ya que este será el usuario con el cual usted ingresará posteriormente
                y además será la vía de comunicación que utilizaremos con cada cliente.</p>
          <p align="center"><img class="img-reponsive img-rounded" src="../core/icons/actions/checkbox.png" />
                Con respecto a las contraseñas, nunca utilice fechas de cumpleaños, ni datos filiatorios que pueden ser fácilmente vulnerados por
                personas maliciosas. Siempre genere contraseñas combinando caracteres alfabéticos con numéricos.</p>
          <p align="center"><img class="img-reponsive img-rounded" src="../core/icons/actions/checkbox.png" />
                Cuando se le solicite el nombre de su negocio, no es necesario que ingrese las siglas S.A. o S.R.L. sólo ingrese la razón social o nombre de fantasía. Ej.: Parrilla El Buen Comer.</p>
          
          </div>';

}

/*
** carga de fomulario de registro
*/
function formRegistro($conn){

   
    echo '<div class="container">
            <div class="col-sm-8">
            
            <form action="/action_page.php">
            
            <div class="form-group">
                <label for="email">Razón Social / Nombre de la Empresa:</label>
                <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Ej.: La Caravela" required>
            </div><hr>
            
            <div class="form-group">
                <label for="pwd">Nombre del Titular:</label>
                <input type="text" class="form-control" id="titular" name="titular" placeholder="Aquí ingrese su Nombre completo. Ej.: Alberto Gomez" required>
            </div><hr>
            
            <div class="form-group">
		  <label for="sel1">Rubro de su Negocio:</label>
		  <select class="form-control" name="rubro" id="rubro" required>
		  <option value="" disabled selected>Seleccionar</option>';
		    
		    if($conn){
		      $query = "SELECT * FROM sc_rubros";
		      mysqli_select_db($conn,'stock_center');
		      $res = mysqli_query($conn,$query);

		      if($res){
				  while($valores = mysqli_fetch_array($res)){
               echo '<option value="'.$valores[cod_rubro].'" >'.$valores[descripcion].'</option>';
				}
                }
			}

			//mysqli_close($conn);
		  
		 echo '</select>
		</div><hr>
		
            <div class="form-group">
                <label for="sel1">Plan a Contratar:</label>
                <select class="form-control" id="plan" name="plan">
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="1">Básico</option>
                    <option value="2">Deluxe</option>
                    <option value="3">Premium</option>
                </select>
            </div><hr>
            
            <div class="form-group">
                <label for="pwd">Tarjeta de Credito:</label>
                <input type="text" class="form-control" id="tarjeta_nro" name="tarjeta_nro" maxlength="16" placeholder="Ingrese los 16 dígitos de su tarjeta de Crédito sin separación entre los caracteres" required>
            </div><hr>
            
            <div class="form-group">
                <label for="pwd">CUIL / CUIT:</label>
                <input type="text" class="form-control" id="cuil_cuit" name="cuil_cuit" maxlength="11" placeholder="000000000" required>
            </div><hr>
            
            <div class="form-group">
                <label for="pwd">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div><hr>
            
            <div class="form-group">
                <label for="pwd">Móvil:</label>
                <input type="text" class="form-control" id="movil" name="movil" maxlength="11" placeholder="Ej.: 1166664444" required>
            </div><hr>
            
            <button type="submit" class="btn btn-primary btn-block">
                <img class="img-reponsive img-rounded" src="../core/icons/actions/legalmoves.png" /> Continuar</button>
            </form>
            
            </div>
            </div>';

}



?>
