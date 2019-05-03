<?php
include('config.php');
$id = $_SESSION['dogID'];
$params = array(
			'id' => $id
			);
$sql = file_get_contents('sql/getName.sql');
$statement = $database->prepare($sql);
$statement->execute($params);
$names = $statement->fetchAll(PDO::FETCH_ASSOC);
$name = $names[0];
removeDog($id, $database);
?>
<!doctype html>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Results - Dog Network</title>
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
		<h1><span>Confirmation for your order!</span></h1> <br><br>
		<h3> You have successfully acquired Dog-id: <?php echo $id; ?> <h3><br>
		     <h4> 
			 Name of Dog: <?php echo $name['name']; ?><br><br>
			 Owner's Name: <?php echo $name['ownerName']; ?> 
	 		 </h4>
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
