<?php
include ("connectDb.php");

?>

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
    <form action="" method="post">
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
			<input type="file" name="file" value="" accept=".jpg, .png, .gif" size="2097152">
		</div>
		<div id="form-description">
			<label for="description">Description</label>
			<textarea name="description" id="" cols="30" rows="10" required minlength="2" maxlength="1000"></textarea>
		</div>
		<button type="submit" name="submit" id="form-submit">Envoyer</button>
	</form>
    </div>
</body>
</html>