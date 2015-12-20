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
	<br>
		<form method="post" action="#">
			<input type="text" class="input" id="txtSearch" name="txtSearch"/>
			<input type="submit" name="btnSearch" id="btnSearch" value="Search"/>
			<br><br>
		</form>
	<?php
	//If post is set send form data to database
	if(!empty($_POST['txtProjectEntry']))
	{
	$title = $_POST['txtProjectTitle'];
	$technologiesUsed = $_POST['txtTechnologies'];
	$link = $_POST['txtProjectURL'];
	$about = $_POST['txtProjectEntry'];
	$dateRange = $_POST['txtDates'];
	$currDate = date('Y-m-d');
	
	mysqli_query($dbconn,
	"INSERT INTO projects
	VALUES('$title','$technologiesUsed','$link','$about','$dateRange','$currDate')");
	}
	
	//Load blog entries from database
	if(!empty($_POST['txtSearch']))
	{
	$criteria = $_POST['txtSearch'];
	$entries = mysqli_query($dbconn,
	"SELECT name, technologiesUsed, viewLink, about, dates
	FROM projects
	WHERE name LIKE '%$criteria%'
	OR technologiesUsed LIKE '%$criteria%'
	OR viewLink LIKE '%$criteria%'
	OR about LIKE '%$criteria%'
	OR dates LIKE '%$criteria%'");
	}
	else
	{
	$entries = mysqli_query($dbconn, 
	"SELECT name, technologiesUsed, viewLink, about, dates
	FROM projects
	ORDER BY dateAdded DESC");
	}
	
	//Fetch all projects and store in temp array rows
	while($row = mysqli_fetch_array($entries))
	{
	//echo projects to page
	echo "<div class='entry'><h3>$row[0]</h3><p>Date Range: <i>$row[4]</i></p><br><br>$row[3]<br><br>
	<p>Code Available at: <a href='$row[2]' target='_blank'>View Source Code</a></p><p>Technologies Used: <i>$row[1]</i></p></div>";	
	}
	?>
		<form method="post" action="#">
			<input type="text" class="input" id="txtProjectTitle" name="txtProjectTitle" value="Enter Title Here"/>
			<input type="text" class="input" id="txtTechnologies" name="txtTechnologies" value="Enter Technologies Used"/>
			<input type="text" class="input" id="txtProjectURL" name="txtProjectURL" value="Enter Project URL address"/>
			<input type="text" class="input" id="txtDates" name="txtDates" value="Enter the Date Range"/>
			<textarea class="input" id="txtProjectEntry" name="txtProjectEntry" rows="15">Enter Project Summary...</textarea>
			<input type="submit" name="btnAddProject" id="btnAddProject" value="Add Project"/>
		</form>
	</div>
</html>