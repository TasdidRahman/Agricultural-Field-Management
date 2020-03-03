<?php

session_start();


require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_type'])):
	$email =$_POST['email'];
    $usertype =$_POST['confirm_type'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		echo "Invalid email format"; 
	}		 
	else {	
	
	// Enter the new user in the database
	$sql = "INSERT INTO user (email, password, usertype) VALUES (:email, :password, :usertype)";
	$stmt = $conn->prepare($sql);
    $password=password_hash($_POST['password'], PASSWORD_BCRYPT);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':usertype', $usertype);

	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;
	}
endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">

	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<form action="register.php" method="POST">

		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">
		<input type="password" placeholder="confirm password" name="confirm_password">
        <input type="text" placeholder="User Type" name="confirm_type">
		<input type="submit">

	</form>
</body>
</html>