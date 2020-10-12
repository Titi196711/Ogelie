<?PHP
require("header.php");

require('src/PHPMailer.php');
require('src/SMTP.php');
require('src/Exception.php');
require('src/OAuth.php');
require('src/POP3.php');

//require_once './vendor/autoload.php';
//require('src/PHPMailerAutoload.php');

require('src/class.phpmailer2.php');
?>
<head>
    <!-- Optional theme -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <link rel="stylesheet" href="form.css" >
    <!--<script src="form.js"></script>-->
</head>
<body >
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="row center-block justify-content-center">
                    <div class="col-md-6 col-md-offset-3">

                        <form role="form" method="post" id="reused_form" enctype="multipart/form-data">
                            <h2>Envoyez nous votre candidature au format PDF</h2> 
                            <p> Nous la traiterons le plus vite possible !</p>
                            <div class="row"><!--action='formpage_mail.php' -->
                                <div class="col-sm-6 form-group">
                                    <label for="firstname"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text"  id="firstname" name="firstname" placeholder="Prénom" maxlength="50">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="lastname"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text" placeholder="Nom" id="lastname" name="lastname" maxlength="50" required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="text" placeholder="Email" id="email" name="email" onblur="isemailvalid()" maxlength="50" required="required">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="phone"><i class="zmdi zmdi-smartphone"></i></label>
                                    <input type="tel" placeholder="Téléphone" id="phone" name="phone" onblur="checknum(this.value)" maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="message"><i class="zmdi zmdi-comment-alt-text"></i></label>
                                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Votre Message ..." maxlength="6000" rows="7"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="fichierjoint"><i class="zmdi zmdi-upload"></i></label>
                                    <input type="file" name="fichierjoint" id="fichierjoint" class="btn btn-primary btn-lg active" accept=".pdf" onchange="validFileType()" required />    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactCV" name="btnContactCV">C'est parti ! </button>
                                </div>
                            </div>
                        </form>
                        <div id="success_message" style="width:100%; height:100%; display:none; "> 
                            <h3>
                                Votre candidature est partie. Nous la traiterons le plus vite possible.
                            </h3> 
                        </div>
                        <div id="error_message" style="width:100%; height:100%; display:none; "> 
                            <h3>
                                Error
                            </h3> 
                            Désolé, votre message n'est pas parti.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
<?PHP
if (isset($_POST['btnContactCV'])) {

    $mailcv = new PHPMailer\PHPMailer\PHPMailer();
    $mailcv->CharSet = 'UTF-8';
//    $mailcv->setFrom('tvoizard@gmail.com'); // Personnaliser l'envoyeur
//    $mailcv->addAddress('arulfx78180@gmail.com', 'The great Arul'); // Ajouter le destinataire
//    $mailcv->addAddress('tvoizard@gmail.com', 'Le petit titi'); // Ajouter le destinataire
    $mailcv->setFrom('contact@ogelie.com'); // Personnaliser l'envoyeur
    $mailcv->addAddress('odefontenay@aleris.fr', 'The Big Boss'); // Ajouter le destinataire
    $mailcv->Subject = 'Message du Formulaire CV : Envoyer nous votre demande';
    $mailcv->Body = 'Bonjour, ';
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Voici la demande de : ';
    $mailcv->Body .= htmlentities($_POST['firstname']);
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Nom : <br>';
    $mailcv->Body .= htmlentities($_POST['lastname']);
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'E-mail : ';
    $mailcv->Body .= htmlentities($_POST['email']);
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Téléphone : ';
    $mailcv->Body .= htmlentities($_POST['phone']);
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Message : ';
    $mailcv->Body .= htmlentities($_POST['message']);
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Fichier : ';
    $mailcv->Body .= '<br>';
    $mailcv->Body .= $_FILES['fichierjoint']['name'];
    $mailcv->Body .= '<br>';
    $mailcv->Body .= 'Type : ';
    $mailcv->Body .= $_FILES['fichierjoint']['type'];
    $mailcv->Body .= '<br>';
//    $mailcv->AddAttachment($_FILES['fichierjoint']['tmp_name']);
    $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['fichierjoint']['name']));
    if (move_uploaded_file($_FILES['fichierjoint']['tmp_name'], $uploadfile))
        $mailcv->addAttachment($uploadfile, $_FILES['fichierjoint']['name']);
//    $mailcv->addAttachment($path, $name);
    $mailcv->isHTML(true); // Paramétrer le format des emails en HTML ou non

    $mailcv->send();


    if (!$mailcv->send()) {
//        echo 'Erreur, message non envoyé.';
//        echo 'Mailer Erreur : ' . $mailcv->ErrorInfo;
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
//        echo 'Le message a bien été envoyé !';
        ?>
        <script>
            $('form#reused_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        </script>   
        <?PHP
    }
    unset($mailcv);
}
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
        if (isEmail(document.getElementById('email').value)) {
            $("#btnContactCV").prop("disabled", false);
        } else {
            alert("Votre Email n'est pas valide. L'envoi du message est bloqué.");
            $("#btnContactCV").prop("disabled", true);
        }
    }

    function checknum(num) {
        let valide = /^0[1-7]\d{8}$/;
        if (valide.test(num)) {
//        alert('Bon numéro !');
            document.getElementById('phone').style.color = "black";
        } else {
//        alert('Mauvais numéro !');
            document.getElementById('phone').style.color = "red";
        }
    }

    function validFileType(fichier) {
        let fileTypes = [
            'application/pdf'
        ];
        fichier = document.getElementById('fichierjoint').files[0];
        console.log("Type de fichier :" + fichier.type);
        for (var i = 0; i < fileTypes.length; i++) {
            if (fichier.type === fileTypes[i]) {
                return true;
            } else {
                alert("Seul le type .PDF est autorisé. Merci.");
                document.getElementById('fichierjoint').value = "";
                return false;
            }
        }
    }
</script>
       <script>
//            $("#menu_ogelie").css("color", "#10A05B");           
//            $("#menu_nousrecrutons").css("color", "#10A05B");
            $("#menu_ogelie").toggleClass("menu_ogelie");
            $("#menu_nousrecrutons").toggleClass("menu_nousrecrutons");
       </script>