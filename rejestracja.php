<?php
include 'naglowek.php';?>

  <center> <img src="img/REJESTRACJA.jpg" height="200" "/></center>
<?php
$_SESSION['udanarejestracja']=0;

if (isset($_POST['email']))
{
    //Udana walidacja? Załóżmy, że tak!
    $wszystko_OK=true;

    //Sprawdź poprawność nazwy
    $nazwa = $_POST['nazwa'];

    //Sprawdzenie długości nazwy
    if ((strlen($nazwa)<3) || (strlen($nazwa)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_nazwa']="Nazwa musi posiadać od 3 do 20 znaków!";
    }

    if (ctype_alnum($nazwa)==false)
    {
        $wszystko_OK=false;
        $_SESSION['e_nazwa']="Nazwa może składać się tylko z liter i cyfr (bez polskich znaków)";
    }

    // Sprawdź poprawność adresu email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
    {
        $wszystko_OK=false;
        $_SESSION['e_email']="Podaj poprawny adres e-mail!";
    }

    //Sprawdź poprawność hasła
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
    {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
    }

    if ($haslo1!=$haslo2)
    {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

    //Czy zaakceptowano regulamin?
    if (!isset($_POST['regulamin']))
    {
        $wszystko_OK=false;
        $_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
    }

   // Bot or not? Oto jest pytanie!
    $sekret = "6Ldcih4TAAAAALFaBJWok7ukKqEntXiIQ2xzQLQ1";

    $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

    $odpowiedz = json_decode($sprawdz);

    if ($odpowiedz->success==false)
    {
        $wszystko_OK=false;
        $_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
   }

    //Zapamiętaj wprowadzone dane
    $_SESSION['fr_nazwa'] = $nazwa;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_haslo1'] = $haslo1;
    $_SESSION['fr_haslo2'] = $haslo2;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try
    {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            //Czy email już istnieje?
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_maili = $rezultat->num_rows;
            if($ile_takich_maili>0)
            {
                $wszystko_OK=false;
                $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
            }

            //Czy nazwa jest już zarezerwowany?
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nazwa'");

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_nazw = $rezultat->num_rows;
            if($ile_takich_nazw>0)
            {
                $wszystko_OK=false;
                $_SESSION['e_nazwa']="Istnieje już gracz o takiej nazwie! Wybierz inny.";
            }

            if ($wszystko_OK==true)
            {
                $_SESSION['udanarejestracja']=1;
                if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nazwa', '$haslo_hash', '$email')"))
                {

                    header('Location: witam.php');
                }
                else
                {
                    throw new Exception($polaczenie->error);
                }

            }

            $polaczenie->close();
        }

    }
    catch(Exception $e)
    {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br />Informacja developerska: '.$e;
    }

}


?>

<form align="center"  style="margin-top: 30px " method="post">

    Nazwa użytkownika: <br /> <input type="text" value="<?php
    if (isset($_SESSION['fr_nazwa']))
    {
        echo $_SESSION['fr_nazwa'];
        unset($_SESSION['fr_nazwa']);
    }
    ?>" name="nazwa"/><br />

    <?php
    if (isset($_SESSION['e_nazwa']))
    {
        echo '<div class="error">'.$_SESSION['e_nazwa'].'</div>';
        unset($_SESSION['e_nazwa']);
    }
    ?>

    E-mail: <br /> <input type="text" value="<?php
    if (isset($_SESSION['fr_email']))
    {
        echo $_SESSION['fr_email'];
        unset($_SESSION['fr_email']);
    }
    ?>" name="email" /><br />

    <?php
    if (isset($_SESSION['e_email']))
    {
        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
        unset($_SESSION['e_email']);
    }
    ?>

    Twoje hasło: <br /> <input type="password"  value="<?php
    if (isset($_SESSION['fr_haslo1']))
    {
        echo $_SESSION['fr_haslo1'];
        unset($_SESSION['fr_haslo1']);
    }
    ?>" name="haslo1" /><br />

    <?php
    if (isset($_SESSION['e_haslo']))
    {
        echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
        unset($_SESSION['e_haslo']);
    }
    ?>

    Powtórz hasło: <br /> <input type="password" value="<?php
    if (isset($_SESSION['fr_haslo2']))
    {
        echo $_SESSION['fr_haslo2'];
        unset($_SESSION['fr_haslo2']);
    }
    ?>" name="haslo2" /><br />

    <label>
        <input type="checkbox" name="regulamin" <?php
        if (isset($_SESSION['fr_regulamin']))
        {
            echo "checked";
            unset($_SESSION['fr_regulamin']);
        }
        ?>/> Akceptuję regulamin
    </label>

    <?php
    if (isset($_SESSION['e_regulamin']))
    {
        echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
        unset($_SESSION['e_regulamin']);
    }
    ?>

    <div class="g-recaptcha" data-sitekey="6Ldcih4TAAAAAGiTZutQLITpaRdssLBzkviG_nd-"></div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php
    if (isset($_SESSION['e_bot']))
    {
        echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
        unset($_SESSION['e_bot']);
    }
    ?>

    <br />

    <input type="submit" value="Zarejestruj się" />

</form>

<?php
include 'stopka.php';?>