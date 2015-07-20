<table class="table table-striped table-hover font-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Password</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php

      if (isset($usuarios)) {
      
        foreach ($usuarios as $usuario) { ?>
          <tr>
            <td><?php echo $contador++ ?></td>
            <td><?php echo ucwords($usuario->nombre) ?> </td>
            <td><?php echo ucwords($usuario->password) ?></td>
            <td><?php echo $usuario->estado ?></td>
            <td>
                <a class="modal-usuario" data-event="editar-usuarios" id="<?php echo $usuario->idusuario ?>" data-trabajador="<?php echo $idtrabajador; ?>"><i class="fa fa-pencil"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a class="usuario-estado" data-event="estado-usuarios" data-estado="<?php echo $usuario->estado ?>" id="<?php echo $usuario->idusuario ?>" data-trabajador="<?php echo $idtrabajador; ?>"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>

      <?php }

      } else { }
    
    ?>

  </tbody>
</table>