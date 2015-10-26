<?php
/*
 * populateTableTwo.php *
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

    
    $query = " 
            SELECT 
                name, comments, location, category, price
            FROM advert
            WHERE location='$location'
            AND category='$category'
            ORDER BY entryNo DESC;
        ";
    
    
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
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
          <li><a href="comments.php">Comments</a></li> 
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
    <div align='center'> 
        
        
<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover table-bordered table-responsive">
    <thead>
      <tr>
        <th>Name</th>
        <th>For Barter</th>
        <th>Location</th>
          <th>Price</th>
          <th>Contact</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
          <td></td>
           <td></td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
           <td></td>
           <td></td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td> <td></td>
           <td></td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>