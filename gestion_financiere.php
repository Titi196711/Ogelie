<?php
include("header.php");
?>
<head>
    <link rel="stylesheet" href="assets/css/style_g_admin.css">
    <link rel="stylesheet" href="assets/css/animate.css">
</head>
<body>
    <h2 style="color: #b3b1b2;">Processus de gestion financière</h2>
    <br>
    <div class="flip-card">
        <img src="assets/img/gd_fleche_gauche.png" alt="fleche pour changer de coté" id="gd_fl_gc"/>
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <h3 style="text-align: center;">Aleris fait les déclarations <br>auprès des centres</h3>
                <br>
                <ul>
                    <li>Déclarations des embauches mensuelles</li>
                    <li>Adhésion dans un nouveau centre si nécessaire</li>
                    <li>Déclarations effectifs trimestrielles ou annuelles</li>
                </ul>
            </div>
            <div class="flip-card-back">
                <h3 style="text-align: center;">Aleris reçoit et paye les factures <br>reçues des centres</h3>
                <br>
                <ul>
                    <li>Factures d’adhésion</li>
                    <li>Factures de cotisations trimestrielles ou annuelles</li>
                    <li>Factures Absences non excusées</li>
                    <li>Factures Laboratoires</li>
                </ul>
            </div>
        </div>
        <img src="assets/img/gd_fleche_droite.png" alt="fleche pour changer de coté" id="gd_fl_dt"/>
    </div>
<script>
//            $("#menu_ogelie").css("color", "#10A05B");
//            $("#menu_notrehistoire").css("color", "#10A05B");
    $('#menu_nosoffres').toggleClass("menu_nosoffres")
    $("#menu_gestionfin").toggleClass("menu_gestionfin");
</script>
    <script src="assets/js/scroll.js"></script>
</body>

<?php
require("footer.php");
?>