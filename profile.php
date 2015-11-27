<?php
	/*
* profile.php *
*@ author Conor Prunty, Kevin Clarke
*/
	// connect to DB
	require("common.php");
	// Check whether user is logged in
	
	if(empty($_SESSION['user']))     {
		// If they are not, redirect to the login page. 
		header("Location: index.php");
		// this statement is needed 
		die("Redirecting to index.php");
	}

	//get user's name from the logged in username
	$name = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');
	//get all options based on user name
	$allOpt = "SELECT entryNo FROM advert WHERE name = '$name'";

	$stmt1 = $db->prepare($allOpt);
	$results = $stmt1->execute($query_params);
	$row1 = $stmt1->fetch();
	$query = " 
            SELECT 
                entryNo, comments, location, category, price
            FROM advert
            WHERE name = '$name'
            ORDER BY entryNo DESC;
        ";
	try         {
		// run query
		$stmt = $db->prepare($query);
		$result = $stmt->execute($query_params);
		$row = $stmt->fetch();
	}

	catch(PDOException $ex)         {
		die("Failed to run query: " . $ex->getMessage());
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
      <img class ="logo img-responsive space"  src="swirl.png" align="middle" alt="Swapsies Logo" style="width:50px;height:50px;">
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
    <div align='center' id='tablediv'>
    <?php 
	
	if($row)                                {
		echo "<table class='fulltable'><tr><th>AD NUMBER</th><th>FOR BARTER</th><th>LOCATION</th><th>CATEGORY</th><th>VALUE</th></tr>";
		$count = 1;
		// output data of first row
		echo "</td><td> " . $row["entryNo"]. "</td><td> " . $row["comments"]. "</td><td> " . $row["location"]. "</td><td> " . $row["category"]. "</td><td>€" . $row["price"]. "</td></tr>";
		// output data of next rows
		while($row = $stmt->fetch()) {
			$count++;
			echo "</td><td> " . $row["entryNo"]. "</td><td> " . $row["comments"]. "</td><td> " . $row["location"]. "</td><td> " . $row["category"]. "</td><td>€" . $row["price"]. "</td></tr>";
		}

		echo "</table>";
	} else {
		echo "You have not submitted any ads!";
	}

	?>
        </div>
        <div id='deleteads'>  <p> Unwanted ad? </p>
       <p> Delete it!</p>
    <!-- the onsubmit asks a Yes/No question before proceeding -->
        Select ad number:
        <br>
        <br>
        <div align='center'>
        <form action="deleteOpt.php" method="post" onsubmit="return confirm('Are you sure? This cannot be undone!');">
        <select name="deleteOption">
            <!-- Need this to get the first item -->
            <option value="<?php  echo $row1['entryNo']; ?>">
                <?php  echo $row1['entryNo']; ?>
            </option><?php  while ($row1 = $stmt1->fetch()) { ?>
            <!-- This gets all the rest of the rows in a loop -->
            <option value="<?php  echo $row1['entryNo']; ?>">
                <?php  echo $row1['entryNo']; ?>
            </option><?php  } ?>
        </select><br><br>
        <input id='deleteBtn' type="image" src="deleteBtn.png" id="input-default" data-toggle="tooltip" data-placement="bottom" title="Click to delete ad!" />
            </div>
    </form></div>
</body>
</html>