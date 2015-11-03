<?php

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

//take user name and use it to get the correct user's email address for sending the email
$userName = $_POST['name'];

$userEmail = "SELECT email FROM users WHERE username = '$userName'";

try 
        { 
            // run query
                $stmt = $db->prepare($userEmail); 
                $result = $stmt->execute(); 
                $row = $stmt->fetch(); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 


//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
  //Email information
  //$admin_email = "conorprunty1@gmail.com";
  $email = "admin@swapsies.eu";
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  
  //send email - To, Subject, Message, From (etc)
  mail($row["email"], "$subject", $comment, "From:" . $email);
  
  //JS to let user know the mail has been sent

        ?>
            <script type="text/javascript">
            alert("Mail sent!");
            window.location.href = "populateTable.php";
            </script>
        <?php
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="../css/style.css" rel="stylesheet" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <title>Profile</title>
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
        
        <li><a href="searchTable.php">Search Ads</a></li>
          <li><a href="comments.php">Comments</a></li> 
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

 <form method="post">
  Your Email: <input name="email" type="text" /><br />
  Subject: <input name="subject" type="text" /><br />
  Message:<br />
  <textarea name="comment" placeholder="Enter your message here..." rows="15" cols="40"></textarea><br />
  <input type="submit" value="Submit" />
  </form>
  


<?php
      echo $row["email"];
  }
?>