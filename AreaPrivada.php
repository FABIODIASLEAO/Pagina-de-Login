
<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
header("location:index.php");
exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privado</title>
</head>
<body>
<h1>Seja Bem vindo!!</h1>
<a href="sair.php">Sair</a>
</body>
</html>