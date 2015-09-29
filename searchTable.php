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
            FROM advert
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
            
    } 
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="main.js" type="text/javascript"></script>
    

    <title>Adverts</title>
</head>

<body>
    
    <div>
        <h2> Location </h2>
        <form action="searchTable.php">
                <select name='locationOption'>
                    <option><i>select...</i></option>
                      <option value="leinster">Leinster</option>
                      <option value="ulster">Ulster</option>
                      <option value="munster">Munster</option>
                      <option value="connacht">Connacht</option>
                </select><br><br>
            <button> Submit </button>
        </form>
        
    
    </div>
    
    
    <div id='allAds' align='center'>

  
                <br>

                <h1>Adverts</h1><br>
        
        
                <br>
                

    </div>
</body>
</html>