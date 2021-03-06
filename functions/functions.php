<?php

function altaComercio($nombreComercio){

  $dir = "stock-center/users/client/$nombreComercio";
  
  if(!mkdir($dir, 0777, true){
    die("Failure!! Can't Create Directory...");
  }else{
  
    getcwd();
    chdir('stock-center/user/client/$nombreComercio');
    mkdir("1",0777,true);
    mkdir("0",0777,true);
    echo "Success!! Commerce .$nombreComercio has been Create!!";
    
  }
  
  
}

function createDatabase($nombre_comercio){

		$sql = "CREATE DATABASE '$nombre_comercio'";
		$retval = mysql_query($sql);
		
		if(!$retval){
		    mysql_error();
		    echo "<br>";
		}else{
		    echo "Database .$nombre_comercio was create Succesfully";
		    echo "<br>";
		}
}


function createTableComercios(){

			
		$sql = "CREATE TABLE comercios(".
		      "id INT AUTO_INCREMENT,".
		      "razon_social VARCHAR(50),".
		      "cuil VARCHAR(11),".
		      "cuit VARCHAR(11),".
		      "titular_nombre VARCHAR(50),".
		      "nombre_comercio VARCHAR(50),".
		      "rubro VARCHAR(50),".
		      "direccion VARCHAR(40),".
		      "localidad VARCHAR(40),".
		      "provincia VARCHAR(30),".
		      "cod_postal VARCHAR(20),".
		      "telefono VARCHAR(20),".
		      "email VARCHAR(25),".
		      "PRIMARY KEY (id)); ";

	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error();
		echo "<br>"; 	
	}
	
	else
	 {	
		echo 'Table Comercios Create Succesfully';
		echo "<br>";
	 }

	 //mysql_close($conn);

}


function createTableProductos(){

			
		$sql = "CREATE TABLE productos(".
		      "id INT AUTO_INCREMENT,".
		      "marca VARCHAR(50),".
		      "descripcion VARCHAR(20),".
		      "rubro VARCHAR(15),".
		      "precio_venta FLOAT(10.2),".
		      "precio_compra FLOAT(10.2),".
		      "stock INT,".
		      "stock_actual INT,".
		      "stock_minimo INT,".
		      "imp_internos INT,".
		      "iva INT,".
		      "fecha_compra DATE,".
		      "fecha_mod DATE,".
		      "PRIMARY KEY (id)); ";

	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error();
		echo "<br>"; 	
	}
	
	else
	 {	
		echo 'Table Productos Create Succesfully';
		echo "<br>";
	 }

	 //mysql_close($conn);

}


function createTableCliente(){

			
		$sql = "CREATE TABLE cliente(".
		      "id INT AUTO_INCREMENT,".
		      "razon_social VARCHAR(50),".
		      "cuil VARCHAR(11),".
		      "cuit VARCHAR(11),".
		      "direccion VARCHAR(40),".
		      "localidad VARCHAR(40),".
		      "provincia VARCHAR(30),".
		      "cod_postal VARCHAR(20),".
		      "telefono VARCHAR(20),".
		      "email VARCHAR(25),".
		      "PRIMARY KEY (id)); ";

	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error();
		echo "<br>"; 	
	}
	
	else
	 {	
		echo 'Table Cliente Create Succesfully';
		echo "<br>";
	 }

	 //mysql_close($conn);

}

function createTableRubros(){

			
		$sql = "CREATE TABLE rubros(".
		      "id INT AUTO_INCREMENT,".
		      "categoria VARCHAR(50),".
		      "PRIMARY KEY (id)); ";

	$retval = mysql_query($sql);
	
	if(!$retval)
	{
		mysql_error();
		echo "<br>"; 	
	}
	
	else
	 {	
		echo 'Table Rubros Create Succesfully';
		echo "<br>";
	 }

	 //mysql_close($conn);

}

function createTable(){

			
		$sql = "CREATE TABLE usuarios(".
		      "id INT AUTO_INCREMENT,".
		      "nombre VARCHAR(50),".
		      "user VARCHAR(15),".
		      "password VARCHAR(10),".
		      "permisos INT".
		      "cod_comercio INT".
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


function agregarUser($nombre,$user,$pass1,$pass2,$permisos,$cod_comercio){

		

	$sqlInsert = "INSERT INTO usuarios ".
		"(nombre,user,password,permisos,cod_comercio)".
		"VALUES ".
      "('$nombre','$user','$pass1','$permisos','$cod_comercio')";
		


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
		echo "Las Contrase as no Coinciden. Intente Nuevamente!";
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
			echo "Las Contrase??as no Coinciden. Intente Nuevamente!";
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
	echo "Las Contrase??a no Coinciden. Intente Nuevamente!";
	echo "</div>";
	}
 
}



?>