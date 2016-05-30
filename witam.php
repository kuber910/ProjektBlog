<?php
include 'naglowek.php';?>
<?php
//session_start();
if($_SESSION['udanarejestracja']=0)
{
header('Location: index.php');
exit();
}
else
{
    if($_SESSION['udanarejestracja']=1);
    {
        $_SESSION['udanarejestracja']=0;
    }
}

?>


<?php
include 'pasek_newsy.php';?>
<?php
//include 'lista.php';?>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<center><h1><font size="5" color="black" face ="cursive">Dziękujemy za rejestrację na stronie!<br />Korzystając z paska u góry możesz się teraz zalogować lub klikając poniżej wrócić do strony głównej<br /><br /> <a href="index.php">GŁÓWNA!</a></h1></font></></center>




<?php
include 'stopka.php';?>

