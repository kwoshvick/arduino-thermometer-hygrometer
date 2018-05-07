<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/template/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/template/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/template/css/sb-admin.css')?>" rel="stylesheet">
</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <?php echo form_open( base_url('login/authenticateLogin'));?>
            <?php echo $this->session->flashdata('flash'); ?>
                <div class="form-group">
                    <?php
                    echo form_error('email');
                    ?>
                    <label for="email">Email address</label>
                    <input class="form-control" name="email" id="email" type="email"  placeholder="Enter email">
                </div>
                <div class="form-group">
                    <?php
                    echo form_error('password');
                    ?>
                    <label for="password">Password</label>
                    <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                </div>
                <button class="btn btn-primary btn-block">Login</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/template/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/template/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
</body>

</html>