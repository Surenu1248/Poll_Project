<?php
session_start();
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
<header class="fn_hdr">
	 <label for="pollId">You have selected the results of Poll ID :</label> <?php echo $pollId;?>
	<input type ="hidden" name="pollId" value="<?php echo $pollId;?>"/>
</header>
<form method ="post" action="/poll/submitPoll.php">
		<input type ="hidden" name="pollId" value="<?php echo $pollId;?>"/>
	  <div class="res">
	  <b><label for="pQues">Poll Question  :</label> 
	  <?php
	     $sql="select distinct(pollQues) as pollQues from poll where pollId=".$pollId.";";

		// echo $sql;
		$res=$con->query($sql);
		$pollQues="";
		$f=true;
		while($row=$res->fetch_assoc()) {
		//echo $row['pollQues'];
		
	     echo	$row['pollQues']."<br>";
		 
		}
		?>
		</b>

		<?php
		   $sql="select pollOption,cnt from poll where pollId=".$pollId.";";
		$res=$con->query($sql);
		$copyres = $con->query($sql);
		$max = 0;
		while($row1=$copyres->fetch_assoc()) {
		//echo $row['pollQues'];
		
	     if($row1['cnt']>$max)
	     {
	     	$max= $row1['cnt'];
	     }
		}
		$res=$con->query($sql);
		while($row=$res->fetch_assoc()) {
		//echo $row['pollQues'];
		if($row['cnt'] == $max)
		{
	     echo	"<b style = 'color:green; font-size:30px;'>".$row['pollOption']." &#8594; ".$row['cnt']."<br></b>";
		}
		else
			echo	$row['pollOption']." &#8594; ".$row['cnt']."<br>";
		 
		}

  ?>
</div>
</form>
</body>