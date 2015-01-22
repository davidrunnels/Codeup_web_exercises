<?php

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'national_parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require_once('../db_connect.php');

$dbcResult = $dbc->query("SELECT name, location, date_established, area_in_acres
                          FROM national_parks
                          LIMIT 4");

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>National Parks</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->

	  <!-- Font Awesome -->

	  <link rel="stylesheet" href="/font-awesome-4.2.0/css/font-awesome.min.css">


	 <style type="text/css">
	  
  	</style>
</head>
<body>
  <div class="container-fluid">
	<h1><u>National Parks</u></h1>
	
	<table class="table table-striped table-bordered table-condensed">

 <tr id="table_header">
       <th style="width: 10%;">Name&nbsp;</th>
       <th style="width: 10%;">Location&nbsp;</th>
       <th style="width: 15%;">Date Established&nbsp;</th>
       <th style="width: 15%;">Area in Acres&nbsp;</th>
     </tr>
<?
  while ($parks = $dbcResult->fetch(PDO::FETCH_ASSOC)) {
  
		  echo "<tr>";
			echo "<td>{$parks['name']}</td>";
			echo "<td>{$parks['location']}</td>";
			echo "<td>{$parks['date_established']}</td>";
			echo "<td>{$parks['area_in_acres']}</td>";
      echo "</tr>";
    }
?>
	
	</table>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.min.js"></script>
    </div>

  </body>
</html>