<form class="form-horizontal" id="form-dfestivos">
  <fieldset>

    <div class="form-group">
      <label class="col-lg-2 control-label">Fecha</label>
      <div class="col-lg-10">
        <input value="<?php echo $fecha_dfestivos ?>" type="text" class="form-control" name="txtfecha" id="txtfecha">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input value="<?php echo $nombre_dfestivos ?>" type="text" class="form-control" name="txtnombre" id="txtnombre">
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Tipo Trabajador</label>
      <div class="col-lg-10">
        <select class="form-control" name="ttrabajador">
          <option>Seleccione</option>
          <?php

          if (isset($ttrabajadores)) {
            foreach ($ttrabajadores as $ttrabajador) { 
              if ($tipt_dfestivos == $ttrabajador->idtipotrabajador ) { ?>
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
      <input type="hidden" value="<?php echo $idfestivo ?>" name="txtidfestivo">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>
