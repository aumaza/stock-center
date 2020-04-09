<?php include "../connection/connection.php"; ?>

<html><head>
	<meta charset="utf-8">
	<title>Registro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../img/img-favicon32x32.png" />
	<link rel="stylesheet" href="/stock-center/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/stock-center/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/stock-center/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/stock-center/css/fontawesome.css">
	<link rel="stylesheet" href="/stock-center/css/fontawesome.min.css" >
	<link rel="stylesheet" href="/stock-center/css/jquery.dataTables.min.css" >

	<script src="/stock-center/js/jquery-3.4.1.min.js"></script>
	<script src="/stock-center/js/bootstrap.min.js"></script>
	
	
	<script src="/stock-center/js/jquery.dataTables.min.js"></script>
	<script src="/stock-center/js/dataTables.editor.min.js"></script>
	<script src="/stock-center/js/dataTables.select.min.js"></script>
	<script src="/stock-center/js/dataTables.buttons.min.js"></script>

	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet"  type="text/css" media="screen" href="login.css" />
	
	
	
</head>
<body background="" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover">

<div class="section"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h1 class="panel-title text-center" contenteditable="true">Registro del Comercio</h1>
                            </div>
                            <div class="panel-body">
                                <p><strong>Alta Comercio</strong></p><hr>
                                <p>Bienvenido al alta de Comercio, aquí deberá ingresar los datos de su comercio para crear su entorno de administración</p>
                                <p>Preste Atención a los datos solicitados y como deben ser ingresados</p>
                                <p>Comenzamos!?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"><img src="" class="center-block img-responsive img-thumbnail"></div>
                    <div class="col-md-8">
                        
                        <form action="../regestry/formRegestry.php" method="POST" class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-sm-2">
                                <h4><span class="label label-warning">Razón Social</span></h4>
				</div>

			<div class="col-sm-10">
				<input type="text" class="form-control" id="nombre" name="razonSocial" placeholder="Ingrese Razón Social" required>
			</div>
				</div>


				<div class="form-group">
				<div class="col-sm-2">
					<h5><span class="label label-warning">CUIL</span></h4>
						</div>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="cuil" name="cuil" placeholder="CUIL" required>
					</div>
						</div>
				
				<div class="form-group">
				<div class="col-sm-2">
					<h5><span class="label label-warning">CUIT</span></h4>
						</div>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="cuit" name="cuit" placeholder="CUIT" required>
					</div>
						</div>
				
				<div class="form-group">
<div class="col-sm-2">
<h4><span class="label label-warning">Titular Comercio</span></h4>
</div>
<div class="col-sm-10">
<input type="text" class="form-control" id="direccion" name="titular" placeholder="Titular Comercio" required>
</div>
</div>

<div class="form-group">
<div class="col-sm-2">
<h4><span class="label label-warning">Nombre Comercio</span></h4>
</div>
<div class="col-sm-10">
<input type="text" class="form-control" id="nombre_comercio" name="nombre_comercio" placeholder="Nombre del Comercio" required>
</div>
</div>

<div class="form-group">
            <div class="col-sm-2">
            <h4><span class="label label-warning">Rubro</span><br><br></h4>
            <select name="rubro">
              <option value="rubro">Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM rubros order by categoria ASC";
              mysql_select_db('stock_center');
              $res = mysql_query($query);

              if($res)
              {
                
                  while ($valores = mysql_fetch_array($res))
                    {
                        echo '<option value="'.$valores[categoria].'">'.$valores[categoria].'</option>';
                    }
                }
                }

                

                ?>
                </select></div></div><hr>

<div class="form-group">
<div class="col-sm-2">
<h4><span class="label label-warning">Dirección</span></h4>
</div>
<div class="col-sm-10">
<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
</div>
</div>

<div class="form-group">
            <div class="col-sm-2">
            <h4><span class="label label-warning">País</span><br><br></h4>
            <select name="pais">
              <option value="pais">Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM paises order by name ASC";
              mysql_select_db('stock_center');
              $res = mysql_query($query);

              if($res)
              {
                
                  while ($valores = mysql_fetch_array($res))
                    {
                        echo '<option value="'.$valores[name].'">'.$valores[name].'</option>';
                    }
                }
                }

                

                ?>
                </select></div></div><hr>
                

<div class="form-group">
            <div class="col-sm-2">
            <h4><span class="label label-warning">Provincias</span><br><br></h4>
            <select name="provincia">
              <option value="name">Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM provincias order by name ASC";
              mysql_select_db('stock_center');
              $res = mysql_query($query);

              if($res)
              {
                
                  while ($valores = mysql_fetch_array($res))
                    {
                        echo '<option value="'.$valores[name].'">'.$valores[name].'</option>';
                    }
                }
                }

                

                ?>
                </select></div></div><hr>

<div class="form-group">
            <div class="col-sm-2">
            <h4><span class="label label-warning">Localidad</span><br><br></h4>
            <select name="localidad">
              <option value="descripcion">Seleccionar</option>
              
             <?php
             
             
               if($conn){

              $query = "SELECT * FROM localidades order by descripcion ASC";
              mysql_select_db('stock_center');
              $res = mysql_query($query);

              if($res)
              {
                
                  while ($valores = mysql_fetch_array($res))
                    {
                        echo '<option value="'.$valores[descripcion].'">'.$valores[descripcion].'</option>';
                    }
                }
                }

                mysql_close($conn);

                ?>
                </select></div></div><hr>

<div class="form-group ">
<div class="col-sm-2">
<h4><span class="label label-warning">Código Postal</span></h4>
</div>
<div class="col-sm-10">
<input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Código Postal" required>
</div>
</div>

<div class="form-group ">
<div class="col-sm-2 ">
<h4><span class="label label-warning">Teléfono</span></h4>
</div>
<div class="col-sm-10 ">
<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
</div>
</div><hr>

<div class="form-group">
<div class="col-sm-2 ">
<h4><span class="label label-warning">E-mail</span></h4>
</div>
<div class="col-sm-10 ">
<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
</div>
</div>

		
<div class="form-group">
<div class="col-sm-2">
<h4><span class="label label-warning">Observaciones</span></h4>
</div>
<div class="col-sm-10">
<textarea name="descripcion" rows="4" cols="79" class="estilotextarea" placeholder="Ingrese aqui anotaciones"></textarea>
</div>
</div>



<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Registrarse</button>
<button class="btn btn-danger"><a href="../index.html"><span class="glyphicon glyphicon-chevron-left"></a></span> Volver</button>



</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>



</body>
</html>
