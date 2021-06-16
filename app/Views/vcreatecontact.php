<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <h1>CREAR CONTACTO</h1>
        <br>
        <div class="row">
            <div class="col-lg-6">
            <form action="<?php echo site_url('/guardarcontacto') ?>" method="post">
            <div class="form-group">
            <label >Nombre</label><br>
            <input type="text" id="nombre" name="nombre" class="form-control">
            <label >Telefono</label><br>
            <input type="text" id="telefono" name="telefono" class="form-control">
            <label >email</label><br>
            <input type="email" id="email" name="email" class="form-control"> <br>
            <input type="submit" value="guardar" class="btn btn-danger">
            </form>
            </div>
       
            </div>
            <div class="col-lg-6">
            
            </div>
        </div>
        
    </div>

 

<script src="<?php echo base_url() ?>/js/bootstrap.js"></script>
</body>
</html>