<!DOCTYPE html>
<!--This is the home page of the blog/portfolio website-->
<html>
<!--This is -->
	<?php 
	//This includes the navigation code that will be
	//included on all pages
	include 'nav.php';
	include 'dbconnection.php';
	
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
	
	<body>
		<form method="post" action="addNewEntry.php">
		<input type="text" id="txtTitle" name="txtTitle" value="Enter Title Here"/>
		<textarea id="txtAddEntry" name="txtAddEntry" rows="20">Start Blogging..</textarea>
		<input type="submit" name="btnAddEntry" id="btnAddEntry" onclick="" value="Add Entry">
		</form>
	</body>
	
</html>