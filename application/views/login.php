<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="<?php echo base_url("assets/images/favicon.png"); ?>">
    <title>Login - Banknote Production Reporting System</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet">
	
	<!-- Custom Login CSS -->
    <link href="<?php echo base_url("assets/css/login.css"); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
	
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        	<img src="<?php echo base_url("assets/images/logo-baru.png"); ?>" >
            <h1 class="text-center login-title">Banknote Production Reporting System</h1>
            <div class="account-wall">
				<center>
					<i class="fa fa-user fa-4x circle"></i>
				</center>
                <form class="form-signin">
                <input type="text" class="form-control" placeholder="Username" required autofocus>
                <input type="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Login</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="<?php echo base_url("/index.php/home"); ?>" class="pull-right need-help">Help </a><span class="clearfix"></span>
                </form>
            </div>
			<p class="text-center new-account">Perum Percetakan Uang Republik Indonesia &copy 2015 </p>
        </div>
    </div>
</div>
<!-- jQuery -->
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>" ></script>
	
</body>