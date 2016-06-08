<?php

include 'naglowek.php';?>
<?php
include 'pasek_newsy.php';?>
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
?>

    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

    <center><h1><font size="5" color="black" face ="cursive">Twój wpis został dodany zaraz strona się odswiezy :)<br /><br /></font></></center>
<?php
header('refresh: 2; url=http://localhost/ProjektBlog/goscie2.php'); // Przekierowanie strony
?>
<?php
include 'stopka.php';?>+