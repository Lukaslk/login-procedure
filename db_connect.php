<?php

//Conexão com o banco de dados
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'login_dinamic_css';

//Não foi usado o PDO pois o mesmo só suporta o OO
$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
    echo "Falha na conexão: ". mysqli_connect_error();
endif;

?>