<?php
/*
* insert.php *
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

$name = $_SESSION['user'];
    
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <title>Insert</title>
</head>

<body>

    <div align='center'> 
        <form action="submitForm.php" method="post">
            Name:<br>
            <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>
            
            
            <!--<select name='name'>
                <option value="name"></option>
            </select>-->
            
            
            
            
            <!--<textarea readonly name="name"><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></textarea>-->
            
            
            <!--<input type="text" name="name" value="">-->
            
            
            <!--<?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>-->
            
            
            <br>
            Comment<br>
            <input type="text" name="comments" value="">
            <br>
            Location:<br>
            <select name='location'>
                <option value="leinster">Leinster</option>
                <option value="munster">Munster</option>
                <option value="connacht">Connacht</option>
                <option value="ulster">Ulster</option>
            </select>
            <br>
            Category:<br>
            <select name='category'>
                <option value="cars">Cars</option>
                <option value="music">Music</option>
                <option value="goods">Goods</option>
                <option value="other">Other</option>
            </select>
            <br>
            Price:<br>
            <select name='price'>
                <option value="0-19">$0 - $19.99</option>
                <option value="20-39">$20 - $39.99</option>
                <option value="40-59">$40 - $59.99</option>
                <option value="60+">$60+</option>
            </select>
            <br><br>
            <input type="submit" value="Submit">
        </fieldset>
</form>
        
    </div>
    
    
</body>
</html>