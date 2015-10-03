<?php
$username = "root";
$password = "root";
$host = "localhost";
$dbname = "mainDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT 
                entryNo, comments, location, category, price
            FROM advert";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<table><tr><th>Comments</th><th>Location</th><th>Category</th><th>Price</th></tr>";
                                $count = 1;
                                // output data of first row
                                echo "<tr><td> " . $row["comments"]. "</td><td> " . $row["location"]. "</td><td> " . $row["category"]. "</td><td> " . $row["price"]. "</td></tr>";
                                // output data of next rows
                                while($row = $stmt->fetch_assoc()) {
                                    $count++;
                                    echo "<tr><td>" . $row["name"]. "</td><td> " . $row["comments"]. "</td><td> " . $row["location"]. "</td><td> " . $row["category"]. "</td><td> " . $row["price"]. "</td></tr>";
                                }
                                echo "</table>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>