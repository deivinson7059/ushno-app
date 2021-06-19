<div class="card mx-auto" style="width: 98%;">
  <div class="card-header">
    Nuevo Horario
  </div>
  <div class="card-body">
<form action="<?php echo site_url('/admin/horario/save') ?>" method="post">
<div class="row">
    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group">
            <label style="width: 100%">
                Dia:
                <select class="form-control" required id="cbDia" name="cbDia">
                    <option value=""></option>
                    <?php foreach ($combo as $comb): //recorre el listado de la respuesta y lo muestra ?>
																																									  <option value="<?php echo $comb['dia_id'] ?> "><?php echo $comb['dia_nombre'] ?> </option>
																																								<?php endforeach;?>
                </select>
            </label>
        </div>
    </div>

     <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
        <div class="form-group">
            <label style="width: 100%">
                Horario:
                <input class="form-control" id="txtHorario" required name="txtHorario" type="text"/>
            </label>
        </div>
    </div>

    <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
        <div class="form-group">
            <label style="width: 100%">
                Descripcion:
                <input class="form-control" id="txtDesc" required name="txtDesc" type="text"/>
            </label>
        </div>
    </div>

    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group">
            <label style="width: 100%">
                Team:
                <select class="form-control" required id="cbTeam" name="cbTeam">
                    <option value=""></option>
                    <?php foreach ($teams as $team): ?>
																					  <option value="<?php echo $team['te_id'] ?> "><?php echo $team['te_nombre'] ?> </option><?php endforeach;?> </select> </label>
        </div>
    </div>

    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group">
            <label style="width: 100%">
                Frase:
                <input class="form-control" required id="txtFrase"  name="txtFrase" type="text"/>
            </label>
        </div>
    </div>
     <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-top: 25px;" >
        <div class="form-group">
           <a href="<?php echo base_url('admin/horario') ?>" class="btn btn-danger btn-block" >Cancelar</a>
        </div>
    </div>
     <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-top: 25px;">
        <div class="form-group">
            <label style="width: 100%">
            <input type="submit" value="Guardar" class="btn btn-success btn-block">
            </label>
        </div>
    </div>

</div>
</form>
  </div>

</div>
