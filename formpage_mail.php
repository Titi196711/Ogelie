<?php

require('src/PHPMailer.php');
require('src/SMTP.php');
require('src/Exception.php');
require('src/OAuth.php');
require('src/POP3.php');

//require_once './vendor/autoload.php';
//require('src/PHPMailerAutoload.php');

require('src/class.phpmailer2.php');


if (isset($_POST['btnContactCV'])) {

    $mailcv = new PHPMailer\PHPMailer\PHPMailer();
    $mailcv->CharSet = 'UTF-8';
    $mailcv->setFrom('titi@localhost.com'); // Personnaliser l'envoyeur
//    $mailcv->addAddress('arulfx78180@gmail.com', 'The great Arul'); // Ajouter le destinataire
    $mailcv->addAddress('titi@localhost.com', 'Le petit titi'); // Ajouter le destinataire
    $mailcv->Subject = 'Message du Formulaire CV : Envoyer nous votre demande';
    $mailcv->Body = 'Bonjour, ';
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Voici la demande de : ';
    $mailcv->Body .= $_POST['firstname'];
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Nom : <br>';
    $mailcv->Body .= $_POST['lastname'];
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'E-mail : ';
    $mailcv->Body .= $_POST['email'];
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Téléphone : ';
    $mailcv->Body .= $_POST['phone'];
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Message : ';
    $mailcv->Body .= $_POST['message'];
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Fichier : ';
    $mailcv->Body .= '<br>';
    $mailcv->Body .= $_FILES['fichierjoint']['name'];
    $mailcv->Body .= '<br>';        
    $mailcv->Body .= 'Type : ';
    $mailcv->Body .= $_FILES['fichierjoint']['type'];
    $mailcv->Body .= '<br>';
    $mailcv->AddAttachment($_FILES['fichierjoint']['tmp_name']);
//    $mailcv->addAttachment($path, $name);
    $mailcv->isHTML(true); // Paramétrer le format des emails en HTML ou non
    $mailcv->send();
//    if (!$mailcv->send()) {
//        echo 'Erreur, message non envoyé.';
//        echo 'Mailer Erreur : ' . $mailcv->ErrorInfo;
//    } else {
//        echo 'Le message a bien été envoyé !';
//    }
    unset($mailcv);
}
?>