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



    
        

$conn->close();
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

<select name="owner">
<?php 
$sql = mysql_query("SELECT name FROM users");
while ($row = mysql_fetch_array($sql)){
echo "<option value=\"owner1\">" . $row['name'] . "</option>";
}
?>
</select>



</body>
</html>
