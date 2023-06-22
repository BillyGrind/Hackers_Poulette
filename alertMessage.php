<?php

$errors = array();

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Veuillez saisir une adresse email valide.";
        }

        // Vérifier le type de fichier
        if (!empty($file)) {
            $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                $errors[] = "Le fichier doit être de type JPG, JPEG, PNG ou GIF.";
            }
        }

        if (strlen($description) < 2 || strlen($description) > 1000) {
            $errors[] = "La description doit contenir entre 2 et 1000 caractères.";
        }

        // Si des erreurs sont présentes, afficher les messages d'alerte
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>';
            }
        }
?>