<?php
/*
* mainmenu.php *
*/ 
    // connect to DB
    require("common.php"); 
     
    // Check whether user is logged in
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, redirect to the login page. 
        header("Location: index.php"); 
         
        // this statement is needed 
        die("Redirecting to index.php"); 
    }    
    
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <title>Swapsies</title>
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
    
    <div align='center'> 
        <img src="../images/NameSwapping.png" alt="Header Test" style="width:304px;height:228px;">
        <p> This is our slogan</p>
        
        <a href="insert.php">Submit ad</a>
        <br>
        <br>
        
        <a href="searchTable.php">view ads</a>
        <br>
        <br>
        
    
    <a href="logout.php">Logout</a>
        
    </div>
    
    
</body>
</html>