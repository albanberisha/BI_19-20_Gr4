<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $v_email = $_POST['email'];
        $v_password = $_POST['psw'];
        $v_password2 = $_POST['psw2'];

        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }

        $email = validation($v_email);
        $password = validation($v_password);
        $password2 = validation($v_password2);
        $email_error = $password_error = $password_error2 = "";

        if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) {
            $email_error = "</br>Emaili jo valid";
        }elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password)) {
            $password_error = "</br>Paswordi duhet ta permbajë: nje numer, nje shkronje te madhe dhe te vogel, nje karakter special @#-_$%^&+=§!? dhe me i gjate se 8 karaktere";
        }elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password2)) {
            $password_error2 = "</br>Paswordi jo korrekt ose nuk perputhet";
        }elseif (!strcmp($password, $password2) == 0)
            {
                $password_error2 = "</br>Paswordat nuk perputhen";
            }else{
                ruaj();
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
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="information.css">
    <style>
        span {
            font-size: 13.5px;
        }
    </style>
</head>

<body>
    <header>
        <button class="back_button"><a href="seminari.php"><b>Prapa</b></a></button>
    </header>
    <div class="forma">
        <h1>Regjistrohu</h1>
        <form id="formaime" method="POST">
            <p>
                <label for="email" class="required" id="text" name="email" autoselect><b>Email:</b></label>
                <ul class="inline">
                    <li>
                        <input type="text" placeholder="Sheno Emailin" id="email" name="email" value="<?php echo @$_POST['email']; ?>">
                        <span style="color: red;"><?php echo @$email_error; ?></span>
                    </li>
                </ul>
            </p>
            <p>
                <label class="required" for="password" id="text"><b>Paswordi:</b></label>
                <ul class="inline">
                    <li>
                        <input type="password" placeholder="Sheno Paswordin" name="psw" value="<?php echo @$_POST['psw']; ?>">
                        <span style="color: red;"><?php echo @$password_error; ?></span>
                    </li>
                </ul>
            </p>
            <p>
                <label class="required" for="password" id="text"><b>Perserit paswordin:</b></label>
                <ul class="inline">
                    <li>
                        <input type="password" placeholder="Perserit Paswordin" name="psw2" value="<?php echo @$_POST['psw2']; ?>">
                        <span style="color: red;"><?php echo @$password_error2; ?></span>
                    </li>
                </ul>
            </p>
            <p>
                <label id="text">
                    <input type="checkbox" checked="checked" name="remember"> Me mbaj mend.
                </label>
            </p>
            <p>
                <label id="text">
                    Duke krijuar nje llogari te re ju pranoni <a href="#" style="color:dodgerblue">Kushtet e Pergjithshme</a> tona.
                </label>
            </p>
            <p>
                <ul class="inline">
                    <li>
                        <button type="submit" name="submit">Regjistrohu</button>
                    </li>
                </ul>
            </p>
            <p>
                <ul class="inline">
                    <li>
                        <label>Tashme keni nje llogari? Atehere hyni <a href="login.php" style="color:dodgerblue">ketu</a>.
                        </label>
                        <br />
                        <label id="text" style="margin-left:0;">
                            <mark> <i>Shiko <u><a id="manuali" href="manualiperregjistrimvideo.html" target="_blank">videon</a></u> pe ta pare <aabr title="Manuali Per Regjistrim">MPR</aabr> me ane te videos.</i></mark>
                        </label>
                    </li>
                </ul>
            </p>
</body>
<script src="js/ndrrimiibackgroundit.js" type="text/JavaScript"></script>

</html>
<?php
function ruaj()
{
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'aplikuesit';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    if (!$conn) {
        die("Error" . mysqli_connect_errno());
    } else {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $pass = $_POST['psw'];
            $pass2 = $_POST['psw2'];
            $pass_hash = password_hash($pass, PASSWORD_BCRYPT);
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email ='" . $email . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows == 0) {
                $arr=preg_split('/\.|@/', $email);
                $username=$arr[0];
                $sql = "INSERT INTO users(username,email,pasword) VALUES('$username','$email','$pass_hash')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $mesazhi = 'alert("Emaili u krijua me sukses")';
                        echo '<script language="javascript">';
                        echo $mesazhi;
                        echo '</script>';
                        echo '<script type="text/javascript">',
                        "window.location.href = 'login.php';",
                        '</script>'
                    ;
                } else {
                    $mesazhi = 'alert("Probleme teknike, provoni perseri")';
                        echo '<script language="javascript">';
                        echo $mesazhi;
                        echo '</script>';
                }
            } else {
                $mesazhi = 'alert("Ky email eshte i zene.")';
                echo '<script language="javascript">';
                echo $mesazhi;
                echo '</script>';
            }
        }
    }
    header("Refresh:0");
}
?>