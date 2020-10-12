<?PHP
require("header.php");

require('src/PHPMailer.php');
require('src/SMTP.php');
require('src/Exception.php');
require('src/OAuth.php');
require('src/POP3.php');

//require_once './vendor/autoload.php';
//require('src/PHPMailerAutoload.php');
require('src/class.phpmailer.php');
?>
<head>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="form.css" >

</head>
<body >
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="row center-block justify-content-center">
                    <div class="col-md-6 col-md-offset-3">
                        <h2>Nous contacter</h2>
                        <p id="asap"> Laisser nous un message et nous vous contacterons rapidement.<br> (* Tous les champs sont obligatoires) </p>
                        <form role="form" method="post" id="reused_form2" enctype="multipart/form-data" accept-charset="UTF-8"><!---->
                            <div class="row"><!-- action="maile.php"-->
                                <div class="col-sm-12 form-group"><!--col-sm-6-->
                                    <label for="societe"><i class="zmdi zmdi-ticket-star"></i></label>
                                    <input type="text" placeholder="Société *" id="societe" name="societe" required maxlength="100">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="nomcontact"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text" placeholder="Nom *" id="nomcontact" name="nomcontact" required maxlength="50">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="prenomcontact"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text" placeholder="Prénom *" id="prenomcontact" name="prenomcontact" required maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="phone"><i class="zmdi zmdi-smartphone"></i></label>
                                    <input type="tel" placeholder="Téléphone *" id="phonecontact" name="phonecontact" onblur="checknum(this.value)" required maxlength="50">
                                </div>                                
                                <div class="col-sm-6 form-group">
                                    <label for="mailcontact"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" placeholder="Email *" id="mailcontact" name="mailcontact" onblur="isemailvalid()" required maxlength="50">
                                </div>
                            </div>
                            <!--                            <div class="row">
                                                            <div class="col-sm-6 form-group">
                                    <label for="siret"><i class="zmdi zmdi-archive"></i></label>
                                    <input type="text" placeholder="SIRET" id="siret" name="siret" maxlength="50">
                                </div>                                

                                                            <div class="col-sm-6 form-group">3
                                                                <span class="caret"></span>
                                                                <i class="zmdi zmdi-caret-down"></i>
                                                                <label for="effectif"><i class="zmdi zmdi-accounts-alt"></i></label>
                                    <input type="text" list="effect" placeholder="Choisir éffectif" id="effectif" name="effectif" required maxlength="20">
                                    <datalist id="effect">
                                                                <option selected>Choisir effectif<span class="caret" aria-hidden="true"></span></option>
                                                                    <option value="1 à 5">1 à 5</option>
                                        <option value="6 à 10">6 à 10</option>
                                        <option value="11 à 20">11 à 20</option>
                                        <option value="21 à 50">21 à 50</option>
                                        <option value="51 et plus">51 et plus</option>
                                    </datalist>
                                                            </select><i class="zmdi zmdi-caret-down zmdi-hc-2x"></i>
                            
                                </div>
                                                        </div>-->
                            <!--                            <script>
                                $(document).ready(function () {
                                    $("#effectif").mouseenter(function () {
//                                        $(".zmdi-hc-2x").css('visibility', 'visible');
                                        $(".zmdi-hc-2x").css('display', 'contents');
                                    });
                                    $("#effectif").mouseleave(function () {
                                        //$(".zmdi-hc-2x").css('visibility', 'hidden');
                                        $(".zmdi-hc-2x").css('display', 'none');
                                    });
                                });
                            </script>-->
                            <!--                            <div class="row">
                                                            <div class="col-sm-12 form-group">2
                                                                <label for="convent"><i class="zmdi zmdi-collection-folder-image"></i></label>
                                    <input type="text" list="convention" placeholder="Convention Collective" id="convent" name="convention" maxlength="300"/>
                                    <datalist id="convention"> 
                                        <script>
                                            src = "ccn.json";
                                            for (let i = 0; i < ccn.length; i++) {
                                                document.getElementById("convention").innerHTML += ("<option>" + ccn[i].ccn + "</option>"); //value="+ccn[i].ccn+"
                                            }
                                        </script>
                                    </datalist> 
                                </div>
                                                        </div>-->

                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="message"></label> <!--<i class="zmdi zmdi-comment-alt-text"></i>-->
                                    <textarea class="form-control" placeholder="Message" type="textarea" id="message" name="message" placeholder="Message" maxlength="6000" rows="10"></textarea>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block" id="btnContactUs" name="btnContactUs" disabled='disabled' >Envoyer ! </button>
                                </div>
                            </div>
                        </form>
                        <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Votre message a été envoyé avec succès !</h3> </div>
                        <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Désolé, une erreur s'est produite lors de l'envoi de votre formulaire. </div>
                    </div>
                </div>
                <!--                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                                    <div class="section-title">
                                        <h2>Vous souhaitez postuler chez Aleris !</h2>
                                    </div>
                                    <div class="row justify-content-center"> btn-primary
                                        <a href="formpage.php" class="btn btn-primary btn-lg active" role="button" title="nous recrutons">Accéder au formulaire</a>
                                        <br>
                                    </div>
                                </div>-->
                <!-- ======= Contact Us Section ======= -->
                <section id="contact" class="contact">
                    <div class="container">

                        <div class="section-title">
                            <h2>Contactez nous par d'autres moyens</h2>
                        </div>

                        <div class="row">

                            <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up">
                                <div class="info-box">
                                    <i class="bx bx-map"></i>
                                    <h3></h3><!--Notre Adresse-->                        
                                    <p>5, rue Hans List<br>78 290 Croissy sur Seine</p>
                                    <a href="https://goo.gl/maps/Lf5bQdSe3aY1PZoh7" target="_blank">Google Map</a>
                                </div>
                            </div>

                            <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                <div class="info-box">
                                    <a href="mailto:contact@aleris.com?Subject=Aleris%20demande" target="_top">
                                        <i class="bx bx-envelope"></i>
                                        <h3></h3><!--Notre Email-->
                                        <p>contact@ogelie.com</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                <div class="info-box ">
                                    <a href="tel:+33186390140">
                                        <i class="bx bx-phone-call"></i>
                                        <h3></h3><!--Appelez-nous-->
                                        <p> 01 86 39 01 40</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                </section><!-- End Contact Us Section -->

            </div>
        </section>
    </div>
