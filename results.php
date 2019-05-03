<?php
include('config.php');
if($_SERVER['REQUEST_METHOD'] == "GET"){
	$category = $_GET['search-type'];
	$searchWord = $_GET['search-word'];
	$searchWord = strtolower($searchWord);
	$searchWord = ucfirst($searchWord);
	$params = array(
				'word' => $searchWord
			);
	if($category == 'color')
		$sql = file_get_contents('sql/getDogsColor.sql');
	else if ($category == 'breed')
		$sql = file_get_contents('sql/getDogsBreed.sql');
	else if ($category == 'age')
		$sql = file_get_contents('sql/getDogsAge.sql');
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$dogs = $statement->fetchAll(PDO::FETCH_ASSOC);
}
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
		<h1><span>Search Results</span></h1>
		<h2>Hit "GET DOG" if you are <span style ="color: red;"> absolutely </span> sure you are getting the dog. Warning, clicking on the <br>reserve button is like entering
		    into an agreement with the owner.
		</h2>
		<?php foreach($dogs as $dog): ?>
		<div>
			<ul>
				<li>
					<div style ="padding-left: 18%;">
						<h3> <?php echo $dog['name']; ?> </h3>
						<p>
							Owner Name: <?php echo $dog['ownerName']; ?> <br>
							Owner Email: <?php echo $dog['email']; ?>  <br>
							Dog Breed: <?php echo $dog['breed']; ?> <br>
							Dog Age: <?php echo $dog['age']; ?> <br>
							Dog Sex: <?php echo $dog['sex']; ?> <br>
							Dog Color: <?php echo $dog['color']; ?>
						</p>
					<a href="customerSignup.php?id=<?php  echo $dog['dogid']; ?>&action=edit" class="more"> Get Dog </a>
					</div>
				</li>
			</ul>
		</div>
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
</body>
</html>
