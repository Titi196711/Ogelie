<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

require('src/PHPMailer.php');
require('src/SMTP.php');
require('src/Exception.php');
require('src/OAuth.php');
require('src/POP3.php');
?>

<!--<form method="post" action="" enctype ="multipart/form-data">
    <label for="mon_fichier">Fichier (formats pdf) :</label><br><br>
    <input type="file" name="mon_fichier" id="mon_fichier" /><br><br>
    <input type="submit" name="fichier" value="Envoyer" />
</form>-->
//<?PHP
//$nomOrigine = $_FILES['monfichier']['name'];
//$elementsChemin = pathinfo($nomOrigine);
//$extensionFichier = $elementsChemin['extension'];
//$extensionsAutorisees = array("jpeg", "jpg", "gif");
//$target_path="upload/";
//$target_path = $target_path . basename($_FILES['monfichier']['name']);
//if (!(in_array($extensionFichier, $extensionsAutorisees))) {
//    echo "Le fichier n'a pas l'extension attendue";
//} else {
//    // Copie dans le repertoire du script avec un nom
//    // incluant l'heure a la seconde pres 
//    $repertoireDestination = dirname(__FILE__) . "/";
//    $nomDestination = "fichier_du_" . date("YmdHis") . "." . $extensionFichier;
//
//    if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], $target_path)) {
//        echo "Le fichier " . $_FILES["monfichier"]["name"] .
//        " a été uploadé ";
//    } else {
//        echo "Le fichier n'a pas été uploadé (trop gros ?) ou " .
//        "Le déplacement du fichier temporaire a échoué" .
//        " vérifiez l'existence du répertoire " . $repertoireDestination;
//    }
//}
//?>

<?php
// Load Composer's autoloader
//require 'vendor/autoload.php';
// Instantiation and passing `true` enables exceptions
//$mail = new PHPMailer(true);
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->CharSet = 'utf-8';
$mail->setFrom('tvoizard@gmail.com', 'Mailer'); // Personnaliser l'envoyeur
//$mail->addAddress('arulfx78180@gmail.com', 'Titi User'); // Ajouter le destinataire
$mail->addAddress('tvoizard@gmail.com', 'Titi User'); // Ajouter le destinataire
$mail->Subject = 'Here is the subject';
$mail->Body = 'This is the HTML message body';
$mail->addAttachment('C:\Users\aleris-024\Documents\[04]Memo Montage.pdf'); // Ajouter un attachement
$mail->addAttachment('C:\Users\aleris-024\Documents\image001.jpg', 'new.jpg');
$mail->isHTML(true); // Paramétrer le format des emails en HTML ou non
$mail->send();
?>