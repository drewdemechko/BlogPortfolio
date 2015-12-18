<!DOCTYPE html>
<!--This is the home page of the blog/portfolio website-->
<html>
<!--This is -->
	<?php 
	//This includes the navigation code that will be
	//included on all pages
	include 'nav.php';
	include 'dbconnection.php';
	?>
	<body>
	<a action=""></a>
	<?php
	//If post is set send form data to database
	if(!empty($_POST))
	{
	$title = $_POST['txtTitle'];
	$entry = $_POST['txtAddEntry'];
	$type = $_POST['lstType'];
	$currDate = date('Y-m-d');
	
	mysqli_query($dbconn,
	"INSERT INTO blogentries
	VALUES('$title','$entry','$currDate','$type')");
	}
	
	//Load blog entries from database
	$entries = mysqli_query($dbconn, 
	"SELECT title, date, entry
	FROM blogentries
	ORDER BY date");
	
	//Fetch all entries and store in temp array rows
	while($row = mysqli_fetch_array($entries))
	{
	//echo blog entries to page
	echo "<div class='entry'><h3>$row[0]</h3><p>Date Posted: <i>$row[1]</i></p><br><br>$row[2]</div>";
	}
	
	?>
	
		<form method="post" action="#">
		<input type="text" class="input" id="txtTitle" name="txtTitle" value="Enter Title Here"/>
		<div class="input">Type: <select class="input" name="lstType">
		<option value="sports">Sports</option>
		<option value="software">Software</option>
		</select></div>
		<textarea class="input" id="txtAddEntry" name="txtAddEntry" rows="20">Start Blogging..</textarea>
		<input type="submit" name="btnAddEntry" id="btnAddEntry" onclick="" value="Add Entry">
		</form>
	</body>
	
</html>