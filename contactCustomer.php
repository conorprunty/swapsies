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
  
  //Email response
  // If they are not, redirect to the login page. 
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
<link href="css/style.css" rel="stylesheet" type="text/css">
<div id="hmenu"> 
        <ul> 
          <li><a href="mainmenu.php">Homepage</a></li> 
          <li><a href="searchTable.php">View Ads</a></li> 
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li> 
        </ul>   
    </div>

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