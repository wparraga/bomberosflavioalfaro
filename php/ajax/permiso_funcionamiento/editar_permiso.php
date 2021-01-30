<?php	
    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: login.php");
        exit;
        }

		if (empty($_POST['mod_nombres'])){
			$errors[] = "Nombres vacíos";
		} elseif (empty($_POST['mod_cedularuc'])){
			$errors[] = "Cédula Identidad vacío";
        } elseif (!empty($_POST['mod_nombres'])
			&& !empty($_POST['mod_cedularuc'])
          )
         {
            require_once ("../../../config/db.php");
			require_once ("../../../config/conexion.php");
            include ("../../../config/swee.php");
			$id_permiso=$_POST['mod_id'];
            $nombres = mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombres"],ENT_QUOTES)));
            $cedularuc = mysqli_real_escape_string($con,(strip_tags($_POST["mod_cedularuc"],ENT_QUOTES)));
            $actividad = mysqli_real_escape_string($con,(strip_tags($_POST["mod_actividad"],ENT_QUOTES)));
            $direccion = mysqli_real_escape_string($con,(strip_tags($_POST["mod_ubicacion"],ENT_QUOTES)));
            $valido = mysqli_real_escape_string($con,(strip_tags($_POST["mod_valido"],ENT_QUOTES)));
            $date_added=date("Y-m-d H:i:s");
            $usuario= $_SESSION['user_name'];
					
            $sql = "UPDATE permiso_funcionamiento SET 
            perfun_persona='".$nombres."', 
            perfun_cedularuc='".$cedularuc."', 
            perfun_actividad='".$actividad."', 
            perfun_ubicacion='".$direccion."', 
            perfun_valido='".$valido."', 
            perfun_usuario='".$usuario."' 
            WHERE 
            perfun_codigo='".$id_permiso."';";
            $query_update = mysqli_query($con,$sql);

                    if ($query_update) {
                         echo'<script>
                                swal({
                                    type: "success",
                                    title: " Modificación realizada con éxito.",
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