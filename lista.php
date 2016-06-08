<?php
require_once "connect.php";

$baza = @new mysqli($host, $db_user, $db_password, $db_name);

if ($baza->connect_errno!=0)
{
    echo "Error: ".$baza->connect_errno;
}
else
{
    $tabela = "aktualnosci";

    $wynik= $baza->query("SELECT * FROM ".$tabela." limit 6");
    if($wynik)
    {
        while($wiersz=$wynik->fetch_assoc())
        {
            echo  ' <div class="work" ">
        <a href="inner.html">
            <img
                src="'.$wiersz["obrazek"].'"
                class="media" alt=""/>
            <div class="caption">
                <div class="work_title">
                    <h1>'.$wiersz["tytul"].'</h1>
                </div>
            </div>
        </a>
    </div>';
        }
    }
}

$baza->close();
?>

