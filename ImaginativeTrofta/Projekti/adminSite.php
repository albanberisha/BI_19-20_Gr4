<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit1'])) {
        $v_titulli = $_POST['titulli'];
        $v_komenti = $_POST['komenti'];

        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }

        $titulli = validation($v_titulli);
        $koment = validation($v_komenti);
        $titulli_error = $komenti_error = "";

        if (empty($titulli)) {
            $titulli_error = "</br>Shkruani nje titull";
        } elseif (empty($koment)) {
            $komenti_error = "</br>Shkruani nje koment";
        } else {
            ndrysho(1, $v_titulli, $v_komenti);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit2'])) {
        $v_titulli2 = $_POST['titulli2'];
        $v_komenti2 = $_POST['komenti2'];

        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }

        $titulli2 = validation($v_titulli2);
        $koment2 = validation($v_komenti2);
        $titulli_error2 = $komenti_error2 = "";

        if (empty($titulli2)) {
            $titulli_error2 = "</br>Shkruani nje titull";
        } elseif (empty($koment2)) {
            $komenti_error2 = "</br>Shkruani nje koment";
        } else {
            ndrysho(2, $v_titulli2, $v_komenti2);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit3'])) {
        $v_titulli3 = $_POST['titulli3'];
        $v_komenti3 = $_POST['komenti3'];

        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }

        $titulli3 = validation($v_titulli3);
        $koment3 = validation($v_komenti3);
        $titulli_error3 = $komenti_error3 = "";

        if (empty($titulli3)) {
            $titulli_error3 = "</br>Shkruani nje titull";
        } elseif (empty($koment3)) {
            $komenti_error3 = "</br>Shkruani nje koment";
        } else {
            ndrysho(3, $v_titulli3, $v_komenti3);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit4'])) {
        $v_titulli4 = $_POST['titulli4'];
        $v_komenti4 = $_POST['komenti4'];

        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }

        $titulli4 = validation($v_titulli4);
        $koment4 = validation($v_komenti4);
        $titulli_error4 = $komenti_error4 = "";

        if (empty($titulli4)) {
            $titulli_error4 = "</br>Shkruani nje titull";
        } elseif (empty($koment4)) {
            $komenti_error4 = "</br>Shkruani nje koment";
        } else {
            ndrysho(4, $v_titulli4, $v_komenti4);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit5'])) {
        $v_titulli5 = $_POST['titulli5'];
        $v_komenti5 = $_POST['komenti5'];

        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }

        $titulli5 = validation($v_titulli5);
        $koment5 = validation($v_komenti5);
        $titulli_error5 = $komenti_error5 = "";

        if (empty($titulli5)) {
            $titulli_error5 = "</br>Shkruani nje titull";
        } elseif (empty($koment5)) {
            $komenti_error5 = "</br>Shkruani nje koment";
        } else {
            ndrysho(5, $v_titulli5, $v_komenti5);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit6'])) {
        $v_titulli6 = $_POST['titulli6'];
        $v_komenti6 = $_POST['komenti6'];

        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }

        $titulli6 = validation($v_titulli6);
        $koment6 = validation($v_komenti6);
        $titulli_error6 = $komenti_error6 = "";

        if (empty($titulli6)) {
            $titulli_error6 = "</br>Shkruani nje titull";
        } elseif (empty($koment6)) {
            $komenti_error6 = "</br>Shkruani nje koment";
        } else {
            ndrysho(6, $v_titulli6, $v_komenti6);
        }
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Site</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="cssiseminarit.css">
    <style>
        #service{
            width: 100%;
        }
        .titullo,.komenti,.butoni{
            
            padding-bottom: 3px
        }
        .titullo input, .komenti textarea
        {margin-right: 10px;
            width:30vmax;
            height: 2vmax
        }
        .komenti textarea
        { 
            height: 5vmax;
        }

    </style>
</head>

