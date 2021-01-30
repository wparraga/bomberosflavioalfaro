
<?php
		if (isset($con))
		{
?>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>
                    Editar Permiso de Funcionamiento</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="post" id="editar_permiso" name="editar_permiso">
                <div id="resultados_ajax2"></div>
                   <input type="hidden" name="mod_id" id="mod_id">

                   <div class="form-group">
                        <label for="mod_nombres" class="col-sm-3 control-label">Nombres: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mod_nombres" name="mod_nombres" placeholder="Nombres" autocomplete="off" required>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="mod_cedularuc" class="col-sm-3 control-label">Cédula/RUC:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="mod_cedularuc" name="mod_cedularuc" placeholder="Cédula / RUC" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mod_actividad" class="col-sm-3 control-label">A la venta de:</label>
                        <div class="col-sm-8">
                            <textarea cols="40" rows="5" class="form-control" id="mod_actividad" name="mod_actividad" placeholder="Actividad"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mod_ubicacion" class="col-sm-3 control-label">Ubicado en:</label>
                        <div class="col-sm-8">
                            <textarea cols="40" rows="3" class="form-control" id="mod_ubicacion" name="mod_ubicacion" placeholder="Dirección"></textarea>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="mod_valido" class="col-sm-3 control-label">Válido:</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="mod_valido" name="mod_valido" autocomplete="off" required>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="actualizar_datos2">Actualizar datos</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
		}
	?>