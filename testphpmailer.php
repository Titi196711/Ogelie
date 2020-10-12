<?php 

$destinataire = "arulfx78180@gmail.com";
$sujet = 'Une super image';

$entete = "From: tvoizard@gmail.com\n";
$entete .= "Reply-to: tvoizard@gmail.com\n";

$delim = md5(uniqid(rand()));

$entete .= "MIME-Version: 1.0 \n";
$entete .= "Content-Type: multipart/mixed;boundary=\"$delim\" \n";
$entete .= "\n";

$msg = "--$delim \n";
$msg .= "Content-Type: text/plain; charset=\"utf-8\" \n";
$msg .= "Content-Transfer-Encoding: 8bit \n";
$msg .= "\n";

$msg .= "Super image non ? ;)";
$msg .= "\n";

$fichier = 'image001.jpg';
$jointe = file_get_contents($fichier);
$jointe = chunk_split(base64_encode($jointe));

$msg .= "--$delim \n";
$msg .= "Content-Type: image/jpg;name\"image\" \n";
$msg .= "Content-Transfer-Encoding:base64 \n";
$msg .= "Content-Disposition: inline; filename=\"image\" \n";
$msg .= "\n";
$msg .= $jointe."\n";
$msg .= "\n";

$msg .= "--$delim \n";

mail($destinataire, $sujet, $msg, $entete );

 ?>