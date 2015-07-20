<form class="form-horizontal" id="form-ttrabajador">
  <fieldset>
    <div class="form-group">
      <label class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input value="<?php echo $ntipotrabajador ?>" type="text" class="form-control" name="txtnomttrabajador" id="txtnomttrabajador">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Descripcion</label>
      <div class="col-lg-10">
        <input value="<?php echo $descripcion ?>" type="text" class="form-control" name="txtdescripcion" id="txtdescripcion">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idttrabajador ?>" name="txtidttrabajador">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>
