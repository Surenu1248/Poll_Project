<?php
include 'mysqlCon.php'; 
 if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // collect value of input field
  
  $pollId = $_GET['pollId'];
 }
 

?>
<body>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<header class="show_hdr">  
		<h1 for="pollId">You have selected the Poll_ID : <?php echo $pollId;?></h1>
		<input type ="hidden" name="pollId" value="<?php echo $pollId;?>"/>
	</header>

	<div class="show_poll">
		<form id = "s_frm" method ="post" action="/poll/submitPoll.php">
		  <input type ="hidden" name="pollId" value="<?php echo $pollId;?>"/>
		  <label for="pQues">Poll Question  :</label> 
		  <?php
		     $sql="select distinct(pollQues) as pollQues,pollOption from poll where pollId=".$pollId.";";
			// echo $sql;
			$res=$con->query($sql);
			$pollQues="";
			$f=true;
			while($row=$res->fetch_assoc()) {
			//echo $row['pollQues'];
			if($f==true)
		     echo	$row['pollQues']."<br>";
			 $f=false;
		 
		     echo "<input type = 'Radio' Name ='pollOption' value= '".$row['pollOption']."'>".$row['pollOption']."</input><br>";
				
			} 
			 
		  

		  ?>
		 
		  <br><br><input id = "sbt" type="submit" value="Submit">
		</form>
	</div>
</body>