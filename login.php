<?php
include('config.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = strtolower($_POST['username']);
	$password = strtolower($_POST['password']);
	$params = array(
		'username' => $username,
		'password' => $password
	);
	$sql = file_get_contents('sql/getUser.sql');
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	if(!empty($users)){
		$user = $users[0];
		$_SESSION['ownerID'] = $user['ownerid'];
		header('location: index.php');
	}
}
	
?>
<!doctype html>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Dog Network</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width : 568px)">
	<style>
		.title{
			font-size: 30px;
			font-weight: bold;
			margin-right: 7%;
		}
		
	</style>
	<script type="text/javascript" src="js/mobile.js"></script>
</head>
<body>
	<div id="header">
		<a href="index.php" class="logo">
			<img src="images/dog.png" alt="">
		</a>
		<ul id="navigation">
			<li>
				<a href="index.php">home</a>
			</li>
			<li>
				<a href="search.php">search</a>
			</li>
			<li>
				<a href="ownerSignup.php?action=add">Owner Signup</a>
			</li>
			<?php if((isset($_SESSION['ownerID']))): ?>
			<li>
				<a href="ownerSignup.php?action=edit">Owner Edit-Data</a>
			</li>
			<?php endif; ?>
			
		</ul>
	</div>
	<div id="body">
		<h1><span>Owner Login Page</span></h1> <br><br>
		<div>
		<form method="POST" action="">
		<label> Username: </label> &nbsp; <input type="text" name = "username" />
		<label> Password: </label> &nbsp; <input type="password" name = "password" />
		<input type="submit" placeholder="sign in"/>
		</form>
		</div>
	</div>
	<div id="footer">
		<a href="login.php" style="color: orange; font-size: 15px; margin-left: 20%; text-decoration: none;">Owner Sign in </a>
		<?php if((isset($_SESSION['ownerID']))): ?>
			<a href="logout.php" style="color: orange; font-size: 15px; margin-left: 20%; text-decoration: none;"> Sign out </a>
		<?php endif; ?>
	</div>
</body>
</html>
