<?php
namespace App\Models;

class ContactModel
{
    public function sendEmail($name, $email, $message)
    {
        $to = 'vehqa.game@gmail.com';
        $subject = 'Nouveau message de contact';
        $body = "Nom : $name\n\n";
        $body .= "Email : $email\n\n";
        $body .= "Message :\n$message\n";
        // Header
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        // Envoyer l'e-mail
        if (mail($to, $subject, $body, $headers)) {
            // Dans le Controller ! 
            echo "";
        } else {
            // Erreur
            echo "Erreur lors de l'envoi du message.";
        }
    }
}