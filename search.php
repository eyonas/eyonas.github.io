<?php
include('config.php');
$sql = file_get_contents('sql/getDogs.sql');
$statement = $database->prepare($sql);
$statement->execute();
$dogs = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search - Dog Network</title>
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
		</a> &nbsp;
		<span class = "title"> The Dog Network &nbsp; </span>
		<ul id="navigation">
			<li>
				<a href="index.php">home</a>
			</li>
			<li class="selected">
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
		<h1><span>Search For Dogs</span></h1>
		<div>
		<h2> Make sure to check one of the boxes and also you have to type something to be able to search </h2>
			<form method="GET" action = "results.php">
			Search By Color <input type= "radio" name="search-type" value="color" />
			Search By Breed <input type ="radio" name="search-type" value="breed" />
			Search By Age <input type = "radio" name ="search-type" value="age" /> 
		    Type your search word:<input type="text" name="search-word"/><br><br>
			<input type ="submit" placeholder = "Search"/>			
			</form>
		</div>
		<h2> List of Dogs Available </h2>
		<h3>Please Feel free pick any of the available dogs and use the search bar above to go to a link<br>that will enable you to acquire the dog!</h3>
		<?php foreach($dogs as $dog): ?>
		<p>
			<b>Owner Name</b>: <?php echo $dog['name']; ?> <br>
			<b>Dog Breed</b>: <?php echo $dog['breed']; ?> <br>
			<b>Dog Age</b>: <?php echo $dog['age']; ?> <br>
			<b>Dog Sex</b>: <?php echo $dog['sex']; ?> <br>
			<b>Dog Color</b>: <?php echo $dog['color']; ?>
		</p> <br><br>
		<?php endforeach; ?>
	</div>
	<div id="footer">
		<a href="login.php" style="color: orange; font-size: 15px; margin-left: 20%; text-decoration: none;">Owner Sign in </a>
		<?php if((isset($_SESSION['ownerID']))): ?>
			<a href="logout.php" style="color: orange; font-size: 15px; margin-left: 20%; text-decoration: none;"> Sign out </a>
		<?php endif; ?>
	</div>
	</body>
</html>
