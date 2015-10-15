<?php 

// set database server access variables: 
$host = "localhost"; 
$user = "root"; 
$pass = "root"; 
$db = "mainDB";



// open connection 
$connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!"); 

// select database 
mysql_select_db($db) or die ("Unable to select database!"); 

// create query 
$query = "SELECT name, comments, location, category, price FROM advert"; 
//$query = "SELECT name FROM advert";


// execute query 
$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 

// see if any rows were returned 
if (mysql_num_rows($result) > 0) { 
    // yes 
    // print them one after another
    echo "<table border='1'><tr><th>Name</th><th>For Barter</th><th>Location</th><th>Category</th><th>Price</th><th>Contact</th></tr>";

    echo "<tr><td> Test note</td><td> " . $row["comments"] . "</td><td> " . $row["location"] . "</td><td> " . $row["category"] . "</td><td> " . $row["price"] . "</td></tr>";

    
    echo "</table>";
} else {
    echo "0 results";
}

// close connection 
mysql_close($connection); 

?>