<body>
<header>
            <div class="mainMenu">
                <ul class="icons">
                    <li>
                        <a href="https://www.linkedin.com/" class="in"></a>
                        <a href="https://www.facebook.com/trofta/" class="facebook"></a>
                        <a href="mailto:trofta@gmail.com" class="googleplus"></a>
                        <a href="https://twitter.com/" class="twitter"></a>
                        <a href="https://www.instagram.com/trofta.istog/" class="instagram"></a>
                    </li>
                </ul>
                <ul class="login">
                    <li>
                    <a href="?out"<?php 
                    if(isset($_SESSION['admin']) || (isset($_SESSION['user']))){
                        if((isset($_SESSION['admin']) && $_SESSION['admin']==0) && ((isset($_SESSION['user']) && $_SESSION['user']==0)))
                        { echo " style='display: none';";}
                    }else{
                        echo " style='display: none';";
                    }?> >Dil |</a>

                    <a href="login.php"<?php 
                    if(isset($_SESSION['admin']) || (isset($_SESSION['user']))){
                        if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
                        { echo " style='display: none';";}
                        if(isset($_SESSION['user']) && $_SESSION['user']==1)
                        { echo " style='display: none';";}
                    }else{
                    }?> >Hyr |</a>
                    <a href="sign.php"<?php 
                    if(isset($_SESSION['admin']) || (isset($_SESSION['user']))){
                        if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
                        { echo " style='display: none';";}
                        if(isset($_SESSION['user']) && $_SESSION['user']==1)
                        { echo " style='display: none';";}
                    }else{
                    }?>>Regjistrohu |</a>
                    <a href="logosvg.html">Logo</a>
                    </li>
                </ul>
            </div>
            <nav class="imaginative">
                <p><span class="firstLetter">T</span>ROFTA</p>
                <table id="t1">
                    <tr>
                        <td rowspan="2">
                            <p> Restaurant <br> dhe Hotel
                        </td>
                    </tr>
                </table>
                <ul>
                    <li><input type="search" placeholder="Kerko Ne Webin Tone..."></li>
                    <li><button id="kerkim">KERKO</button></li>
                </ul>
            </nav>
            <nav class="buttongroup">
                <a href="Seminari.php">BALLINA</a>
                <a href="Gallery.php">Galeria</a>
                <a href="menaxhmenti.php">MENAXHMENTI</a>
                <a href="geolocation.php">LOKACIONI</a>
                <a href="accountdetails.php" 
                <?php 
                    if(isset($_SESSION['admin']) || (isset($_SESSION['user']))){
                        if((isset($_SESSION['admin']) && $_SESSION['admin']==0) && ((isset($_SESSION['user']) && $_SESSION['user']==0)))
                        { echo " style='display: none';";}
                    }else{
                        echo " style='display: none';";
                    }?> >Llogaria</a>
                <a href="adminSite.php" class="aktiv"<?php
                 if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
                 { }else{
                    echo " style='display: none';";
                 } ?> >Menaxho Te Rejat</a>
            </nav>
        </header>
    <?php
    $file = fopen("TeRejat.txt", "r");
    $i = 0;
    while (!feof($file)) {
        $Teksti[$i] = fgets($file) . "<br />";
        $i = $i + 1;
    }
    $TeRejat = explode("  ", $Teksti[$i - 1]);
    fclose($file);
    ?>
    <main id="home" style="padding-top:10px;">
        <fieldset class="nr1" style="padding-bottom: 30px;">
            <table class="terejat" style=" width: 100%; margin-left:20px;">
                <tr >
                    <td>
                        <div id="service" >
                            <img src="images/uji.jpg" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                            <h3><a href="http://www.trofta.eu/historiku.html" target="_blank" alt="fotoja nug hapet">
                                    <?php echo  $TeRejat[0]; ?>
                                </a></h3>
                            <p><?php echo  $Teksti[0]; ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <form name="form1" method="POST">
                            <p class="titullo"><input type="text" size="30px" name="titulli" placeholder="Titulli" value="<?php echo @$_POST['titulli']; ?>" /></p>
                            <p><span style="color: red;"><?php echo @$titulli_error; ?></span></p>
                            <p class="komenti"><textarea name="komenti" cols="29"  placeholder="komenti" value="<?php echo @$_POST['komenti']; ?>"></textarea></p>
                            <p><span style="color: red;"><?php echo @$komenti_error; ?></span></p>
                            <p class="butoni">
                                <button type="submit" name="submit1">Ndrysho</button></p>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="service">
                            <img src="images/kuzhina.jpg" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                            <h3><a href="http://www.trofta.eu/restoranti-veror.html" target="_blank"><?php echo  $TeRejat[1]; ?></a></h3>
                            <p><?php echo  $Teksti[1]; ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <form name="form2" method="POST">
                            <p class="titullo"><input type="text" size="30px" name="titulli2" placeholder="Titulli" value="<?php echo @$_POST['titulli2']; ?>" /></p>
                            <p><span style="color: red;"><?php echo @$titulli_error2; ?></span></p>
                            <p class="komenti"><textarea name="komenti2"cols="29" placeholder="komenti" value="<?php echo @$_POST['komenti2']; ?>"></textarea></p>
                            <p><span style="color: red;"><?php echo @$komenti_error2; ?></span></p>
                            <p class="butoni">
                                <button type="submit" name="submit2">Ndrysho</button></p>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="service">
                            <img src="images/restauranti.jpg" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                            <h3><a href="http://www.trofta.eu/salla-e-dasmave.html" target="_blank"><?php echo  $TeRejat[2]; ?></a></h3>
                            <p><?php echo  $Teksti[2]; ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <form name="form3" method="POST">
                            <p class="titullo"><input type="text" size="30px" name="titulli3" placeholder="Titulli" value="<?php echo @$_POST['titulli3']; ?>" /></p>
                            <p><span style="color: red;"><?php echo @$titulli_error3; ?></span></p>
                            <p class="komenti"><textarea name="komenti3" cols="29" placeholder="komenti" value="<?php echo @$_POST['komenti3']; ?>"></textarea></p>
                            <p><span style="color: red;"><?php echo @$komenti_error3; ?></span></p>
                            <p class="butoni">
                                <button type="submit" name="submit3">Ndrysho</button></p>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="service">
                            <img src="images/food.jfif" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                            <h3><a href="http://www.trofta.eu/produktet.html" target="_blank"><?php echo  $TeRejat[3]; ?></a></h3>
                            <p><?php echo  $Teksti[3]; ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <form name="form4" method="POST">
                            <p class="titullo"><input type="text" size="30px" name="titulli4" placeholder="Titulli" value="<?php echo @$_POST['titulli4']; ?>" /></p>
                            <p><span style="color: red;"><?php echo @$titulli_error4; ?></span></p>
                            <p class="komenti"><textarea name="komenti4" cols="29" placeholder="komenti" value="<?php echo @$_POST['komenti4']; ?>"></textarea></p>
                            <p><span style="color: red;"><?php echo @$komenti_error4; ?></span></p>
                            <p class="butoni">
                                <button type="submit" name="submit4">Ndrysho</button></p>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="service">
                            <img src="images/food2.jfif" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                            <h3><a href="http://www.trofta.eu/meny-peshku.html" target="_blank"><?php echo  $TeRejat[4]; ?></a></h3>
                            <p><?php echo  $Teksti[4]; ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <form name="form5" method="POST">
                            <p class="titullo"><input type="text" size="30px" name="titulli5" placeholder="Titulli" value="<?php echo @$_POST['titulli5']; ?>" /></p>
                            <p><span style="color: red;"><?php echo @$titulli_error5; ?></span></p>
                            <p class="komenti"><textarea name="komenti5" cols="29" placeholder="komenti" value="<?php echo @$_POST['komenti5']; ?>"></textarea></p>
                            <p><span style="color: red;"><?php echo @$komenti_error5; ?></span></p>
                            <p class="butoni">
                                <button type="submit" name="submit5">Ndrysho</button></p>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="service">
                            <img src="images/un1.jpg" alt="Teksti zevendesuses" width="64px" height="64px" />
                            <h3><a href="http://www.trofta.eu/kampshtepizat.html" target="_blank"><?php echo  $TeRejat[5]; ?></a></h3>
                            <p><?php echo  $Teksti[5]; ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <form name="form6" method="POST">
                            <p class="titullo"><input type="text" size="30px" name="titulli6" placeholder="Titulli" value="<?php echo @$_POST['titulli6']; ?>" /></p>
                            <p><span style="color: red;"><?php echo @$titulli_error6; ?></span></p>
                            <p class="komenti"><textarea name="komenti6 " cols="29" placeholder="komenti" value="<?php echo @$_POST['komenti6']; ?>"></textarea></p>
                            <p><span style="color: red;"><?php echo @$komenti_error6; ?></span></p>
                            <p class="butoni">
                                <button type="submit" name="submit6">Ndrysho</button></p>
                        </form>
                    </td>
                </tr>
            </table>
        </fieldset>
        </div>
    </main>
