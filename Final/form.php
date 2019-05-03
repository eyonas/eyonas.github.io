<?php
include('config.php');
$action = get('action');
$id = $_SESSION['ownerID'];
$dog = null;

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if($action == "add"){
		$name = $_POST['name'];
		$breed = $_POST['breed'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];
		$color = $_POST['color'];
		$owner = new Owner($_SESSION['ownerID'], $database);
		if($action == "add")
			$owner->addDog($name, $breed, $age, $sex, $color);
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form - Dog Network</title>
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
		<h1><span>Dog Add or Edit Form</span></h1>
		<div>
		<form method="POST" action= " ">
		Name: <input type="text" name = "name"/><br>
		Breed: <input type="text" name = "breed"/><br>
		Age: <input type="text" name = "age"/> <br>
		Sex: <input type = "text" name = "sex"/> <br>
		color: <input type= "text" name= "color"/>
		<input type = "submit" placeholder = "add" />
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
</body>
</html>
