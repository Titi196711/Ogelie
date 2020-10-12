<?PHP
require("header.php");
?>
<head>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="form.css">
    <!--<script src="form2.js"></script>-->
</head>
<body >
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="row center-block justify-content-center">
                    <div class="col-md-6 col-md-offset-3">
                        <h2>Nous contacter</h2>
                        <p id="asap"> Laisser nous un message et nous vous contactons rapidement </p>
                        <form role="form" action="maile.php" method="POST" id="reused_form2" enctype="multipart/form-data" accept-charset="UTF-8"><!---->
                            <div class="row">
                                <div class="col-sm-6 form-group"><!--col-sm-6-->
                                    <label for="societe"><i class="zmdi zmdi-ticket-star"></i></label>
                                    <input type="text" placeholder="Société" id="societe" name="societe" maxlength="50">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="siret"><i class="zmdi zmdi-archive"></i></label>
                                    <input type="text" placeholder="SIRET" id="siret" name="siret" maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group"><!--2-->
                                    <label for="convent"><i class="zmdi zmdi-collection-folder-image"></i></label>
                                    <input type="text" list="convention" placeholder="Convention Collective" id="convent" name="convention" maxlength="100"/>
                                    <datalist id="convention"> 
                                        <script>
                                            src = "ccn.json";
                                            for (let i = 0; i < ccn.length; i++) {
                                                document.getElementById("convention").innerHTML += ("<option>" + ccn[i].ccn + "</option>"); //value="+ccn[i].ccn+"
                                            }
                                        </script>
                                    </datalist> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="nomcontact"><i class="zmdi zmdi-account"></i></label>
                                    <input type="text" placeholder="Prénom Nom" id="nomcontact" name="nomcontact" maxlength="50">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="mailcontact"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" placeholder="Email" id="mailcontact" name="mailcontact" required maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="phone"><i class="zmdi zmdi-smartphone"></i></label>
                                    <input type="tel" placeholder="Téléphone" id="phonecontact" name="phonecontact" required maxlength="50">
                                </div>
                                <div class="col-sm-6 form-group"><!--3-->
                                    <!--<span class="caret"></span>-->
                                    <!--<i class="zmdi zmdi-caret-down"></i>-->
                                    <label for="effectif"><i class="zmdi zmdi-accounts-alt"></i></label>
                                    <input type="text" list="effect" placeholder="Choisir éffectif" id="effectif" name="effectif" required maxlength="20">
                                    <datalist id="effect">
                                    <!--<option selected>Choisir effectif<span class="caret" aria-hidden="true"></span></option>-->
                                        <option value="1 à 5">1 à 5</option>
                                        <option value="6 à 10">6 à 10</option>
                                        <option value="11 à 20">11 à 20</option>
                                        <option value="21 à 50">21 à 50</option>
                                        <option value="51 et plus">51 et plus</option>
                                    </datalist>
                                <!--</select><i class="zmdi zmdi-caret-down zmdi-hc-2x"></i>-->

                                </div>
                            </div>
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
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="message"></label> <!--<i class="zmdi zmdi-comment-alt-text"></i>-->
                                    <textarea class="form-control" placeholder="Message" type="textarea" id="message" name="message" placeholder="Message" maxlength="6000" rows="10"></textarea>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block" name="btnContactUs" id="btnContactUs">Envoyer ! </button>
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
                            <h2>Contactez Nous</h2>
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
                                    <i class="bx bx-envelope"></i>
                                    <h3></h3><!--Notre Email-->
                                    <p>contact@ogelie.com</p>
                                </div>
                            </div>

                            <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                <div class="info-box ">
                                    <i class="bx bx-phone-call"></i>
                                    <h3></h3><!--Appelez-nous-->
                                    <p> 01 86 39 01 40</p>
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
require('footer.php');
?>