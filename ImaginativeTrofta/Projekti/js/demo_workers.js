var startoKohen = true;

function koha(koha0) {
    var koha = (new Date()).valueOf();
    // diferenca mes kohes se tanishme dhe koha0
    var diferenca = koha - koha0;
    var minutat = Math.floor(diferenca / 1000 / 60);
    var secondat = Math.floor(diferenca / 1000) - minutat * 60;
    var gjendja = null;
    //kthimi i minutave ne string
    minutat = minutat.toString();
    // nese minutat jane me pak se 0, shto nje "0" para
    if (minutat.length == 1) {
        minutat = "0" + minutat;
    }
    // nese sekondat jane me pak se 0, shto nje "0" para
    secondat = secondat.toString();
    if (secondat.length == 1) {
        secondat = "0" + secondat;
    }

    postMessage(minutat + ":" + secondat);
}

if (startoKohen) {
    var kohatanishme = (new Date()).valueOf();
    gjendja = setInterval(function() { koha(kohatanishme) }, 100);
    startoKohen = false;
}