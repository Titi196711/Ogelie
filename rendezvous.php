<?php
require("header.php");
require('src/PHPMailer.php');
require('src/SMTP.php');
require('src/Exception.php');
require('src/OAuth.php');
require('src/POP3.php');
require('src/class.phpmailer.php');
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>

        <!--        <link rel="stylesheet" href="assets/css/bootstrap-material-datetimepicker.min.css">        
                <link rel="stylesheet" href="assets/vendor/icofont/icofont.min.css">
                <script type="text/javascript" src="assets/vendor/jquery/jquery-3.4.1.min.js"></script>
                <script type="text/javascript" src="assets/js/moment.min.js"></script>
                <script type="text/javascript" src="assets/js/bootstrap-material-datetimepicker.min.js"></script>-->

        <!--📝 If change language, add language file » https://cdnjs.com/libraries/moment.js--> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/fr.js"></script>

        <link rel="stylesheet" href="assets/css/calendar.css">
        <link rel="stylesheet" href="assets/css/formulaire.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">        

        <script src="assets/js/calendar.js"></script>

    </head>
    <body>
        <div class="main">
            <section class="sign-in">
                <!--<div class="container">-->
                <div class="row center-block justify-content-center">
                    <div class="col-md-6 col-md-offset-3">
                        <h2>Proposer un rendez-vous</h2>
                        <h2 id="choixjour">Pour le <script>twRequeteVariable('jh');</script></h2>
                        <p id="asap"> Laisser nous un message et nous vous contacterons rapidement </p>
                        <form role="form" method="post" id="reused_form_ogelie" enctype="multipart/form-data" accept-charset="UTF-8"><!---->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="nomcontact"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text" placeholder="Nom" id="nomcontact" name="nomcontact" maxlength="50">
                                </div>
                                <div class="col-sm-6">
                                    <label for="prenomcontact"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text" placeholder="Prénom" id="prenomcontact" name="prenomcontact" maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="phone"><i class="zmdi zmdi-smartphone"></i></label>
                                    <input type="tel" placeholder="Téléphone" id="phonecontact" name="phonecontact" onblur="                                                checknum(this.value)" required maxlength="50">
                                </div>                                
                                <div class="col-sm-6">
                                    <label for="mailcontact"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" placeholder="Email" id="mailcontact" name="mailcontact" onblur="                                                    isemailvalid()" required maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="ste"><i class="zmdi zmdi-archive"></i></label>
                                    <input type="text" placeholder="Société" id="ste" name="ste" maxlength="70">
                                </div>                                
                                <div class="col-sm-6">
                                    <!--<div class="form-control-wrapper">-->
                                    <!--<div class="form-group label-floating">-->
                                    <label for="time"><i class="zmdi zmdi-time"></i></label>
                                    <input type="text" placeholder="Heure" id="time" name="heure" data-dtp="dtp_BzCnG">
                                    <!--</div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="message"></label> <!--<i class="zmdi zmdi-comment-alt-text"></i>-->
                                    <textarea class="form-control" id="message" name="message" placeholder="Message" maxlength="6000" rows="8"></textarea>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button type='submit' class='btn btn-lg btn-primary btn-block' id='btnContactUs' name='btnContactUs' disabled='disabled' >Envoyer ! </button>
                                </div>
                            </div>
                        </form>
                        <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Votre message a été envoyé avec succès !</h3> </div>
                        <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Désolé, une erreur s'est produite lors de l'envoi de votre formulaire. </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
<script>
    // pour remplir automatiquement le message
    setInterval(messa, 2000);

</script>

<script type="text/javascript">
    $('#time').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        shortTime: false,
        date: false,
        time: true,
        monthPicker: false,
        year: false,
        switchOnClick: true
    });
</script>

<script>
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }
    function isemailvalid() {
        //        alert(document.getElementById('mailcontact').value);
        if (isEmail(document.getElementById('mailcontact').value)) {
            $("#btnContactUs").prop("disabled", false);
        } else {
            alert("Votre Email n'est pas valide. L'envoi du message est bloqué.");
            document.getElementById("mailcontact").style.color = "red";
            $("#btnContactUs").prop("disabled", true);
        }
    }

    function checknum(num) {
        let valide = /^0[1-7]\d{8}$/;
        if (valide.test(num)) {
            //        alert('Bon numéro !');
            document.getElementById('phonecontact').style.color = "black";
        } else {
            document.getElementById('phonecontact').style.color = "red";
            //            alert('Mauvais numéro ! Le numéro de téléphone doit commencer par 01 à 07 et doit être suivi de 8 chiffres. Merci.');
        }
    }
    //Coloriage du menu en turquoise   
    //            $("#menu_nousrecrutons").css("color", "#10A05B");
    $("#menu_calendrier").toggleClass("menu_calendrier");
</script>
<?PHP
if (isset($_POST['btnContactUs'])) {

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('contact@ogelie.com'); // Personnaliser l'envoyeur
//    $mail->setFrom('titi@localhost.com');
//    $mail->addAddress('arulfx78180@gmail.com', 'The great Arul'); // Ajouter le destinataire
//    $mail->addAddress('tvoizard@gmail.com', 'Le petit titi'); // Ajouter le destinataire
    $mail->addAddress('odefontenay@aleris.fr', 'The Big boss'); // Ajouter le destinataire
    $mail->Subject = 'Message du Formulaire depuis le site Ogelie.fr : Calendrier';
    $mail->Body = 'Bonjour, ';
    $mail->Body .= '<br>';
    $mail->Body .= 'Le message : ';
    $mail->Body .= htmlentities($_POST['message']);
    $mail->Body .= '<br>';
    $mail->isHTML(true); // Paramétrer le format des emails en HTML ou non

    $mail->send();


    if (!$mail->send()) {
//        echo 'Erreur, message non envoyé.';
//        echo 'Mailer Erreur : ' . $mail->ErrorInfo;
        ?>
        <script>
                    $('#error_message').append('<ul></ul>');

    jQuery.each(data.errors, function (key, val)
            {
                $('#error_message ul').append('<li>' + key + ':' + val + '</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();
                </script>
                <?PHP
            } else {
        ?>
                <script>
                    $('form#reused_form_ogelie').hide();
                    $('#success_message').show();
                    $('#error_message').hide();
                </script>
                <?PHP
                //echo 'Le message a bien été envoyé !';
    }
}

unset($mail);

require('footer.php');
?>
