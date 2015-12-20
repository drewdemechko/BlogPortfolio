<!DOCTYPE html>
<!--This is the home page of the blog/portfolio website-->
<html>

<!--This is -->
	<div class="container">
	<?php 
	//This includes the navigation code that will be
	//included on all pages
	include 'nav.php';
	?>
	
		<div id="contactform">
		<!--Left-->
			<form method="post" action="email.php">
			<h2>Your Name</h2>
			<input type="text" name="txtName" size="50%"/>
			<h2>Your Email</h2>
			<input type="text" name="txtEmail" size="50%"/>
			<h2>Subject</h2>
			<input type="text" name="txtSubject" size="50%"/>
			<h2>Your Message</h2>
			<textarea id="txtMessage" name="txtMessage" rows="10" ></textarea><br>
			<input type="submit" name="btnSend" id="btnSend" onclick="" value="Send">
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
		<a href="https://www.linkedin.com/in/drew-demechko-331353a8">LinkedIn</a>
		</div>
	</div>
</html>