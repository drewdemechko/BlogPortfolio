<!DOCTYPE html>
<!--This php file sends an email using information gathered from the contact page form-->
<!--Tutorial used to set up mail server on xampp https://www.youtube.com/watch?v=TO7MfDcM-Ho-->
<html>
	<div class="container">
	<?php 
	//This includes the navigation code that will be
	//included on all pages
	include 'nav.php';
	
	//Send email to Owner of blog
	if(!empty($_POST))
	{
	$ownerEmail = 'drew.a.demechko@gmail.com';
	$name = $_POST['txtName'];
	$email = $_POST['txtEmail'];
	$subject = $_POST['txtSubject'];
	$message = $_POST['txtMessage'];
	
	mail($ownerEmail,$subject,$message . "\n\n" . $name . "\n" . $email,'From: $email');	
	}
	?>
	
	<body>
	<h1 class="homeHeaders">Thank you for leaving your feedback or request! <br> I will get back with you as soon as possible! <h1>
	</body>
	</div>
</html>