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
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="main.js"></script>
    

    <title>Test Page</title>
</head>

<body>
    
    <div id="hmenu"> 
        <ul> 
          <li><a href="mainmenu.php">Homepage</a></li> 
        </ul>   
    </div>
    
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
            <p>Search by category</p>
            <select name='categorySelect'>
                <option value="" selected>Select All</option>
                <option value="cars">Cars</option>
                <option value="music">Music</option>
                <option value="goods">Goods</option>
                <option value="other">Other</option>
            </select>
            <br>
            <button> Submit </button>
        </form>
    
    <table>
    </table>
    


</body>
</html>