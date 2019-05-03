<?php
include('config.php');
$action = get('action');
$owner = NULL;
if($action == "edit"){
	$id = $_SESSION['ownerID'];
	$sql = file_get_contents('sql/getOwner.sql');
	$params = array(
		'id' => $id
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$owners = $statement->fetchAll(PDO::FETCH_ASSOC);
	$owner = $owners[0];
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($action == "add"){
		$params = array(
		'name' => $name,
		'address' => $address,
		'city' => $city,
		'zipcode' => $zipcode,
		'email' => $email,
		'username' => $username,
		'password' => $password
	);
		$sql = file_get_contents('sql/addOwner.sql');
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
	else if($action == "edit"){
		$params = array(
		'id' => $id,
		'name' => $name,
		'address' => $address,
		'city' => $city,
		'zipcode' => $zipcode,
		'email' => $email,
		'username' => $username,
		'password' => $password
	);
		$sql = file_get_contents('sql/updateOwner.sql');
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
	//header('location: index.php');
}
?>
<!doctype html>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Owner Signup - Dog Network</title>
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
		<h1><span>Owner Signup Page</span></h1> <br><br>
		<h2> Sign up now so you can be able to give away your dog! </h2> <br> <br>
		<div>
		<form method="POST" action="">
		<label> Username: </label> &nbsp; <input type="text" name = "username" value = "<?php echo $owner['username'] ?>" required />
		<label> password: </label> &nbsp; <input type="password" name = "password" value = "<?php echo $owner['password'] ?>" required />
		<label> Name: </label> &nbsp; <input type="text" name = "name" value = "<?php echo $owner['name'] ?>" required />
		<label> Address: </label> &nbsp; <input type="text" name = "address" value = "<?php echo $owner['address'] ?>" required />
		<label> City: </label> &nbsp; <input type="text" name = "city" value = "<?php echo $owner['city'] ?>"  required /> <br>
		<label> Zip Code: </label> &nbsp; <input type="text" name = "zipcode" value = "<?php echo $owner['Zip_code'] ?>" required />
		<label> Email: </label> &nbsp; <input type="email" name = "email" value = "<?php echo $owner['email'] ?>" required />
		<input type="submit" placeholder="Sign up"/>
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
