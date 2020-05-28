<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menaxhmenti</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="cssiseminarit.css">
</head>

<body>

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
                <a href="Seminari.php">BALLINA</a>
                <a href="Gallery.php">Galeria</a>
                <a href="menaxhmenti.php" class="aktiv">MENAXHMENTI</a>
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

        <main id="menaxhmenti">
            <nav>
                <p>Kjo eshte hapsire per klientet e Trofta-s.</p>
                <p>Qe te keni qasje shtyp kodin,ndersa per te pare orarin shkruani id te fusha id:</p>
                Kodi: <input id="kodi">
                <button id="kerko">Kerko</button>
                <div id="rezultati"></div>
                <form method="GET">
                    Id: <input id="kodi" type="text" name="id" placeholder="Shkruani id"> Enkriptimi:
                    <keygen name="security">
                    <button id="kerko" type="sumbit" name="submit">Kerko</button>
                </form>
                <?php
                if(isset($_GET['submit'])){
                    try {
                        $id=$_GET['id'];
                      checkNum($id);
                     $_SESSION['id']=$id;
                     header("Location: kodi.php");
                    }
                    
                    catch(Exception $e) {
                        $alert='alert("Vlera nuk perputhet me nje id valide");';
                        echo '<script language="javascript">';
                        echo $alert; 
                      echo '</script>';
                  }
                }
                    function checkNum($id) {
                        if($id < 100 || $id > 105)
                         {
                          throw new Exception("Gabim");
                        }
                     
                      }
                ?>

                <script>
                    var kodi = '12345';

                    function say_hi() {
                        var fname = document.getElementById('kodi').value;
                        try {

                            if ((fname.toLowerCase()).localeCompare(kodi) == 0) {
                                var pershendetje = 'Pershendetje klient i nderuar ';
                                var teksti = '</br>' +
                                    'Kompania jone eshte kompani serioze me tradite dhe organizim evropian. Sistemi i organizimit te gjithe kompanise eshte:' +
                                    '<ul class="nested">' +
                                    '<li>Drejtori' +
                                    '<ul>' +
                                    '<li class="round">Menaxheri i hotelit' +
                                    '<ul class="square">' +
                                    '<li>Pas hapjes se hotelit do te publikohet edhe sistemi per hotel</li>' +
                                    '</ul>' +
                                    '</li>' +
                                    '<li class="round">Menaxheri i restaurantit' +
                                    '<ul class="square">' +
                                    ' <li><input type="text" list="shefat"><datalist id="shefat"><option value="Shefi i kuzhines"><option value="Shefi i grillit"><option value="Shefi i thertores"> <option value="Shefi i pastrimit"><option value="Shefi i peshkut"><option value="Shefi i sallatave"> <option value="Shefi i mishit te pjekur"><option value="Pastruesit"></datalist></li>' +
                                    '</ul>' +
                                    '</li>' +
                                    '<ul>' +
                                    '<?php $age = array("S"=>"Shefi i salles", "K"=>"Kamarjer", "B"=>"Barist", "M"=>"Mikprites", "Mi"=>"Mirmbajtes"); asort($age); foreach($age as $x => $x_value) { echo  "<li>" . $x_value."</li>";}?>'+
                                    '</ul>' +
                                    '</li>' +
                                    '</li>' +
                                    '</u>' +
                                    '</li>' +
                                    '</ul>';


                                var html = pershendetje + teksti;
                                document.getElementById('rezultati').innerHTML = html;
                                throw html;

                            }
                            if (isNaN(fname)) throw 'Shkruaj numer';
                            else {
                                var error = 'Kodi gabim. Nese nuk e keni kodin atehere drejtohuni tek zyrat e tona. ';
                                throw error;
                            }
                        } catch (err) {
                            document.getElementById('rezultati').innerHTML = err;

                        }
                    }
                    document.getElementById('kerko').addEventListener('click', say_hi);
                </script>
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