</body>
<footer>
    <form class="forma2">
        <table class="pjesa_footer">
            <tr>
                <th class="lajmetefundit">
                    <h3>Të rejat nga menyja</h3>
                </th>
                <th class="tjera">
                    <h3>Detajet e kompanis&#235</h3>
                </th>
                <th class="tjera">
                    <h3>Na kontaktoni neve</h3>
                </th>
            </tr>
            <tr>
                <td class="pjesapare">
                    <div id="tefundit">
                        <img src="images/peshkutrofta.jpg" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                        <h3><a href="https://www.youtube.com/watch?v=-H5k2pbQysE" target="_blank">Ushqimi më i kerkuar</a></h3>
                        </br>
                        <p class="teksti">Peshku trofta që njëkohësisht edhe rritet në bazenat tonë është ushqimi më i parapëlqyer i gjithë menysë.
                        </p>
                    </div>
                </td>
                <td rowspan="2">
                <?php
                $myfile = fopen("Footeri.txt", "r") or die("File-i nuk po gjindet!");
                echo fread($myfile,filesize("Footeri.txt"));
                fclose($myfile);
                ?>
                </td>
                <td class="aaa" rowspan="2">
                    <div class="forma3">
                        <form id="forme" method="post">
                            <p>
                                <ol class="inline2">
                                    <li>
                                        <input type="text" placeholder="Sh&#235no Emrin" id="uname" class="uname" name="uname" required="required">
                                    </li>
                                </ol>
                            </p>
                            <p>
                                <ol class="inline2">
                                    <li>
                                        <input type="text" placeholder="Emaili" id="email" name="email" required="required">
                                        
                                    </li>
                                </ol>

                            </p>
                            <p>
                                <ol class="inline2">
                                    <li class="area">
                                        <textarea placeholder="Mesazhi" id="mesazhi" required="required"></textarea>
                                    </li>
                                </ol>
                            </p>
                            <p>
                                <a href="#" class="submiti2"><button onclick="validoo()">D&#235rgo</button></a>
                            </p>
                        </form>
                    </div>
                </td>
                <tr>
                    <td class="pjesapare">
                        <div id="tefundit">
                            <img src="images/shpageta.jpg" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                            <h3><a href="https://www.albinfo.ch/shpageta-me-salce-boloneze/" target="_blank">Shpageta boloneze</a></h3>
                            </br>
                            <p>Nga sot menys&#235 ton&#235 i shtohet edhe ushqimi m&#235 i kerkuar n&#235 vitin 2019.
                            </p>
                        </div>
                    </td>
                </tr>

        </table>
    </form>
    <hr>
    <div class="copyright">
        <p class="autoriale">
        <?php
        $year=date("Y");
   $copy_date = "E drejta autoriale &copy; 2019-Te gjitha te drejtat e rezervuara.";
   $copy_date = preg_replace("([0-9]+)", $year, $copy_date);
   
   print $copy_date;
