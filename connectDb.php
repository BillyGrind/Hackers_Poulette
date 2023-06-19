<?php

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

            $sql = "INSERT INTO contact_form (last_name, first_name, email,file,description) VALUES (?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$lastName,$firstName,$mail,$file,$description]);

        //    echo $lastName." ".$firstName." ".$mail." ".$file." ".$description;

            // echo "Data send with succes";
        } else {
            echo "Veuillez entrer des données valides pour les champs.";
        }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>