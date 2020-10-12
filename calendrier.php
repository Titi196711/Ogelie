<?php
require("header.php");
?>
<!--<!DOCTYPE html>-->
<html>
    <head>
        <!--<meta charset="UTF-8">-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->        
        <title>Calendrier</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="assets/css/calendar.css">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/locale/fr.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css"/>
    </head>

    <body>
        <h1>
            <button id="gauche" name="gauche" type="button" onclick="moismoins()">
                <svg class="bi bi-chevron-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 010 .708L5.707 8l5.647 5.646a.5.5 0 01-.708.708l-6-6a.5.5 0 010-.708l6-6a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                </svg>
            </button>
            <span id="jour"> </span><span id="le"> </span><span id="mois"> </span><span id="annee"> </span>
            <button id="droite" name="droite" type="button" onclick="moisplus()">
                <svg class="bi bi-chevron-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
                </svg>
            </button>
        </h1>
        <div id="calendrier">
        </div>
    </body>
</html>

<script>
    //Coloriage du menu en turquoise
    //            $("#menu_nousrecrutons").css("color", "#10A05B");
    $("#menu_calendrier").toggleClass("menu_calendrier");
</script>

<script src="assets/js/calendar.js"></script>

<?php
require('footer.php');
?>