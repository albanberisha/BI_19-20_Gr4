var kohaAktuale = new Date().getMinutes();
if (kohaAktuale % 2 == 0) {
    document.body.style.backgroundImage = "url('images/back.png')";
} else {

    document.body.style.backgroundImage = "url('images/back1.jpg')";
}