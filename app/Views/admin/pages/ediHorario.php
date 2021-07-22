
<div class="card mx-auto" style="width: 98%;">
  <div class="card-header">
    Editar Horario
  </div>
  <div class="card-body">
<form id="frmLogin" role="form">
<div class="row">
    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group">
            <label style="width: 100%">
                Dia:
                <select class="form-control" required id="cbDia" name="cbDia">
                     <option value="<?php echo $lista[0]['dia_id']; ?>"><?php echo $lista[0]['dia_nombre']; ?></option>
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
                <input class="form-control" id="txtHorario" required value="<?php echo $lista[0]['horario']; ?>" name="txtHorario" type="text"/>
            </label>
        </div>
    </div>

    <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
        <div class="form-group">
            <label style="width: 100%">
                Descripcion:
                <input class="form-control" id="txtDesc" required value="<?php echo $lista[0]['descripcion']; ?>" name="txtDesc" type="text"/>
            </label>
        </div>
    </div>

    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group">
            <label style="width: 100%">
                Team:
                <select class="form-control" id="cbTeam" required name="cbTeam">
                     <option value="<?php echo $lista[0]['te_id']; ?>"><?php echo $lista[0]['te_nombre']; ?></option>
                    <option value=""></option>
                    <?php foreach ($teams as $team): ?>
																					  <option value="<?php echo $team['te_id'] ?> "><?php echo $team['te_nombre'] ?> </option><?php endforeach;?> </select> </label>
        </div>
    </div>

    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group">
            <label style="width: 100%">
                Frase:
                <input class="form-control" id="txtFrase" required value="<?php echo $lista[0]['frase']; ?>" name="txtFrase" type="text"/>
            </label>
        </div>
    </div>
    <input type="hidden" id="hor_id" name="hor_id" value="<?php echo $lista[0]['hor_id']; ?>" >
     <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-top: 25px;" >
        <div class="form-group">
           <a href="<?php echo base_url('admin/horario') ?>" class="btn btn-danger btn-block" >Cancelar</a>
        </div>
    </div>
     <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-top: 25px;">
        <div class="form-group">
            <label style="width: 100%">
            <input type="submit" id="btnSave" value="Actualizar" class="btn btn-success btn-block">
            </label>
        </div>
    </div>

</div>
</form>
  </div>

</div>

<script src="<?php echo base_url('app-module/js/ediHorario.js'); ?>"></script>
