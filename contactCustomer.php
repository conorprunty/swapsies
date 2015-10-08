<?php

require("common.php"); 
     
    // Check whether user is logged in
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, redirect to the login page. 
        header("Location: index.php"); 
         
        // this statement is needed 
        die("Redirecting to index.php"); 
    } 

$userName = $_POST['name'];
$userEmail = "SELECT email 
                FROM users
                WHERE name='$userName'
                INNER JOIN advert 
                ON username = name";


//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
  //Email information
  //$admin_email = "conorprunty1@gmail.com";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  
  //send email - To, Subject, Message, From (etc)
  mail($admin_email, "$subject", $comment, "From:" . $email);
  
  //Email response
  // If they are not, redirect to the login page. 
        header("Location: index.php"); 
         
        // this statement is needed 
        die("Redirecting to index.php");
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>

 <form method="post">
  Your Email: <input name="email" type="text" /><br />
  Subject: <input name="subject" type="text" /><br />
  Message:<br />
  <textarea name="comment" placeholder="Enter your message here..." rows="15" cols="40"></textarea><br />
  <input type="submit" value="Submit" />
  </form>
  


<?php
      echo $userName;
      echo $userEmail;
  }
?>