<?php
if (isset($_POST['id'])) {
    $info = "\n\nInformata:\n";
    $data = $_POST['id'];
    $filename = $data . ".txt";
    $putt = "Id: " . $data;
    $fp = fopen($filename, 'a+');
    fwrite($fp, $info);
    fwrite($fp, $putt);
}
if (isset($_POST['emri'])) {
    $data = $_POST['emri'];
    $putt = "\nEmri: " . $data;
    $fp = fopen($filename, 'a+');
    fwrite($fp, $putt);
}
if (isset($_POST['mbiemri'])) {
    $data = $_POST['mbiemri'];
    $putt = "\nMbiemri: " . $data;
    $fp = fopen($filename, 'a+');
    fwrite($fp, $putt);
}
if (isset($_POST['emaili'])) {
    $data = $_POST['emaili'];
    $putt = "\nEmaili: " . $data;
    $fp = fopen($filename, 'a+');
    fwrite($fp, $putt);
}
if (isset($_POST['pozita'])) {
    $pozita = $_POST['pozita'];
    $putt = "\nPozita: " . $pozita;
    $fp = fopen($filename, 'a+');
    fwrite($fp, $putt);
}
if (isset($_POST['vitet'])) {
    $pozita = $_POST['vitet'];
    $putt = "\nVite Eksperience: " . $pozita;
    $fp = fopen($filename, 'a+');
    fwrite($fp, $putt);
}
if (isset($_POST['komentet'])) {
    $data = $_POST['komentet'];
    $putt = "\nAftesi te tjera:" . $data;
    $fp = fopen($filename, 'a+');
    fwrite($fp, $putt);
}
?>