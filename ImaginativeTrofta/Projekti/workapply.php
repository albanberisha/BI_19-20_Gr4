<!DOCTYPE html>
<html>

<head>
    <title>Formular per aplikim ne pune</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" type="text/css" href="information.css">
    <style>
        .forma h1 {
            text-shadow: 3px 2px rgb(136, 136, 255);
            border: 15px solid transparent;
            border-image: url(images/borderbackground.png) 40% stretch;
        }

        h1 {
            position: relative;
            animation-name: animacioniKryesor;
            animation-duration: 4s;
            animation-iteration-count: 1;
            animation-delay: 3s;
            animation-play-state: running;
            animation-timing-function: linear;
            -webkit-animation-name: animacioniKryesor;
            -webkit-animation-duration: 2vmax;
            -webkit-animation-delay: 3s;
            -webkit-animation-timing-function: linear;
            -webkit-animation-iteration-count: 1;
            -webkit-animation-play-state: running;
        }

        @keyframes animacioniKryesor {
            0% {
                left: 0;
                top: 0;
                background: #E0F8FB;
            }

            25% {
                left: 9vmax;
                top: 0px;
                background: #F7FDFC;
            }

            50% {
                left: 18vmax;
                top: 0;
                background: #D3F5FC;
            }

            75% {
                left: 9vmax;
                background: #F7FDFC;
                top: 0px;
            }

            100% {
                left: 0;
                background: #E0F8FB;
                top: 0;
            }
        }
    </style>
</head>

