<?php
/*
* searchTable.php *
*
*/ 
    // connect to DB
    require("common.php"); 
     

    
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
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span>Log In</a></li>
      </ul>
    </div>
  </div>
</nav>
    
<form method="post" action="adverts.php">
                Search by location:<br>
            <select name='locationSelect'>
                <option value="" selected>Select All</option>
                <option value="leinster">Leinster</option>
                <option value="ulster">Ulster</option>
                <option value="connacht">Connacht</option>
                <option value="munster">Munster</option>
            </select>
            <br>
            <p>Search by category:</p>
            <select name='categorySelect'>
                <option value="" selected>Select All</option>
                <option value="cars">Cars</option>
                <option value="music">Music</option>
                <option value="goods">Goods</option>
                <option value="other">Other</option>
            </select>
            <br>
            <p>Search by value:</p>
                <select name='priceSelect'>
                    <option value="" selected>Select All</option>
                    <option value="0-19">$0 - $19.99</option>
                    <option value="20-39">$20 - $39.99</option>
                    <option value="40-59">$40 - $59.99</option>
                    <option value="60+">$60+</option>
                </select>
                <br>
            <button> Submit </button>
        </form>
    
    <table>
    </table>
    


</body>
</html>