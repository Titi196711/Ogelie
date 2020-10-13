let aujour = new Date();
let jour = aujour.getDay();
let le = aujour.getDate();
let mois = aujour.getMonth();
let annee = aujour.getFullYear();

calendar();

function calendar() {
    let jourlettre = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
//document.getElementById("jour").innerHTML = jourlettre[jour]; //+1 les jours de la semaine 0 - 6

//document.getElementById("le").innerHTML = le;

    let moislettre = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    if (document.getElementById("mois") !== null) {
        document.getElementById("mois").innerHTML = moislettre[mois] + " "; //+1 les mois vont de 0 - 11
    }
    if (document.getElementById("annee") !== null) {
        document.getElementById("annee").innerHTML = annee;
    }
//console.log(aujour.getFullYear());

    premierjour = new Date(annee, mois, 1);
    dernierjour = new Date(annee, mois + 1, 0);
    console.log('Premier jour en lettre ' + jourlettre[premierjour.getDay()]);
    console.log('Premier jour du mois ' + premierjour.getDay());
    console.log('Dernier jour du mois : ' + dernierjour.getDate());
    let dimanche = 0;
    let precsuiv = premierjour.getDay() - 1;
    if (premierjour.getDay() === 0) {
        dimanche = 7;
        precsuiv = 6;
    }
    console.log('Dimanche ' + dimanche);

//création d'un tablleau
//mois précédent
    let jo = [];
    for (let i = 1; i < premierjour.getDay() + dimanche; i++) {
        jo[i] = new Date(annee, mois, i - precsuiv);
    }
//mois en cours
    let c = 1;
    for (let i = premierjour.getDay() + dimanche; i <= premierjour.getDay() + dimanche + dernierjour.getDate(); i++) {
        jo[i] = new Date(annee, mois, c);
        c++;
    }
//mois suivant
    for (let i = premierjour.getDay() + dimanche + dernierjour.getDate(); i <= 42; i++) {
        jo[i] = new Date(annee, mois, i - precsuiv);
    }

    //si l'écran fait moins de 1000px alors réduire les noms
    if (screen.width < 1000) {
        jourlettre = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
        moislettre = ['Jan', 'Fèv', 'Mar', 'Avr', 'Mai', 'Jui', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dèc'];
    }

    //création de la grille
    let cal = '<div class="jour">' + jourlettre[1] + '</div><div class="jour">' + jourlettre[2] + '</div><div class="jour">' + jourlettre[3] + '</div><div class="jour">' + jourlettre[4] + '</div><div class="jour">' + jourlettre[5] + '</div><div class="jour">' + jourlettre[6] + '</div><div class="jour">' + jourlettre[0] + '</div><br/>';
    c = 1;
    for (let i = 1; i <= 42; i++) {
        b = jo[i].getDate();
        if (i >= premierjour.getDay() + dimanche && i <= premierjour.getDay() + dimanche + dernierjour.getDate() - 1 && jo[i].getDay() >= 1 && jo[i].getDay() <= 5) {
            cal += '<div class="jour"><button id="j' + b + '" name="j' + b + '" type="button" onclick="appeljournee(' + b + ')">' + b + '</button></div>';
            c++;
        } else {
            cal += '<div class="jour">' + b + '</div>';
        }
    }
    if (document.getElementById('calendrier') !== null) {
        document.getElementById('calendrier').innerHTML = cal;
    }
    //Jours Fériés
    let jf = []; //attention les mois commence à 0
    jf[0] = new Date(annee, 0, 1); // jour de l'an
    jf[1] = new Date(annee, 03, 13); //Lundi de paques
    jf[2] = new Date(annee, 04, 01); //Fete du travail
    jf[3] = new Date(annee, 04, 08); //Victoire de 1945
    jf[4] = new Date(annee, 04, 21); //Jeudi de l'ascension
    jf[5] = new Date(annee, 05, 01); //Lundi de Pentecote
    jf[6] = new Date(annee, 06, 14); //Fete Nationale
    jf[7] = new Date(annee, 07, 15); //Assomption
    jf[8] = new Date(annee, 10, 01); //La toussaint
    jf[9] = new Date(annee, 10, 11); //Armistice
    jf[10] = new Date(annee, 11, 25); //Noel

    let G = annee % 19
    let C = Math.floor(annee / 100)
    let H = (C - Math.floor(C / 4) - Math.floor((8 * C + 13) / 25) + 19 * G + 15) % 30
    let I = H - Math.floor(H / 28) * (1 - Math.floor(H / 28) * Math.floor(29 / (H + 1)) * Math.floor((21 - G) / 11))
    let J = (annee * 1 + Math.floor(annee / 4) + I + 2 - C + Math.floor(C / 4)) % 7
    let L = I - J
    let MoisPaques = 3 + Math.floor((L + 40) / 44)
    let JourPaques = L + 28 - 31 * Math.floor(MoisPaques / 4)
    let Paques = new Date(annee, MoisPaques - 1, JourPaques)
    let VendrediSaint = new Date(annee, MoisPaques - 1, JourPaques - 2)
//    let LundiPaques = new Date(annee, MoisPaques - 1, JourPaques + 1)
    jf[1] = new Date(annee, MoisPaques - 1, JourPaques + 1)
//    let Ascension = new Date(annee, MoisPaques - 1, JourPaques + 39)
    jf[4] = new Date(annee, MoisPaques - 1, JourPaques + 39)
    let Pentecote = new Date(annee, MoisPaques - 1, JourPaques + 49)
    let LundiPentecote = new Date(annee, MoisPaques - 1, JourPaques + 50)
    jf[5] = new Date(annee, MoisPaques - 1, JourPaques + 50)

    for (let i = 1; i <= 42; i++) {
        for (let j = 0; j < 11; j++) {
            if (jo[i] === jf[j]) {
                document.getElementById('j' + i).innerHTML = '<div class="jour">' + jo[i].getDate() + '</div>';
            }
        }
    }
}
// 
function moismoins() {
    mois--;
    if (mois < 0) {
        annee--;
        mois = 11;
    }
    calendar();
}
function moisplus() {
    mois++;
    if (mois > 11) {
        annee++;
        mois = 0;
    }
    calendar();
}
function appeljournee(j) {
    let jourlettre = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    let moislettre = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    choix = new Date(annee, mois, j);
    console.log('choix' + choix);
    j_annee = choix.getFullYear();
    j_mois = moislettre[choix.getMonth()];
    j_jour = choix.getDate();
    j_j = jourlettre[choix.getDay()];
    console.log('JJ ' + j_j + ' ' + j_jour + ' ' + j_mois + ' ' + j_annee);
//    window.open('jourheure.html');
    document.location.href = 'rendezvous.php?jh=' + j_j + '/' + j_jour + '/' + j_mois + '/' + j_annee;
//    document.getElementById('choixjour').innerHTML = 'Pour le ' + j_j + ' ' + j_jour + ' ' + j_mois + ' ' + j_annee;
}

function twRequeteVariable(sNom, sUrl) {
    if (!sUrl)
        sUrl = window.location.href;
//    console.log('sURL = ' + sUrl);
    sNom = sNom.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + sNom + "(=([^&#$]*)|&|#|$)"),
            sResults = regex.exec(sUrl);
//    console.log('sResutls = ' + sResults);
    if (!sResults)
        return null;
    if (!sResults[2])
        return '';
    document.getElementById('choixjour').innerHTML = 'Pour le ' + decodeURIComponent(sResults[2].replace(/\/+/g, " "));
    return decodeURIComponent(sResults[2].replace(/\/+/g, " "));
}

function messa() {
    let lemessage = 'VISITE MÉDICALE \n';
    lemessage += "Je m'appelle " + $(prenomcontact).val() + ' ' + $(nomcontact).val() + '\n';
    lemessage += "Pour la société : " + $(ste).val() + '\n';
    lemessage += "Vous pouvez me contacter " + $(phonecontact).val() + ' ou par courriel : ' + $(mailcontact).val() + '\n';
    lemessage += "Je souhaite prendre un rendez-vous pour le \n";
    lemessage += twRequeteVariable('jh').replace("/", " ");
    lemessage += " à " + $(time).val() + '\n';
    lemessage += "Merci \n";
    lemessage += "Bien cordialement.";
    $(message).val(lemessage);
}
