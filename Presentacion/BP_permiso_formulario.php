<form class="form-horizontal" id="form-permiso">
  <fieldset>
    <div class="form-group">
      <label class="col-lg-3 control-label">Fecha</label>
      <div class="col-lg-9">
        <input type="date" class="form-control" name="txtfecha" id="txtfecha">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Observacion </label>
      <div class="col-lg-9">
        <input type="text" class="form-control" name="txtobservacion" id="txtobservacion">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-3 control-label">Tipo Permiso</label>
      <div class="col-lg-9">
        <select class="form-control" name="permisos">
          <option>Seleccione</option>
          <?php
          if (isset($permisos)) {
            foreach ($permisos as $permiso) { ?>
              <option value="<?php echo $permiso->idtpermiso ?>"> <?php echo $permiso->descripcion ?></option> 
            <?php  }
           } ?>
        </select>
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idtrabajador ?>" name="txtidtrabajador">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>
