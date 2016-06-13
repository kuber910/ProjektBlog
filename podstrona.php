<?php
include 'naglowek.php';
include 'pasek_newsy.php';

$id = $_GET["id"];
 if (isset($id)) {
    require_once "connect.php";

    $baza = @new mysqli($host, $db_user, $db_password, $db_name);


    if ($baza->connect_errno != 0) {
        echo "Error: " . $baza->connect_errno;
    }

    $tabela = "aktualnosci";
     $query = "SELECT * FROM " . $tabela . " WHERE id=".$id;

    $wynik = $baza->query($query);
    if ($wynik) {
        while ($wiersz = $wynik->fetch_assoc()) {
            echo ' <div class="top">
            <img src="'.$wiersz["obrazek"].'"/>
            <div class="title">
                    ' . $wiersz["tytul"] . '
            </div>
            <div class="content">
                    ' . $wiersz["opis"] . '
            </div>
    </div>';
        }
    }

}
?>


<?php
include 'stopka.php'; ?>



