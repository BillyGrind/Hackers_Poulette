<?php

?>


<!-- The company Hackers Poulette ™ sells Raspberry Pi accessory kits to build your own. They want to allow their users to contact their support team. Your mission is to create a fully-functioning online "contact support" form, in PHP. It must display a contact form and process the received answer (sanitize, validate, answer the user). -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Support</title>
</head>
<body>
	<h1>Contact Support</h1>
	<form action="" method="post">
		<div>
			<label for="lastName">Your Last Name</label>
			<input type="text" name="lastName" value="" required minlength="2" maxlength="255">
		</div>
        <div>
			<label for="firstName">Your First Name</label>
			<input type="text" name="firstName" value="" required minlength="2" maxlength="255">
		</div>

		<div>
			<label for="mail">Your mail </label>
			<input type="mail" name="mail" value="" required minlength="2" maxlength="255">
		</div>
		<div>
			<label for="file">File</label>
			<input type="file" name="file" value="" accept=".jpg, .png, .gif" size="2097152">
		</div>
		<div>
			<label for="description">Description</label>
			<textarea name="description" id="" cols="30" rows="10" required minlength="2" maxlength="1000"></textarea>
		</div>
		<button type="submit" name="submit">Envoyer</button>
	</form>
</body>
</html>