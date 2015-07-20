<form class="form-horizontal" id="form-usuario">
  <fieldset>

    <div class="form-group">
      <label class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input value="<?php echo $nom_usuario ?>" type="text" class="form-control" name="txtnombre" id="txtnombre">
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input value="<?php echo $pass_usuario ?>" type="text" class="form-control" name="txtpassword" id="txtpassword">
      </div>
    </div>

    <div>
      <input type="hidden" value="<?php echo $idtrabajador ?>" name="txtidtrabajador">
      <input type="hidden" value="<?php echo $evento ?>" name="txtevento">
      <input type="hidden" value="<?php echo $idusuario ?>" name="txtidusuario">
    </div>
  </fieldset>
</form>
