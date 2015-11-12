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
       <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
       
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
                  <li><a href="insert.php">Create Ad</a></li>
                  <li><a href="comments.php">Comments</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                   <li><a href="contactus.php"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <div align='center'>
      <br>
      <div class="panel panel-default">
         <div class="panel-body">
            <div class="row">
               <div class="col-md-4">
                  <div class="panel panel-default">
                     <div class="panel-body">
                        <a href="insert.php" class="btn btn-primary btn-lg btn-block" id="input-default" data-toggle="tooltip" data-placement="top" title="Have something to barter?">CREATE ADS</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="panel panel-default">
                     <div class="panel-body">
                        <a href="searchTable.php" class="btn btn-primary btn-lg btn-block" id="input-default" data-toggle="tooltip" data-placement="top" title="Search existing ads!">SEARCH ADS</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="panel panel-default">
                     <div class="panel-body">
                        <a href="profile.php" class="btn btn-primary btn-lg btn-block" id="input-default" data-toggle="tooltip" data-placement="top" title="View your own ads!">PROFILE</a>
                     </div>
                  </div>
               </div>
                
                <form method="get" action="http://www.google.com/search">
                    <div>
                        <input type="text" name="q" size="25" style="color:#808080;"
                        maxlength="255" placeholder="Google search..."
                        onfocus="if(this.value==this.defaultValue)this.value=''; this.style.color='black';" onblur="if(this.value=='')this.value=this.defaultValue; "/>
                        <input type="submit" value="Search" />
                        <input type="hidden" name="sitesearch" />
                     </div>
                </form>
            </div>
         </div>
         <br><br>
               <div class="panel panel-default">
                  <div class="panel-body">
                     <a class="twitter-timeline" href="https://twitter.com/SwapsiesEire"  width="500"
                        height="250" data-widget-id="655332187609432064">Tweets by @SwapsiesEire</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                  </div>
               </div>
            </div>
         </div>
         <div class="btn-group open">
            <a class="btn btn-success" href="http://www.facebook.com"><i class="fa fa-facebook-official fa-4x"></i></a>
            <a class="btn btn-primary" href="http://www.twitter.com"><i class="fa fa-twitter-square fa-4x"></i></a>
            <a class="btn btn-danger" href="http://www.linkedin.com"><i class="fa fa-linkedin fa-4x"></i></a>
         </div>
      </div>
   </body>
</html>