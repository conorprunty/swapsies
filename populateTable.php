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
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="main.js"></script>
  <meta charset="utf-8">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  

    <title>Test Page</title>
</head>

<body>
    
    <div id="hmenu"> 
        <ul> 
          <li><a href="mainmenu.php">Homepage</a></li> 
          <li><a href="searchTable.php">View Ads</a></li> 
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li> 
        </ul>   
    </div>
    
    
    <?php
if ($row) {
    echo "<table><tr><th>Name</th><th>For Barter</th><th>Location</th><th>Category</th><th>Price</th><th>Contact</th></tr>";
    $count = 1;
    // output data of first row
    echo "<tr><td>" . $row["name"] . "</td><td> " . $row["comments"] . "</td><td> " . $row["location"] . "</td><td> " . $row["category"] . "</td><td> " . $row["price"] . "</td>";
    echo "<td><form id= \"$FormName\" method=\"post\" action=\"contactCustomer.php\">
    <input type=\"hidden\" name=\"name\" value=" . $row["name"] . ">
    <input name=\"submit\" type=\"submit\" value=\"Contact Seller\">
    </form></td></tr>";
    // output data of next rows
    while ($row = $stmt->fetch()) {
        $count++;
        echo "<tr><td>" . $row["name"] . "</td><td> " . $row["comments"] . "</td><td> " . $row["location"] . "</td><td> " . $row["category"] . "</td><td> " . $row["price"] . "</td>";
        echo "<td><form id= \"$FormName\" method=\"post\" action=\"contactCustomer.php\">
    <input type=\"hidden\" name=\"name\" value=" . $row["name"] . ">
    <input name=\"submit\" type=\"submit\" value=\"Contact Seller\">
    </form></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>
</body>
</html>