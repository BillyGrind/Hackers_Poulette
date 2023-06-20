<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=hackers_poulette;charset=utf8', 'root', '');

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
        $file = sanitizeString($_POST['file']);
        $description = sanitizeString($_POST['description']);

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
            $stmt->execute([$lastName, $firstName, $mail, $file, $description]);
            
            include("alertMessage.php");
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
