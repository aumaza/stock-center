<?php

/*
** funcion que carga el esqueleto bootstrap y js
*/

function skeleton(){

    echo '<link rel="stylesheet" href="/stock-center/skeleton/css/bootstrap.min.css" >
          <link rel="stylesheet" href="/stock-center/skeleton/css/bootstrap-theme.css" >
          <link rel="stylesheet" href="/stock-center/skeleton/css/bootstrap-theme.min.css" >
          <link rel="stylesheet" href="/stock-center/skeleton/css/jquery.dataTables.min.css" >
          <link rel="stylesheet" href="/stock-center/skeleton/css/animate.min.css" >
                   
          <script src="/stock-center/skeleton/js/jquery-3.4.1.min.js"></script>
          <script src="/stock-center/skeleton/js/bootstrap.min.js"></script>
        
          <script src="/stock-center/skeleton/js/jquery.dataTables.min.js"></script>
          <script src="/stock-center/skeleton/js/dataTables.editor.min.js"></script>
          <script src="/stock-center/skeleton/js/dataTables.select.min.js"></script>
          <script src="/stock-center/skeleton/js/dataTables.buttons.min.js"></script>
        
          <script src="/stock-center/skeleton/Chart.js/Chart.min.js"></script>
          <script src="/stock-center/skeleton/Chart.js/Chart.bundle.min.js"></script>
          <script src="/stock-center/skeleton/Chart.js/Chart.bundle.js"></script>
          <script src="/stock-center/skeleton/Chart.js/Chart.js"></script>';
         
}


/*
** funcion que carga el modal de ingreso al sistema
*/
function modalLogin(){

    echo '<div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><strong>Ingrese sus Datos</strong></h4>
                    </div>
                    <div class="modal-body">
                    <div class="loginmodal-container">
                    <form action="#" method="POST">
                    <input type="text" name="user" style="text-align: center" placeholder="Usuario">
                    <input type="password" name="pass"  style="text-align: center" placeholder="Password">
                    <br><br>
                    <button type="submit" class="btn btn-success" data-submit="modal"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
                    <button type="reset" class="btn btn-success" data-submit="modal"><span class="glyphicon glyphicon-erase"></span> Limpiar</button>
                </form>
                    </div>
                    </div>
                    <div class="modal-footer">
                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                    </div>
                </div>
                
                </div>
            </div>';
            

}


/*
** funcion que carga los planes que se pueden contratar
*/
function planes(){

    echo '<div class="container-fluid animate__animated animate__backInRight">
            <div class="col-sm-2">
        <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse2">
                    <img class="img-reponsive img-rounded" src="core/icons/actions/bookmark-new-list.png" /> <strong>Planes</strong></a>
            </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse" align="left">
            
            <div class="panel-body">
                <img class="img-reponsive img-rounded" src="core/icons/actions/help-about.png" /><a href="planes/#"> <strong>Información</strong></a>
            </div>
            
        </div>
        </div> 
        </div>
        </div>';
}


/*
** funcion que carga los productos que ofrece el sistema
*/
function productos(){

    echo '<div class="container-fluid animate__animated animate__backInLeft">
                <div class="col-sm-2">
            <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">
                        <img class="img-reponsive img-rounded" src="core/icons/actions/bookmark-new-list.png" /> <strong>Rubros</strong></a>
                </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse" align="left">
                                
                    <div class="panel-body">
                        <img class="img-reponsive img-rounded" src="core/icons/actions/help-about.png" />
                            <a href="rubros/#"> <strong>Información</strong></a>
                    </div>

                </div>
            </div>
            </div> 
            </div>
            </div>';

}










?>
