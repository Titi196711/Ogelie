<?php $nav_en_cours = "rubrique2"; ?>
<?php
include("header.php");
?>



<main id="main">

    <!-- =======  Section Notre histoire ======= -->
    <section id="about" class="about">

        <div class="container">
            <div class="section-title" data-aos="fade-up"data-aos-delay="100">
                <h2>Notre histoire</h2>
                <p>Ogelie est né en 2008 suite à l’expression d’un besoin : Externaliser la gestion des visites médicales. Depuis, l’équipe s’est étoffée et n’a eu qu’une volonté : fluidifier, sécuriser et fiabiliser le processus. A ce jour Ogelie gère plus de 5.000 visites médicales par an, avec 280 centres partenaires pour le compte de sociétés françaises et étrangères, mais également pour le compte de cabinets d’expertise comptable. En quelques années, Ogelie est devenu un acteur majeur sur le marché.</p>
            </div>
<!--            <div class="section-title" data-aos="fade-up"data-aos-delay="100">
                <p>Aujourd'hui, le cabinet possède un portefeuille client de 562 TPE et PME françaises allant de 1 à 300 salariés. Ces entreprises sont rattachées à différents secteurs d'activités comme : l'industrie, les services à la personne, les assurances, l'automobile, la distribution, l'informatique, et les transports.<br>En quelques années, ALERIS est devenu un acteur majeur spécialisé dans l'expertise sociale : le conseil aux entreprises.</p>
            </div>-->
        </div>
        <br>
        <div class="container">

            <div class="row no-gutters">
                <!--<div class="col-lg-6 video-box d-flex align-items-center">-->
                <div class="col-lg-6 embed-responsive embed-responsive-16by9">
                <!--<img src="assets/img/video_capture.jpg" class="img-fluid" alt="">-->
                    <video controls>
                        <source src="assets/La visite médicale.mp4" type="video/mp4">
                    </video>
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                    <div class="section-title" data-aos="fade-up"data-aos-delay="100">
                        <h2>Un cabinet de gestion de visite médicale à votre écoute</h2>
                        <p>Ogelie vous apporte une solution mutilservice en gestion des visite médicale, suivie par un interlocuteur unique : votre chef de projet. Chacune de nos 
                            solutions est dirigée par l'un de nos spécialistes, choisissez ainsi la solution la mieux adaptée à vos besoins.</p>
                    </div> 

                    <div class="section-title" data-aos="fade-up">
                        <img src="assets/img/visite-texte.png" class="img-fluid" alt="visite-texte">
                    </div>

                </div>
            </div>

        </div>
        <br>
        <!--        <div class="container">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">Solutions <span>PAIE</span></a></h4>
                        <p class="description">Que votre effectif soit local ou international, nous pouvons optimiser le processus de rémunération en vous libérant des tâches chronophages à faible valeur ajoutée.</p>
                    </div>
        
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">Solutions <span>GESTION DES TEMPS</span></a></h4>
                        <p class="description">Facilitez l’aménagement du temps de travail et la planification.</p>
                    </div>
        
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">Solutions <span>RH</span></a></h4>
                        <p class="description">Découvrez nos solutions basées sur le cloud pour automatiser et piloter vos processus RH, dont la gestion des temps, de la formation ou les revues de performance.</p>
                    </div>
                </div>  -->

    </section><!-- End Section Notre histoire -->

    <!-- ======= About Lists Section ======= -->
    <section class="about-lists">
        <div class="container">

            <div class="row no-gutters">

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
                    <h4>Une grande simplicité</h4>
                    <p>Nous nous occupons de tout de A à Z. Cela permet à vos équipes de libérer du temps sur votre ceour de métier.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
                    <h4>La sécurité avant tout</h4>
                    <p>Sécurité et Confidentialité, sont nos deux maîtres-mots.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
                    <h4>A votre disposition</h4>
                    <p>Nos équipes d’experts sont là pour répondre à vos questions.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
                    <h4>Accessible à tous</h4>
                    <p>Que vous soyez une TPE ou une PME, nous sommes là pour vous.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
                    <h4>Expertise technique</h4>
                    <p>Un suivi rigoureux de l'actualité juridique est necessaire de nos jours. Nous le faisons pour vous.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
                    <h4>Satisfaction client et qualité du service</h4>
                    <p>Trouver les solutions les mieux adaptées à vos besoins sont nos priorités. </p>
                </div>

            </div>

        </div>
    </section><!-- End About Lists Section -->

</main><!-- End #main -->
<script>
//            $("#menu_ogelie").css("color", "#10A05B");
//            $("#menu_notrehistoire").css("color", "#10A05B");
    $("#menu_notrehistoire").toggleClass("menu_notrehistoire");
</script>
<?php
require("footer.php");
?>
