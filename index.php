<?php
include ("connectDb.php");
?>

<!-- TO DO 

If you have ticked all the above boxes, you can add some of the following features:

    Client side validation with JavaScript
    Work on a good and clear user experience (UX)
    If all required inputs are valid, the script should respond by email to a given address, confirming the reception of the message. (you can use your own address for testing purposes)
    Discover composer and use it to install a PHP library such as SwiftMailer to send the email or to validate the form with library such as rakit/validation, valitron or symfony/mailer
    
    Protect your form against the most common attacks (CSRF, XSS, SQL injection, etc.) ressources: OWASP, OWASP Cheat Sheet XSS, OWASP Cheat Sheet SQL injection
    
    Create a dashboard to display the received messages (admin side) which allow to manage the messages status (handled, not handled, response, etc..) (this is a big one I know, you probably won't have time to do it all, but it's a good exercise to learn how to manage a database and a dashboard)

-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Support</title>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="form-container">
    <h1>Contact Support</h1>
    <form action="" method="post" enctype="multipart/form-data">
		<div id="form-lastname">
			<label for="lastName">Your Last Name</label>
			<input type="text" name="lastName" value="" required minlength="2" maxlength="255" class="form_field">
		</div>
        <div id="form-firstname">
			<label for="firstName">Your First Name</label>
			<input type="text" name="firstName" value="" required minlength="2" maxlength="255">
		</div>

		<div id="mail">
			<label for="mail">Your mail </label>
			<input type="mail" name="mail" value="" required minlength="2" maxlength="255">
		</div>
		<div id="form-file">
			<label for="file">File</label>
			<input type="file" name="file" value="" accept=".jpg, .png, .gif" size="2097152" >
		</div>
		<div id="form-description">
			<label for="description">Description</label>
			<textarea name="description" id="" cols="30" rows="10" required minlength="2" maxlength="1000"></textarea>
		</div>

        <!-- captcha -->
        <!-- regler message alerte / condition  -->

        <div id="form-captcha">
            <div id="form-captcha-input">
                <label>Enter Captcha</label>
                <input type="text" id="form-control" name="captcha" id="captcha">
            </div>
            <div id="form-captcha-jpg">
                <label>Captcha Code</label>
                <img src="createCaptcha.php" alt="PHP Captcha">
            </div>
        </div>


		<button type="submit" name="submit" id="form-submit">Envoyer</button>
	</form>
    </div>
</body>
</html>