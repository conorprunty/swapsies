<?php 
/*
* register.php *
*
* @reference (PHP) http://forums.devshed.com/php-faqs-stickies-167/program-basic-secure-login-system-using-php-mysql-891201.html *
*/  
    // get connection to DB
    require("common.php"); 
     
    //check if form has been submitted, if not form is displayed
    if(!empty($_POST)) 
    { 
        // if username is empty, tell user to submit proper username
        if(empty($_POST['username'])) 
        { 
            //error handling 
            die("Please enter a username."); 
        } 
         
        // make sure user enters not-empty password
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
         
        // check for valid email address
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        // SQL query to check if username already taken 
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        "; 
         
        // this is the token for the username - this is used to 
        // prevent sql injection attacks.
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // query the database
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        {  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // fetch returns an array representing the next row or false for no rows
        $row = $stmt->fetch(); 
         
        // If a row is returned, then the email is in use
        if($row) 
        { 
            die("This username is already in use"); 
        } 
         
        // check same for email
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
        // Insert details into DB 
        $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email 
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email 
            ) 
        "; 
         
        // generate salt to help with hashing password
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        // This hashes the password with the salt for security
        $password = hash('sha256', $_POST['password'] . $salt); 
         
        // Next we hash the hash value 65536 more times.  The purpose of this is to 
        // protect against brute force attacks.  Now an attacker must compute the hash 65537 
        // times for each guess they make against a password, whereas if the password 
        // were hashed only once the attacker would have been able to make 65537 different  
        // guesses in the same amount of time instead of only one. 
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
         
        // Here we prepare our tokens for insertion into the SQL query.  We do not 
        // store the original password; only the hashed version of it. 
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            // Execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        {  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        ?>
        <script type="text/javascript">
            alert("Thank you for registering! Please click OK to go to login page.");
            window.location.href = "index.php";
            </script>
<?php
    } 

     
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="../css/style.css" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title>Swapsies</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Swapsies</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="mainmenu.php">Home</a></li>
        
          <li><a href="commentsGuest.php">Comments</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="contactus.php"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Log In</a></li>
      </ul>
    </div>
  </div>
</nav>
    <div align='center'>
        
        
     
            
<div class="row">
    
<div class="col-md-offset-4 col-md-4">
<div class="panel-default">
<div class="panel-body">
       
<form action="register.php" method="post">
    
<div class="input-group"> 
<span class="input-group-addon"><i class="fa fa-user"></i></span>
    
<input name="username"class = "form-control" id ="input-default" type="text" placeholder= "Username" value=""></div><br>

                
<div class="input-group"> 
<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>   
    
<input name="password" class= "form-control" id ="input-default" type="password" placeholder="Password" value=""></div><br>
    
<div class="input-group"> 
<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>    
                
<input name="email" class = "form-control" id="input-default" type="text" placeholder="Email" value=""></div>
    
                <br>
                <br>
    <div class="btn-group open">
        

  <input class="btn btn-primary" type="submit" class= "form-control" id="input-default" data-toggle="tooltip" data-placement="top" title="Click here!" value="Register">
</form>
</div>
</div>
</div>
</div>
        


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>