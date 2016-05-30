<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />

</head>

<body>
<?php
require_once "connect.php";

$baza = @new mysqli($host, $db_user, $db_password, $db_name);

if ($baza->connect_errno!=0)
{
    echo "Error: ".$baza->connect_errno;
}
else
{
    $nick = $_POST['nick'];
    $wpis = $_POST['wpis'];

    $baza->query("INSERT INTO wpisy VALUES (NULL, '$wpis', now(), '$nick')");

}

$baza->close();
echo "Twój wpis został dodany :) Teraz możesz wrócić na stronę głowną";
?>
<br /><br />
<a href="index.php">Główna</a>
</body>
</html>


