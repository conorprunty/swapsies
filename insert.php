<?php
/*
* insert.php *
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

    <title>Insert</title>
</head>

<body>

    <div align='center'> 
        <form action="submitForm.php" method="post">
        <fieldset>
            <legend>Input</legend>
            Name:<br>
            <input type="text" name="name" value="">
            <br>
            Comment<br>
            <input type="text" name="comments" value="">
            <br><br>
            <input type="submit" value="Submit">
        </fieldset>
</form>
        
    </div>
    
    
</body>
</html>