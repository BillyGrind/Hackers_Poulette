<?php

session_start();

require('userPwd.php');
$pdo = new PDO('mysql:host=localhost;dbname=id20944195_papaschultz;charset=utf8', $user,$pwd);

try {

    function sanitizeString($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function sanitizeEmail($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }

    if (isset($_POST['submit'])) {

        $lastName = sanitizeString($_POST['lastName']);
        $firstName = sanitizeString($_POST['firstName']);
        $mail = sanitizeEmail($_POST['mail']);
        $description = sanitizeString($_POST['description']);
        //file
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $destination = './src/' . $fileName;
        move_uploaded_file($fileTmpName, $destination);


        $captcha = $_POST["captcha"];
        $captchaUser = sanitizeString($_POST["captcha"]);
        
        if (empty($captcha)) {
            $captchaError = array(
                "status" => "alert-danger",
                "message" => "Please enter the captcha."
            );
        } else if ($_SESSION['CAPTCHA_CODE'] == $captchaUser) {
            $captchaError = array(
                "status" => "alert-success",
                "message" => "Your form has been submitted successfully."
            );

            $sql = "INSERT INTO contact_form (last_name, first_name, email, file, description) VALUES (?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$lastName, $firstName, $mail, $destination, $description]);
            
            // include("alertMessage.php");
        } else {
            echo "Veuillez entrer des données valides pour les champs.";
        }
    } else {
        $captchaError = array(
            "status" => "alert-danger",
            "message" => "Captcha is invalid."
        );
    }

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
