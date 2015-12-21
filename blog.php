<!DOCTYPE html>
<!--This is the home page of the blog/portfolio website-->
<html>
<!--This is -->
	<?php 
	include 'dbconnection.php';
	?>
	
<head>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>

	<nav>
		<ul>
			<li>
				<a href="/blog/blogportfolio">Home</a>
			</li>
			<li>
				<a href="/blog/blogportfolio/about.php">About</a>
			</li>
			<li>
				<a href="/blog/blogportfolio/projects.php">Projects</a>
			</li>
			<li>
				<a class="active" href="/blog/blogportfolio/blog.php">Blog</a>
			</li>
			<li>
				<a href="/blog/blogportfolio/contact.php">Contact</a>
			</li>
			<ul style="float:right; list-style-type:none;">
				<li>
				<a href="#">Login</a>
				</li>
			</ul>
		</ul>
	</nav>
	
	<div class="content">
	<form method="post" action="#">
		<input type="text" class="input" id="txtSearch" name="txtSearch"/>
		<input type="submit" name="btnSearch" class="input" id="btnSearch" value="Search"/>
		<br><br>
	</form>
	<?php
	//If post is set send form data to database
	if(!empty($_POST['txtAddEntry']))
	{
	$title = $_POST['txtBlogTitle'];
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
	OR entry LIKE '%$criteria%'
	OR date LIKE '%$criteria%'");
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
		<input type="text" class="input" id="txtBlogTitle" name="txtBlogTitle" value="Enter Title Here"/>
		<textarea class="input" id="txtAddEntry" name="txtAddEntry" rows="15">Start Blogging..</textarea>
		<input type="submit" name="btnAddEntry" id="btnAddEntry" value="Add Entry"/>
		</form>
	</div>
</html>