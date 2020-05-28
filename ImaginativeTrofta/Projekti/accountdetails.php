<?php
session_start();
class Tedhenat
{
    private $dbemaili;
    private $dbusername;
    private $dbpsw;
    private $dbhost = 'localhost:3306';
    private  $dbuser = 'root';
    private $dbpass = '';
    private $db = 'aplikuesit';

    public function setData($email)
    {
        $conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->db);
        if (!$conn) {
            $mesazhi = 'alert("Nuk mund te krijohet lidhja me databaze".mysqli_connect_errno())';
            echo '<script language="javascript">';
            echo die($mesazhi);
            echo '</script>';
        } else {
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if (!$query) {
                die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
            } else {
                while ($row = mysqli_fetch_assoc($query)) {
                    $this->dbemaili = $row['email'];
                    $this->dbpsw = $row['pasword'];
                    $this->dbusername = $row['username'];
                }
            }
        }
    }

    public function merrUsername()
    {
        return $this->dbusername;
    }
    public function merrEmailin()
    {
        return $this->dbemaili;
    }

    public function validoPaswordin($psw)
    {
        $validimi = false;
        $paswordisakt = $this->dbpsw;
        if (password_verify($psw, $paswordisakt)) {
            $validimi = true;
        }
        return $validimi;
    }

    public function ndryshoPaswordin($pswiri)
    {
        $pass_hash = password_hash($pswiri, PASSWORD_BCRYPT);
        $ruajtja = false;
        $paswordiIRI = $pass_hash;
        $email = $this->dbemaili;
        $sql = "UPDATE users SET pasword='$paswordiIRI' WHERE email='$email'";
        $conn2 = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->db);

        $retval2 = mysqli_query($conn2, $sql);
        if (!$retval2) {
            die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
        } else {
            $ruajtja = true;
        }
        return $ruajtja;
    }
    public function ndryshoUsername($uname)
    {
        $email = $this->dbemaili;
        $sql = "UPDATE users SET username='$uname' WHERE email='$email'";
        $conn2 = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->db);
        $retval2 = mysqli_query($conn2, $sql);
        if (!$retval2) {
            die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
        } else {
            $ruajtja = true;
        }
        return $ruajtja;

        $ruajtja = false;
        return $ruajtja;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit1'])) {
        $v_psw = $_POST['psw'];
        $v_pswri = $_POST['pswri'];
        $v_pswri2 = $_POST['pswri2'];
        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }
        $paswordi = validation($v_psw);
        $pswIRi = validation($v_pswri);
        $pswIRi2 = validation($v_pswri2);
        $paswordi_error = $passwordiri_error = $passwordiri2_error = "";
        $email = $_COOKIE['aktiv'];
        $tedhenat = new Tedhenat();
        $tedhenat->setData($email);
        if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $paswordi)) {
            $passwordi_error = "</br>Paswordi jo valid";
        } elseif (!($tedhenat->validoPaswordin($paswordi))) {
            $passwordi_error = "</br>Paswordi jo korrekt";
        } elseif (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $pswIRi)) {
            $passwordiri_error = "</br>Paswordi duhet ta permbajë: nje numer, nje shkronje te madhe dhe te vogel, nje karakter special @#-_$%^&+=§!? dhe me i gjate se 8 karaktere";
        } elseif (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $pswIRi2)) {
            $passwordiri2_error = "</br>Paswordat nuk perputhet";
        } elseif (!strcmp($pswIRi, $pswIRi2) == 0) {
            $$passwordiri2_error = "</br>Paswordat nuk perputhen";
        } else {
            $nderrimiPerfundim = $tedhenat->ndryshoPaswordin($v_pswri);
            if ($nderrimiPerfundim) {
                $mesazhi = 'alert("Paswordi u ndryshua me sukses")';
                echo '<script language="javascript">';
                echo $mesazhi;
                echo '</script>';
                header("Refresh:0");
            } else {
                $mesazhi = 'alert("E pamundur te azhurohen te dhenat.")';
                echo '<script language="javascript">';
                echo $mesazhi;
                echo '</script>';
            }
        }
    }
    if (!empty($email) && !empty($password) && !empty($password2)) {
        $msg = "</br>Validimi komplet";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit2'])) {
        $v_uname = $_POST['newusername'];
        $v_psw2 = $_POST['pasword'];
        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }
        $username = validation($v_uname);
        $psw = validation($v_psw2);

        $paswordgabim_error = $uname_error = "";
        $email = $_COOKIE['aktiv'];
        $tedhenat1 = new Tedhenat();
        $tedhenat1->setData($email);

        if (!preg_match('/^[a-z0-9][a-z0-9_]*[a-z0-9]$/', $username)) {
            $uname_error = "</br>Username eshte jo valid. Karakteri i pare dhe i fundit duhet te jete shkronje e vogel ose numer";
        } elseif (!($tedhenat1->validoPaswordin($v_psw2))) {
            $paswordgabim_error = "</br>Paswordi jo korrekt. Qe ta ndryshoni username duhet ta shenoni paswordin.";
        } else {
            $nderrimi2 = $tedhenat1->ndryshoUsername($v_uname);
            if ($nderrimi2) {
                $mesazhi2 = 'alert("Username u ndryshua me sukses")';
                echo '<script language="javascript">';
                echo $mesazhi;
                echo '</script>';
                header("Refresh:0");
            } else {
                $mesazhi = 'alert("E pamundur te azhurohen te dhenat.")';
                echo '<script language="javascript">';
                echo $mesazhi;
                echo '</script>';
            }
        }
    }

    if (!empty($email) && !empty($password) && !empty($password2)) {
        $msg = "</br>Validimi komplet";
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
        #target {
  background:#0099cc;
  width:300px;
  height:300px;
  height:160px;
  padding:5px;
  display:none;
}

