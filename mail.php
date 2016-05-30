

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />

</head>

<body>
<?php
$to      = 'sands910@gmail.com';
$subject = $_POST['temat'];
$message = $_POST['message'];
$headers = 'From:' . $_POST['email'] . "\r\n" .
    'Content-type: text/html; charset=utf-8';
mail($to, $subject, $message, $headers);

echo 'Mail został wysłany :)<br />
<a href="kontakt.php"> Napisz nowego maila </a>'
?>
<br /><br />
</body>
</html>

<body>
<?php

?>
</body>
</html>
