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
	<h1 class="homeHeaders">Recent Activity</h1>
		<div id="projectdiv">
			<h3 class="homeHeaders">Most Recent Project</h3>
		</div>
		<div class="entry" id="jobdiv">
			<h3 class="homeHeaders">Employers</h3>
			<p>Seagate Technology <b>Summer2015</b></p>
			<p>American Fidelity Assurance<br><b>Present</b></p>
		</div>
		<div id="blogdiv">
			<?php
				$entries = mysqli_query($dbconn, 
				"SELECT title, date, entry
				FROM blogentries
				ORDER BY date DESC
				LIMIT 1");
		
				//Fetch all entries and store in temp array rows
				while($row = mysqli_fetch_array($entries))
				{
				//echo blog entries to page
				echo "<div class='entry'><h3>Most Recent Blog</h3><h3>$row[0]</h3><p>Date Posted: <i>$row[1]</i></p><br><br>$row[2]</div>";
				}
			?>
		</div>
	</div>
</html>