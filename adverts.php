<?php
/*
* adverts.php *
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
    else
    {
     //get score from DB for leaderboard
       $query = " 
            SELECT 
                name,
                comments,
                location,
                category,
                price
            FROM advert;
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
            
    } 
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript">
        var name = <?php echo $row["name"];?>;
        var comments = <?php echo $row["comments"];?>;
    </script>

    <title>Adverts</title>
</head>

<body>
    <div align='center'>

  
                <br>

                <h1>Adverts</h1><br>
                <br>
                <?php 
                            if($row)
                            {
                                echo "<table><tr><th>Name</th><th>Comments</th><th>Location</th><th>Category</th><th>Price</th></tr>";
                                $count = 1;
                                // output data of first row
                                echo "<tr><td>" . $row["name"]. "</td><td> " . $row["comments"]. "</td><td> " . $row["location"]. "</td><td> " . $row["category"]. "</td><td> " . $row["price"]. "</td></tr>";
                                // output data of next rows
                                while($row = $stmt->fetch()) {
                                    $count++;
                                    echo "<tr><td>" . $row["name"]. "</td><td> " . $row["comments"]. "</td><td> " . $row["location"]. "</td><td> " . $row["category"]. "</td><td> " . $row["price"]. "</td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                        
                        ?>

    </div>
</body>
</html>