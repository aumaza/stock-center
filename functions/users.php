<?php

function createTable(){

			
		$sql = "CREATE TABLE usuarios(".
		      "id INT AUTO_INCREMENT,".
		      "nombre VARCHAR(50),".
		      "user VARCHAR(15),".
		      "password VARCHAR(10),".
		      "permisos INT".
		      "PRIMARY KEY (id)); ";

	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error();
		echo "<br>"; 	
	}
	
	else
	 {	
		echo 'Table Usuarios create Succesfully';
		echo "<br>";
	 }

	 //mysql_close($conn);

}


function agregarUser($nombre,$user,$pass1,$pass2,$permisos){

		

	$sqlInsert = "INSERT INTO usuarios ".
		"(nombre,user,password,permisos)".
		"VALUES ".
      "('$nombre','$user','$pass1','$permisos')";
		


	if(strcmp($pass2, $pass1) == 0) 
	{
		mysql_query($sqlInsert);	
		echo "<br>";
		echo '<div class="container">';
		echo '<div class="alert alert-success" role="alert">';
		echo 'Usuario Creado Satisfactoriamente';
		echo "</div>";
		echo "</div>";
	
	}

	else
	{
		echo "<br>";
		echo '<div class="alert alert-warning" role="alert">';
		echo "Las Contrase�as no Coinciden. Intente Nuevamente!";
		echo "</div>";
		
	}
}


function buscarUser($nombre){

		$sql = "SELECT * FROM usuarios where nombre = '$nombre'";
		mysql_select_db('stock_center');
		$retval = mysql_query($sql);
	
		if(!$retval)
		{
		  echo "<br>";
		  echo '<div class="alert alert-warning" role="alert">';
		  echo 'No Existe Usuario para ' .$nombre;
		  echo '</div>';

		}


		while($fila = mysql_fetch_array($retval))
		{
			
		  if($retval){
		    $res = $fila['user'];
		      echo "<br>";
		      echo '<div class="alert alert-success" role="alert">';
		      echo 'La persona: ' .$nombre;
		      echo '<br><hr>';
		      echo 'Posee el Usuario: ' .$res;
		      echo "</div>";
	    }
	}
}

	
	 



function updatePass($user,$pass1,$pass2){

	

    	$sql = "UPDATE usuarios set password = '$pass1' WHERE user = '$user'";
    	mysql_select_db('stock_center');
    	
    	
    	if(strcmp($pass2, $pass1) == 0)
    	{
    		mysql_query($sql);
    		echo "<br>";
			echo '<div class="alert alert-success" role="alert">';
			echo 'Password Actualizado Satisfactoriamente';
			echo "</div>";
	   	}

    	else
    	{
    		echo "<br>";
			echo '<div class="alert alert-warning" role="alert">';
			echo "Las Contraseñas no Coinciden. Intente Nuevamente!";
			echo "</div>";
			

    	}

}

function cambiarPermisos($user,$pass1,$pass2,$permisos){

  $sql = "UPDATE usuarios set permisos = '$permisos' where user = '$user' and password = '$pass1'";
  mysql_select_db('stock_center');
  
  if(strcmp($pass2,$pass1) == 0){
    mysql_query($sql);
    echo "<br>";
			echo '<div class="alert alert-success" role="alert">';
			echo 'Permiso Actualizado Satisfactoriamente';
			echo "</div>";
  
  }else{
    	echo "<br>";
	echo '<div class="alert alert-warning" role="alert">';
	echo "Las Contraseña no Coinciden. Intente Nuevamente!";
	echo "</div>";
	}
 
}





?>