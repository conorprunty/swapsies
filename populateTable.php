<?php
/*
 * populateTable.php *
 *
 */
// connect to DB
require("common.php");

// Check whether user is logged in
if (empty($_SESSION['user'])) {
    // If they are not, redirect to the login page. 
    header("Location: index.php");
    
    // this statement is needed 
    die("Redirecting to index.php");
} else {
    
    //selecting invidiual locations for searching
    if ($_POST['locationSelect'] != "") {
        $location = $_POST['locationSelect'];
    } else {
        //selecting all locations for searching
        $location = "SELECT location FROM advert WHERE location = '*'";
    }
    
    //selecting individual categories for searching
    if ($_POST['categorySelect'] != "") {
        $category = $_POST['categorySelect'];
    } else {
        //selecting all categories for searching
        $category = "SELECT category FROM advert WHERE category = '*'";
    }
    
    //selecting individual prices for searching
    if ($_POST['priceSelect'] != "") {
        $price = $_POST['priceSelect'];
        $query = " 
            SELECT 
                name, comments, location, category, price, WillAccept
            FROM advert
            WHERE location='$location'
            AND category='$category'
            AND price='$price'
            ORDER BY entryNo DESC;
        ";
    } else {
        //selecting all prices for searching
        $query = " 
            SELECT 
                name, comments, location, category, price, WillAccept
            FROM advert
            WHERE location='$location'
            AND category='$category'
            ORDER BY entryNo DESC;
        ";
    }
    

    
    try {
        // run query
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $row    = $stmt->fetch();
    }
    catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title>Profile</title>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Swapsies</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="mainmenu.php">Home</a></li>
        
        <li><a href="searchTable.php">Search Ads</a></li>
          <li><a href="insert.php">Create Ad</a></li>
          <li><a href="comments.php">Comments</a></li> 
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
    <div align='center'>
    <?php
if ($row) {
    echo "<table class='fulltable'><tr><th>NAME</th><th>FOR BARTER</th><th>LOCATION</th><th>CATEGORY</th><th>VALUE</th><th>WILL ACCEPT</th><th>CONTACT</th></tr>";
    $count = 1;
    // output data of first row
    echo "<tr><td>" . $row["name"] . "</td><td> " . $row["comments"] . "</td><td> " . $row["location"] . "</td><td> " . $row["category"] . "</td><td>€" . $row["price"] . "</td><td> " . $row["WillAccept"] . "</td>";
    echo "<td><form id= \"$FormName\" method=\"post\" action=\"contactCustomer.php\">
    <input type=\"hidden\" name=\"name\" value=" . $row["name"] . ">
    <input class=\"submitb\" name=\"submit\" type=\"image\" src=\"contactimg.ico\" value=\"Contact Seller\">
    </form></td></tr>";
    // output data of next rows
    while ($row = $stmt->fetch()) {
        $count++;
        echo "<tr><td>" . $row["name"] . "</td><td> " . $row["comments"] . "</td><td> " . $row["location"] . "</td><td> " . $row["category"] . "</td><td>€" . $row["price"] . "</td><td> " . $row["WillAccept"] . "</td>";
        echo "<td><form id= \"$FormName\" method=\"post\" action=\"contactCustomer.php\">
    <input type=\"hidden\" name=\"name\" value=" . $row["name"] . ">
    <input class=\"submitb\" name=\"submit\" type=\"image\" src=\"contactimg.ico\" value=\"Contact Seller\">
    </form></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>
        </div>
</body>
</html>