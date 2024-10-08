<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
	require_once(dirname(dirname(__FILE__)) . '/LocalSettings.php');
	$con = mysqli_connect($host,$dbuser,$dbpass);
	if (!$con)
	{
		die('Error!' . mysqli_connect_error());
	}
	
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>OWASP Bricks Configuration</title>
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="../stylesheets/foundation.css">
  -->
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="../stylesheets/foundation.min.css">
  <link rel="stylesheet" href="../stylesheets/app.css">
  <link rel="icon" href="../favicon.ico" type="image/x-icon">
  <script src="../javascripts/modernizr.foundation.js"></script>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="row">
	<div class="four columns centered">
	Setting up database.
	<?php
	
	$sql="DROP DATABASE IF EXISTS $dbname";
	if (mysqli_query($con, $sql))
		{echo "1. Database already exists, deleting it right away."; echo "</br></br>";}
	else 
		{echo "Error! droping database: " . mysqli_error($con); echo "</br></br>";}


//Creating new database
	$sql="CREATE database $dbname";
	if (mysqli_query($con, $sql))
		{echo "1. Creating database";echo "</br></br>";}
	else 
		{echo "1. Error creating database: " . mysqli_error($con);echo "</br></br>";}

//creating table users
$sql="CREATE TABLE $dbname.users (
  `idusers` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `ua` VARCHAR(45) NOT NULL ,
  `ref` VARCHAR(145) NOT NULL ,
  `host` VARCHAR(45) NOT NULL ,
  `lang` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idusers`)
)";
	if (mysqli_query($con, $sql))
		{echo "2.Created new table";echo "</br></br>";}
	else 
		{echo "2.Error in creating table: " . mysqli_error($con);echo "</br></br>";}


//3
$sql="INSERT INTO $dbname.users
		(`idusers`, `name`, `email`, `password`, `ua`, `ref`, `host`, `lang`)
     VALUES
     (0, 'admin', 'admin@getmantra.com', 'admin', 'Brick_Browser', '$server$scriptpath/content-13/index.php', '127.0.0.1', 'en')";
	if (mysqli_query($con, $sql))
		{echo "3. Added admin user details"; echo "</br></br>";}
	else 
		{echo "3. Error adding admin user details: " . mysqli_error($con);echo "</br></br>";}
//4
$sql="INSERT INTO $dbname.users
		(`idusers`, `name`, `email`, `password`, `ua`, `ref`, `host`, `lang`)
     VALUES
     (1, 'tom', 'tom@getmantra.com', 'tom', 'Block_Browser', '', '8.8.8.8', 'en');";
	if (mysqli_query($con, $sql))
		{echo "3. Added tom"; echo "</br></br>";}
	else 
		{echo "3. Error adding tom: " . mysqli_error($con);echo "</br></br>";}

//5
$sql="INSERT INTO $dbname.users
		(`idusers`, `name`, `email`, `password`, `ua`, `ref`, `host`, `lang`)
     VALUES
     (2, 'ron', 'ron@getmantra.com', 'ron', 'Rain_Browser', '', '192.168.1.1', 'en')";
	if (mysqli_query($con, $sql))
		{echo "3. Added ron"; echo "</br></br>";}
	else 
		{echo "3. Error adding ron: " . mysqli_error($con);echo "</br></br>";}
//6
$sql="INSERT INTO $dbname.users
		(`idusers`, `name`, `email`, `password`, `ua`, `ref`, `host`, `lang`)
     VALUES
     (3, 'harry', 'harry@getmantra.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Mantra', '', '127.0.0.1', 'en');";
	if (mysqli_query($con, $sql))
		{echo "3. Added harry"; echo "</br></br>";}
	else 
		{echo "3. Error adding harry: " . mysqli_error($con);echo "</br></br>";}
		
	header( 'Location: index.php' ) ;

?>
	</div>  
  <!-- Included JS Files (Uncompressed) -->
  <!--  
  <script src="../javascripts/jquery.js"></script>  
  <script src="../javascripts/jquery.foundation.mediaQueryToggle.js"></script>  
  <script src="../javascripts/jquery.foundation.forms.js"></script>  
  <script src="../javascripts/jquery.foundation.reveal.js"></script>  
  <script src="../javascripts/jquery.foundation.orbit.js"></script>  
  <script src="../javascripts/jquery.foundation.navigation.js"></script>  
  <script src="../javascripts/jquery.foundation.buttons.js"></script>  
  <script src="../javascripts/jquery.foundation.tabs.js"></script>  
  <script src="../javascripts/jquery.foundation.tooltips.js"></script>  
  <script src="../javascripts/jquery.foundation.accordion.js"></script>  
  <script src="../javascripts/jquery.placeholder.js"></script>  
  <script src="../javascripts/jquery.foundation.alerts.js"></script>  
  <script src="../javascripts/jquery.foundation.topbar.js"></script>  
  <script src="../javascripts/jquery.foundation.joyride.js"></script>  
  <script src="../javascripts/jquery.foundation.clearing.js"></script>  
  <script src="../javascripts/jquery.foundation.magellan.js"></script>  
  -->  
  <!-- Included JS Files (Compressed) -->
  <script src="../javascripts/jquery.js"></script>
  <script src="../javascripts/foundation.min.js"></script>  
  <!-- Initialize JS Plugins -->
  <script src="../javascripts/app.js"></script>  
</body>
</html>