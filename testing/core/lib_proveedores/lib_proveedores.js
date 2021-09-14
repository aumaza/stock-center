 var callEditProv = function(x){
            
    if((x == 'edit_nombre_proveedor') || 
            (x == 'edit_empresa') || 
                (x == 'edit_tipo_producto') || 
                    (x == 'edit_email') || 
                        (x == 'edit_movil') || 
                            (x == 'edit_telefono')){
                
        document.getElementById(x).readOnly = false;
    }
}

