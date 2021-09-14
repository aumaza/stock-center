 var callEditProd = function(x){
            
    if((x == 'edit_cod_prod') || 
            (x == 'edit_descripcion') || 
                (x == 'edit_marca') || 
                    (x == 'edit_cantidad') || 
                        (x == 'edit_fabricante') || 
                            (x == 'edit_lote_nro') ||
                                (x == 'edit_precio')){
                
        document.getElementById(x).readOnly = false;
    }
}

