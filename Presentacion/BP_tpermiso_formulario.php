<form class="form-horizontal" id="form-tpermiso">
  <fieldset>
    <div class="form-group">
      <label class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input value="<?php echo $desc_tpermiso ?>" type="text" class="form-control" name="txtdescripcion" id="txtdescripcion">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label"># de Dias</label>
      <div class="col-lg-10">
        <input value="<?php echo $ndias_tpermiso ?>" type="text" class="form-control" name="txtndias" id="txtndias">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idtpermiso ?>" name="txtidtpermiso">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
    </div>
  </fieldset>
</form>
