<?php session_start();
      include "../connection/connection.php";
      include "../lib_ventas/lib_ventas.php";
                        
        
        
        $nro_ticket = mysqli_real_escape_string($conn,$_POST['nro_ticket']);
               
        $sql = "select sum(importe) as parcial from sct_ventas where nro_ticket = '$nro_ticket' and estado_ticket = 'Abierto'";
        mysqli_select_db($conn,'stock_center_testing');
        $resval = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($resval)){
            $importe_parcial = $row['parcial'];
        }
       
                      
      if($importe_parcial == ''){
       
            $importe_parcial = 0;
            echo $importe_parcial;
          
       }else if($importe_parcial != ''){
        
        echo $importe_parcial;
        
       }
  
?>
