<?php

//CONNECTING DATABASE

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "php";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//TEST CONNECTION

if(mysqli_connect_errno()) {
	die ('Database connection failed: ' .
		mysqli_connect_error() . 
		" (" . mysqli_connect_errno() . ")"
		);
	}
?>

<?php

//PERFORM DATABASE QUERY

$query = "SELECT * FROM tabla ";
$result = mysqli_query($connection, $query);

if(!$result) {
	die ('Database query failed');
}


?>

<html>
	<head>
		<title>Testing DataBase Connection and Queries</title>
	</head>

<h1>Connecting DataBase with mysqli</h1>

	<body>

		<ul>
			<?php
			while($row = mysqli_fetch_assoc($result)) { ?>
			<li><?php echo $row['id']; ?></li>
			<li><?php echo $row['precio']; ?></li>
			<li><?php echo $row['item']; ?></li>

			<?php } ?>

			<?php mysqli_free_results($result); ?>
		
		</ul>
	</body>

</html>

<?php
	mysqli_close($connection);
?>