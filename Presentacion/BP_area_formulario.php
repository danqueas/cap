<form class="form-horizontal" id="form-area">
  <fieldset>
    <div class="form-group">
      <label class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input value="<?php echo $nom_area ?>" type="text" class="form-control" name="txtnomarea" id="txtnomarea" placeholder="Nombre del Area">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Descripcion</label>
      <div class="col-lg-10">
        <input value="<?php echo $desc_area ?>" type="text" class="form-control" name="txtdescripcion" id="txtdescripcion">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idarea ?>" name="txtidarea">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>