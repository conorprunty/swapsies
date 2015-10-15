<?php 

// set database server access variables: 
$host = "localhost"; 
$user = "root"; 
$pass = "root"; 
$db1 = "mainDB";



// open connection 
$connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!"); 

// select database 
mysql_select_db($db1) or die ("Unable to select database!"); 

// create query 
$query = " 
            SELECT name, comments, location, category, price
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

<?php

// free result set memory 
mysql_free_result($result); 

// close connection 
mysql_close($connection); 

?>