<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Imaginative Template</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="cssiseminarit.css">
    <style>
        ul li {
            list-style: none;
            display: inline;
        }
    </style>
</head>

<body>
<?php
session_start();
$file = fopen("TeRejat.txt","r");
$i=0;
while(! feof($file))
{
$Teksti[$i]=fgets($file). "<br />";
$i=$i+1;
}
$TeRejat=explode("  ",$Teksti[$i-1]);
fclose($file);

$Handikos=array("Si","shenje","respekti","dhe","solidariteti","per","personat","me","aftesi","te","kufizuara","kjo","pjese","eshte","punim","i","tyre");
?>

    <div class="page-wrap">
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
                <a href="Seminari.php" class="aktiv">BALLINA</a>
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
                <a href="adminSite.php" <?php
                 if(isset($_SESSION['admin']) && $_SESSION['admin']==1)
                 { }else{
                    echo " style='display: none';";
                 } ?> >Menaxho Te Rejat</a>
            </nav>
        </header>

        <main id="home">
            <div class="diferentpages">
                <div class="slideShow">
                    <div class="imageHolder">
                        <img src="images/un1.jpg">
                        <div class="bottom-right" style="position: absolute;bottom: 2vmax;right: 1vmax;width: 50%;height: 10vmax;background: rgba(255, 255, 255, 0.7);padding-bottom: 1vmax;padding-left: 1vmax;">
                            <h3>Vilat</h3>
                            <p>Ketu jane paraqitur villat ne Istog,perkatesisht ne Troftë </p>
                        </div>
                    </div>
                    <div class="imageHolder">
                        <img src="images/un2.jpg" alt="imazhi nuk eshte ne dispozicion">
                        <div class="bottom-right" style="position: absolute;bottom: 2vmax;right: 1vmax;width: 50%;height: 10vmax;background: rgba(255, 255, 255, 0.7);padding-bottom: 1vmax;padding-left: 1vmax;">
                            <h3>Bazeni i peshqeve</h3>
                            <p>Ketu kemi paraqitur se si duket pamja nga villat ne Troftë </p>
                        </div>
                    </div>
                    <div class="imageHolder">
                        <img src="images/un3.jpg" alt="imazhi nuk eshte ne dispozicion">
                        <div class="bottom-right" style="position: absolute;bottom: 2vmax;right: 1vmax;width: 50%;height: 10vmax;background: rgba(255, 255, 255, 0.7);padding-bottom: 1vmax;padding-left: 1vmax;">
                            <h3>Dekorime</h3>
                            <p>Ketu kemi paraqitur nje dekorim mjaft te veqantë me emrin e Troftës </p>
                        </div>
                    </div>
                    <div class="imageHolder">
                        <img src="images/un4.jpg" alt="imazhi nuk eshte ne dispozicion">
                        <div class="bottom-right" style="position: absolute;bottom: 2vmax;right: 1vmax;width: 50%;height: 10vmax;background: rgba(255, 255, 255, 0.7);padding-bottom: 1vmax;padding-left: 1vmax;">
                            <h3>Pamje</h3>
                            <p>Nje pamje tjeter e villave </p>
                        </div>
                    </div>
                    <div class="imageHolder">
                        <img src="images/un5.jpg" alt="imazhi nuk eshte ne dispozicion">
                        <div class="bottom-right" style="position: absolute;bottom: 2vmax;right: 1vmax;width: 50%;height: 10vmax;background: rgba(255, 255, 255, 0.7);padding-bottom: 1vmax;padding-left: 1vmax;">
                            <h3>Vizitor</h3>
                            <p>Ndersa si pamje te fundit kemi zgjedhur nje vizitor </p>
                        </div>
                    </div>
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                    </div>
                </div>
                <div class="artikujt">
                    <form class="forma">
                        <fieldset class="nr1">
                            <legend style="font-size: 1.5vmax;">Te rejat</legend>
                            <table class="terejat">
                                <tr>
                                    <td>
                                        <div id="service">
                                            <img src="images/uji.jpg" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                                            <h3><a href="http://www.trofta.eu/historiku.html" target="_blank" alt="fotoja nug hapet">
                                                
                                                <?php echo  $TeRejat[0] ; ?>
                                            </a></h3>
                                            <p><?php echo  $Teksti[0] ; ?>
                                            </p>
                                        </div>
                                        <div id="service">
                                            <img src="images/kuzhina.jpg" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                                            <h3><a href="http://www.trofta.eu/restoranti-veror.html" target="_blank"><?php echo  $TeRejat[1] ; ?></a></h3>
                                            <p><?php echo  $Teksti[1] ; ?>
                                            </p>
                                        </div>
                                        <div id="service">
                                            <img src="images/restauranti.jpg" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                                            <h3><a href="http://www.trofta.eu/salla-e-dasmave.html" target="_blank"><?php echo  $TeRejat[2] ; ?></a></h3>
                                            <p><?php echo  $Teksti[2] ; ?>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="service">
                                            <img src="images/food.jfif" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                                            <h3><a href="http://www.trofta.eu/produktet.html" target="_blank"><?php echo  $TeRejat[3] ; ?></a></h3>
                                            <p><?php echo  $Teksti[3] ; ?>
                                            </p>
                                        </div>
                                        <div id="service">
                                            <img src="images/food2.jfif" alt="Fotoja nuk eshte ne dispozicion" width="64px" height="64px" />
                                            <h3><a href="http://www.trofta.eu/meny-peshku.html" target="_blank"><?php echo  $TeRejat[4] ; ?></a></h3>
                                            <p><?php echo  $Teksti[4] ; ?>
                                            </p>
                                        </div>
                                        <div id="service">
                                            <img src="images/un1.jpg" alt="Teksti zevendesuses" width="64px" height="64px" />
                                            <h3><a href="http://www.trofta.eu/kampshtepizat.html" target="_blank"><?php echo  $TeRejat[5] ; ?></a></h3>
                                            <p><?php echo  $Teksti[5] ; ?>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                    <table class="terejat2">
                        <tr>
                            <td>
                                <div id="service">
                                    <form class="forma">
                                        <fieldset id="nr2">
                                            <legend class="angazhimet">ANGAZHIME</legend>

                                            <img src="images/1-2.jpg" width="128px" height="128px">
                                            <h3><a href="https://odaeafarizmit.org/oak-dhe-trofta-istog-organizojne-festivalin-dita-e-peshkut-per-te-dytin-vit-me-radhe/" target="_blank">Festivali i peshkimit</a></h3>
                                            <p class="takim">Sot është mbajtur eventi tashmë tradicional ”Dita e Peshkut” në Istog, organizuar nga Oda e Afarizmit të Kosovës dhe Kompania Trofta.<span id="dots">...</span>
                                                <span id="more">
