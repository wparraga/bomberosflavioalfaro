<div class="modal fade" id="nuevoPermisoFuncionamiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i>
                    Agregar nuevo Permiso de Funcionamiento</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_permiso" name="guardar_permiso">
                    <div id="resultados_ajax"></div>
                    <div class="form-group">
                        <label for="nombres" class="col-sm-3 control-label">Nombres: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" autocomplete="off" required>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="cedularuc" class="col-sm-3 control-label">Cédula/RUC:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="cedularuc" name="cedularuc" placeholder="Cédula / RUC" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="actividad" class="col-sm-3 control-label">Actividad:</label>
                        <div class="col-sm-8">
                            <textarea cols="40" rows="5" class="form-control" id="actividad" name="actividad" placeholder="Actividad"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="direccion" class="col-sm-3 control-label">Dirección:</label>
                        <div class="col-sm-8">
                            <textarea cols="40" rows="3" class="form-control" id="direccion" name="direccion" placeholder="Dirección"></textarea>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="valido" class="col-sm-3 control-label">Válido:</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="valido" name="valido" autocomplete="off" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="guardar_datos">Guardar datos</button>
            </div>
            </form>
        </div>
    </div>
</div>