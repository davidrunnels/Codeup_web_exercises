<?php

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'national_parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require_once('../db_connect.php');

$dbcResult = $dbc->prepare("SELECT name, location, date_established, area_in_acres, description
  FROM national_parks");

// $name = (!isset($_POST['name'])) ? '' : $_POST['name'];
// $location = (!isset($_POST['location'])) ? '' : $_POST['location'];
// $date_established = (!isset($_POST['date_established'])) ? '' : $_POST['date_established'];
// $area_in_acres = (!isset($_POST['area_in_acres'])) ? '' : $_POST['area_in_acres'];
// $description = (!isset($_POST['description'])) ? '' : $_POST['description'];

if(!empty($_POST)){
var_dump($_POST);
    $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
    VALUES (:name, :location, :date_established, :area_in_acres, :description)');

    $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location',  $_POST['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $_POST['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', $_POST['area_in_acres'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR);

    $stmt->execute();

}

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
    <link rel="stylesheet" href="/css/park_styles.css">
</head>
<body>
  <div class="container-fluid">
      <h1><u>National Parks</u></h1>

      <table class="table table-striped table-bordered table-condensed">

       <tr id="table_header">
         <th width="15%">Name&nbsp;</th>
         <th width="15%">Location&nbsp;</th>
         <th width="15%">Date Established&nbsp;</th>
         <th width="15%">Area in Acres&nbsp;</th>
         <th width="40%">Description&nbsp;</th>
     </tr>
     <?
     try {

    // Find out how many items are in the table
        $total = $dbc->query('SELECT COUNT(*)
            FROM national_parks')->fetchColumn();

    // How many items to list per page
        $limit = 4;

    // How many pages will there be
        $pages = ceil($total / $limit);

    // What page are we currently on?
        $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
            'options' => array(
                'default'   => 1,
                'min_range' => 1,
                ),
            )));

    // Calculate the offset for the query
        $offset = ($page - 1)  * $limit;

    // Some information to display to the user
        $start = $offset + 1;
        $end = min(($offset + $limit), $total);

    // The "back" link
        $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    // The "forward" link
        $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    // Display the paging information
        echo '<div class="pagination" id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

    // Prepare the paged query
        $stmt = $dbc->prepare('SELECT * 
            FROM national_parks 
            ORDER BY name 
            LIMIT :limit 
            OFFSET :offset
        ');

    // Bind the query params
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

    // Do we have any results?
        if ($stmt->rowCount() > 0) {
        // Define how we want to fetch the results
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $iterator = new IteratorIterator($stmt);

        // Display the results
            foreach ($iterator as $row) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['location']}</td>";
                echo "<td>{$row['date_established']}</td>";
                echo "<td>{$row['area_in_acres']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "</tr>";

            }

        } else {
            echo '<p>No results could be displayed.</p>';
        }

    } catch (Exception $e) {
        echo '<p>', $e->getMessage(), '</p>';
    }

    ?>

</table>

<div id="form_container">
    
        <h2>National Park Entry Form</h2>
        <form method="POST" action="national_parks.php">
            <div class="form_description">
            <p>Add a National Park to the Database.</p>
        </div>                      
            <ul >
            
                    <li id="li_1" >
        <label class="description" for="name">Name </label>
        <div class="form-group">
            <input id="name" name="name" class="element text medium" type="text" maxlength="255" value="" placeholder="Park Name"/> 
        </div> 
        </li>       <li id="li_2" >
        <label class="description" for="location">Location </label>
        <div class="form-group">
            <input id="location" name="location" class="element text medium" type="text" maxlength="255" value="" placeholder="State"/> 
        </div> 
        </li>       <li id="li_3" >
        <label class="description" for="date_established">Date Established </label>
        <div class="form-group">
            <input id="date_established" name="date_established" class="element text medium" type="text" maxlength="255" value="" placeholder="YYYY-MM-DD"/> 
        </div> 
        </li>       <li id="li_4" >
        <label class="area_in_acres" for="area_in_acres">Area in Acres </label>
        <div class="form-group">
            <input id="area_in_acres" name="area_in_acres" class="element text medium" type="text" maxlength="255" value="" placeholder="0.00"/> 
        </div> 
        </li>       <li id="li_5" >
        <label class="description" for="description">Description </label>
        <div class="form-group">
            <input id="description" name="description" class="element text medium" type="text" maxlength="10000" value="" placeholder="Park Description"/> 
        </div> 
        </li>
            
                    <li class="buttons">
                <input type="submit" name="form_id" value="add">
                
                <!-- <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" /> -->
        </li>
            </ul>
        </form> 
        <div id="footer">
            
        </div>
    </div>

    
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/jquery.min.js"></script>
</div>

</body>
</html>