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
				<a class="active" href="/blog/blogportfolio">Home</a>
			</li>
			<li>
				<a href="/blog/blogportfolio/about.php">About</a>
			</li>
			<li>
				<a href="/blog/blogportfolio/projects.php">Projects</a>
			</li>
			<li>
				<a href="/blog/blogportfolio/blog.php">Blog</a>
			</li>
			<li>
				<a href="/blog/blogportfolio/contact.php">Contact</a>
			</li>
		</ul>
	</nav>
	
	<div class="content">
		
	<h1>Recent Activity</h1>
		<div class="entry" id="projectdiv">
			<?php
					$entries = mysqli_query($dbconn, 
					"SELECT name, technologiesUsed, viewLink, about, dates
					FROM projects
					ORDER BY dateAdded DESC
					LIMIT 1");
			
					//Fetch all entries and store in temp array rows
					while($row = mysqli_fetch_array($entries))
					{
						//echo blog entries to page
						echo "<div><h3>$row[0]</h3><p>Date Range: <i>$row[4]</i></p><br><br>$row[3]<br><br>
						<p>Code: <a href='$row[2]' target='_blank'>View Source Code</a></p><p>Technologies Used: <i>$row[1]</i></p></div>";
					}
			?>
		</div>
		<div class="entry" id="jobdiv">
			<h3 class="entry">Employers</h3>
			<p>Seagate Technology<br><b>Summer 2015</b></p>
			<p>American Fidelity Assurance<br><b>Jan 2015 - Present</b></p>
		</div>
		<div class="entry" id="blogdiv">
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
					echo "<div><h3>Most Recent Blog</h3><h3>$row[0]</h3><p>Date Posted: <i>$row[1]</i></p><br><br>$row[2]</div>";
				}
			?>
		</div>
	</div>
</html>