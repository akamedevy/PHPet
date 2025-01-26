<?php
session_start();

var_dump($_SESSION);

if (isset($_POST['enviar']))
{
    var_dump($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="date" name="data" id="">
        <input type="submit" name="enviar">
    </form>
</body>
</html>