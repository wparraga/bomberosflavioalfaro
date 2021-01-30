<?php
    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: login.php");
        exit;
        }

		if (empty($_POST['nombres'])){
			$errors[] = "Nombres vacío";
		} elseif (empty($_POST['cedularuc'])){
			$errors[] = "Cédula Identidad vacío";
        } elseif (empty($_POST['actividad'])){
            $errors[] = "Actividad del negocio vacio";
        } elseif (!empty($_POST['nombres'])
        			&& !empty($_POST['cedularuc'])
                    && !empty($_POST['actividad'])
        ) {
            require_once ("../../../config/db.php");
			require_once ("../../../config/conexion.php");
            include ("../../../config/swee.php");
            $nombres = mysqli_real_escape_string($con,(strip_tags($_POST["nombres"],ENT_QUOTES)));
			$cedularuc = mysqli_real_escape_string($con,(strip_tags($_POST["cedularuc"],ENT_QUOTES)));
			$actividad = mysqli_real_escape_string($con,(strip_tags($_POST["actividad"],ENT_QUOTES)));
            $direccion = mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
            $valido = mysqli_real_escape_string($con,(strip_tags($_POST["valido"],ENT_QUOTES)));
			$date_added=date("Y-m-d H:i:s");
            $usuario= $_SESSION['user_name'];
            $sql = "INSERT INTO permiso_funcionamiento (
            perfun_fechaemision,
            perfun_persona,
            perfun_cedularuc,
            perfun_actividad,
            perfun_ubicacion,
            perfun_valido,
            perfun_usuario) VALUES 
            ('".$date_added."',
             '".$nombres."',
             '".$cedularuc."',
             '".$actividad."',
             '".$direccion."', 
             '".$valido."',
             '".$usuario."')";
                    $query_new_user_insert = mysqli_query($con,$sql);
                    if ($query_new_user_insert) {
                        echo'<script>
                                swal({
                                    type: "success",
                                    title: " Permiso de Funcionamiento creado con éxito.",
                                    showConfirmButton: true,
                                    confirmButtonColor: "#5fb45c",
                                    confirmButtonText: "Aceptar",
                                    closeOnConfirm: false
                                    }).then(function(result){
                                    if (result.value) {
                                        location.reload(true);
                                    }
                                })
                        </script>';
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                
            
        } else {
            $errors[] = "Un error desconocido ocurrió.";
        }
		
		if (isset($errors)){
			
			?>
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong>
    <?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
</div>
<?php
			}
			if (isset($messages)){
				
				?>
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>¡Bien hecho!</strong>
    <?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
</div>
<?php
			}

?>