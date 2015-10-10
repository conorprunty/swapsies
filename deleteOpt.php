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

$opt = $_POST['deleteOption'];
$sql = "DELETE FROM advert WHERE entryNO = '$opt'";

if ($conn->query($sql) === TRUE) {
    
        header("Location: profile.php"); 
    
         
        // this statement is needed 
        die("Redirecting to profile.php"); 
    

    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        

$conn->close();
?>

