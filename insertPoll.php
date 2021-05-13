


<?php

include 'mysqlCon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  
  $pollId = $_POST['pollId'];
  $pQues=$_POST['pQues'];
  $pOptions=$_POST['options'];
   $cnt=0;
 
  $opt=explode(',',$pOptions);
  foreach($opt as $op) {
	  
  $sql="insert into poll(pollQues,pollId,pollOption,cnt) values(?,?,?,?)";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("ssss",$pQues, $pollId, $op,$cnt);
  $stmt->execute();
	  
  } 
  
  
  
$con->close();
 
}


?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<script type="text/javascript">
  alert("You have created the poll successfully...")
</script>
<body>
  <div class="poll_created">
    <h1> You can select the following poll which you have created.</h1> 
    <h1>Poll created with : <a href="/poll/showPoll.php?pollId=<?php echo $pollId; ?>"><?php echo $pollId; ?></a></h1>
  </div>
</body>
</html>
