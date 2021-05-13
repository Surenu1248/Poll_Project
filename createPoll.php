<?php



?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<div id="hd">
		<h2>Create your custom poll</h2>
	</div>
	<div class="frm">
	<form method ="post" action="/poll/insertPoll.php">
	     <b><label for="pollId" >Enter Poll ID :</label></b>
		 <input type="text" id="pollId" name="pollId" placeholder="Enter the Poll_ID"><br><br>

		  <b><label for="pQues">Enter Poll Question :</label></b><br>
		  <textarea rows=4 cols=50 id="pQues" name="pQues" placeholder="Enter the Poll Question..."></textarea><br><br>
		  <b><label for="options">Enter your options :</label></b><br>
		  <textarea rows=4 cols=40 id="options" name="options" placeholder="Please provide the options with (,) seperated..."></textarea><br><br>
		  <input type="submit" value="Submit">
	</form>
</div>

</html>