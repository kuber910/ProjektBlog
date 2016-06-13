<?php
include 'naglowek.php';
?>

<?php
include 'pasek_newsy.php';?>

    <br /><br /><br /><br />

<?php if(isset($_GET["id"]))
{
require_once "connect.php";

$baza = @new mysqli($host, $db_user, $db_password, $db_name);

if ($baza->connect_errno!=0)
{
echo "Error: ".$baza->connect_errno;
}

}

else {
    $tabela = "podstrony";

    $wynik= $baza->query("SELECT * FROM ".$tabela);
    if($wynik)
    {
        while($wiersz=$wynik->fetch_assoc())
        {
            echo  ' <div class="top">
            <div class="title">
                    '.$wiersz["tytul2"].'
            </div>
            <div class="content">
                    '.$wiersz["tekst2"].'
            </div>
    </div>';
        }
    }

}
?>


<?php
include 'stopka.php';?>



