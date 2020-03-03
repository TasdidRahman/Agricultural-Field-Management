<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: dashboard.php");
}

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT user_id,email,password FROM user WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['user_id'] = $results['user_id'];
		header("Location: dashboard.php");

	} else {
		$message = 'Sorry, wrong information';
	}

endif;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Below</title>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>


<div class="login-form">
    <h1>Farm Buzz</h1>
    <?php if(!empty($message)): ?>
        <h2><?= $message ?></h2>
    <?php endif; ?>
<form action="index.php" method="POST">
    <div class="form-group ">
    <input type="text" class="form-control" placeholder="Enter your email" name="email">
        <i class="fa fa-user"></i>
    </div>
    <div class="form-group log-status">
    <input type="password" class="form-control" placeholder="Your Password" name="password">
        <i class="fa fa-lock"></i>
    </div>
    <button type="submit" class="log-btn" >Log in</button>
</form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="assets/plugins/js/index.js"></script>

</body>
</html>