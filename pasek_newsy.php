<?php
session_start();?>

<div class='loginbar'>

        <form class='login' action="zaloguj_check.php" method="post" autocompleate="off">

            <?php

            if (isset($_SESSION['zalogowany'])) {
                echo "<p>Witaj " . $_SESSION['user'] . '! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
                echo "<p><b>E-mail</b>: " . $_SESSION['email'];
            } else {
                echo '<input type="text" name="login" id="inputLogin" placeholder="login" required>';
                echo ' <input type="password" name="haslo" placeholder="haslo" required>';
                echo ' <input type="submit" value="Zaloguj się" />';
                echo' <br/><a href="rejestracja.php"><font size="5" color="white" font face="cursive">Nie masz konta? -> Zarejestruj się!</a><br/></font>';

            }
           if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
            ?>
</form>

</div>
<div class='logdown'></div>
<center style="margin-top:20px "><h1><font size="15" color="white" face = "fantasy">Newsy</h1></font></center>