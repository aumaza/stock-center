<?php session_start();
      include "../connection/connection.php";
      include "../../../core/lib_core/lib_core.php";
      include "../../lib_core_testing/lib_core_testing.php";
      include "../lib_productos/lib_productos.php";
      include "../lib_proveedores/lib_proveedores.php";
      
      $usuario = $_SESSION['user'];
      $password = $_SESSION['pass'];
      
         
$sql = "select nombre from sct_usuarios where user = '$usuario' and password = '$password'";
mysqli_select_db($conn,'stock_center_testing');
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
    $nombre = $row['nombre'];
}

    if($usuario == null || $usuario == ''){
 
    echo '<!DOCTYPE html>
            <html lang="es">
            <head>
            <title>Stock-Center Espacio de Prueba</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/png" href="../../../img/img-favicon32x32.png" />';
            skeleton();
            echo '</head><body>';
            echo '<br><div class="container">
                    <div class="alert alert-danger" role="alert">';
            echo '<p align="center"><img src="../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> '.$usuario.' Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
            echo '<a href="../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
            echo "</div></div>";
            die();
            echo '</body></html>';
}
      
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Stock-Center Testing / Menú Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../../../img/img-favicon32x32.png" />
   
  <?php skeleton(); ?>
  
  
  <!-- Data Table Script -->
<script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
  </script>
  <!-- END Data Table Script -->
  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 1500px}
    body {height: 1500px}
        
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    
  </style>
</head>
<body>

<?php buttonGroup($nombre); ?>
  

<div class="container" style="margin-top:70px">    
  <div class="row content">
   <div class="col-sm-12 ">
            
<!--  INICIO MAIN   -->
<?php

if($conn){

if(isset($_POST['logout'])){
echo '<div class="alert alert-success animate__animated animate__wobble">
        <strong>Hasta Luego!</strong> Vuelva cuando guste!!
        <audio autoplay><source src="../../sounds/logout.wav" type="audio/mpeg"></audio>
        </div>';
echo '<meta http-equiv="refresh" content="4;URL=../logout.php"/>';
}

// ======================================================= //
// ESPACIO DE PRODUCTOS //
// formulario alta de productos
if(isset($_POST['productos'])){
    formAltaProductos();
}
if(isset($_POST['guardar_producto'])){
    $cod_producto = mysqli_real_escape_string($conn,$_POST['cod_producto']);
    $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
    $marca = mysqli_real_escape_string($conn,$_POST['marca']);
    $cantidad = mysqli_real_escape_string($conn,$_POST['cantidad']);
    $fabricante = mysqli_real_escape_string($conn,$_POST['fabricante']);
    $nro_lote = mysqli_real_escape_string($conn,$_POST['lote_nro']);
    $precio = mysqli_real_escape_string($conn,$_POST['precio']);
    addProduct($cod_producto,$descripcion,$marca,$cantidad,$fabricante,$nro_lote,$precio,$conn);
}
if(isset($_POST['listar_productos'])){
    listarProductos($conn);
}
if(isset($_POST['edit_producto'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    formEditProductos($id,$conn);
}
if(isset($_POST['update_producto'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $cod_producto = mysqli_real_escape_string($conn,$_POST['cod_producto']);
    $descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);
    $marca = mysqli_real_escape_string($conn,$_POST['marca']);
    $cantidad = mysqli_real_escape_string($conn,$_POST['cantidad']);
    $fabricante = mysqli_real_escape_string($conn,$_POST['fabricante']);
    $nro_lote = mysqli_real_escape_string($conn,$_POST['lote_nro']);
    $precio = mysqli_real_escape_string($conn,$_POST['precio']);
    updateProduct($id,$cod_producto,$descripcion,$marca,$cantidad,$fabricante,$nro_lote,$precio,$conn);
}
if(isset($_POST['del_producto'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    formEliminarProducto($id,$conn);
}
if(isset($_POST['delete_producto'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    deleteProduct($id,$conn);
}

// ESPACIO DE PROVEEDORES //
// LISTADO
if(isset($_POST['listar_proveedores'])){
    listarProveedores($conn);
}
// FORMULARIOS
if(isset($_POST['proveedores'])){
    formAltaProveedor();
}
if(isset($_POST['guardar_proveedor'])){
    $nombre_proveedor = mysqli_real_escape_string($conn,$_POST['nombre_proveedor']);
    $empresa = mysqli_real_escape_string($conn,$_POST['empresa']);
    $tipo_producto = mysqli_real_escape_string($conn,$_POST['tipo_producto']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $movil = mysqli_real_escape_string($conn,$_POST['movil']);
    $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
    addProveedor($nombre_proveedor,$empresa,$tipo_producto,$email,$movil,$telefono,$conn);
}
if(isset($_POST['edit_proveedor'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    formEditProveedor($id,$conn);
}
if(isset($_POST['update_proveedor'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $nombre_proveedor = mysqli_real_escape_string($conn,$_POST['nombre_proveedor']);
    $empresa = mysqli_real_escape_string($conn,$_POST['empresa']);
    $tipo_producto = mysqli_real_escape_string($conn,$_POST['tipo_producto']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $movil = mysqli_real_escape_string($conn,$_POST['movil']);
    $telefono = mysqli_real_escape_string($conn,$_POST['telefono']);
    updateProveedor($id,$nombre_proveedor,$empresa,$tipo_producto,$email,$movil,$telefono,$conn);
}

}else{

    echo 'Connection Error...' .mysqli_error($conn);

}

?>
<!--  END MAIN -->
    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Powered By <img class="img-reponsive img-rounded" src="../../../img/devel-slack-logo2-32x32.png" /><a href="https://deps.slackzone.com.ar/slackzone-devel" target="_blank"> Slackzone Development</a></p>
</footer>

<script src="../lib_proveedores/lib_proveedores.js"></script>
<script src="../lib_productos/lib_productos.js"></script>

</body>
</html>
