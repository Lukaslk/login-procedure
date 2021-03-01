<?php
//Sessão
session_start();

//Conexãp
require_once 'db_connect.php';

//Verificação
if(!isset($_SESSION['Logado'])):
    header('Location: index.php');
    session_destroy();
endif;

//Dados
$id = $_SESSION['id_user'];
$sql = "SELECT * FROM user WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo_dinamic.css">
    <title>Dinamic CSS</title>
</head>
<body>
    
    <div id="container">
        <label for="location">Location</label>
        <input type="range" min="0" max="150" value="0" id="location"
        oninput="moveBox(this.value)"
        >

        <label for="radius">Radious</label>
        <input type="range" min="0" max="50" value="0" id="borderRadius" 
        oninput=" alterBorder(this.value)"
        >

        <label for="color">Color</label>
        <input type="color" id="color"
        oninput="alterColor(this.value)"
        >

        <div id="box"></div>
    </div>

    <a href="logout.php">Sair</a>
    <script src="script_dinamic_css.js"></script>
</body>
</html>