Ky aktivitet është mbajtur në ambientet e Trofta Istog, ku morën pjesë përfaqësues ndërkombëtar, Kryetari i Komunës së Istogut, zyrtarë nga ministria e Bujqësisë, Komiteti Olimpik i Kosovës, përfaqësues nga Agjencia e Veterinës dhe Ushqimit, Klube të peshkimit nga qytete të ndryshme të Kosovës, si nga Istogu, Trofta nga Peja, Krapi nga Prishtina, dhe shoqata nga qytete të tjera të peshkut përfshirë Ferizajin, Vushtrrinë, Gjilanin, Podujevën, Malishevën si dhe përfaqësues nga mediat dhe qytetarë të shumtë.</span>
                                                <br/>
                                                <a href="#opening" class="readmore" onclick="myFunction()" id="myBtn">Read more &#8811</a>
                                            </p>
                                        </fieldset>
                                    </form>
                                </div>
                                <div id="service2">
                                    <form class="Fforma">
                                        <fieldset id="nr2">
                                            <legend>PUBLIKIME</legend>
                                            <blockquote>
                                                </backquote>
                                                <p class="author">HANDIKOS <br/><a href="logocanvas.html" target="_blank">Shiko punimin &#8250</a>
                                                    <p class="p "><?php echo implode(" ",$Handikos);  ?></p>
                                                </p>
                                        </fieldset>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <nav class="buttongroup1 ">
                        <div class="info ">
                            <h1>
                            Deshironi te aplikoni per pune?</h1>
                            <p>Dergo te dhenat tuaja tani duke na kontaktuar.</p>

                        </div>
                        <div class="contactusnow ">
                            <a href="workapply.php "><small>NA KONTAKTONI SOT</small></a>

                        </div>
                    </nav>
                </div>
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
                                        <input type="text" placeholder="Emaili"required  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" id="email" name="email" required="required">
                                        
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
    runFunction();
}

function runFunction()
{
    $_SESSION['admin']=false;
    $_SESSION['user']= false;
}

?>
