<?php
require("header.php");
?>
<a id="haut"></a>
<!--<link href="formulaire.css" rel="stylesheet">-->
<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="assets/img/signup-image.jpg" alt="sing up image"></figure>
                </div>
                <div class="signin-form">
                    <h2 class="form-title">Se connecter</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Nom"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Mot de Passe"/>
                        </div>
                        <!--                            <div class="form-group">
                                                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                                                    </div>-->
                        <div class="form-group form-button">
                            <input type="button" name="signin" id="signin" class="form-submit" value="Se Connecter" onclick="pagesilae()"/>
                        </div>
                    </form>

                    <!--                        <div class="social-login">username password
                                                <span class="social-label">Or login with</span>
                                                <ul class="socials">
                                                    <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                                    <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                                    <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                                                </ul>
                                            </div>-->
                </div>
            </div>
        </div>
    </section>
</div>

<script>
            function pagesilae() {
            let username = document.getElementById("your_name").value;
            let password = document.getElementById("your_pass").value;
            //alert (username +' + '+ password);
            location.href = "http://www.silaexpert02.fr/web/Default.aspx?lang=fr-FR &username=" + username + "&password=" + password;
            //https://www.silaexpert.fr/connexion
            ////http://www.silaexpert02.fr/web/Default.aspx?lang=fr-FR
            //window.location.assign("'C:\Program Files\Internet Explorer\iexplore.exe' https://www.silaexpert02.fr/silae?username="+username+"&password="+password);
            }
</script>

<?php
//if (isset($_POST['your_name']) && isset($_POST['your_pass'])) {
//    $username = htmlentities($_POST["your_name"]);
//    $password = htmlentities($_POST["your_pass"]);
//    header("refresh:1;url='C:\Program Files\Internet Explorer\iexplore.exe' https://www.silaexpert02.fr/silae?username=$username&password=$password");
//}
// 'C:\Program Files\Internet Explorer\iexplore.exe'
require("footer.php");
?>