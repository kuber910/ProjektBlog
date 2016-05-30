<?php
session_start();
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />

</head>

<body>
<form action ="zaloguj_check.php" method = "post">
Login: <br /> <input type = "text" name = "login"; /> <br />
Hasło: <br /> <input type = "password" name = "haslo"; /> <br /><br />
<input type="submit" value="Zaloguj się" /><br /><br />
    <a href="rejestracja.php">Nie masz konta? -> Zarejestruj się!</a>
        <br /><br />
</form>

<?php
if(isset($_SESSION['blad'])) echo $_SESSION['blad'];

?>

</body>
</html>