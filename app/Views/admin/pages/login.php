<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
    <link rel="icon" href="<?php echo base_url('resources/assets/img/favicon.png'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('resources/css/login.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('resources/css/toastr.css'); ?>">
	<script src="<?php echo base_url('resources/js/bootstrap.bundle.js'); ?>"></script>
	<script src="<?php echo base_url('resources/js/jquery-3.6.0.js'); ?>"></script>
	<script src="<?php echo base_url('resources/js/jquery.blockUI.js'); ?>"></script>
	<script src="<?php echo base_url('resources/js/toastr.min.js'); ?>"></script>
	<script src="<?php echo base_url('resources/js/utilities.js'); ?>"></script>

</head>
<body>
    <div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <h3 class="mb-3">Login</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                <form id="frmLogin" role="form" class="row g-4">
                                        <div class="col-12">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="email" required name="user_mail" id="user_mail" class="form-control" autofocus placeholder="Digita Email" value="deivinson7059@gmail.com">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Contraseña<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" required class="form-control" name="user_pass" id="user_pass" placeholder="Digita Contraseña" value="Danisoft2016$">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" checked type="checkbox"  id="inlineFormCheck">
                                                <label class="form-check-label" for="inlineFormCheck">Recordar datos</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <a href="#" class="float-end text-primary">Olvide mi Contraseña?</a>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-4 float-end mt-4">Entrar</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                <i class="bi bi-bootstrap"></i>
                                <h2 class="fs-1">Ushno - Radio</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-end text-secondary mt-3">Danisoft 2021</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('app-module/js/login.js'); ?>"></script>
</body>

</html>