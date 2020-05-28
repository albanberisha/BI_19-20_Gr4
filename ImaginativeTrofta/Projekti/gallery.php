<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cssiseminarit.css">
    <link rel="stylesheet" href="reset.css">
    <title>Gallery</title>
    <style>
        @font-face {
            font-family: myFont;
            src: url(Sansation_Lightwebfont.woff);
        }

        p.tekstii {
            font-size: 1.25vmax;
            font-family: myFont;
            color: orangered;
        }
    </style>
</head>

<body>
    <?php
    class Trofta
    {
        var $emri;
        var $mbiemri;
        var $stina;
        var $data;


        function __construct($emri, $mbiemri, $stina, $data)
        {
            $this->emri = $emri;
            $this->mbiemri = $mbiemri;
            $this->stina = $stina;
            $this->data = $data;
        }
        function __destruct()
        {
            return " kjo foto eshte bere nga {$this->emri} {$this->mbiemri} gjate stines se {$this->stina}, {$this->data}.";
        }
        protected function autori()
        {
            echo "Dizajnuar nga: {$this->emri}, {$this->mbiemri}";
        }
    }

    class Testi extends Trofta
    {
        public function message()
        {
            $this->autori();
        }
    }

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
                <a href="Seminari.php" >BALLINA</a>
                <a href="Gallery.php"class="aktiv">Galeria</a>
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
        <main id="galleria">
            <div class="figura">
                <dl>
                    <dt>
                        <a href="images/00.png" data-lightbox="mygallery"><img src="images/00.png" alt="Fotoja nuk eshte ne dispozicion" width="800px" height="207px"></a>
                        <div class="desc">
                            <p class="tekstii">
                                <?php $aaa = new Trofta("Alban", "Berisha", "Veres", "2020");
                                $stringu = "Nje pamje mahnitese e Troftes,";

                                $stringu = $stringu . ($aaa->__destruct());

                                if (strlen($stringu) > 77) {
                                    $stringu1 = substr($stringu, 0, 77) . "-";
                                    printf($stringu1);
                                    printf("<br/>");
                                    $stringu2 = substr($stringu, 77, strlen($stringu) - 1);
                                    printf($stringu2);
                                } else {
                                    printf($stringu1);
                                }
                                ?>
                            </p>
                        </div>
                    </dt>
                </dl>
                <dl>
                    <dt>
                        <a href="images/01.jpg" data-lightbox="mygallery"><img src="images/01.jpg" alt="Fotoja nuk eshte ne dispozicion" width="800px" height="207px"></a>
                        <div class="desc">
                            <p class="tekstii">
                                <?php $aaa = new Trofta("Arti", "Sadikaj", "Vjeshtes", "2019");
                                $stringu = "Pamje e basenave te Troftes, ku edhe mirren peshqit e fresket,";

                                $stringu = $stringu . ($aaa->__destruct());

                                if (strlen($stringu) > 75) {
                                    $stringu1 = substr($stringu, 0, 75) . "-";
                                    printf($stringu1);
                                    printf("<br/>");
                                    $stringu2 = substr($stringu, 75, strlen($stringu) - 1);
                                    printf($stringu2);
                                } else {
                                    printf($stringu1);
                                }
                                ?>
                            </p>
                        </div>
                    </dt>
                </dl>
                <dl>
                    <dt>
                        <a href="images/02.jpg" data-lightbox="mygallery"><img src="images/02.jpg" alt="Fotoja nuk eshte ne dispozicion" width="800px" height="207px"></a>
                        <div class="desc">
                            <p class="tekstii">
                                <?php $aaa = new Trofta("Vullnet", "Llullaku", "Vjeshtes", "2019");
                                $stringu = "Pamje nga tarasa, duke kapur edhe bjeshket e Istogut,";

                                $stringu = $stringu . ($aaa->__destruct());

                                if (strlen($stringu) > 75) {
                                    $stringu1 = substr($stringu, 0, 75) . "-";
                                    printf($stringu1);
                                    printf("<br/>");
                                    $stringu2 = substr($stringu, 75, strlen($stringu) - 1);
                                    printf($stringu2);
                                } else {
                                    printf($stringu1);
                                }
                                ?>
                            </p>

                        </div>
                    </dt>
                </dl>
                <dl>
                    <dt>
                        <a href="images/03.jpg" data-lightbox="mygallery"><img src="images/03.jpg" alt="Fotoja nuk eshte ne dispozicion" width="800px" height="207px"></a>
                        <div class="desc">
                            <p class="tekstii">
                                <?php $aaa = new Trofta("Artan", "Zogaj", "Pranveres", "2020");
                                $stringu = "Nje tjeter pamje e basenave, kesaj here nga afer,";

                                $stringu = $stringu . ($aaa->__destruct());

                                if (strlen($stringu) > 76) {
                                    $stringu1 = substr($stringu, 0, 76) . "-";
                                    printf($stringu1);
                                    printf("<br/>");
                                    $stringu2 = substr($stringu, 76, strlen($stringu) - 1);
                                    printf($stringu2);
                                } else {
                                    printf($stringu1);
                                }
                                ?>
                            </p>
                        </div>
                    </dt>
                </dl>
                <dl>
                    <dt>
                        <a href="images/04.jpg" data-lightbox="mygallery"><img src="images/04.jpg" alt="Fotoja nuk eshte ne dispozicion" width="800px" height="207px"></a>
                        <div class="desc">
                            <p class="tekstii">
                                <?php $aaa = new Trofta("Blerim", "Hysenaj", "Pranveres", "2020");
                                $stringu = "Ketu shihet numri i madh i basenave qe posedojme,";

                                $stringu = $stringu . ($aaa->__destruct());

                                if (strlen($stringu) > 76) {
                                    $stringu1 = substr($stringu, 0, 76) . "-";
                                    printf($stringu1);
                                    printf("<br/>");
                                    $stringu2 = substr($stringu, 76, strlen($stringu) - 1);
                                    printf($stringu2);
                                } else {
                                    printf($stringu1);
                                }
                                ?>

                            </p>
                        </div>
                    </dt>
                </dl>
                <dl>
                    <dt>
                        <a href="images/05.jpg" data-lightbox="mygallery"><img src="images/05.jpg" alt="Fotoja nuk eshte ne dispozicion" width="800px" height="207px"></a>
                        <div class="desc">
                            <p class="tekstii">
                                <?php $aaa = new Trofta("Ismail", "Bytyci", "Dimrit", "2020");
                                $stringu = "Nje pamje gjate nates ne restaurant,";

                                $stringu = $stringu . ($aaa->__destruct());

                                if (strlen($stringu) > 77) {
                                    $stringu1 = substr($stringu, 0, 77) . "-";
                                    printf($stringu1);
                                    printf("<br/>");
                                    $stringu2 = substr($stringu, 77, strlen($stringu) - 1);
                                    printf($stringu2);
                                } else {
                                    printf($stringu1);
                                }
                                ?>
                            </p>
                        </div>
                    </dt>
                    <dt style="text-align:right; padding-bottom:10px; padding-right:5px;">
                        <p class="tekstii" style="color:white">
                            <?php
                            $testi = new Testi("Hysen", "Bytyqi", "Vere", "2020");
                            $testi->message();
                            ?>
                        </p>
                    </dt>
                </dl>
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
                    echo fread($myfile, filesize("Footeri.txt"));
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
            $year = date("Y");
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
<script src="js/valido.js " type="text/JavaScript "></script>

</html>
<?php
if (isset($_GET['out'])) {
    echo '<script type="text/javascript">',
    "window.location.href = 'seminari.php';",
    '</script>'
;
    runFunction();
}

function runFunction()
{
    session_start();
    $_SESSION['admin'] = false;
    $_SESSION['user'] = false;
}

?>