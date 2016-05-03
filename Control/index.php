<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<?php 
require_once ('config.php');
session_start();
if(empty($_SESSION)) { ?>
	<div class="container">
	    <div class="row">
	        <div class="col-sm-6 col-md-4 col-md-offset-4">
	            <h1 class="text-center login-title">Sign in shopping</h1>
	            <div class="account-wall">
	                <form class="form-signin" action="login.php" method="post">
	                <input name="pseudo" type="text" class="form-control" placeholder="Pseudo" required autofocus>
	                <input name="password" type="password" class="form-control" placeholder="Password" required>
	                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	                </form>
	            </div>
	            <a href="#" class="text-center new-account">Create an account</a>
	        </div>
	    </div>
	</div>
<?php } else {?>
<p>Hello <?php 
require_once ('config.php');
require ("User.php");
$user = unserialize($_SESSION['user']);
echo $user->name;
?></p> 
<a href="logout.php"><button class="col-md-4 col-md-offset-4 btn btn-lg btn-primary" type="submit">Logout</button></a>
<?php } 
if(isset($_GET['err'])) {
	if($_GET['err'] == 0) { ?>
		<div class="alert alert-success col-md-4 col-md-offset-4" role="alert">logged in</div>
		<?php
	}
	elseif($_GET['err'] == 1) {?>
		<div class="alert alert-warning col-md-4 col-md-offset-4" role="alert">pseudo error</div>
		<?php
	}
	elseif($_GET['err'] == 2) {?>
		<div class="alert alert-danger col-md-4 col-md-offset-4" role="alert">password error</div>
		<?php
	}
}

?>

</body>
</html>