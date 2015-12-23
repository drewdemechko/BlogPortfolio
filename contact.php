<!DOCTYPE html>
<!--This is the home page of the blog/portfolio website-->
<html>

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
				<a href="/blog/blogportfolio/blog.php">Blog</a>
			</li>
			<li>
				<a class="active" href="/blog/blogportfolio/contact.php">Contact</a>
			</li>
		</ul>
	</nav>
	
	<div class="content">
		<div id="contactform">
			<!--Left-->
			<form method="post" action="email.php">
				<h2>Your Name</h2>
				<input type="text" name="txtName" id="txtName"/>
				<h2>Your Email</h2>
				<input type="text" name="txtEmail" id="txtEmail"/>
				<h2>Subject</h2>
				<input type="text" name="txtSubject" id="txtSubject"/>
				<h2>Your Message</h2>
				<textarea id="txtMessage" name="txtMessage" rows="10" ></textarea><br>
				<input type="submit" name="btnSend" class="input" id="btnSend" onclick="" value="Send">
			</form>
		</div>
		
		<div id="extrainfo">
			<!--Right-->
			<!--Like #11 http://www.searchenginejournal.com/25-amazing-contact-us-pages/ -->
			<h2>Email</h2>
			drew.a.demechko@gmail.com
			<h2>Phone</h2>
			(405) 312-7191
			<h2>On the web</h2>
			<a target="_blank" href="https://www.linkedin.com/in/drew-demechko-331353a8">LinkedIn</a><br><br>
			<a target="_blank" href="https://github.com/drewdemechko/">GitHub</a>
		</div>
	</div>
	
	<footer>
		<ul>
			Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://websiteaddress.com/">Drew Demechko's Personal Blog and Project Portfolio</a>
		</ul>
	</footer>
</html>