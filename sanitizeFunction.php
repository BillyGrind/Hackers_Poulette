<?php

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


?>