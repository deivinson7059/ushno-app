<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
      

       <h1>lista de contactos</h1>
   
   
   
   

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Fullname</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($lista as $list): //recorre el listado de la respuesta y lo muestra ?> 
  <tr>
      <td scope="col"><?php echo $list['id']  ?></th>
      <td scope="col"><?php echo $list['fullname']  ?></th>
      <td scope="col"><?php echo $list['phone']  ?></th>
      <td scope="col"><?php echo $list['email']  ?></th>
      
      <td scope="col">
      <a href="<?php echo base_url('edit/'.$list['id'])   ?>" class="btn btn-info" >Editar</a>
      <a href="<?php echo base_url('delete/'.$list['id'])   ?>" class="btn btn-warning" >Borrar</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


</div>
   <script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
</body>
</html>