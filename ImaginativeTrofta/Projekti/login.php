<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $v_email = $_POST['email'];
        $v_password = $_POST['psw'];
        function validation($form_data)
        {
            $form_data = trim(stripcslashes(htmlspecialchars($form_data)));
            return $form_data;
        }
        $email = validation($v_email);
        $password = validation($v_password);
        if (empty($email)) {
            $email_error = "</br>Shkruani nje email";
        } elseif (empty($password)) {
            $password_error = "</br>Shkruani paswordin";
        } else {
            login();
        }

        if (!empty($email) && !empty($password) && !empty($password2)) {
            $msg = "</br>Validimi komplet";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
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
        <button class="back_button"><a href="Seminari.php"><b>Prapa</b></a></button>
    </header>
    <div class="forma">
        <form id="formaime" method="POST">
            <p>
                <label for="email" class="required" id="text" autoselect><b>Emaili:</b></label>
                <ul class="inline">
                    <li>
                        <input type="text" placeholder="Sheno Emailin" name="email" value="<?php echo @$_POST['email']; ?>">
                        <span style="color: red;"><?php echo @$email_error; ?></span>
                    </li>
                </ul>
            </p>
            <p>
                <label class="required" for="password" name="psw" id="text"><b>Paswordi:</b></label>
                <ul class="inline">
                    <li>
                        <input type="password" placeholder="Sheno Paswordin" name="psw" value="<?php echo @$_POST['psw']; ?>">
                        <span style="color: red;"><?php echo @$password_error; ?></span>
                    </li>
                </ul>

            </p>
            <p>
                <ul class="inline">
                    <li>
                        <button type="submit" name="submit">Hyrje</button>
                    </li>
                </ul>

            </p>
            <p>
                <label id="text">
                    <input type="checkbox" checked="checked" name="remember"> Me mbaj mend.
                </label>
            </p>
            <p class="forgotpsw">
                <ul class="inline">
                    <li>
                        <span class="psw">Krijo nje <a href="sign.php">llogari</a> te re.</span>
                    </li>
                    <p>
                        <li>
                            <span class="psw">Dëshironi të luani një lojë? <a href="loja1.html" target="_blank">Luaj.</a></span>
                        </li>
                    </p>
                </ul>
            </p>
        </form>
    </div>
</body>
<script src="js/ndrrimiibackgroundit.js" type="text/JavaScript"></script>

</html>
<?php
function login()
{
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'aplikuesit';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    if (!$conn) {
        $mesazhi = 'alert("Nuk mund te krijohet lidhja me databaze".mysqli_connect_errno())';
                    echo '<script language="javascript">';
                    echo die($mesazhi );
                    echo '</script>';
    } else {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $pass = $_POST['psw'];
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbemail = $row['email'];
                    $dbpass = $row['pasword'];
                }
                if ($email == $dbemail) {
                    if (password_verify($pass, $dbpass)) {
                        session_start();
                        if(strcasecmp($email, 'admin@gmail.com') == 0)
                        {
                        $_SESSION["admin"]=true;}else{
                            $_SESSION["user"]=true;
                        }
                        $cookie_email=$dbemail;
                        $cookie_name = "aktiv";
                        setcookie($cookie_name, $cookie_email, time() + (86400 * 30), "/");
                        header("Location: seminari.php");
                    } else {
                        $mesazhi = 'alert("Keni shenuar gabim emailin ose paswordin")';
                        echo '<script language="javascript">';
                        echo $mesazhi;
                        echo '</script>';
                    }
                } 
                }else {
                    $mesazhi = 'alert("Ky email nuk ekziston")';
                    echo '<script language="javascript">';
                    echo $mesazhi;
                    echo '</script>';
            }
        }
    }
}
?>