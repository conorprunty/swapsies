<?php
/*
 * adverts.php *
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
    
    
    $query = " 
            SELECT entryNo, comments, location, category, price
            FROM advert
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

    <title>Test Page</title>
</head>

<body>
    
    <div id="hmenu"> 
        <ul> 
          <li><a href="mainmenu.php">Homepage</a></li> 
        </ul>   
    </div>
    
    <?php
if ($row) {
    echo "<table><th>For Barter</th><th>Location</th><th>Category</th><th>Price</th>></tr>";
    $count = 1;
    // output data of first row
    echo "<tr><td> " . $row["comments"] . "</td><td> " . $row["location"] . "</td><td> " . $row["category"] . "</td><td> " . $row["price"] . "</td></tr>";
    // output data of next rows
    while ($row = $stmt->fetch()) {
        $count++;
        echo "<tr><td> " . $row["comments"] . "</td><td> " . $row["location"] . "</td><td> " . $row["category"] . "</td><td> " . $row["price"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>
</body>
</html>