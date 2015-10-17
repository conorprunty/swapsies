<?php
/*
* comments.php *
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
  <head>
    <title>Comments</title>
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <script type="text/javascript" 
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" 
            src="./easy-comment/jquery.easy-comment.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function(){
    // Your other javascript code if any

    $("#id_of_your_comment_container").EasyComment({
      path:"easy-comment/", //Change it to the folder where you put the easycomment files
      moderate:false,
      maxReply:5
    });
    // Your other javascript code if any
    });
    </script>
  </head>
  <body>
    <div id="id_of_your_comment_container" style="width:1024px;height:800px;"></div>
      
      
      <!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1445081423392");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end www.htmlcommentbox.com -->
  </body>
</html> 