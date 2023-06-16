<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>
	<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body class="bg-light">
	<div class="container w-25 mt-5 p-3 shadow bg-secondary"></div>
	<div class="container w-25 mb-5 p-4 shadow bg-white">
        <h3 class="mb-3 text-center">Login Admin</h3>
        <form action="<?=site_url()?>loginadmin/exec" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input name="username_admin" type="text" class="form-control" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password_admin" type="password" class="form-control" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2 mt-2">Login</button>
            <button type="button" onclick="location.href = '<?=site_url()?>signupadmin'" class="btn btn-secondary w-100">Sign Up</button>
        </form>
    </div>

	<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<?php include 'template/Modal_notification.php'?>
</body>
</html>
