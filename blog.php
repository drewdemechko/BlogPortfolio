<!DOCTYPE html>
<!--This is the home page of the blog/portfolio website-->
<html>
<!--This is -->
	<div class="container">
	<?php 
	//This includes the navigation code that will be
	//included on all pages
	include 'nav.php';
	include 'dbconnection.php';
	?>
	<body>
	<form method="post" action="#">
		<input type="text" class="input" id="txtSearch" name="txtSearch"/>
		<input style="float:right-center;" type="submit" name="btnSearch" id="btnSearch" value="Search"/>
		</select>
	</form>
	<?php
	//If post is set send form data to database
	if(!empty($_POST['txtAddEntry']))
	{
	$title = $_POST['txtTitle'];
	$entry = $_POST['txtAddEntry'];
	$currDate = date('Y-m-d');
	
	mysqli_query($dbconn,
	"INSERT INTO blogentries
	VALUES('$title','$entry','$currDate')");
	}
	
	//Load blog entries from database
	if(!empty($_POST['txtSearch']))
	{
	$criteria = $_POST['txtSearch'];
	$entries = mysqli_query($dbconn,
	"SELECT title, date, entry
	FROM blogentries
	WHERE title LIKE '%$criteria%'
	OR entry LIKE '%criteria%'");
	}
	else
	{
	$entries = mysqli_query($dbconn, 
	"SELECT title, date, entry
	FROM blogentries
	ORDER BY date DESC");
	}
	
	//Fetch all entries and store in temp array rows
	while($row = mysqli_fetch_array($entries))
	{
	//echo blog entries to page
	echo "<div class='entry'><h3>$row[0]</h3><p>Date Posted: <i>$row[1]</i></p><br><br>$row[2]</div>";
	}
	
	?>
	
		<form method="post" action="#">
		<input type="text" class="input" id="txtTitle" name="txtTitle" value="Enter Title Here"/>
		<textarea class="input" id="txtAddEntry" name="txtAddEntry" rows="15">Start Blogging..</textarea>
		<input type="submit" name="btnAddEntry" id="btnAddEntry" value="Add Entry">
		</form>
	</body>
	</div>
</html>