?>
        </p>
        <p class="pjposhte">
            Template nga OS Template
        </p>
    </div>
    </div>
</footer>
<script src="js/seminari.js " type="text/JavaScript "></script>
<script src="js/readmore.js " type="text/javascript"></script>
<script src="js/valido.js " type="text/JavaScript "></script>

</html>
<?php
if (isset($_GET['out'])){
    echo '<script type="text/javascript">',
    "window.location.href = 'seminari.php';",
    '</script>'
;
    runFunction();
}

function runFunction()
{
    $_SESSION['admin']=false;
    $_SESSION['user']= false;
}

?>
<?php

function ndrysho($pjesa, $titullii, $komentii)
{
    $file = fopen("TeRejat.txt", "r+");
    $i = 0;
    $komentii = $komentii . "\n";
    while (!feof($file)) {
        $Teksti[$i] = fgets($file);
        $i = $i + 1;
    }
    $titullivjeter = explode("  ", $Teksti[6]);
    $Teksti[6] = str_replace($titullivjeter[$pjesa - 1], $titullii, $Teksti[6]);
    $Teksti[$pjesa - 1] = str_replace($Teksti[$pjesa - 1], $komentii, $Teksti[$pjesa - 1]);
    fclose($file);
    $file = fopen("TeRejat.txt", "r+");
    for($i=0 ; $i<sizeof($Teksti); $i=$i+1)
    {
    fwrite($file, $Teksti[$i]);
    }
    fclose($file);
}
?>


<!--Trofta ka sipërfaqe rreth 5 ha dhe shtrihet ne Veri-Perëndim te Kosovës.
Restoranti veror përfshinë një pjese te kompleksit te Kompanisë Trofta.
Për ditën tuaj me të veçantë ...
Produktet e shumta qe i ofron kompleksi Trofta
Ketu jane disa nga menyt e peshkut,ku paraqesim perberesit e atyre menyve.
Kampshtepizat per nje rahati sa ma te mire.
Historiku  Restoranti veror  Salla e dasmave  Produktet  Meny Peshku  Kampshtepizat -->