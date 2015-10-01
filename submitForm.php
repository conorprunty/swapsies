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


$name = $_SESSION['user'];
$sql = "INSERT INTO advert (name, comments, location, category, price)
VALUES ('$name', '$_POST[comments]', '$_POST[location]', '$_POST[category]', '$_POST[price]')";

if ($conn->query($sql) === TRUE) {
        //$message = "Ad successfully submitted!";
        //echo "<script type='text/javascript'>alert('$message');</script>";
    
        header("Location: searchTable.php"); 
    
         
        // this statement is needed 
        die("Redirecting to searchTable.php"); 
    

    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

        

$conn->close();
?>

