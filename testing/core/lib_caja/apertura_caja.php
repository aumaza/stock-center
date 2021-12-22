<?php session_start();
      include "../connection/connection.php";
      include "../lib_caja/lib_caja.php";
      include "../../lib_core_testing/lib_core_testing.php";
                        
        
        $fecha_apertura = mysqli_real_escape_string($conn,$_POST['fecha_apertura']);
        $hora_apertura = mysqli_real_escape_string($conn,$_POST['hora_apertura']);
        $usuario_apertura = mysqli_real_escape_string($conn,$_POST['usuario_apertura']);
        $importe_apertura = mysqli_real_escape_string($conn,$_POST['importe_apertura']);
        
        $val_importe = intValidator($importe_apertura);
        
                
        if($val_importe == 1){
        
        openCaja($fecha_apertura,$hora_apertura,$usuario_apertura,$importe_apertura,$conn);
        
        }else if($val_importe == 0){
        
            echo $val_importe;
        
        }
                
                
  
?>
