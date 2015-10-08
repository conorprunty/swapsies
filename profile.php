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

$name = htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8');
$optOne = "SELECT entryNO FROM advert WHERE entryNo='2'";

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
    <p>Your ads</p>

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