</body>
</html>

<?PHP
if (isset($_POST['btnContactUs'])) {

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('contact@ogelie.com'); // Personnaliser l'envoyeur
//    $mail->setFrom('titi@localhost.com');
//    $mail->addAddress('arulfx78180@gmail.com', 'The great Arul'); // Ajouter le destinataire
//    $mail->addAddress('tvoizard@gmail.com', 'Le petit titi'); // Ajouter le destinataire
    $mail->addAddress('odefontenay@aleris.fr', 'The Big boss'); // Ajouter le destinataire
    $mail->Subject = 'Message du Formulaire depuis le site Aleris.fr : Contact';
    $mail->Body = 'Bonjour, ';
    $mail->Body .= '<br>';
    $mail->Body .= 'Voici la demande de la société : ';
    $mail->Body .= htmlentities($_POST['societe']);
    $mail->Body .= '<br>';
    $mail->Body .= 'SIRET : ';
    $mail->Body .= htmlentities($_POST['siret']);
    $mail->Body .= '<br>';
    $mail->Body .= 'Convention Collective : ';
    $mail->Body .= htmlentities($_POST['convention']);
    $mail->Body .= '<br>';
    $mail->Body .= 'Nom : ';
    $mail->Body .= htmlentities($_POST['nomcontact']);
    $mail->Body .= '<br>';
    $mail->Body .= 'Prénom : ';
    $mail->Body .= htmlentities($_POST['prenomcontact']);
    $mail->Body .= '<br>';
    $mail->Body .= 'Email : ';
    $mail->Body .= htmlentities($_POST['mailcontact']);
    $mail->Body .= '<br>';
    $mail->Body .= 'Téléphone : ';
    $mail->Body .= htmlentities($_POST['phonecontact']);
    $mail->Body .= '<br>';
    $mail->Body .= 'Effectif : ';
    $mail->Body .= htmlentities($_POST['effectif']);
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
            $('form#reused_form2').hide();
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

</script>
       <script>
//            $("#menu_nouscontacter").css("color", "#10A05B");
            $("#menu_nouscontacter").toggleClass("menu_nouscontacter");            
        </script>