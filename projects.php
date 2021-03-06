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
				<a class="active" href="/blog/blogportfolio/projects.php">Projects</a>
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
		<form method="post" action="#">
			<input class="input" style="float:right;" type="submit" id="btnLogin" name="btnLogin" value="Login"/>
			<input class="input" type="password" id="txtPassword" name="txtPassword" onfocus="if(this.value == 'password') this.value='';" value="password"/>
			<input class="input" type="text" id="txtUser" name="txtUser" onfocus="if(this.value == 'username') this.value='';" value="username"/>
		</form>
	
		<form method="post" action="#">
			<input type="text" class="input" id="txtSearch" name="txtSearch"/>
			<input type="submit" name="btnSearch" class="input" id="btnSearch" value="Search"/>
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
			$dateStarted = $_POST['txtDateStarted'];
			
			mysqli_query($dbconn,
			"INSERT INTO projects
			VALUES('$title','$technologiesUsed','$link','$about','$dateRange','$dateStarted')");
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
			echo "<div class='entry'><h3>$row[0]</h3><p>Date Range: <i>$row[4]</i></p><br>$row[3]<br>
			<p>Code: <a href='$row[2]' target='_blank'>View Source Code</a></p><p>Technologies Used: <i>$row[1]</i></p></div>";	
		}
		
		//If user has logged in
		if(!empty($_POST['txtUser']) && !empty($_POST['txtPassword']))
		{
			$username = $_POST['txtUser'];
			$password = $_POST['txtPassword'];
			
			//Fetch user's access rights 1-Admin 0-normal user
			$fetchpriority = mysqli_fetch_assoc(mysqli_query($dbconn,
			"SELECT accessRights
			FROM account
			WHERE username = '$username'
			AND password = '$password'
			LIMIT 1"));
			
			$prioritylevel = $fetchpriority['accessRights'];
			
			if($prioritylevel > 0) 
			{
				echo '<form method="post" action="#">
						<input type="text" class="input" id="txtProjectTitle" name="txtProjectTitle" onfocus="if(this.value == &quot;Enter Title Here&quot;) this.value=&quot;&quot;;" value="Enter Title Here"/>
						<input type="text" class="input" id="txtTechnologies" name="txtTechnologies" onfocus="if(this.value == &quot;Enter Technologies Used&quot;) this.value=&quot;&quot;;" value="Enter Technologies Used"/>
						<input type="text" class="input" id="txtProjectURL" name="txtProjectURL" onfocus="if(this.value == &quot;Enter Project URL address&quot;) this.value=&quot;&quot;;" value="Enter Project URL address"/>
						<input type="text" class="input" id="txtDates" name="txtDates" onfocus="if(this.value == &quot;Enter the Range of the Project (Start - End)&quot;) this.value=&quot;&quot;;" value="Enter the Range of the Project (Start - End)"/>
						<input type="text" class="input" id="txtDateStarted" name="txtDateStarted" onfocus="if(this.value == &quot;Enter the Date Project was Started&quot;) this.value=&quot;&quot;;" value="Enter the Date Project was Started"/>
						<textarea class="input" id="txtProjectEntry" name="txtProjectEntry" rows="15" onfocus="if(this.value == &quot;Enter Project Summary...&quot;) this.value=&quot;&quot;;">Enter Project Summary...</textarea>
						<input type="submit" name="btnAddProject" id="btnAddProject" value="Add Project"/>
					  </form>';
			}
		}
		?>
	</div>
	
	<footer>
		<ul>
			Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://websiteaddress.com/">Drew Demechko's Personal Blog and Project Portfolio</a>
		</ul>
	</footer>
</html>