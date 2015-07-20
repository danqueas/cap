<script src="js/Trabajador.js"></script>
<script src="js/Usuario.js"></script>
<script src="js/Contrato.js"></script>

<legend>
  TRABAJADORES
  <button class="btn btn-default btn-sm modal-trabajador" data-event="nuevo">
    <i class="fa fa-plus-circle fa-lg"></i>
  </button>
</legend>

<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon">Busqueda</span>
    <input type="text" class="form-control" placeholder="Busqueda por Apellidos" name="txtbusqueda">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button" id="btn-busqueda"><i class="fa fa-search"></i></button>
    </span>
  </div>
</div>

<table class="table table-striped table-hover font-table">
  <thead>
    <tr class="danger">
      <th>#</th>
      <th>Nombre</th>
      <th>Dni</th>
      <th>Sexo</th>
      <th>Direccion</th>
      <th>Tipo Trabajador</th>
      <th>Estado</th>
      <th>Usuarios</th>
      <th>Contrato</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($trabajadores)) {
      
        foreach ($trabajadores as $trabajador) { ?>
          <tr>
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($trabajador->nom_trabajador) ?> </td>
            <td><?php echo ucwords($trabajador->dni) ?> </td>
            <td><?php echo ucwords($trabajador->sexo) ?> </td>
            <td><?php echo ucwords($trabajador->direccion) ?> </td>
            <td><?php echo ucwords($trabajador->ntipotrabajador) ?> </td>
            <td><?php echo ($trabajador->estado) ?></td>
            <td>
              <a class="modal-usuarios" data-event="ver-usuarios" id="<?php echo $trabajador->idtrabajador ?>" ><i class="fa fa-eye"></i></a>
              &nbsp; &nbsp;
              <a class="modal-usuarios" data-event="agregar-usuarios" id="<?php echo $trabajador->idtrabajador ?>"><i class="fa fa-plus"></i></a>
            </td>
            <td>
              <a class="modal-contrato" data-event="nuevo" data-trabajador="<?php echo $trabajador->idtrabajador ?>" ><i class="fa fa-building-o"></i> Nuevo</a>
            </td>
            <td>
              <a class="modal-trabajador" data-event="editar" id="<?php echo $trabajador->idtrabajador ?>"><i class="fa fa-pencil"></i></a>
              &nbsp;&nbsp;
              <a class="trabajador-estado " data-event="estado" data-estado="<?php echo $trabajador->estado ?>" id="<?php echo $trabajador->idtrabajador ?>"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="trabajador-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-guardar">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="usuarios-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title usu-modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body usu-modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-guardar-usuarios">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="contrato-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title cont-modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body cont-modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-guardar-contrato">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>