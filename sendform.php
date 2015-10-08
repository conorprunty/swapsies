<?php
/*
* sendform.php *
*
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
    <script src="main.js"></script>
    

    <title>Test Page</title>
</head>

<body>
    
<form action="/cgi-sys/FormMail.cgi" method="post">
<input type="hidden" name="recipient" value="conorprunty1@gmail.com">
<input type="hidden" name="subject" value="Form Submission">
<input type="hidden" name="redirect" value="adverts.php">
Your name: <input type="text" name="realname" size="50" maxlength="100">
Your email address: <input type="text" name="email" size="50" maxlength="100">
Your comments: <input type="textarea" cols="40" rows="5" name="comments"><textarea>
    </textarea>
    <button> Submit </button>
    </form>

</body>
</html>