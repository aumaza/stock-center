<?php session_start();
      include "../connection/connection.php";
      include "../lib_ventas/lib_ventas.php";
                        
        
        $nro_ticket = mysqli_real_escape_string($conn,$_POST['nro_ticket']);
        $producto = mysqli_real_escape_string($conn,$_POST['producto']);
        $empleado = mysqli_real_escape_string($conn,$_POST['empleado']);
        $modo_pago = mysqli_real_escape_string($conn,$_POST['modo_pago']);
        $cantidad = mysqli_real_escape_string($conn,$_POST['cantidad']);
        
                
        $estado = addVenta($nro_ticket,$producto,$cantidad,$empleado,$modo_pago,$conn);
        
        if($estado == 1){
            
            restarProducto($producto,$cantidad,$conn);
            echo $estado;
        }
        if($estado == 0){
        
            echo $estado;
        
        }
        
  
?>