<body>
    <?php
    global $pozita, $vitet, $checkboxi;
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
     {
        if (isset($_POST['submit'])) 
        {
            $v_id = $_POST['id'];
            $v_emri = $_POST['emri'];
            $v_mbiemri = $_POST['mbiemri'];
            $v_emaili = $_POST['emaili'];
            $pozita = (isset($_POST['pozita'])) ? ($_POST['pozita']) : '';
            $vitet = (isset($_POST['vitet'])) ? ($_POST['vitet']) : '';
            $checkboxi = (isset($_POST['checkboxi'])) ? ($_POST['checkboxi']) : '';

            function validation($form_data)
            {
                $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
                return $form_data;
            }


            $id = validation($v_id);
            $emri = validation($v_emri);
            $mbiemri = validation($v_mbiemri);
            $emaili = validation($v_emaili);

            $id_error = $emri_error = $mbiemri_error = $emaili_error = $pozita_error = $vitet_error = $check1_error = "";

            if (empty($id)) {
                $id_error = "Id jo valide. Shtypni nje numer";
            } elseif (!preg_match("/^[A-Za-z0-9_]+$/", $emri)) {
                $emri_error = "Emer jo valid.";
            } elseif (!preg_match("/^[A-Za-z0-9_]+$/", $mbiemri)) {
                $mbiemri_error = "Mbiemer jo valid.";
            } elseif (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $emaili)) {
                $emaili_error = "</br>Emaili jo valid";
            } elseif (!$pozita == 'checked') {
                $pozita_error = "Zgjedhni njeren nga opsionet.";
            } elseif (!$vitet == 'selected') {
                $vitet_error = "Zgjedhni njeren nga opsionet.";
            } elseif (!$checkboxi == 'checked') {
                $check1_error = "Ju lutem pranoni kushtet tona per te vazhduar.";
            } else {   
                regjistroAplikimin();
            }
            if (!empty($id) && !empty($emri) && !empty($mbiemri) && !empty($emaili) && !empty($pozita) && !empty($vitet) && !empty($check)) {
                $msg = "Validimi eshte kompletuar.";
            }
       }
    }
   ?>
    <header>
        <button class="back_button"><a href="seminari.php"><b>Prapa</b></a></button>
    </header>
    <script type="text/javascript">
        var koha = 0;
        var mesazhi;

        function hello() {
            var i = stopWorker();
            if (koha == 0) {
                mesazhi = " ";
            } else {
                mesazhi = "Koha per aplikim ishte " + koha + " minuta";
            }
            if (validateForm() == false) {} else {
                var click = count();
                var clicksesion = countsesion();
                //var msg = "Aplikim i suksesshem. Jeni aplikuesi numer " + click + ". Ne kete seksion kane aplikuar " + clicksesion + " aplikues. ";
                //alert(msg + mesazhi);
            }

            function count() {
                if (typeof(Storage) !== "undefined") {
                    if (localStorage.clickcount) {
                        localStorage.clickcount = Number(localStorage.clickcount) + 1;
                    } else {
                        localStorage.clickcount = 1;
                    }
                }
                return localStorage.clickcount;
            }

            function countsesion() {
                if (typeof(Storage) !== "undefined") {
                    if (sessionStorage.clickcount) {
                        sessionStorage.clickcount = Number(sessionStorage.clickcount) + 1;
                    } else {
                        sessionStorage.clickcount = 1;
                    }
                }
                return sessionStorage.clickcount;
            }

            function validateForm() {
                var id = document.forms["formaime"]["id"].value;
                var emri = document.forms["formaime"]["emri"].value;
                var mbiemri = document.forms["formaime"]["mbiemri"].value;
                var checkboxi = document.getElementById("checkboxi").checked;
                if (id == " ") {
                    return false;
                } else {
                    if (emri == "") {
                        return false;
                    } else {
                        if (mbiemri == "") {
                            return false;
                        } else {
                            if (checkboxi == false) {
                                return false;
                            }
                        }
                    }
                }
            }
        }

        function startWorker() {
            if (typeof(Worker) !== "undefined") {
                if (typeof(w) == "undefined") {
                    w = new Worker("js/demo_workers.js");
                }
                w.onmessage = function(event) {
                    koha = event.data;
                };
            } else {
                alert("Web Browseri juaj nuk e mbeshtet Web Workers...");
            }
        }

        function stopWorker() {
            return koha;
            w.terminate();
            w = undefined;
        }
    </script>

    <div class="forma">
        <h1>Aplikim per pune</h1>
        <ul class="inline" style="margin-left: 9vmax">
            <p id="result">
                <?php
                $Stringu = "data";
                $Stringu2 = "eshte";
                $data = date('d-m-Y');
                printf("Sot %s %s %s </br>", $Stringu, $Stringu2, $data);
                ?>
        </ul>
        <form name="formaime" method="POST">
            <p>
                <label class="required" for="id" id="text" autoselect>Id:</label>
                <ul class="inline">
                    <li>
                        <audio id="identitynumber" src="audio/identitynumber.mp3"></audio>
                        <div class="icons">
                            <a onclick="document.getElementById('identitynumber').play()"></a>
                        </div>
                    </li>
                    <li>
                        <input type="number" id="id" name="id" placeholder="Id" autofocus value="<?php echo @$_POST['id']; ?>">
                        <span style="color: red;"><?php echo @$id_error; ?></span>
                    </li>
                </ul>
            </p>
            <p>
                <ul>
                    <li>
                        <label class="required" for="emri" id="text">Emri:</label>
                        <ul class="inline">
                            <li>
                                <audio id="name" src="audio/name.mp3"></audio>
                                <div class="icons">
                                    <a onclick="document.getElementById('name').play()"></a>
                                </div>
                            </li>
                            <li>
                                <input type="text" id="emri" name="emri" placeholder="Emri" value="<?php echo @$_POST['emri']; ?>">
                                <span style="color: red;"><?php echo @$emri_error; ?></span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <label class="required" for="mbiemri" id="text">Mbiemri:</label>
                        <ul class="inline">
                            <li>
                                <audio id="surname" src="audio/surname.mp3"></audio>
                                <div class="icons">
                                    <a onclick="document.getElementById('surname').play()"></a>
                                </div>
                            </li>
                            <li>
                                <input type="text" id="mbiemri" name="mbiemri" placeholder="Mbiemri" value="<?php echo @$_POST['mbiemri']; ?>">
                                <span style="color: red;"><?php echo @$mbiemri_error; ?></span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </p>

            <p>
                <label for="emaili" class="required" id="text">E-mail Addresa:</label>
                <ul class="inline">
                    <li>
                        <audio id="email" src="audio/email.mp3"></audio>
                        <div class="icons">
                            <a onclick="document.getElementById('email').play()"></a>
                        </div>
                    </li>
                    <li>
                        <input type="text" id="emaili" name="emaili" placeholder="Example@gmail.com" value="<?php echo @$_POST['email']; ?>">
                        <span style="color: red;"><?php echo @$emaili_error; ?></span>
                    </li>
                </ul>
                </li>
                </ul>
            </p>
            <p>
                <ul>
                    <li>
                        <label id="text" class="required" for="pozita">Pozita:</label>
                        <ul class="inline">
                            <li>
                                <audio id="position" src="audio/position.mp3"></audio>
                                <div class="icons">
                                    <a onclick="document.getElementById('position').play()"></a>
                                </div>
                            </li>
                            <li>
                                <label for="kuzhinier">Kuzhinier
                                    <input name="pozita" type="radio" id="kuzhinier" value="kuzhinier" <?php if ($pozita == "kuzhinier") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                </label>
                                <label for="kamarjer"> Kamarjer
                                    <input name="pozita" type="radio" id="kamarjer" value="kamarjer" <?php if ($pozita == "kamarjer") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                </label>
                                <span style="color: red;"><?php echo @$pozita_error; ?></span>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <label id="text">Vite eksperience:</label>
                        <ul class="inline">
                            <li>
                                <audio id="yearsexperience" src="audio/yearsexperience.mp3"></audio>
                                <div class="icons">
                                    <a onclick="document.getElementById('yearsexperience').play()"></a>
                                </div>
                            </li>
                            <li>
                                <select class="vitet" name="vitet">
                                    <option default <?php if ($vitet == "") {
                                                        echo "selected";
                                                    } ?>>-</option>
                                    <option value="0" <?php if ($vitet == "0") {
                                                            echo "selected";
                                                        } ?>>0</option>
                                    <option value="1" <?php if ($vitet == "1") {
                                                            echo "selected";
                                                        } ?>>1</option>
                                    <option value="2" <?php if ($vitet == "2") {
                                                            echo "selected";
                                                        } ?>>2</option>
                                    <option value="3+" <?php if ($vitet == "3+") {
                                                            echo "selected";
                                                        } ?>>3+</option>
                                </select>
                                <span style="color: red;"><?php echo @$vitet_error; ?></span>
                            </li>
                        </ul>
                </ul>

            </p>
            <p>
                <label id="text">Aftesi te tjera:</label>
                <ul class="inline">
                    <li>
                        <audio id="otherskills" src="audio/otherskills.mp3"></audio>
                        <div class="icons">
                            <a onclick="document.getElementById('otherskills').play()"></a>
                        </div>
                    </li>
                    <li>
                        <textarea class="komentet" name="komentet" cols="30" rows="5" wrap="hard" placeholder="Sheno aftesite personale te tjera"></textarea>
                    </li>
                </ul>
            </p>
            <p>
                <ul class="inline">
                    <li>
                        <audio id="privacypolicy" src="audio/privacypolicy.mp3"></audio>
                        <div class="icons">
                            <a onclick="document.getElementById('privacypolicy').play()"></a>
                        </div>
                    </li>
                    <li>

                        <label class="required"><input name="checkboxi" id="checkboxi" type="checkbox" <?php if ($checkboxi == "agree") {
                                                                                                            echo "checked";
                                                                                                        } ?>></input>I kam lexuar dhe i pranoj kushtet e <a class="terms" href="#"> Privacy Policy</a></label>
                        <span style="color: red;"><?php echo @$check1_error; ?></span>
                    </li>
                </ul>
            </p>
            <p>
                <ul class="inline">
                    <li>
                        <audio id="submit" src="audio/submit.mp3"></audio>
                        <div class="icons">
                            <a onclick="document.getElementById('submit').play()"></a>
                        </div>
                    </li>
                    <li>
                        <button type="submit" name="submit" id="apliko" class="submit">Apliko</button> </li>
                </ul>
            </p>
            <p>
                <label id="text">
                    <mark> <i>Shiko <u><a id="manuali" href="manualiperaplikimvideo.html" target="_blank">videon</a></u> pe ta pare <aabr title="Manuali Per Aplikim">MPA</aabr> me ane te videos</i></mark>
                </label>
            </p>
        </form>
    </div>
