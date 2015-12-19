<!DOCTYPE html>
<!--This php file sends an email using information gathered from the contact page form-->
<html>

	<?php 
	//This includes the navigation code that will be
	//included on all pages
	include 'nav.php';
	
	//Send email to Owner of blog
	if(!empty($_POST))
	{
	$ownerEmail = 'j671943@trbvm.com';
	$name = $_POST['txtName'];
	$email = $_POST['txtEmail'];
	$subject = $_POST['txtSubject'];
	$message = $_POST['txtMessage'];
	
	mail($ownerEmail,$subject,'$message\n\nFrom: $name\n$email\n');
	}
	?>
	<body>
	<h1>Thank you for leaving your feedback or request! <br> I will get back with you as soon as possible! <h1>
	</body>
</html>