<div class="modal fade" tabindex="-1" role="dialog" id='frmModal'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Usuario</h4>
            </div>
            <div class="modal-body">
                <form id="form_edit" method="POST">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" value="edit" name="action">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Clave</label>
                        <input type="password" class="form-control" id="clave" name="clave">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="form-group">
                        <label>Roles</label>
                        <div class="checkbox">
                            <?php foreach ($rol_us as $rol) : ?>
                                <label>
                                    <input type="checkbox" checked name="rol" value="<?php echo $rol['nombre'] ?>"><?php echo $rol['nombre'] ?><br>
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <a href="#" onclick="editarUsuario()" class="btn btn-warning">Editar</a>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id='frmAgg'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Usuario</h4>
            </div>
            <div class="modal-body">
                <form id="frmAg">
                    <input type="hidden" name="action" value="Agg">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="nombre1" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Clave</label>
                        <input type="password" class="form-control" id="clave1" name="clave">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="correo1" name="correo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" class="form-control" id="telefono1" name="telefono">
                    </div>
                    <div class="form-group">
                        <label>Roles</label>
                        <div class="checkbox">
                            <?php foreach ($roles as $rol) : ?>
                                <label>
                                    <input type="checkbox" name="rol<?php echo $numero ?>" value="<?php echo $rol['nombre'] ?>"><?php echo $rol['nombre'] ?><br>
                                </label>
                            <?php $numero = $numero+1; endforeach ?>
                        </div>
                    </div>
                    <button class="btn btn-success" onclick="agregar()">Agregar</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id='frmDel'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar Usuario</h4>
            </div>
            <div class="modal-body">
                <form id="formDelete">
                    <input type="hidden" id="id2" name="id">
                    <input type="hidden" value="del" name="action">
                    <h3>Seguro de eliminar a <span id="dn"></span>?</h3>
                    <button class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                    <button class="btn btn-info" data-dismiss="modal">Cancelar</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->