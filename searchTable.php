<?php
/*
* searchTable.php *
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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

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
      <img class ="logo img-responsive space"  src="swirl.png" align="middle" alt="Swapsies Logo" style="width:50px;height:50px;">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="mainmenu.php">Home</a></li>
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
    
     <div>
            <img class ="logo img-responsive"  src="SLogoCutTxt.png" align="middle" alt="Swapsies Logo" style="width:125;height:100px;">
</div>
 <div align='center'>
        <div class="col-md-offset-4 col-md-4">
            <div class="panel-default">
            <div class="panel-heading text-center">
            <div class="panel-body">   
   
                
                
<form method="post" action="populateTable.php">
    
    <div class="form-group">
    <label>Search by location</label><br>
            <select class="form-control"name='locationSelect'>
                <option value="" selected>Select All</option>
                <option value="leinster">Leinster</option>
                <option value="ulster">Ulster</option>
                <option value="connacht">Connacht</option>
                <option value="munster">Munster</option>
    </select>
    </div>
    
    <div class="form-group">

        <label>Search by category</label>
            <select class="form-control" name='categorySelect'>
                <option value="" selected>Select All</option>
                <option value="cars">Cars</option>
                <option value="music">Music</option>
                <option value="goods">Goods</option>
                <option value="other">Other</option>
            </select>
    </div>

    <div class="form-group">
        <label>Search by value:</label>

            <select class="form-control" name='priceSelect'>
                <option value="" selected>Select All</option>
                <option value="0-19">€0-€19.99</option>
                <option value="20-39">€20-€39.99</option>
                <option value="40-59">€40-€59.99</option>
                <option value="60+">€60+</option>
            </select>
    </div>
            <br>
             <button>SEARCH</button>
        </form>
    
    <table>
    </table>
    
                </div>
                </div>
            </div>
    
     </div>
     
    </div>
    

</body>
</html>