</body>
<script src="js/ndrrimiibackgroundit.js" type="text/JavaScript"></script>

</html>

<?php
function regjistroAplikimin()
{
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'aplikuesit';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    if (!$conn) {
        die($GLOBALS['Error4'] . mysqli_connect_errno());
    } elseif (isset($_POST['submit'])) {

        // Krijimi i databazes
        //$sql = "CREATE DATABASE aplikuesit";
        //if ($conn->query($sql) === TRUE) {
        //echo $GLOBALS['Error6'];
        //} else {
        // echo "Error creating database: " . $conn->error;
        //}

        //Krijimi i tabeles
        //$tab='CREATE TABLE aplikantet( id int, Emri VARCHAR(20),Mbiemri VARCHAR(20),Emaili varchar(50),Pozita VARCHAR(20),ViteEksperience int, AftesiTeTjera text)';
        //$lidhja=mysqli_query($conn,$tab); 
        //if(! $lidhja)
        //{
        //die($GLOBALS['Error5'].mysqli_connect_errno());
        //}  
        define('skripta', '<script language="javascript">', true);
        $ID = $_POST['id'];
        $Emri = $_POST['emri'];
        $Mbiemri = $_POST['mbiemri'];
        $Emaili = $_POST['emaili'];
        $Pozita = $_POST['pozita'];
        $Vitet = $_POST['vitet'];
        $Komentet = $_POST['komentet'];
        $kontrollo = "SELECT id FROM aplikantet WHERE id='$ID'";
        $kon = mysqli_query($conn, $kontrollo);
        if ((mysqli_num_rows($kon)) == 0) {
            $insertimi = "INSERT INTO aplikantet(id,Emri,Mbiemri,Emaili,Pozita,ViteEksperience,AftesiTeTjera)
            VALUES ('$ID','$Emri','$Mbiemri','$Emaili','$Pozita','$Vitet','$Komentet')";
            $lidhja2 = mysqli_query($conn, $insertimi);
            if ($lidhja2) {
                $Error2 = 'alert("Aplikim i suksesshem")';
                echo skripta;
                        echo $Error2;
                        echo '</script>';
            } else {
                $Error3 = 'alert("Nuk mund te krijohet procesohet aplikimi")';
                echo skripta;
                echo $Error3;
                echo '</script>';
            }
        } else {
            $Error1 = 'alert("Keni aplikuar nje here")';
            echo skripta;
            echo $Error1;
            echo '</script>';
        }
    }
    $Error4 = 'alert("nuk mund te behet lidhja me databaze")';
$Error5 = 'Nuk mund te krijohet tabela';
$Error6 = "Database created successfully";
mysqli_close($conn);
}

?>