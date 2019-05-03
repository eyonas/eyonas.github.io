<?php
include('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$email = $_POST['email'];
	$params = array(
		'name' => $name,
		'address' => $address,
		'city' => $city,
		'zipcode' => $zipcode,
		'email' => $email
		);
	$sql = file_get_contents('sql/addCustomer.sql');
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$_SESSION['dogID'] = get('id');
	header('location: confirmation.php');
}
?>
<!doctype html>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer Signup - Dog Network</title>
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
		<h1><span>Customer Signup Page</span></h1> <br><br>
		<h2> Dear customers, In order to get the dog you wanted, 
		you need to provide the full information requested. Thank you! </h2> <br> <br>
		<div>
		<form method="POST" action="">
		<label> Name: </label> &nbsp; <input type="text" name = "name" required />
		<label> Address: </label> &nbsp; <input type="text" name = "address" required />
		<label> City: </label> &nbsp; <input type="text" name = "city"  required />
		<label> Zip Code: </label> &nbsp; <input type="text" name = "zipcode" required />
		<label> Email: </label> &nbsp; <input type="email" name = "email" required />
		<input type="submit" placeholder="s='Sign up"/>
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