.Hide
{
  display:none;
}
        #service {
            width: 100%;
        }

        .titullo,
        .komenti,
        .butoni {

            padding-bottom: 3px
        }

        .titullo input,
        .komenti textarea {
            margin-right: 10px;
            width: 30vmax;
            height: 2vmax
        }

        .komenti textarea {
            height: 5vmax;
        }

        .terejat td {
            padding-bottom: 3vmax;
        }

        .terejat {
            font-family: Verdana, Geneva, Tahoma, sans-serif, arial, helvetica;

            padding-top: 15px;
            border: 1px solid #A0A3A2;
            -webkit-box-shadow: 0px 4px 32px 20px rgba(121, 122, 122, 0.85);
            -moz-box-shadow: 0px 4px 32px 20px rgba(0, 0, 0, 0.85);
            box-shadow: 0px 4px 32px 20px rgba(121, 122, 122, 0.85);
        }

        .head {
            font-weight: bold;
        }

        .data {
            font-weight: bold;
        }

        #forma {
            font-size: 1.2vmax;
        }

        #psw,
        #pswri,
        #pswri2,
        #pasword,
        #newusername {
            border-radius: 0.5vmax;
            border-style: solid;
            border: 1px solid #93435c;
            height: 1.7vmax;
            width: 90%;
            font-size: 1.25vmax;
        }

        #psw:hover,
        #pswri:hover,
        #pswri2:hover,
        #pasword:hover,
        #newusername:hover {
            border: 1.2px solid #93435c;
        }

        #formaNdrroPsw p,
        #formandrrouname p {
            padding-bottom: 0.8vmax;
        }

        #formaNdrroPsw,
        #formandrrouname {
            margin-left: 5px;
        }

        .buton {
            border-radius: 0.5vmax;
            border: 1vmax;
            width: 90%;
            height: 2.6vmax;
            font-size: 1.25vmax;
            background-color: #93435c;
            color: white;
        }

        .inline span {
            font-size: 1vmax;
        }

        #forma td {
            width: 50%;
        }
        #vendose
        {
            display: none;
        }
    </style>
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
                <a href="accountdetails.php" class="aktiv"
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
    <main id="home" style="padding-top:30px; padding-bottom:30px;">
        <table class="terejat" style=" margin-left:20%; width: 50%; text-align:center; background-color: #F1F5F4;">
            <tr id="forma">
                <td width="50%">
                    <form method="POST" id="formaNdrroPsw" name="formaime">
                        <p>
                            <label class="required" for="password" id="text"><b>Sheno paswordin e vjeter:</b></label>

                            <ul class="inline">
                                <li>
                                    <input type="password" name="psw" id="psw" placeholder="Sheno paswordin e vjeter" value="<?php echo @$_POST['psw']; ?>" />
                                    <span style="color: red;"><?php echo @$passwordi_error; ?></span>
                                </li>
                            </ul>
                        </p>

                        <p>
                            <label class="required" for="password" id="text"><b>Sheno paswordin e ri:</b></label>
                            <ul class="inline">
                                <li>
                                    <input type="password" name="pswri" id="pswri" placeholder="Sheno paswordin e ri" value="<?php echo @$_POST['pswri']; ?>" />
                                    <span style="color: red;"><?php echo @$passwordiri_error; ?></span>
                                </li>
                            </ul>
                        </p>
                        <p>
                            <label class="required" for="password" id="text"><b>Perserit paswordin e ri:</b></label>
                            <ul class="inline">
                                <li>
                                    <input type="password" name="pswri2" id="pswri2" placeholder="Perserit paswordin e ri" value="<?php echo @$_POST['pswri2']; ?>" />
                                    <span style="color: red;"><?php echo @$passwordiri2_error; ?></span>
                                </li>
                            </ul>
                        </p>
                        <p>
                            <ul class="inline">
                                <li>
                                    <button class="buton" type="submit" name="submit1">Ndrysho paswordin</button>
                                </li>
                            </ul>
                        </p>

                    </form>
                </td>
                <td width="50%">
                    <form method="POST" id="formandrrouname" name="formaime">
                        <p>
                            <label class="required" for="username" id="text"><b>Sheno username:</b></label>

                            <ul class="inline">
                                <li>
                                    <input type="text" name="newusername" id="newusername" placeholder="Sheno username" value="<?php echo @$_POST['newusername']; ?>" />
                                    <span style="color: red;"><?php echo @$uname_error; ?></span>
                                </li>
                            </ul>
                        </p>

                        <p>
                            <label class="required" for="password" id="text"><b>Sheno paswordin:</b></label>
                            <ul class="inline">
                                <li>
                                    <input type="password" name="pasword" id="pasword" placeholder="Sheno paswordin" value="<?php echo @$_POST['pasword']; ?>" />
                                    <span style="color: red;"><?php echo @$paswordgabim_error; ?></span>
                                </li>
                            </ul>
                        </p>
                        <p>
                            <ul class="inline">
                                <li>
                                    <button class="buton" type="submit" name="submit2">Ndrysho username</button>
                                
                                </li>
                            </ul>
                        </p>
                    </form>
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="2">
                    <p class="head" style="font-size: 2vmax;">Llogaria ime</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="service">
                        <p>Username:</p>
                        <?php
                        $email = $_COOKIE['aktiv'];
                        $tedhenat = new Tedhenat();
                        $tedhenat->setData($email);
                        echo "<p class='data'>" . $tedhenat->merrUsername() . "</p>";

                        echo "</p></div></td></tr><tr> <td colspan='2'> <div id='service' ><p>Email: </p>";
                        echo "<p class='data'>" . $tedhenat->merrEmailin() . "</p>";
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="vendose">
                    <button class="buton" name="buton" onclick="myFunction()">Ndrysho te dhenat</button>
                </div>
                <div id="heke">
                    <button class="buton" name="buton" onclick="myFunction()">Largo pjesen e siperme</button>
                </div>
                </td>
            </tr>
        </table>
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
                        <form id="forme" method="POST">
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
<script src="js/seminari.js " type="text/JavaScript "></script>
<script src="js/readmore.js " type="text/javascript"></script>
<script src="js/valido.js " type="text/JavaScript "></script>

<script>
    function myFunction() {
        var x = document.getElementById("forma");
        var y = document.getElementById("heke");
        var z = document.getElementById("vendose");
        if (x.style.display === "none") {
            y.style.display = "contents";
            x.style.display = "contents";
            z.style.display = "none";
        } else {
            z.style.display = "contents";
            x.style.display = "none";
            y.style.display = "none";
        }
    }
</script>

</html>
<?php
if (isset($_GET['out'])) {
    echo '<script type="text/javascript">',
        "window.location.href = 'seminari.php';",
        '</script>';
    runFunction();
}

function runFunction()
{
    $_SESSION['admin'] = false;
    $_SESSION['user'] = false;
}
?>