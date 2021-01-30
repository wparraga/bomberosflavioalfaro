<?php
    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
        exit;
        }
    require_once ("config/db.php");
    require_once ("config/conexion.php");
    $permiso_funcionamiento="active";	
    $title="Permiso de Funcionamiento | Cuerpo de Bomberos del Cantón Flavio Alfaro";
?>
<html lang="es">
    <head>
        <?php include 'views/head.php';?>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <?php include 'views/navbar.php';?>
        <div class="container">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="btn-group pull-right">
                        <button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevoPermisoFuncionamiento"><span
                                class="glyphicon glyphicon-plus"></span>
                            Nuevo Permiso de Funcionamiento</button>
                    </div>
                    <h4><i class='glyphicon glyphicon-search'></i> Buscar Usuarios</h4>
                </div>
                <div class="panel-body">
                    <?php
                        include('views/modal/permiso_funcionamiento/nueva_permiso.php');
                        include('views/modal/permiso_funcionamiento/editar_permiso.php');
                    ?>
                    <form class="form-horizontal" role="form" id="datos_cotizacion">
                        <div class="form-group row">
                            <label for="q" class="col-md-2 control-label">Nombres:</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="q" placeholder="Nombre" onkeyup='load(1);'>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-default" onclick='load(1);'>
                                    <span class="glyphicon glyphicon-search"></span> Buscar
                                </button>
                                <span id="loader"></span>
                            </div>
                        </div>
                    </form>
                    <div id="resultados"></div>
                    <div class='outer_div'></div>
                </div>
            </div>
        </div>
        <hr>
        <?php
    	   include('views/footer.php');
    	?>
        <script type="text/javascript" src="js/permiso_funcionamiento.js"></script>
    </body>
</html>
