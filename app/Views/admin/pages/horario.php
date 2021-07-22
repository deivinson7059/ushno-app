<div class="card mx-auto" style="width: 98%;">
  <div class="card-header">
    Listado de Horarios
    <br>
    <a href="<?php echo base_url('/admin/horario/create') ?>" class="btn btn-info" >Nuevo Horario</a>
  <br>
  </div>
  <div class="card-body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Dia</th>
      <th scope="col">Horario</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Teams</th>
      <th scope="col">Dj</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach ($lista as $list): //recorre el listado de la respuesta y lo muestra ?>
											  <tr>
											      <td scope="col"><?php echo $list['hor_id'] ?></th>
											      <td scope="col"><?php echo $list['dia_nombre'] ?></th>
											      <td scope="col"><?php echo $list['horario'] ?></th>
											      <td scope="col"><?php echo $list['descripcion'] ?></th>
											      <td scope="col"><?php echo $list['te_nombre'] ?></th>
											      <td scope="col"><?php echo $list['te_nick'] ?></th>

											      <td scope="col">
											      <a href="<?php echo base_url('admin/horario/edit/' . $list['hor_id']) ?>" class="btn btn-info" >Editar</a>
											      <a onclick=deleteH(<?php echo $list['hor_id'] ?>); href="#" class="btn btn-warning" >Borrar</a>
											      </td>
											    </tr>
											    <?php endforeach;?>
  </tbody>
</table>
  </div>

</div>
<script src="<?php echo base_url('app-module/js/horario.js'); ?>"></script>
