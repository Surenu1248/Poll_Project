<?php
include 'mysqlCon.php'; 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  
  $pollId = $_POST['pollId'];
   $pollOption = $_POST['pollOption'];
   if($pollOption=='') {
	echo "Please select one option";
return;
	
   }
 
  $sql="update poll set cnt=cnt+1 where pollId=".$pollId." And pollOption='".$pollOption."';";
 // echo $sql;
  $res=$con->query($sql);
  if($res)
  {
    echo "<script> alert('Your response has been submitted successfully...')</script>";
    ?>
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <div id ='sb_poll'>
    <?php
	   echo "<h3>You can checkout the results of Poll_ID <a href='/poll/showResPoll.php?pollId=".$pollId."'>".$pollId." </a> here.</h3>";
  }
   else echo "error";
 }
 


?>