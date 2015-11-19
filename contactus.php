<?php

    // connect to DB
    require("common.php"); 
     



//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
  //Email information
  $admin_email = "conorprunty1@gmail.com";
  $email = "admin@swapsies.eu";
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  
  //send email - To, Subject, Message, From (etc)
  mail("$admin_email", "$subject", $comment, "From:" . $email);
  
  //JS to let user know the mail has been sent

        ?>
            <script type="text/javascript">
            alert("Mail sent to admin!");
            window.location.href = "mainmenu.php";
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
    <link href="css/style.css" rel="stylesheet" type="text/css">

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
      <img class ="logo img-responsive space"  src="swirl.png" align="middle" alt="Swapsies Logo" style="width:50px;height:50px;">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">

        <li><a href="mainmenu.php"><span class="glyphicon glyphicon-log-in"></span>Home</a></li>
      </ul>
    </div>
  </div>
</nav>

     <div>
            <img class ="logo img-responsive"  src="SLogoCutTxt.png" align="middle" alt="Swapsies Logo" style="width:125;height:100px;">
</div>
        
 <div align='center'>
        <div class="col-md-offset-4 col-md-4">
            <div class="panel-default">
            <div class="panel-heading text-center">
            <div class="panel-body">   
   
   <form method="post"> 
    <div class="form-group">

        <label for="email">Your Email</label>
     <input type="email" class="form-control" name="email" id="email">
  </div>
        <label for="subject">Subject</label>
     <input type="text" class="form-control" name="subject" id="subject">
  </div>
     <label for="comment">Comment</label>
    <textarea class="form-control" name="comment" maxlength="250" placeholder="Enter comment(s) here..." rows="3" id="comment"></textarea>
                <br>
                <button type="submit" value="Submit" class="btn btn-default">Submit</button>
  </div>
  
  
  
                  

                </div>
            </div>
        </div>
    
     </form>
    

    </body>

<?php
      
  }
?>