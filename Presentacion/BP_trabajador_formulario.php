<form class="form-horizontal" id="form-trabajador">
  <fieldset>
    <div class="form-group">
      <label class="col-lg-3 control-label">Nombre</label>
      <div class="col-lg-9">
        <input value="<?php echo $nombre ?>" type="text" class="form-control" name="txtnombre" id="txtnombre">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Apellido</label>
      <div class="col-lg-9">
        <input value="<?php echo $apellido ?>" type="text" class="form-control" name="txtapellido" id="txtapellido">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Dni</label>
      <div class="col-lg-9">
        <input value="<?php echo $dni ?>" type="text" class="form-control" name="txtdni" id="txtdni">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Sexo</label>
      <div class="col-lg-9">
        <input value="<?php echo $sexo ?>" type="text" class="form-control" name="txtsexo" id="txtsexo">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Direccion</label>
      <div class="col-lg-9">
        <input value="<?php echo $direccion ?>" type="text" class="form-control" name="txtdireccion" id="txtdireccion">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Tipo Trabajador</label>
      <div class="col-lg-9">
        <select class="form-control" name="ttrabajador">
          <option>Seleccione</option>
          <?php

          if (isset($ttrabajadores)) {
            foreach ($ttrabajadores as $ttrabajador) { 
              if ($idttrabajador == $ttrabajador->idtipotrabajador ) { ?>
              <option value="<?php echo $ttrabajador->idtipotrabajador ?>" selected> <?php echo $ttrabajador->ntipotrabajador ?></option> 
            <?php  } else { ?>
              <option value="<?php echo $ttrabajador->idtipotrabajador ?>"> <?php echo $ttrabajador->ntipotrabajador ?></option> 
            <?php
              }
            }
           }
          ?>
        </select>
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idtrabajador ?>" name="txtidtrabajador">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>
