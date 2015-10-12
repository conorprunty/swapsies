<?php
/*
* profile.php *
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

//get user's name from the logged in username
$name = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');

//get all options based on user name
$allOpt = "SELECT entryNo FROM advert WHERE name = '$name'";
$results = mysql_query($allOpt);

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
         
         
        try 
        { 
            // run query
                $stmt = $db->prepare($query); 
                $result = $stmt->execute($query_params); 
                $row = $stmt->fetch(); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 


    
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <title>Profile</title>
</head>

<body>
    <div id="hmenu"> 
        <ul> 
          <li><a href="mainmenu.php">Homepage</a></li> 
          <li><a href="searchTable.php">View Ads</a></li> 
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li> 
        </ul>   
    </div>
    
    <h2>Your ads</h2>

    <?php 

                                if($row)
                                {
                                    echo "<table><tr><th>Ad Number</th><th>Comments</th><th>Location</th><th>Category</th><th>Price</th></tr>";
                                    $count = 1;
                                    // output data of first row
                                    echo "</td><td> " . $row["entryNo"]. "</td><td> " . $row["comments"]. "</td><td> " . $row["location"]. "</td><td> " . $row["category"]. "</td><td> " . $row["price"]. "</td></tr>";
                                    // output data of next rows
                                    while($row = $stmt->fetch()) {
                                        $count++;
                                        echo "</td><td> " . $row["entryNo"]. "</td><td> " . $row["comments"]. "</td><td> " . $row["location"]. "</td><td> " . $row["category"]. "</td><td> " . $row["price"]. "</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "0 results";
                                }
                            
                            ?>
    
    <h2> Have you any ads that you wish to delete?</h2>
    <!-- the onsubmit asks a Yes/No question before proceeding -->
        <form action="deleteOpt.php" method="post" onsubmit="return confirm('Are you sure? This cannot be undone!');">
        Please select by the ad number:<br>
        <select name="deleteOption">
            <!-- Need this to get the first item -->

            <option value="<?php echo $row1['entryNo'];?>">
                <?php echo $row1['entryNo'];?>
            </option><?php while ($row1 = $stmt1->fetch()) { 
                                ?>
            <!-- This gets all the rest of the rows in a loop -->

            <option value="<?php echo $row1['entryNo'];?>">
                <?php echo $row1['entryNo'];?>
            </option><?php 
                            }
                            ?>
        </select><br>
        <button>Submit</button>
    </form>
</body>
</html>