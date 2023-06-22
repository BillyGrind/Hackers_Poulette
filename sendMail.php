<?php

require 'vendor/autoload.php';

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

// iyqodbwznhvjfeqt

// Function to send email
function sendEmail($name, $email)
{
    // Configure the SMTP transport
    $transport = Transport::fromDsn('smtp://denayeranthony623@gmail.com:iyqodbwznhvjfeqt@smtp.gmail.com:587');

    // Create an instance of the Mailer class
    $mailer = new Mailer($transport);

    // Create a new Email message
    $emailMessage = (new Email())
        ->from(new Address('denayeranthony623@gmail.com'))
        ->to(new Address('denayeranthony623@gmail.com')) // Change this to your email address
        ->subject('Thank you for your submission')
        ->text('Your submission has been received.');

    // Add the recipient email dynamically
    $emailMessage->addBcc(new Address($email, $name));

    // Send the email
    $mailer->send($emailMessage);
}


?>