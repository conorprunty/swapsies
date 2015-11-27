<?php
	/*
* insert.php *
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

	//takes name from logged in username
	$name = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');
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
				<img class="logo img-responsive space" src="swirl.png" align="middle" alt="Swapsies Logo" style="width:50px;height:50px;">
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="mainmenu.php">Home</a>
					</li>
					<li><a href="searchTable.php">Search Ads</a>
					</li>
					<li><a href="comments.php">Comments</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a>
					</li>
					<li><a href="contactus.php"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a>
					</li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div>
		<img class="logo img-responsive" src="SLogoCutTxt.png" align="middle" alt="Swapsies Logo" style="width:125;height:100px;">
	</div>
	<div align='center'>
	</div>
	<div class="col-md-offset-4 col-md-4">
		<div class="panel-default">
			<div class="panel-heading text-center">
				<div class="panel-body">
					<form action="submitForm.php" method="post">
						<label>Username:</label>
						<?php echo (htmlentities($_SESSION[ 'user'][ 'username'])); ?>
						<input type="hidden" name="name" value="<?php  echo $name ?>" />
						<br>
						<label>Description</label>
						<textarea class="form-control" name="comments" rows="3" id="comment" placeholder="Enter your ad here..." maxlength="250"></textarea>
						<br>
						<div class="form-group">
							<label for="sel1">Location</label>
							<select class="form-control" id="sel1" name='location'>
								<option value="leinster">Leinster</option>
								<option value="munster">Munster</option>
								<option value="connacht">Connacht</option>
								<option value="ulster">Ulster</option>
							</select>
						</div>
						<div class="form-group">
							<label for="sel1">Category</label>
							<select class="form-control" id="sel1" name='category'>
								<option value="cars">Cars</option>
								<option value="music">Music</option>
								<option value="goods">Goods</option>
								<option value="other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<label for="sel1">Value</label>
							<select class="form-control" id="sel1" name='price'>
								<option value="0-19">€0-19.99</option>
								<option value="20-39">€20-39.99</option>
								<option value="40-59">€40-€59.99</option>
								<option value="60+">€60+</option>
							</select>
							<br>
							<label>What will you barter?</label>
							<textarea class="form-control" name="WillAccept" maxlength="250" placeholder="I will accept..." rows="3" id="comment" placeholder="Enter your ad here..."></textarea>
						</div>
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>